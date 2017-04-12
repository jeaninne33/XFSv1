@extends('layouts.app')

@section('contenido')

<h1>Agregar Servicio</h1>
<div class="pull-right">
         <a class="btn btn-primary" href="{{ route('servicios.index') }}"> Atrás</a>
     </div>
     <p style="color:rgb(235, 160, 162)">Todos los campos son Obligatorios</p>

     <br/>
     <br/>

<div class="col-sm-12 no-float no-padding" ng-controller="ServicesCtrl" ng-init='categorys={{json_encode($categorias)}}'>
  @include('errors.message')
[[ Form::open(['route'=>'servicios.store','name'=>'form1', 'method'=> 'POST','novalidate']) ]]
@include('servicios.partials.fields')
[[ Form::submit('Agregar Servicio', array('class' => 'btn btn-primary','ng-click'=>'save($event)')) ]]
[[ Form::close() ]]
</div>
@endsection
