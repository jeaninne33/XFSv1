<!-- app/views/nerds/edit.blade.php -->
@extends('layouts.app')

@section('contenido')
  <div class="row" ng-controller="ServicesCtrl" ng-init="service={{json_encode($servicios)}}; categorys={{json_encode($categorias)}}">


      <h1> Editando Servicio:  @{{ service.nombre }}</h1>
      <div class="pull-right">
               <a class="btn btn-primary" href="{{ route('servicios.index') }}"> Atrás</a>
      </div>
      <p style="color:rgb(235, 160, 162)">Los campos con (*) son Obligatorios</p>

      <br/>
  <div class="col-md-12 no-float no-padding" >
      @include('errors.message')
   [[Form::model($servicios, array('route' => array('servicios.update', $servicios->id), 'method' => 'PUT'))]]
    @include('servicios.partials.fields')
  [[ Form::submit('Editar Compañia', array('class' => 'btn btn-primary','ng-click'=>'edit($event)')) ]]
  [[ Form::close() ]]

    </div>
  </div>

@endsection
