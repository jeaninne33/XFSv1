@extends('layouts.app')
@section('css')
  <!-- Datatable Styles -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
{{-- <link rel="stylesheet" href="{{asset("assets/css/bootstrap-table.css")}}"> cliente={{$estimates[0]->nombrep}}; proveedor={{$estimates[0]->nombrep}};--}}
@endsection
@section('contenido')
<div  ng-controller="EstimateCtrl" class="col-sm-12 no-float no-padding" ng-init="matricula={{json_encode($matri)}}; proveedor={{json_encode($proveedor)}}; categorias={{json_encode($categoria)}}; cliente={{json_encode($cliente)}}; data_estimates={{json_encode($datos_estimado)}}; aviones={{$aviones}}; servicios={{json_encode($servicios)}}; estimate={{json_encode($estimate)}};">
      <h2>Editando Estimado Número: <strong> {{$estimate->id}} </strong></h2>
      <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('estimates.index') }}"> Atrás</a>
      </div>
      <div class="pull-right col-md-4">

        <a class="btn btn-primary soap-icon-list" href="{{URL::to('printestimates/'.$estimate->id)}}" target="_blank">Imprimir</a>
        <button id="email" value="2" onclick="modal(this.value)" class="email btn btn-primary soap-icon-generalmessage" href="#" data-toggle="modal" data-target="#clientes">Enviar Correo</button>
      </div>
      <div class="pull-right col-md-3">
         <span style="display:none" id="botones">
        <a id="invoices" class="btn btn-primary soap-icon-card" href="{{URL::to('invoices/create/'.$estimate->id)}}"> Invoice</a>
        <a id="fuel_release" class="btn btn-primary soap-icon-stories"  href="{{URL::to('fuelreleases/'.$estimate->id)}}">Fuel Release</a>
      </span>
      </div>
<p style="color:rgb(235, 160, 162)">Los campos con (*) son Obligatorios</p>

<br/>
<!-- if there are creation errors, they will show here -->
      @include('errors.message')

   [[Form::model($estimate, array('route' => array('estimates.update', $estimate->id), 'method' => 'PUT'))]]
    @include('estimates.partials.fields')
  [[ Form::submit('Actualizar Estimado', array('id'=>'registro','class' => 'btn btn-primary','ng-click'=>'edit($event)')) ]]
  {{--[[ Form::button('Editar Estimado', array('class' => 'btn btn-primary','onclick'=>'saveEstimates('update')')) ]]--}}
  [[ Form::close() ]]
</div>

@endsection
@section('scripts')
<!--scripts necesarios en esta vista -->
<!-- datatable jquery -->

<script type="text/javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
{{-- <script type="text/javascript" src="{{ asset("assets/js/ScriptXFS.js") }}"></script>
<script src="{{asset("assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js")}}"></script>
<script src="{{asset("assets/js/sistemalaravel.js")}}"></script> --}}

<script>
  $('#m4').removeClass('');
  $('#m4').addClass('active');
</script>

@endsection
