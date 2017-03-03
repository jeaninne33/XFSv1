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
use XFS\Pais;
use XFS\Avion;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Route;
use DB;

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
        d.matricula
        FROM estimates e
        INNER JOIN companys c ON c.id=e.company_id
        INNER JOIN aviones d ON d.id=e.avion_id
        where e.id='$id'" ));

        $estimate =collect( $estimates);
        $invoice=array(
              'localidad'  => $estimate[0]->localidad,
              'fbo' => $estimate[0]->fbo,
              'avion_id' => $estimate[0]->avion_id,
              'matricula' => $estimate[0]->matricula,
              'categoria'=> $estimate[0]->categoria,
              'subtotal'=> $estimate[0]->subtotal,
              'ganancia'=> $estimate[0]->ganancia,
              'descuento'=> $estimate[0]->descuento,
              'total'=> $estimate[0]->total
            );

        $datos=DB::select(
        DB::raw("SELECT
        a.id,
        a.cantidad,
        a.descuento,
        a.precio,
        a.recarga,
        a.subtotal,
        a.subtotal_recarga,
        a.total_recarga,
        a.total,
        a.servicio_id,
        a.categoria_id,
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
   public function store(CrearCompanysRequest $request)
   {

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
