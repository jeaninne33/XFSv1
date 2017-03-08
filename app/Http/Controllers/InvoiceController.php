<?php

namespace XFS\Http\Controllers;

use Illuminate\Http\Requests;
use XFS\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use XFS\Company;
use XFS\Estimate;
use XFS\Servicio;
use XFS\Invoice;
use XFS\Date_invoice;
use XFS\Pais;
use XFS\Avion;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Route;
use DB;
use XFS\Http\Requests\CrearInvoicesRequest;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $invoices =  invoice::with('company')->get();
      return view('invoices.index', compact('invoices'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        //(object)  // load the create form (app/views/nerds/create.blade.php)
        $estimates=DB::select(
        DB::raw("SELECT
        e.id,
        e.fbo,
        e.localidad,
        e.company_id,
        e.prove_id,
        e.avion_id,
        c.nombre,
        c.direccion_cuenta,
        c.telefono_admin,
        c.categoria,
        e.estado,
        e.fecha_soli,
        e.subtotal,
        e.ganancia,
        e.descuento,
        e.total,
        e.total_descuento,
        d.matricula,
        f.nombre as prove
        FROM estimates e
        INNER JOIN companys c ON c.id=e.company_id
        INNER JOIN companys f ON f.id=e.prove_id
        INNER JOIN aviones d ON d.id=e.avion_id
        where e.id='$id'" ));

        $estimate =collect( $estimates);
        $invoice= new Invoice;
        $invoice->localidad = $estimate[0]->localidad;
        $invoice->fbo = $estimate[0]->fbo;
        $invoice->avion_id = $estimate[0]->avion_id;
        $invoice->matricula=$estimate[0]->matricula;
        $invoice->categoria=$estimate[0]->categoria;
        $invoice->subtotal = $estimate[0]->subtotal;
        $invoice->ganancia=$estimate[0]->ganancia;
        $invoice->descuento=$estimate[0]->descuento;
        $invoice->total = $estimate[0]->total;
        $invoice->total_descuento=$estimate[0]->total_descuento;
        $invoice->estimate_id=$estimate[0]->id;
        $invoice->company_id=$estimate[0]->company_id;
        $invoice->prove_id=$estimate[0]->prove_id;

          $datos=DB::select(
          DB::raw("SELECT
          a.cantidad,
          a.precio,
          a.recarga,
          a.subtotal,
          a.subtotal_recarga,
          a.total,
          a.servicio_id,
          b.descripcion
          FROM dates_estimates a
          INNER JOIN servicios b on a.servicio_id=b.id
          where estimate_id='$id'" ));
          $datos_estimado =collect( $datos);
          $servicios = Servicio::select('id', 'nombre','descripcion')->get();
          return view('invoices.create', compact('estimate','servicios'), compact('invoice'))->with('datos_estimado',$datos_estimado);
      }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
    //CrearCompanys
    //Request $request
   public function store(CrearInvoicesRequest $request)
   {
     $data  = $request->all();

     $band=true;
     $items=$data["data_invoices"];
  //   var_dump($items[0]);
     $error= array();
     $error=Invoice::validate_dates($data);
     if(!empty($error)){
       $band=false;
     }else{
       if(!empty($items)){
           $error=Invoice::validate_items($items);
           if(!empty($error)){
               $band=false;
               $error=array('pestaña'=>["Error en los Items de la Factura"])+$error;
           }else{
             $datos=true;
           }
      }else{
        $error['Items']=['Debe Agregar los Items de la Factura'];
        $band=false;
      }//fin si hay aviones
     }

    if($band){
      DB::beginTransaction();
      try {
         $invoice=Invoice::create($data);
          if($datos){
            foreach( $items as $indice =>$datos_invoices ){
             $item=New Date_invoice;
             $item=Invoice::obj_item($datos_invoices, $item);
             $invoice->datos()->save($item);
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
   }//fin store
  /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $invoice = Company::findOrFail($id);
        // load the view and pass the nerds
        // show the view and pass the nerd to it
         return view('invoices.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(editarCompanysRequest $request, $id)
    {
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
     //  dd($id);
       // abort(500);
      /*  $comp=Company::findOrFail($id);
        $mensaje='La compañia <b>'.$comp->nombre.'</b> fue eliminada Exitosamente';
        if (!is_null($comp)) {
            $comp->delete();
           // Session::flash('message', 'Successfully delete nerd!');
            if($request->ajax()){
                return $mensaje;
            }
           return redirect()->route('companys.index')
                 ->with('success', $mensaje);
       }*/
    }

}
