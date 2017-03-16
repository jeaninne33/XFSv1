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
       $titu="";
       if(isset($data["desde"]) && isset($data["hasta"])  && !empty($data["desde"]) && !empty($data["hasta"]))
       {//SELECT * FROM invoices WHERE fecha BETWEEN '2017-01-01' AND '2017-03-13';
         date_default_timezone_set('America/Caracas');
         $date = date('m/d/Y');
         //todo bien hasta ahora! extramemos las fechas
           $desde=date_format(new DateTime($data["desde"]), 'Y-m-d');
           $hasta=date_format(new DateTime($data["hasta"]), 'Y-m-d');
           $fechas="e.fecha BETWEEN '$desde' AND '$hasta'";
           if(isset($data["servicio_id"]) && !empty($data["servicio_id"])){
             $servi=$data["servicio_id"];
             $servicio="and servicio_id='$servi'";
             $ser=Servicio::find($servi);
             $titu="Filtrado por el  servicio: ".$ser->nombre;
           }else{
              $servicio="";

           }
           $consulta="SELECT
           e.id as id_invoice,
           a.id as id_estimate,
           e.fecha,
           e.company_id,
           e.prove_id,
           e.fbo,
           c.nombre as cliente,
           f.nombre as prove,
           d.matricula
           FROM invoices e
           INNER JOIN companys c ON c.id=e.company_id
           INNER JOIN companys f ON f.id=e.prove_id
           INNER JOIN estimates a ON a.id=e.estimate_id
           INNER JOIN aviones d ON a.avion_id=d.id
           where $fechas";

          $report=DB::select(DB::raw($consulta));

          $id_e=$report[0]->id_estimate;
          $id_in=$report[0]->id_invoice;
          //acuerdfate estos datos los debes consultar en la vista ojhoooo
          $datos_e=DB::select(DB::raw(
          "SELECT
           subtotal_recarga as precio_basf,
            cantidad as cant_basf,
            total as costo_basf,
            servicio_id,
            nombre
           from dates_estimates,servicios
           where estimate_id='$id_e' and servicios.id=servicio_id;"));
          $datos_in=DB::select(DB::raw(
          "SELECT
           subtotal_recarga as precio_xfs,
            cantidad as cant_xfs,
            total as costo_xfs,
            servicio_id,
            nombre
           from dates_invoices,servicios
           where invoice_id='$id_in' and servicios.id=servicio_id $servicio;"));

          $view =  \View::make('reports.pdf_relation', compact('report','desde','hasta','titu','date','datos_in','datos_e'))->render();
          $pdf = \App::make('dompdf.wrapper');
          $pdf->loadHTML($view)->setPaper('a4', 'landscape');
          return base64_encode($pdf->stream('report'));
       }//fin si no es vacio
     }//fin metodo

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function reports_invoice()
     {
        return  view('reports.invoice');
     }
     public function reports_company()
     {
         $paises = Pais::select('id', 'nombre')->get();
          //$servicios = Servicio::select('id', 'nombre')->get();
        return  view('reports.companys', compact('paises'));
     }
     public function reports_estimate()
     {
        return  view('reports.estimates');
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
         $inv= new Invoice;
         $data  = $request->all();
         $titu="";
         if(isset($data["desde"]) && isset($data["hasta"])  && !empty($data["desde"]) && !empty($data["hasta"]))
         {//SELECT * FROM invoices WHERE fecha BETWEEN '2017-01-01' AND '2017-03-13';
           //todo bien hasta ahora! extramemos las fechas
             $desde=date_format(new DateTime($data["desde"]), 'Y-m-d');
             $hasta=date_format(new DateTime($data["hasta"]), 'Y-m-d');
             $fechas="e.fecha BETWEEN '$desde' AND '$hasta'";
             if(isset($data["estado"]) && !empty($data["estado"]) )
             {
               $esta=$data['estado'];
               $estado="and e.estado='$esta'";
               $titu="Cuyo Estado de la Factura es: ".$inv->estados($esta);
             }else{
                $estado="";
             }
             $invoice = $this->getinvoice($fechas, $estado);
             date_default_timezone_set('America/Caracas');
             $date = date('m/d/Y');

             $view =  \View::make('reports.pdf_invoices', compact('invoice', 'date','desde','hasta','inv','titu'))->render();
             $pdf = \App::make('dompdf.wrapper');
             $pdf->loadHTML($view);
             return base64_encode($pdf->stream('invoice'));
          }

     }
     public function pdf_estimate(Request $request)
     {
         $error= array();
         $est= new Estimate;
         $data  = $request->all();
         $titu="";
         if(isset($data["desde"]) && isset($data["hasta"])  && !empty($data["desde"]) && !empty($data["hasta"]))
         {//SELECT * FROM invoices WHERE fecha BETWEEN '2017-01-01' AND '2017-03-13';
           //todo bien hasta ahora! extramemos las fechas
             $desde=date_format(new DateTime($data["desde"]), 'Y-m-d');
             $hasta=date_format(new DateTime($data["hasta"]), 'Y-m-d');
             $fechas="e.fecha_soli BETWEEN '$desde' AND '$hasta'";
             if(isset($data["estado"]) && !empty($data["estado"]) )
             {
               $esta=$data['estado'];
               $estado="and e.estado='$esta'";
               $titu="Cuyo Estado del Estimado es: ".$esta;
             }else{
                $estado="";
             }
             $estimate = $this->getestimate($fechas, $estado);
            // dd($estimate);
             date_default_timezone_set('America/Caracas');
             $date = date('m/d/Y');

             $view =  \View::make('reports.pdf_estimates', compact('estimate', 'date','desde','hasta','est','titu'))->render();
             $pdf = \App::make('dompdf.wrapper');
             $pdf->loadHTML($view);
             return base64_encode($pdf->stream('estimate'));
          }

     }

     public function pdf_company(Request $request)
     {
         $compa= new Company;
         $data  = $request->all();
         $titu="";
         if(isset($data["tipo"]) && !empty($data["tipo"]) )
         {
           $tipo=$data['tipo'];
           $tipos="and a.tipo='$tipo'";
           $titu="Cuyo Tipo de Relación es: ".$compa->tipos($tipo);
         }else{
            $tipos="";
         }
         if(isset($data["pais_id"]) && !empty($data["pais_id"])){
           $pais_id=$data['pais_id'];
           $pais="and a.pais_id='$pais_id'";
           $m_pais=Pais::find($pais_id);
           $titu.=" - Pertenecientes al Pais: ". $m_pais->nombre;
         }else{
           $pais="";
         }
         $company = DB::select(
         DB::raw("Select a.nombre as cliente, a.id, a.direccion_cuenta, a.representante, a.correo, a.tipo,
         b.nombre as pais, c.nombre as estado
         from companys a, paises b, estados c
         where a.pais_id=b.id and c.pais_id=b.id $tipos $pais
         order by a.pais_id,tipo"));
         $company =(object) $company;
         //dd($company);
         date_default_timezone_set('America/Caracas');
         $date = date('m/d/Y');
         $view =  \View::make('reports.pdf_companys', compact('company', 'date','titu','compa'))->render();
         $pdf = \App::make('dompdf.wrapper');
         $pdf->loadHTML($view);
         return base64_encode($pdf->stream('company'));
     }
     public function getinvoice($fechas, $estado)
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
       where $fechas $estado;" ));
         return collect($invoice);
     }
     public function getestimate($fechas, $estado)
     {
       $estimate=DB::select(
       DB::raw("SELECT
       e.id,
       e.fbo,
       e.fecha_soli as fecha,
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
       e.subtotal,
       e.ganancia,
       e.descuento,
       e.total,
       e.total_descuento,
       f.nombre as prove
       FROM estimates e
       INNER JOIN companys c ON c.id=e.company_id
       INNER JOIN companys f ON f.id=e.prove_id
       where $fechas $estado;" ));
         return collect($estimate);
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
