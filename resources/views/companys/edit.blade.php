@extends('layouts.app')

@section('contenido')

      <h2>Editar Compañia <strong> {{ $companys->nombre }}</strong></h2>
      <div class="pull-right">
               <a class="btn btn-primary" href="{{ route('companys.index') }}"> Atrás</a>
      </div>
<p style="color:rgb(235, 160, 162)">Los campos con (*) son Obligatorios</p>

<br/>
<!-- if there are creation errors, they will show here -->

<div ng-controller="EditCompanyCtrl" class="col-sm-12 no-float no-padding">
    @include('errors.message')

   [[Form::model($companys, array('route' => array('companys.update', $companys->id), 'method' => 'PUT', 'novalidate'))]]
    @include('companys.partials.fields')
  [[ Form::submit('Editar Compañia', array('class' => 'btn btn-primary')) ]]
  [[ Form::close() ]]
</div>

@endsection
@section('scripts')

<script>
  $('#m2').removeClass('');
  $('#m2').addClass('active');
</script>

@endsection
