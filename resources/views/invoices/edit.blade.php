@extends('layouts.app')

@section('contenido')
  <?php
  //   $fecha=new DateTime($invoice->fecha);
  //   $invoice->fecha=$fecha->format('Y-m-d\TH:i:s.u');
  //   var_dump($invoice->fecha);
  // //  $invoice->fecha=$fecha;
  //   $fecha_v=new DateTime($invoice->fecha_vencimiento);
  //   $invoice->fecha_vencimiento=$fecha_v->format(DateTime::ISO8601);
  //   $fecha_p=new DateTime($invoice->fecha_pago);
  //   $invoice->fecha_pago=$fecha_p->format(DateTime::ISO8601);
  //  var_dump(  $invoice->fecha_vencimiento);
   ?>
<div ng-controller="EditInvoiceCtrl" class="col-sm-12 no-float no-padding" ng-init="invoice={{json_encode($invoice)}};  data_invoices={{json_encode($items)}};">
      <h2>Editar Factura Número<strong> @{{ $invoice.id }}</strong></h2>
      <div class="pull-right">
               <a class="btn btn-primary" href="{{ route('invoices.index') }}"> Atrás</a>
      </div>
<p style="color:rgb(235, 160, 162)">Los campos con (*) son Obligatorios</p>

<br/>
<!-- if there are creation errors, they will show here ng-init=""-->

{{--var_dump($estimate)--}}
    @include('errors.message')
   [[Form::model($invoice, array('route' => array('companys.update', $invoice->id), 'method' => 'PUT','ng-submit'=>'edit($event)', 'novalidate'))]]
      @include('invoices.partials.fields_edit')
  [[ Form::submit('Editar Compañia', array('class' => 'btn btn-primary')) ]]
  [[ Form::close() ]]
</div>

@endsection
@section('scripts')

<script>
$('#m5').removeClass('');
$('#m5').addClass('active');
</script>

@endsection
