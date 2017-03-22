@extends('layouts.app')

@section('contenido')

  <h1>Agregar Usuario</h1>
  <div class="pull-right">
           <a class="btn btn-primary" href="{{ route('users.index') }}"> Atrás</a>
       </div>
       <p style="color:rgb(235, 160, 162)">Todos los Campos son Obligatorios!</p>

     <br/>

<div class="col-sm-12 no-float no-padding" ng-controller="UsersCtrl" ng-init="tipo='users';" >
  @include('errors.message')
    [[ Form::open(['route'=>'users.store', 'name'=>'form1','method'=> 'POST',  'novalidate', 'ng-submit'=>'enviar($event)']) ]]
    @include('users.partials.fields')
    [[ Form::submit('Agregar Usuario', array('class' => 'btn btn-primary')) ]]
    [[ Form::close() ]]
</div>
@endsection
