<?php

namespace XFS\Http\Controllers;

use Illuminate\Http\Requests;
use XFS\Http\Controllers\Controller;
use Illuminate\Http\Request;
use XFS\Http\Requests\CrearEstimateRequest;
use XFS\Http\Requests\EditEstimateRequest;
use XFS\Estimate;
use XFS\Company;
use XFS\Avion;
use XFS\Invoice;
use Storage;
use XFS\Servicio;
use XFS\FuelRelease;
use XFS\date_estimates;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use DateTime;

class EstimatesController  extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $estimates=DB::select(
      DB::raw("SELECT
        e.id,
        c.nombre,
        cp.nombre AS proveedor,
        e.estado,
        e.fecha_soli,
        total,
        resumen
        FROM estimates e
        INNER JOIN companys c ON c.id=e.company_id
        INNER JOIN companys cp ON cp.id=e.prove_id ") );

        $fuel=DB::select(
         DB::raw("SELECT
         f.id, f.qty, f.flight_purpose, f.flight_number, f.operator, f.ref, f.cf_card, f.etd, f.eta, f.handling, f.into_plane, f.into_plane_phone, f.date,
         e.id as estimate_id, e.fbo, e.localidad,
         c.nombre AS cliente,
         cp.nombre AS prove,
         c.id as company_id,
         a.tipo, a.matricula
         FROM fuelreleases f
         INNER JOIN estimates e ON f.estimate_id=e.id
         INNER JOIN companys c ON c.id=e.company_id
         INNER JOIN companys cp ON cp.id=e.prove_id
         INNER JOIN aviones a ON a.company_id=c.id"));

       return view ('estimates.index',compact('estimates','fuel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicios = Servicio::select('id', 'nombre','descripcion','precio')->get();
        return view('estimates.create',compact('servicios'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function save_image(Request $request)
     {
       $data  = $request->all();
       $imagen=$data['file'] ;
       $nombre=$data['nombre'];
      // dd(var_dump($imagen));
        Storage::disk('local')->put($nombre,  \File::get($imagen));
     }
     //  dd($data);
    public function store(CrearEstimateRequest $request)
    {
      $data  = $request->all();
      $imagen=$data['file'];
      $band=true;
      $nombre = $data['imagen'];
      $error= array();
      $items=$data["data_estimates"];
      $estimates = new Estimate;
      // dd(\File::get($imagen));
      $error=Estimate::validate_dates($data,1);
      $error+=Estimate::validate_file($imagen);
         if(!empty($error)){
           $band=false;
         }else{
           if(!empty($items)){
               $error=Estimate::validate_items($items);
               if(!empty($error)){
                   $band=false;
                   $error=array('pestaña'=>["Error en los Items del Estimado"])+$error;
               }else{
                 $datos=true;
               }
          }else{
            $error['Items']=['Debe Agregar los Items del Estimado'];
            $band=false;
          }//fin si hay aviones
         }
         if($band){
           DB::beginTransaction();
           try {
              $estimate=Estimate::create($data);
              $id=$estimate->id;
              ///////////
               if($datos){
                 foreach( $items as $indice =>$datos_estimates ){
                  $item=New date_estimates;
                  $item=Estimate::obj_item($datos_estimates, $item);
                  $estimate->date_estimates()->save($item);
                }//fin para
              }//fin si hay aviones
              } catch (Exception $e) {
                 DB::rollback();
                 $error[]=[$e->getMessage()];
              }
              // Hacemos los cambios permanentes ya que no han habido errores
              DB::commit();
              $result=['message' => 'bien', 'error'=> $error,'id'=>$id];
         }else{
           $result=['message' => 'mal','error'=> $error];
         }//fin si band
         return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$indicador=null)
    {

      $estimates=DB::select(
       DB::raw("SELECT
       e.id,
       c.id as company_id,
       c.nombre AS nombrec,
       cp.id AS prove_id,
       cp.nombre AS nombrep,
       estado,
       imagen,
       num_habitacion,
       tipo_cama,
       tipo_hab,
       tipo_estrellas,
       fecha_soli,
       ganancia,
       e.categoria,
       resumen,
       metodo_segui,
       info_segui,
       c.telefono,
       c.celular,
       c.correo,
       proximo_seguimiento,
       fbo,
       cantidad_fuel,
       localidad,
       a.id as avion_id,
       a.tipo,
       matricula,
       total,
       subtotal,
       descuento,
       total_descuento,
       e.categoria
       FROM estimates e
       INNER JOIN companys c ON c.id=e.company_id
       INNER JOIN companys cp ON cp.id=e.prove_id
       INNER JOIN aviones a ON a.company_id=c.id
       WHERE e.id=$id"));
       $idEstimates=$estimates[0]->id;
      //para saber si ya tiene una factura

      $invoice=Invoice::where('estimate_id' ,$idEstimates)->where('estado','<>','4')->count();
      if($invoice>0){
         $id_in = Invoice::select('id')->where('estimate_id' ,$idEstimates)->where('estado','<>','4')->get();
      }else{
        $id_in=null;
      }
        //para saber si ya tiene el fuel release
       $fuelrelease=FuelRelease::where('estimate_id' ,$idEstimates)->count();
       if($fuelrelease>0){
          $id_fuel = FuelRelease::select('id')->where('estimate_id' ,$idEstimates)->get();
       }else{
         $id_fuel=null;
       }
       //saber si solicito un servicio de gasolina
       $fuel =DB::table('dates_estimates')->where('estimate_id', $idEstimates)->join('servicios','servicios.id', '=','servicio_id')->where('nombre', 'LIKE', '%Fuel%')->count();
       $date=DB::select(
       DB::raw("SELECT
         s.id AS servicioid,
         s.nombre AS nbservicio,
         s.descripcion,
         cantidad,
         de.precio,
         subtotal,
         recarga,
         total
         FROM dates_estimates de
         INNER JOIN servicios s ON s.id=de.servicio_id
         WHERE estimate_id=$idEstimates "));
      //   dd(DB::getQueryLog());

         return view ('estimates.show',compact('date','estimates','invoice','fuel','fuelrelease','id_in','id_fuel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $categoria=0;
       $estimates=DB::select(
       DB::raw("SELECT
       e.id,
       c.id as company_id,
       c.nombre AS nombrec,
       cp.id AS prove_id,
       cp.nombre AS nombrep,
       estado,
       fecha_soli,
       ganancia,
       resumen,
       metodo_segui,
       info_segui,
       c.telefono_admin as telefono,
       c.celular,
       c.correo,
       proximo_seguimiento,
       fbo,
       cantidad_fuel,
       localidad,
       num_habitacion,
       tipo_estrellas,
       tipo_hab,
       tipo_cama,
       descuento,
       total_descuento,
       a.id as avion_id,
       a.tipo,
       subtotal,
       matricula,
       total,
       e.categoria
       FROM estimates e
       INNER JOIN companys c ON c.id=e.company_id
       INNER JOIN companys cp ON cp.id=e.prove_id
       INNER JOIN aviones a ON a.company_id=c.id
       WHERE e.id=$id"));

       $estimate= new Estimate;
       $estimate->localidad = $estimates[0]->localidad;
       $estimate->fbo = $estimates[0]->fbo;
       $estimate->avion_id = $estimates[0]->avion_id;
       $estimate->categoria=$estimates[0]->categoria;
       $estimate->subtotal = $estimates[0]->subtotal;
       $estimate->ganancia=$estimates[0]->ganancia;
       $estimate->descuento=$estimates[0]->descuento;
       $estimate->total = $estimates[0]->total;
       $estimate->total_descuento=$estimates[0]->total_descuento;
       $estimate->id=$estimates[0]->id;
       $estimate->company_id=$estimates[0]->company_id;
       $estimate->prove_id=$estimates[0]->prove_id;
       $estimate->id=$estimates[0]->id;
       $estimate->estado=$estimates[0]->estado;
       $estimate->fecha_soli=$estimates[0]->fecha_soli;
      $estimate->resumen=$estimates[0]->resumen;
      $estimate->metodo_segui=$estimates[0]->metodo_segui;
      $estimate->info_segui=$estimates[0]->info_segui;
      $estimate->proximo_seguimiento=$estimates[0]->proximo_seguimiento;
      $estimate->cantidad_fuel=$estimates[0]->cantidad_fuel;
      $estimate->num_habitacion=$estimates[0]->num_habitacion;
      $estimate->tipo_estrellas=$estimates[0]->tipo_estrellas;
      $estimate->tipo_hab=$estimates[0]->tipo_hab;
      $estimate->tipo_cama=$estimates[0]->tipo_cama;

       $idEstimates=$estimates[0]->id;
     //  dd($estimates[0]->telefono);
       $info=array(0=>array('id'=>'Telefono', 'nombre'=>$estimates[0]->telefono), 1=>array('id'=>'Correo', 'nombre'=>$estimates[0]->correo),  2=>array('id'=>'Celular', 'nombre'=>$estimates[0]->celular));

      $servicios = Servicio::select('id', 'nombre','descripcion','precio')->get();

       $aviones=Avion::where('company_id',$estimates[0]->company_id)->get();
      // $aviones->prepend($avion['nombre',]);
       $items=DB::select(
       DB::raw("SELECT
         s.id AS servicio_id,
         s.descripcion,
         de.id,
         cantidad,
         de.precio,
         subtotal,
         subtotal_recarga,
         recarga,
         total
         FROM dates_estimates de
         INNER JOIN servicios s ON s.id=de.servicio_id
         WHERE estimate_id=$idEstimates "));
         $datos_estimado =collect( $items);
         $categoria=Estimate::categoria($estimates[0]->categoria);
         $cliente=$estimates[0]->nombrec;
         $proveedor=$estimates[0]->nombrep;
         $matri=$estimates[0]->matricula;
       // $date=date_estimates::where('estimate_id',$estimates->id)->get();
       return view ('estimates.edit',compact('matri','datos_estimado','servicios','aviones','estimate','cliente','proveedor','categoria','info'));
      }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditEstimateRequest $request, $id)
    {
      $data= $request->all();
      $estimate = Estimate::findOrFail($id);
      $band=true;
      $error= array();
      $items=$data["data_estimates"];
      $error=Estimate::validate_dates($request->all(),2);
      if(!empty($error)){
          $result=['message' => 'mal','error'=> $error];
      }else{
        if(!empty($items)){
            $error=Estimate::validate_items($items);
            if(!empty($error)){
                $band=false;
                $error=array('pestaña'=>["Error en los Items del Estimado"])+$error;
            }else{
              $datos=true;
            }
       }else{
         $error['Items']=['Debe Agregar los Items del Estimado'];
         $band=false;
       }//fin si hay aviones
      }
      if($band){
        DB::beginTransaction();
        try {
            $estimate->fill($request->all());
            $estimate->save();
           ///////////
            if($datos){
              foreach( $items as $indice =>$datos_estimates ){
                if(isset($datos_estimates["id"])){//si ya existe el avion en bd
                  $item=date_estimates::findOrFail($datos_estimates['id']);
                  $item=Estimate::obj_item($datos_estimates, $item);
                }else{//si el avion es nuevo
                   $item=New date_estimates;
                   $item=Estimate::obj_item($datos_estimates, $item);
                }
               $estimate->date_estimates()->save($item);
             }//fin para
           }//fin si hay aviones
           } catch (Exception $e) {
              DB::rollback();
              $error[]=[$e->getMessage()];
           }
           // Hacemos los cambios permanentes ya que no han habido errores
           DB::commit();
           $result=['message' => 'bien', 'error'=> $error];
      }else{
        $result=['message' => 'mal','error'=> $error];
      }//fin si band
      return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function item_destroy($id, Request $request)
     {
         $item=date_estimates::findOrFail($id);
         $data=$request->all();
         $error=array();
       //  $air=Avion::where('company_id', $id)->where('id', $id_air )->get();
         $mensaje='El item '.$item->servicio->nombre.' fue eliminado Exitosamente';
         if (!is_null($item)) {
           DB::beginTransaction();
           try {
             $item->delete();
             $estimate = Estimate::findOrFail($data['estimate_id']);
             $estimate->fill($request->all());
             $estimate->save();
             $result=['message' => $mensaje,'error'=> $error];
            } catch (Exception $e) {
              DB::rollback();
              $error[]=[$e->getMessage()];
           }
             DB::commit();
        }
         return response()->json($result);
     }
    public function destroy($id)
    {
        //
    }

    public function fuelreleaseview($id)
    {
      $estimate=DB::select(
       DB::raw("SELECT
       e.id,
       c.nombre AS nombrec,
       cp.nombre AS nombrep,
       c.representante,
       c.direccion,
       fecha_soli,
       fbo,
       cantidad_fuel,
       localidad,
       a.tipo,
       matricula
       FROM estimates e
       INNER JOIN companys c ON c.id=e.company_id
       INNER JOIN companys cp ON cp.id=e.prove_id
       INNER JOIN aviones a ON a.company_id=c.id
       WHERE e.id=$id"));
       $estimates=collect($estimate);
         return view('estimates.fuelrelease',compact('estimates'));
    }

    public function postfuelrelease(Request $request)
    {
      $estimates=$request->all();
       $from="X Flight Support";
        $date = date('Y-m-d');
        //$fuel_release = "1";
        $view =  \View::make('estimates.fuelrelease_pdf', compact('date','estimates'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
       return $pdf->stream('fuelrelease');
       //  if ($request->ajax()) {
       //    return response()->json($pdf);
        //
       //  }
    }
    public function getData($id)
    {
      $data=DB::select(
       DB::raw("SELECT
         s.id AS servicioid,
         s.nombre AS nbservicio,
         s.descripcion,
         cantidad,
         de.precio,
         subtotal,
         recarga,
         total
         FROM dates_estimates de
         INNER JOIN servicios s ON s.id=de.servicio_id
         WHERE estimate_id=$id "));
      return $data;
    }
    public function printestimate($id)
    {
      $estimates=DB::select(
        DB::raw("SELECT
        e.id,
        c.id as company_id,
        c.nombre AS nombrec,
        cp.id AS prove_id,
        cp.nombre AS nombrep,
        c.representante,
        c.direccion,
        estado,
        fecha_soli,
        ganancia,
        resumen,
        metodo_segui,
        c.telefono,
        c.celular,
        c.correo,
        proximo_seguimiento,
        fbo,
        cantidad_fuel,
        localidad,
        a.id as avion_id,
        a.tipo,
        matricula,
        total,
        subtotal,
        total_descuento
        FROM estimates e
        INNER JOIN companys c ON c.id=e.company_id
        INNER JOIN companys cp ON cp.id=e.prove_id
        INNER JOIN aviones a ON a.company_id=c.id
        WHERE e.id=$id"));

       $idEstimates=$estimates[0]->id;

        $data=DB::select(
        DB::raw("SELECT
          s.id AS servicioid,
          s.nombre AS nbservicio,
          s.descripcion,
          cantidad,
          de.precio,
          subtotal,
          subtotal_recarga,
          total
          FROM dates_estimates de
          INNER JOIN servicios s ON s.id=de.servicio_id
          WHERE estimate_id=$idEstimates "));
        //$data=$request->all();
        $date = date('Y-m-d');
        $esti=new Estimate;
        $view =  \View::make('estimates.estimate_pdf', compact('data', 'date', 'estimates','esti'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('estimate');
    }
    public function adjuntarimg(Request $request)
    {
      if($request->hasFile('file') ){

             $file = $request->file('file');
             $extension = $file->getClientOriginalExtension();
             $nombre=$file->getClientOriginalName();
             $r= Storage::disk('local')->put($nombre,  \File::get($file));

              $pathToFile= storage_path('app') ."/". $nombre;
              }
              else{

                 return "no";
              }

             if($r){
                 $data=['nombre'=>$nombre,'imagen'=>$pathToFile];
                 return $data;
             }
             else
             {
                 return "error vuelva a intentarlo";
             }
    }
}
