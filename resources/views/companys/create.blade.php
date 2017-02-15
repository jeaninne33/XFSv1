@extends('layouts.app')

@section('contenido')

<h2>Agregar Compañia</h2>
<div class="pull-right">
         <a class="btn btn-primary" href="{{ route('companys.index') }}"> Atrás</a>
</div>
<p style="color:rgb(235, 160, 162)">Los campos con (*) son Obligatorios</p>

<br/>

<!-- if there are creation errors, they will show here -->



<div ng-controller="CompanyCtrl" class="col-sm-12 no-float no-padding">
  <div class="errorMessages">
    <div class='alert alert-danger alert-dismissable' ng-show="show_error">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       <strong>¡Vaya!</strong> Hubo algunos problemas con su entrada.<br><br>
        <ul><div  ng-repeat="error in message_error">
            <li >- @{{ error[0] }}</li>
        </div>
        </ul>
    </div>
  </div>
  <div class="successMessages" ng-show="message">
    <div class='alert alert-success alert-dismissable'>
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <p ng-bind="message"></p>
    </div>
  </div>
[[ Form::open(['route'=>'companys.store', 'name'=>'form1','method'=> 'POST', 'novalidate', 'ng-submit'=>'save($event)']) ]]
  @include('companys.partials.fields')
[[ Form::submit('Agregar Compañia', array('id'=>'registro','class' => 'btn btn-primary')) ]]
[[ Form::close() ]]

</div>
@endsection
@section('scripts')

[[ Html::script('assets/js/scripts_funcionales.js') ]]

@endsection
