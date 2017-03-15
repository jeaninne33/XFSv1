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
           $id_e=$report[0]->id_estimate;
           $id_in=$report[0]->id_invoice;
          $report=DB::select(DB::raw($consulta));
          $datos_e=DB::select(DB::raw(
          "SELECT
           subtotal_recarga as precio_basf,
            cantidad as cant_basf,
            total as total_basf,
            servicio_id,
            nombre
           from dates_estimates,servicios
           where estimate_id='$id_e' and servicios.id=servicio_id;"));
          $datos_in=DB::select(DB::raw(
          "SELECT
           subtotal_recarga as precio_XFS,
            cantidad as cant_XFS,
            total as total_XFS,
            servicio_id,
            nombre
           from dates_invoices,servicios
           where invoice_id='$id_in' and servicios.id=servicio_id;"));

           dd($datos_in);
        //  $result=['message' => 'bien'];
          $view =  \View::make('reports.pdf_relation', compact('report'))->render();
          $pdf = \App::make('dompdf.wrapper');
          $pdf->loadHTML($view);
          return $pdf->stream('report');
       }else{
         $band=false;
         $result=['message' => 'mal'];
         return response()->json($result);
       }



    //   return response()->json($result);
         //  return view('principal',compact('companys'));
       //  return view('companys.index');
     }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function reports_invoice()
     {
          //$servicios = Servicio::select('id', 'nombre')->get();
        return  view('reports.invoice');
       //  return view('companys.index');
     }

     public function pdf_servicios()
     {
         $servicio = Servicio::with('categoria')->orderBy("categoria_id")->get();
         date_default_timezone_set('America/Caracas');
         $date = date('m/d/Y');
         $view =  \View::make('reports.pdf_servicios', compact('servicio', 'date'))->render();
         $pdf = \App::make('dompdf.wrapper');
         $pdf->loadHTML($view);
         return $pdf->stream('servicio');
     }
     public function pdf_invoice(Request $request)
     {
         $error= array();
         $data  = $request->all();
         $band=true;
         if(isset($data["desde"]) && isset($data["hasta"])  && !empty($data["desde"]) && !empty($data["hasta"]))
         {//SELECT * FROM invoices WHERE fecha BETWEEN '2017-01-01' AND '2017-03-13';
           //todo bien hasta ahora! extramemos las fechas
             $desde=date_format(new DateTime($data["desde"]), 'Y-m-d');
             $hasta=date_format(new DateTime($data["hasta"]), 'Y-m-d');
             $fechas="e.fecha BETWEEN '$desde' AND '$hasta'";

             $invoice = $this->getinvoice($fechas);
             date_default_timezone_set('America/Caracas');
             $date = date('m/d/Y');

             $view =  \View::make('reports.pdf_invoices', compact('invoice', 'date','desde','hasta'))->render();
             $pdf = \App::make('dompdf.wrapper');
             $pdf->loadHTML($view);
             return base64_encode($pdf->stream('invoice'));
          }

     }

     public function getinvoice($fechas)
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
       f.nombre as prove
       FROM invoices e
       INNER JOIN companys c ON c.id=e.company_id
       INNER JOIN companys f ON f.id=e.prove_id
       where $fechas;" ));
         return collect($invoice);
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
