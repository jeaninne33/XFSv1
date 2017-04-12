@extends('layouts.app')
@section('css')
  <!-- Datatable Styles -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
@endsection
@section('contenido')
  <div  ng-controller="EstimateCtrl" class="col-sm-12 no-float no-padding" ng-init=" servicios={{json_encode($servicios)}};  ">
<h2>Agregar Estimados</h2>
<div class="pull-right">
  <a class="btn btn-primary" href="{{ route('estimates.index') }}"> Atrás</a>
</div>

<p style="color:rgb(235, 160, 162)">Los campos con (*) son Obligatorios</p>

<br/>
<!-- if there are creation errors, they will show here -->
  @include('errors.message')

[[ Form::open(['route'=>'estimates.store', 'name'=>'form1','method'=> 'POST', 'novalidate', 'enctype'=>'multipart/form-data']) ]]

  @include('estimates.partials.fields')
  [[ Form::submit('Agregar Estimado', array('id'=>'registro','class' => 'btn btn-primary','ng-click'=>'save($event)')) ]]
[[ Form::close() ]]
</div>
@endsection
@section('scripts')
<!--scripts necesarios en esta vista -->
<!-- datatable jquery -->
<script type="text/javascript" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script>
   $('#m4').removeClass('');
   $('#m4').addClass('active');
</script>

@endsection
