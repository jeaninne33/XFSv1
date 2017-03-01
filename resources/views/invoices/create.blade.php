@extends('layouts.app')

@section('contenido')

<h2>Generar Factura</h2>
<div class="pull-right">
         <a class="btn btn-primary" href="{{ route('companys.index') }}"> Atrás</a>
</div>
<p style="color:rgb(235, 160, 162)">Los campos con (*) son Obligatorios</p>

<br/>

<!-- if there are creation errors, they will show here -->

<div ng-controller="InvoiceCtrl" class="col-sm-12 no-float no-padding" ng-init="invoice.localidad={{$estimate[0]->localidad}}">

  @include('errors.message')

[[ Form::open(['route'=>'invoices.store', 'name'=>'form1','method'=> 'POST', 'novalidate', 'ng-submit'=>'save($event)']) ]]
  @include('invoices.partials.fields')
[[ Form::submit('Agregar Factura', array('id'=>'registro','class' => 'btn btn-primary')) ]]
[[ Form::close() ]]

</div>
@endsection
@section('scripts')

@endsection
