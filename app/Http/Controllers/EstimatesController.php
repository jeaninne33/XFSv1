<?php

namespace XFS\Http\Controllers;

use Illuminate\Http\Request;
use XFS\Estimate;
use XFS\Company;
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
      $estimates=Estimates::all();

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
      $companys=Company::all();
      return view('estimates.create')
      ->with('estimates',$estimates)
      ->with('companys',$companys);
    }

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
