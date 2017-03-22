@extends('layouts.app')
@section('contenido')
<h1>Mostrando Usuario: <strong> {{ $user->name }}</strong></h1>


<div class="row form-group pull-right">
<a class="btn btn-primary" href="{{ route('users.index') }}"> Atrás</a>
</div>
<br/>
     <br/>
<div class="col-sm-12 no-float no-padding">
  <h4>
     <div class="row form-group">
       <div class="col-sms-8 col-sm-8">
           <strong>ID:</strong> {{ $user->id}}
       </div>
     </div>
     <div class="row form-group">
       <div class="col-sms-8 col-sm-8">
           <strong>Nombre Usuario:</strong> {{ $user->name}}
       </div>
     </div>
     <div class="row form-group">
       <div class="col-sms-8 col-sm-8">
        <strong> Email:</strong> {{ $user->email}}
       </div>
     </div>
     <div class="row form-group">
       <div class="col-sms-8 col-sm-8">
        <strong>Tipo de Usuario:</strong>  {{ $user->tipo($user->type)}}
       </div>
     </div>
</h4>
</div>

@endsection
