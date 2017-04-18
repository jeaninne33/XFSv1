<?php

namespace XFS\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Mail;
use Storage;
use XFS\Http\Requests;
use XFS\Http\Controllers\Controller;
use XFS\Estimate;
use XFS\date_estimates;
use XFS\Invoice;
use XFS\Date_invoice;
use DateTime;
use PDF;
use DB;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function send(Request $request)
    {
      $data=$request->all();
      $tipo=$data['tipo'];
      $adjunto=$data['adjunto'];
      if($tipo=='Invoice'){

       $pdf = $this->getPDFinvoice($data['id']);
      }else{
       $pdf = $this->getPDFestimate($data['id']);
      }
    //  dd(var_dump($pdf));

      $user=array('tipo'=>$tipo, 'to'=>$data['to'], 'contenido'=>$data['contenido'], 'company'=>$data['company'], 'asunto'=>$data['asunto'] );

      $error=array();
      //dd(var_dump($user));
        try {
          Mail::send('Mail.mensaje', $user, function ($m) use ($user , $pdf, $adjunto) {

          $m->to($user['to'], $user['company'])->subject($user['asunto']);
          $m->attachData($pdf->output(), $adjunto );
        // $m->attachData(, "invoice.pdf");addStringAttachment

          });
       } catch (Exception $e) {
          DB::rollback();
          $error[]=[$e->getMessage()];
       }
         $result=['message' => 'bien', 'error'=> $error];
         return response()->json($result);
    }

//
    public function getPDFinvoice($id)
    {
      $invoice=DB::select(
      DB::raw("SELECT
      e.id,
      e.fbo,
      e.plazo,
      e.fecha,
      e.fecha_vencimiento,
      e.fecha_pago,
      e.fecha_anulacion,
      e.resumen,
      e.informacion,
      e.estado,
      e.localidad,
      e.company_id,
      e.prove_id,
      e.avion_id,
      c.nombre as cliente,
      c.direccion,
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
      INNER JOIN aviones d ON d.id=e.avion_id
      where e.id='$id'" ));
      $date = date('Y-m-d');
      $items =Date_invoice::where('invoice_id' , $id)->get();
      $invo=new Invoice;
    //  $view =  \View::make('invoices.invoice_pdf', compact('invoice', 'date', 'items','invo'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadView( 'invoices.invoice_pdf', compact('invoice', 'date', 'items','invo'));
      return $pdf;

    }
    public function getPDFestimate($id)
    {
    $estimates=DB::select(
      DB::raw("SELECT
      e.id,
      c.id as company_id,
      c.nombre AS nombrec,
      cp.id AS prove_id,
      cp.nombre AS nombrep,
      c.representante,
      c.direccion,
      estado,
      fecha_soli,
      ganancia,
      resumen,
      metodo_segui,
      c.telefono,
      c.celular,
      c.correo,
      proximo_seguimiento,
      fbo,
      cantidad_fuel,
      localidad,
      a.id as avion_id,
      a.tipo,
      matricula,
      total,
      subtotal,
      total_descuento
      FROM estimates e
      INNER JOIN companys c ON c.id=e.company_id
      INNER JOIN companys cp ON cp.id=e.prove_id
      INNER JOIN aviones a ON a.company_id=c.id
      WHERE e.id=$id"));
      $idEstimates=$estimates[0]->id;

       $data=DB::select(
       DB::raw("SELECT
         s.id AS servicioid,
         s.nombre AS nbservicio,
         s.descripcion,
         cantidad,
         de.precio,
         subtotal,
         subtotal_recarga,
         total
         FROM dates_estimates de
         INNER JOIN servicios s ON s.id=de.servicio_id
         WHERE estimate_id=$idEstimates "));
         $date = date('Y-m-d');
         $esti=new Estimate;
         $date = date('Y-m-d');
         $items =Date_invoice::where('invoice_id' , $id)->get();
         $invo=new Invoice;
      //   $view =  \View::make('estimates.estimate_pdf', compact('data', 'date', 'estimates','esti'))->render();
         $pdf = \App::make('dompdf.wrapper');
         $pdf->loadView('estimates.estimate_pdf', compact('data', 'date', 'estimates','esti'));
        //   $pdf=PDF::loadView( $view);
        return $pdf;
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
