<?php

namespace XFS\Http\Controllers;

use Illuminate\Http\Requests;
use XFS\Http\Controllers\Controller;
use Illuminate\Http\Request;
use XFS\Http\Requests\CrearEstimateRequest;
use XFS\Estimate;
use XFS\Company;
use XFS\Avion;
use XFS\Invoice;
use Storage;
use XFS\Servicio;
use XFS\date_estimates;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
class EstimatesController extends Controller
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

      return view ('estimates.index')->with('estimates',$estimates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $estimates=Estimate::all();
      $servicios = Servicio::select('id', 'nombre','descripcion')->get();
      return view('estimates.create',compact('servicios'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CrearEstimateRequest $request)
    {
      $data  = $request->all();
    //  dd($data)
      $band=true;
      $data['imagen']="joijuiohi";
    //  dd($band);
      $error= array();
      $items=$data["data_estimates"];
      $estimates = new Estimate;
      $error=Estimate::validate_dates($data,1);
          if(!empty($error)){
            $band=false;
          }else{
            if(!empty($items)){
                $error=Estimate::validate_items($items);
                if(!empty($error)){
                    $band=false;
                    $error=array('pestaña'=>["Error en los Items de la Factura"])+$error;
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
               $result=['message' => 'bien', 'error'=> $error];
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
      $date=DB::select(
      DB::raw("SELECT
        s.id AS servicioid,
        s.nombre AS nbservicio,
        s.descripcion,
        cantidad,
        precio,
        subtotal,
        recarga,
        total
        FROM dates_estimates de
        INNER JOIN servicios s ON s.id=de.servicio_id
        WHERE estimate_id=$idEstimates "));
      if ($indicador==1) {
        return view('estimates.show',compact('date','estimates'))->with('success','Estimado Agregado con Exito');
      }else {
        return view ('estimates.show',compact('date'))->with('estimates',$estimates);
      }
      // $date=date_estimates::where('estimate_id',$estimates->id)->get();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$estimates=Estimate::findOrFail($id);
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
        e.categoria
        FROM estimates e
        INNER JOIN companys c ON c.id=e.company_id
        INNER JOIN companys cp ON cp.id=e.prove_id
        INNER JOIN aviones a ON a.company_id=c.id
        WHERE e.id=$id"));
        switch ($estimates[0]->categoria) {
          case "0":
                $categoria='0%';
                break;
              case "1":
                $categoria='20%';
                break;
              case "2":
                $categoria='25%';
                break;
              case "3":
                $categoria='30%';
                break;
        }
        $idEstimates=$estimates[0]->id;
        $indicador=0;

        $servicios=Servicio::Lists('nombre','id');

        $avion=DB::table('aviones')
        ->select(['nombre','id'])
        ->where('company_id','=',$estimates[0]->company_id)
        ->get();
       // $aviones->prepend($avion['nombre',]);
        $date=DB::select(
        DB::raw("SELECT
          s.id AS servicioid,
          s.nombre AS nbservicio,
          s.descripcion,
          cantidad,
          precio,
          subtotal,
          recarga,
          total
          FROM dates_estimates de
          INNER JOIN servicios s ON s.id=de.servicio_id
          WHERE estimate_id=$idEstimates "));
          $visible="block";
        // $date=date_estimates::where('estimate_id',$estimates->id)->get();
        return view ('estimates.edit',compact('date','servicios','indicador','visible','categoria','avion'))->with('estimates',$estimates);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $estimates = new Estimate;
      $date_estimates= new date_estimates;
      $descuento=0;
      $subtotal=0;
      $total=0;
      $ganancia=0;
      $dataE=$request->input('Estimado');

      $estimates->company_id=$request->input('company_id');
      $estimates->prove_id=$request->input('prove_id');
      $estimates->estado=$request->input('estado');
      $estimates->resumen=$request->input('resumen');
      $estimates->metodo_segui=$request->input('metodo');
      $estimates->fecha_soli=$request->input('fecha_soli');
      $estimates->proximo_seguimiento=$request->input('proximo_seguimiento');
      $estimates->fbo=$request->input('fbo');
      $estimates->cantidad_fuel=$request->input('cantidad_fuel');
      $estimates->localidad=$request->input('localidad');
      $estimates->avion_id=$request->input('avion_id');
      $estimates->num_habitacion=$request->input('num_habitacion');
      $estimates->tipo_cama=$request->input('tipo_cama');
      $estimates->tipo_hab=$request->input('tipo_hab');
      $estimates->tipo_estrellas=$request->input('tipo_estrellas');
      $estimates->categoria=$request->input('tipoCategoria');
      $estimates->descuento=$request->input('descuento');
      $estimates->total_descuento=$request->input('totalDescuento');
      $estimates->ganancia=$request->input('gananciatotal');
      $estimates->subtotal=$request->input('subtotal');
      $estimates->total=$request->input('total');
      $estimates->save();

      foreach ($dataE as $i => $datos) {
        $dateEstimates = date_estimates::create(array(
          'servicio_id' => $datos['ID'],
          'cantidad' => $datos['Cantidad'],
          'precio'=> $datos['Precio'],
          'subtotal'=>$datos['Subtotal'],
          'recarga'=>$datos['Ganancia'],
          'total'=>$datos['Total'],
          'estimate_id'=>$estimates->id,
          'descuento'=>$request->input('descuento'),
          'total_recarga'=>$request->input('gananciatotal')
        ));
      }
      return redirect()->route('estimates.index')->with('success','Estimado Modificado con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // public function postfuelrelease(Request $request)
    // {
    //   $estimates=$request->all();
    //  // dd($data);
    //   $data = $this->getData($estimates['id']);
    //   return redirect()->action('EstimatesController@fuelrelease', ['estimates','data']);
    // }
    public function fuelreleaseview($id)
    {
      $estimates=DB::select(
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
        precio,
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
        precio,
        subtotal,
        subtotal_recarga,
        total
        FROM dates_estimates de
        INNER JOIN servicios s ON s.id=de.servicio_id
        WHERE estimate_id=$idEstimates "));
      //$data=$request->all();
      $date = date('Y-m-d');
      $fuel_release = "1";
      $view =  \View::make('estimates.estimate_pdf', compact('data', 'date', 'estimates'))->render();
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
