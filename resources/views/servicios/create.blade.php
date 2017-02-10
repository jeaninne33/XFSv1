@extends('layouts.app')

@section('contenido')

<h1>Agregar Servicio</h1>
<div class="pull-right">
         <a class="btn btn-primary" href="{{ route('servicios.index') }}"> Atrás</a>
     </div>
     <p style="color:rgb(235, 160, 162)">Los campos con (*) son Obligatorios</p>

     <br/>
     <br/>
  @include('errors.errors')
<div class="col-sm-12 no-float no-padding">
[[ Form::open(['route'=>'servicios.store', 'method'=> 'POST']) ]]
@include('servicios.partials.fields')
[[ Form::submit('Agregar Servicio', array('class' => 'btn btn-primary')) ]]
[[ Form::close() ]]
</div>
@endsection
