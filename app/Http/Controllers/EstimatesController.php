<?php

namespace XFS\Http\Controllers;

use Illuminate\Http\Request;
use XFS\Estimate;
use XFS\Company;
use XFS\Servicio;
use XFS\Http\Requests;
use XFS\Http\Controllers\Controller;

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
    //  $companys=Company::all();
    //  $indicador=1;
      $servicios=Servicio::Lists('nombre','id');
      $servicios->prepend('Seleccione Servicio');  

      return view('estimates.create',compact('estimates','servicios','i'));

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
        $estimates = new Estimates;
        $estimates->id=$request->input('id');
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
        //
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
