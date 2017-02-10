<!-- app/views/nerds/edit.blade.php -->
@extends('layouts.app')

@section('contenido')
  <div class="row">


      <h1> Editar Servicios {{ $servicios->nombre }}</h1>
      <div class="pull-right">
               <a class="btn btn-primary" href="{{ route('servicios.index') }}"> Atrás</a>
      </div>
      <p style="color:rgb(235, 160, 162)">Los campos con (*) son Obligatorios</p>

      <br/>
  @include('errors.errors')
  <div class="col-md-12 no-float no-padding">
   [[Form::model($servicios, array('route' => array('servicios.update', $servicios->id), 'method' => 'PUT'))]]
    @include('servicios.partials.fields')
  [[ Form::submit('Editar Compañia', array('class' => 'btn btn-primary')) ]]
  [[ Form::close() ]]

    </div>
  </div>

@endsection
