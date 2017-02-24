@extends('layouts.app')

@section('contenido')
<div ng-controller="EditCompanyCtrl" class="col-sm-12 no-float no-padding" ng-init="company={{$companys}}; airplanes={{$companys->aviones}}; " >
      <h2>Editar Compañia <strong> @{{ company.nombre }}</strong></h2>
      <div class="pull-right">
               <a class="btn btn-primary" href="{{ route('companys.index') }}"> Atrás</a>
               
      </div>
<p style="color:rgb(235, 160, 162)">Los campos con (*) son Obligatorios</p>

<br/>
<!-- if there are creation errors, they will show here ng-init=""-->


    @include('errors.message')
   [[Form::model($companys, array('route' => array('companys.update', $companys->id), 'method' => 'PUT','ng-submit'=>'edit($event)', 'novalidate'))]]
    @include('companys.partials.fields')
  [[ Form::submit('Editar Compañia', array('class' => 'btn btn-primary')) ]]
  [[ Form::close() ]]
</div>

@endsection
@section('scripts')

<script>
  $('#m2').removeClass('');
  $('#m2').addClass('active');
   var tipo=$('#tipo').val();
  // alert(tipo);
  if(tipo=="prove"){
     $(".cliente").css("display", "none");
     $(".proveedor").css("display", "block");
     $(".avion").css("display", "none");
  }else if (tipo=="client") {
      $(".cliente").css("display", "block");
      $(".proveedor").css("display", "none");
      $(".avion").css("display", "block");
 }else{
      $(".cliente").css("display", "block");
      $(".proveedor").css("display", "block");
      $(".avion").css("display", "block");
  }//fin si
</script>

@endsection
