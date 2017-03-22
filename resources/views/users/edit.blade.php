@extends('layouts.app')

@section('contenido')

  <h1>Editando Usuario: <strong>{{$user->name}}</strong></h1>
  <div class="pull-right">
           <a class="btn btn-primary" href="{{ route('users.index') }}"> Atrás</a>
       </div>
       <p style="color:rgb(235, 160, 162)">Todos los Campos son Obligatorios!</p>

     <br/>

<div class="col-sm-12 no-float no-padding" ng-controller="UsersCtrl" ng-init="tipo='users'; user={{json_encode($user)}};" >
  @include('errors.message')
    [[ Form::model($user, ['route'=>'users.update', 'name'=>'form1','method' => 'PUT',  'novalidate', 'ng-submit'=>'editar($event)']) ]]
    @include('users.partials.fields')
    [[ Form::submit('Editar Usuario', array('class' => 'btn btn-primary')) ]]
    [[ Form::close() ]]
</div>
@endsection
