@extends('layouts.app')

@section('contenido')

   <?php //$avion = array('id'=>$estimate[0]->avion_id, 'nombre'=> $estimate[0]->matricula);?>

<div ng-controller="EditInvoiceCtrl" class="col-sm-12 no-float no-padding"  ng-init="invoice={{json_encode($invoice)}}; invoice.plazo='{{ $invoice->plazo}}';  avion=[{{json_encode($avion)}}]; data_invoices={{json_encode($items)}}; servicios={{json_encode($servicios)}};">
      <h2>Actualizar Factura Número: <strong> @{{ invoice.id }}</strong></h2>
      <div class="pull-right">
               <a class="btn btn-primary" href="{{ route('invoices.index') }}"> Atrás</a>
      </div>
      <div class="pull-right col-sm-6">
        <a class="btn btn-primary soap-icon-list" target="_blank" href="{{ URL::to('invoices_pdf/' . $invoice->id) }}"> Imprimir</a>
        <button id="email" value="2" onclick="modal(this.value)" class="email btn btn-primary soap-icon-generalmessage" href="#" data-toggle="modal" data-target="#clientes"> Enviar Correo</button>
      </div>
    <p>Información de la Factura: <strong> @{{ invoice.informacion }}</strong></p>
<p style="color:rgb(235, 160, 162)">Los campos con (*) son Obligatorios</p>

<br/>
<!-- if there are creation errors, they will show here ng-init=""-->

{{--var_dump($estimate)--}}
    @include('errors.message')
   [[Form::model($invoice, array('route' => array('invoices.update', $invoice->id), 'method' => 'PUT','ng-submit'=>'edit($event)', 'novalidate'))]]
      @include('invoices.partials.fields_edit')
  [[ Form::submit('Actualizar Factura', array('class' => 'btn btn-primary')) ]]
  [[ Form::close() ]]
</div>

@endsection
@section('scripts')

<script>
$('#m5').removeClass('');
$('#m5').addClass('active');
</script>

@endsection
