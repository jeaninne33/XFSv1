@extends('layouts.app')
@section('css')
<style media="screen">
  .Fuerte   { background-color: #060; border-color: #0F0; font: 13px arial, sans-serif;}
  .Media   { background-color: #C60; border-color: #FC0; font: 13px arial, sans-serif;}
  .Debil     { background-color: #900; border-color: #F00; font: 13px arial, sans-serif;}
  .strength { padding: 1px 10px; border: 2px solid; color: #FFF; font: 13px arial, sans-serif;}
</style>
@endsection


@section('contenido')
<div class="col-sm-12 no-float no-padding" ng-controller="UsersCtrl" ng-init="tipo='perfil';  user={{json_encode($user)}};" >
  <h2><i class="soap-icon-user"></i> Perfil de Usuario: <strong>@{{ user.name }}</strong></h2>

    <p><h4 > Nivel de Usuario: <strong> {{$user->tipo(Auth::user()->type)}}</strong> </h4>
  <div class="pull-right">
           <a class="btn btn-primary" href="{{ route('users.index') }}"> Atrás</a>
       </div>
       <p style="color:rgb(235, 160, 162)">Los Campos con (*) son Obligatorios!</p>

     <br/>

       @include('errors.message')
      [[ Form::model($user, ['route'=>'users.update', 'name'=>'form1','method' => 'PUT',  'novalidate', 'ng-submit'=>'editar($event)']) ]]
    <h3>Datos del Usuario</h3>

    <div class="row form-group">
      <div class="col-sms-4 col-sm-4" >
         [[ Form::label('nombre', 'Nombre del Usuario *')]]<!--  -->
         [[Form::text('name', null, ['class' => 'input-text full-width',  'required' => 'required','ng-model'=>'user.name'  ])]]

      </div>
      <div class="col-sms-4 col-sm-4" >
         [[ Form::label('nombre', 'Email *')]]<!--  -->
         [[Form::email('email', null, ['class' => 'input-text full-width',  'required' => 'required','ng-model'=>'user.email'  ])]]

      </div>

    </div>
  
    <hr>
     <p style="color:rgb(235, 160, 162)">Si desea Actualizar la Contraseña debe LLenar todos los campos!</p>

     <div class="row form-group">
         <div class="col-sms-8 col-sm-8" >
            [[ Form::label('Contraseña Actual')]]
            <input ng-attr-type="@{{ showPassword ? 'text' : 'password' }}" id="password_old" class='input-text full-width' ng-model='user.password_old'>
         </div>
     </div>
     <div class="row form-group">
         <div class="col-sms-8 col-sm-8" >
            [[ Form::label('Nueva Contraseña ')]]
            <input ng-attr-type="@{{ showPassword ? 'text' : 'password' }}" id="password" class='input-text full-width' ng-model='user.password' ng-change='pass()'>
         </div>
         <div class="col-sms-4 col-sm-4" >
         </br></br>
           <span class="strength" ng:class="strength"  ng-show="strength">  La Fortaleza de la Contraseña es @{{ strength }} !</span>
         </div>
     </div>

     <div class="row form-group">
         <div class="col-sms-8 col-sm-8" >
            [[ Form::label('Confirmar Nueva Contraseña ')]]<!--  -->
            <input ng-attr-type="@{{ showPassword ? 'text' : 'password' }}" id="password_confirmation" class='input-text full-width' ng-model='user.password_confirmation'>

         </div>

     </div>
    [[ Form::submit('Actualizar Perfil Usuario', array('class' => 'btn btn-primary')) ]]
    [[ Form::close() ]]
</div>
@endsection
