@extends('layouts.app')

@section('contenido')

<h2>Generar Factura</h2>
<div class="pull-right">
         <a class="btn btn-primary" href="{{ route('invoices.index') }}"> Atrás</a>
</div>
<p style="color:rgb(235, 160, 162)">Los campos con (*) son Obligatorios</p>

<br/>

<!-- if there are creation errors, they will show here -->
<?php $avion = array('id'=>$estimate[0]->avion_id, 'nombre'=> $estimate[0]->matricula);?>
<div ng-controller="InvoiceCtrl" class="col-sm-12 no-float no-padding" ng-init="invoice={{json_encode($invoice)}}; avion=[{{json_encode($avion)}}]; servicios={{json_encode($servicios)}}; data_invoices={{json_encode($datos_estimado)}}">

  @include('errors.message')

  [[ Form::open(['route'=>'invoices.store', 'name'=>'form1','method'=> 'POST', 'novalidate', 'ng-submit'=>'save($event)']) ]]
      @include('invoices.partials.fields')
  [[ Form::submit('Agregar Facturas', array('id'=>'registro','class' => 'btn btn-primary')) ]]
  [[ Form::close() ]]

</div>
@endsection
@section('scripts')
  <script>
    $('#m5').removeClass('');
    $('#m5').addClass('active');
  </script>
@endsection
