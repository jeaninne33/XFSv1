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
use XFS\User;
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
     public function Update_info_invoice()
     {
       date_default_timezone_set('America/Caracas');
       $date = new DateTime(date('Y-m-d'));
       $invoice=Invoice::all();
       foreach( $invoice as $indice =>$inv ){
         //$estado=$inv->estados($inv->estado);
         if(($inv->estado=="4")){
          $d="Fecha de Anulación:  ".date_format(date_create($inv->fecha_anulacion), 'm/d/Y');
         }else if(!empty($inv->fecha_pago)){
           $fecha_pago=new DateTime($inv->fecha_pago);
           $d=$inv->information_invoice($date, $fecha_pago,'2',$inv);
         }else {
           # code..."2017-03-23"
            $fecha_venci=new DateTime($inv->fecha_vencimiento);
            $d=$inv->information_invoice($date, $fecha_venci,'1',$inv);
         }
           $estado=$inv->estados($inv->estado);
           $info=$estado." ($d)";
           $inv->informacion=  $info;
           $inv->save();
       }

     }

    public function index(Request $request)
    {
          $this->Update_info_invoice();
          $companys = Company::all()->count();//orderBy('id','DESC');
          $servicios = Servicio::all()->count();
          $estimates = Estimate::all()->count();
          $invoices = Invoice::all()->count();
          $user=New User;
        //  return view('principal',compact('companys'));
         return  view('principal',compact('servicios','estimates','companys','invoices','user'));
      //  return view('companys.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index_reports()
     {
          return  view('reports.index');
     }
     public function reports_relacion()
     {
          $servicios = Servicio::select('id', 'nombre')->get();
          return  view('reports.relation', compact('servicios'));

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
           where $fechas and e.estado<>'4'";

          $report=DB::select(DB::raw($consulta));
          $view =  \View::make('reports.pdf_relation', compact('report','desde','hasta','titu','date','servicio'))->render();
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
         $cliente = Company::select('id', 'nombre')->where('tipo', 'client')->orWhere('tipo', 'cp')->get();
          return  view('reports.invoice', compact('cliente' ));
     }
     public function reports_company()
     {
         $paises = Pais::select('id', 'nombre')->get();
          //$servicios = Servicio::select('id', 'nombre')->get();
        return  view('reports.companys', compact('paises'));
     }
     public function reports_estimate()
     {
       $cliente = Company::select('id', 'nombre')->where('tipo', 'client')->orWhere('tipo', 'cp')->get();
        return  view('reports.estimates', compact('cliente' ));
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
             if(isset($data["company_id"]) && !empty($data["company_id"]) )
             {
               $compa=$data['company_id'];
               $company="and e.company_id='$compa'";
               $cli=Company::find($compa);
               $titu.="- Del Cliente: ".$cli->nombre;
             }else{
                $company="";
             }
             $invoice = $this->getinvoice($fechas, $estado, $company);
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
             if(isset($data["company_id"]) && !empty($data["company_id"]) )
             {
               $compa=$data['company_id'];
               $company="and e.company_id='$compa'";
               $cli=Company::find($compa);
               $titu.="- Del Cliente: ".$cli->nombre;
             }else{
                $company="";
             }
             $estimate = $this->getestimate($fechas, $estado, $company);
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
         //dd(var_dump($tipos));
         $company = DB::select(
         DB::raw("Select a.nombre as cliente, a.id, a.direccion_cuenta, a.representante, a.correo, a.tipo,
         b.nombre as pais, c.nombre as estado
         from companys a, paises b, estados c
         where a.pais_id=b.id and c.pais_id=b.id  and a.estado_id=c.id $tipos $pais
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
     public function getinvoice($fechas, $estado, $company)
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
       where $fechas $estado $company;" ));
         return collect($invoice);
     }
     public function getestimate($fechas, $estado, $company)
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
       where $fechas $estado $company;" ));
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
