@extends('layouts.app')

@section('contenido')

<h2>Agregar Compañia</h2>
<div class="pull-right">
         <a class="btn btn-primary" href="{{ route('companys.index') }}"> Atrás</a>
</div>
<p style="color:rgb(235, 160, 162)">Los campos con (*) son Obligatorios</p>

<br/>

<!-- if there are creation errors, they will show here -->

<div ng-controller="CompanyCtrl" class="col-sm-12 no-float no-padding"  ng-init="paises={{json_encode($paises)}};" >

  @include('errors.message')

[[ Form::open(['route'=>'companys.store', 'name'=>'form1','method'=> 'POST', 'novalidate', 'ng-submit'=>'save($event)']) ]]
  @include('companys.partials.fields')
[[ Form::submit('Agregar Compañia', array('id'=>'registro','class' => 'btn btn-primary')) ]]
[[ Form::close() ]]

</div>
@endsection
@section('scripts')

[[ Html::script('assets/js/scripts_funcionales.js') ]]

@endsection
