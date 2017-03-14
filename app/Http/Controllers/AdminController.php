<?php

namespace XFS\Http\Controllers;

use Illuminate\Http\Request;

use XFS\Http\Requests;
use XFS\Http\Controllers\Controller;
use XFS\Company;
use XFS\Estimate;
use XFS\Servicio;
use XFS\Invoice;
use XFS\Date_invoice;
use XFS\date_estimates;
use XFS\Pais;
use XFS\Avion;
use Illuminate\Support\Facades\Session;
use DB;
use DateTime;
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
     { $error= array();
       $data  = $request->all();
       $band=true;
       if(isset($data["desde"]) && isset($data["hasta"])  && !empty($data["desde"]) && !empty($data["hasta"]))
       {//SELECT * FROM invoices WHERE fecha BETWEEN '2017-01-01' AND '2017-03-13';
         //todo bien hasta ahora! extramemos las fechas
           $desde=date_format(new DateTime($data["desde"]), 'Y-m-d');
           $hasta=date_format(new DateTime($data["hasta"]), 'Y-m-d');
           $fechas="e.fecha BETWEEN '$desde' AND '$hasta'";
           if(!isset($data["servicio_id"])){
             $servicio="";
           }else{
             $servi=$data["servicio_id"];
             $servicio="and servicio_id='$servi'";
           }
           $consulta="SELECT
           e.id as id_invoice,
           a.id as id_estimate,
           e.fecha,
           e.company_id,
           e.prove_id,
           e.fbo,
           c.nombre as cliente,
           f.nombre as prove
           FROM invoices e
           INNER JOIN companys c ON c.id=e.company_id
           INNER JOIN companys f ON f.id=e.prove_id
           INNER JOIN estimates a ON a.id=e.estimate_id
           where $fechas";
          dd($consulta);
           $invoice=DB::select(DB::raw($consulta));
            $result=['message' => 'bien'];
            $view =  \View::make('invoices.invoice_pdf', compact('invoice', 'date', 'items'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);
       }else{
         $band=false;
         $result=['message' => 'mal'];
       }


       return $pdf->stream('invoice');
       return response()->json($result);
         //  return view('principal',compact('companys'));
       //  return view('companys.index');
     }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function print_invoice($id)
     {
         $invoice = $this->getDatainvoice($id);
         $date = date('Y-m-d');

         $items =Date_invoice::where('invoice_id' , $id)->get();
         //var_dump($items);
         $view =  \View::make('invoices.invoice_pdf', compact('invoice', 'date', 'items'))->render();
         $pdf = \App::make('dompdf.wrapper');
         $pdf->loadHTML($view);
         return $pdf->stream('invoice');
     }

     public function getDatainvoice($id)
     {
       $invoice=DB::select(
       DB::raw("SELECT
       e.id,
       e.fbo,
       e.plazo,
       e.fecha,
       e.fecha_vencimiento,
       e.fecha_pago,
       e.resumen,
       e.estado,
       e.localidad,
       e.company_id,
       e.prove_id,
       e.avion_id,
       c.nombre as cliente,
       c.direccion_cuenta,
       c.telefono_admin,
       c.categoria,
       c.representante,
       c.correo,
       e.estado,
       e.subtotal,
       e.ganancia,
       e.descuento,
       e.total,
       e.total_descuento,
       d.matricula,
       f.nombre as prove
       FROM invoices e
       INNER JOIN companys c ON c.id=e.company_id
       INNER JOIN companys f ON f.id=e.prove_id
       where e.id='$id'" ));
         return collect($invoice);
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
