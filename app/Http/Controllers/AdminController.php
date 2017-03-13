<?php

namespace XFS\Http\Controllers;

use Illuminate\Http\Request;

use XFS\Http\Requests;
use XFS\Http\Controllers\Controller;
use XFS\Company;
use XFS\Servicio;
use XFS\Estimate;
use XFS\Invoice;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
          $companys = Company::all()->count();//orderBy('id','DESC');
          $servicios = Servicio::all()->count();
          $estimates = Estimate::all()->count();
          $invoices = Invoice::all()->count();
        //  return view('principal',compact('companys'));
         return  view('principal',compact('servicios','estimates','companys','invoices'));
      //  return view('companys.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index_reports()
     {
         //  return view('principal',compact('companys'));
          return  view('reports.index');
       //  return view('companys.index');
     }
     public function reports_relacion()
     {
         //  return view('principal',compact('companys'));
          $servicios = Servicio::select('id', 'nombre')->get();
          return  view('reports.relation', compact('servicios'));
       //  return view('companys.index');
     }
     public function generate_relacion(Request $request)
     {
       $data  = $request->all();
       if(isset($data["desde"]) && isset($data["hasta"])  && !empty($array["desde"]) && !empty($array["hasta"]))
       {//SELECT * FROM invoices WHERE fecha BETWEEN '2017-01-01' AND '2017-03-13';
         //todo bien hasta ahora! extramemos las fechas
         $desde=date_format(new DateTime($data["desde"]), 'Y-m-d');
         $hasta=date_format(new DateTime($data["hasta"]), 'Y-m-d');
         $fechas="invoice.fecha BETWEEN '$desde' AND '$hasta'";
         if(!isset($data["servicio_id"])){
           $servicio="";
         }else{
           $servi=$data["servicio_id"];
           $servicio="and servicio_id='$servi'";
         }

       }
         //  return view('principal',compact('companys'));
          $servicios = Servicio::select('id', 'nombre')->get();
          return  view('reports.relation', compact('servicios'));
       //  return view('companys.index');
     }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
