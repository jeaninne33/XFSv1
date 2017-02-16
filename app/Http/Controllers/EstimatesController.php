<?php

namespace XFS\Http\Controllers;

use Illuminate\Http\Request;
use XFS\Estimate;
use XFS\Company;
use XFS\Avion;
use XFS\Servicio;
use XFS\Http\Requests;
use XFS\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class EstimatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $estimates=Estimate::all();

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
      //$avion=Avion::Lists('tipo','id');
    //  $companys=Company::all();
    //  $indicador=1;
     $indicador=0;
     $servicios=Servicio::Lists('nombre','id');
     $servicios->prepend('Seleccione Servicio');

      return view('estimates.create',compact('estimates','servicios','indicador'));

    }
    // public function cliente($id)
    // {
    //   //$companys=Company::all();
    //    $view = View::make('estimates.create')->with('companys',$companys);
    //    if($request->ajax()){
    //        $sections = $view->renderSections();
    //        return Response::json($sections['tbCliente']);
    //    }else return $view;
    // }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $estimates = new Estimate;

      $estimates->company_id=$request->input('company_id');
      $estimates->prove_id=$request->input('prove_id');
      $estimates->estado=$request->input('estado');
      $estimates->resumen=$request->input('resumen');
      $estimates->metodo_segui=$request->input('metodo');
      $estimates->fecha_soli=$request->input('fecha_soli');
      $estimates->fbo=$request->input('fbo');
      $estimates->cantidad_fuel=$request->input('cantidad_fuel');
      $estimates->localidad=$request->input('localidad');
      $estimates->avion_id=$request->input('avion_id');
      $estimates->proximo_seguimiento=$request->input('proximo_seguimiento');
      
      $estimates->save();
        return redirect()->route('estimates.index')->with('success','Estimado Agredo con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estimates=Estimate::findOrFail($id);
        // $estimates = DB::table('estimates')
        // ->join('companys', 'companys.id', '=', 'estimates.company_id')
        // ->select('estimates.*', 'companys.nombre as nombreC ')
        // ->where('estimates.id',$id)
        // ->where('companys.id',$estimates->company_id)
        // ->where('companys.id',$estimates->prove_id)
        // ->get();
        $cliente = DB::table('companys')
                    ->select('nombre as nombreC','id as company_id','celular','telefono')
                    ->where('id', $estimates->prove_id)
                    ->first();
        $proveedor = DB::table('companys')
                    ->select('nombre as nombreP','id as prove_id','celular','telefono')
                    ->where('id', $estimates->company_id)
                    ->first();
        //$cliente=DB::table('company')($estimates->company_id)->get();
        //$proveedor=Company::find($estimates->prove_id)->get();
        // $cliente = DB::table('estimates')
        // ->join('companys', 'companys.id', '=', 'estimates.company_id')
        // ->select('companys.nombre as nombreC')
        // ->whereIn('companys.id',[$estimates->prove_id,$estimates->company_id]);
        // $proveedor = DB::table('estimates')
        //     ->join('companys', 'companys.id', '=', 'estimates.company_id')
        //     ->select('companys.nombre as nombreP')
        //     ->whereIn('companys.id',[$estimates->prove_id,$estimates->company_id])
        //     ->union($cliente)
        //     ->get();
        $indicador=1;
        $servicios=Servicio::Lists('nombre','id');
        return view ('estimates.edit',compact('estimates','servicios','cliente','proveedor','indicador'));
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
        //
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
}
