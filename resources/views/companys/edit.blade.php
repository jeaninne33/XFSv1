@extends('layouts.app')

@section('contenido')

      <h2>Editar Compañia <strong> {{ $companys->nombre }}</strong></h2>
      <div class="pull-right">
               <a class="btn btn-primary" href="{{ route('companys.index') }}"> Atrás</a>
      </div>
<p style="color:rgb(235, 160, 162)">Los campos con (*) son Obligatorios</p>

<br/>
<!-- if there are creation errors, they will show here -->
  @include('errors.errors')
<div class="col-sm-12 no-float no-padding">
   [[Form::model($companys, array('route' => array('companys.update', $companys->id), 'method' => 'PUT'))]]
    @include('companys.partials.fields')
  [[ Form::submit('Editar Compañia', array('class' => 'btn btn-primary')) ]]
  [[ Form::close() ]]
</div>

@endsection
