@extends('layouts.app')
@section('css')
@endsection
@section('contenido')

<?php
  $eta=date_format(date_create(  $fuel->eta), 'Y-m-d');
  $etd=date_format(date_create(  $fuel->etd), 'Y-m-d');
?>
<br/>
<!-- if there are creation errors, they will show here -->
@include('errors.errors')
<div class="col-sm-12 no-float no-padding" ng-controller="FuelreleaseCtrl" ng-init=" estimate={{json_encode($estimates->last())}}; fuel={{json_encode($fuel)}}; fuel.eta={{json_encode($eta)}}; fuel.etd={{json_encode($etd)}}; ">
  <h2>EDIT INFORMATION OF THE FUEL RELEASE

  </h2>

  <div class="pull-right">
    <a class="btn btn-primary" href="{{ URL::previous() }}"> Atrás</a>
  </div>
  <p style="color:rgb(235, 160, 162)">
           <b> The fields with (*) are required</b>
      </p>
      <br/>
      <!-- if there are creation errors, they will show here -->
        @include('errors.message')
      <p>  <strong><label>Estimate Number: {{$estimates[0]->id}}</label></strong>
   [[ Form::model($fuel,['route'=>'fuelreleases.update', 'method'=> 'PUT','novalidate']) ]]
    @include('fuelreleases.partials.fields')
 {{-- [[ Form::submit('Editar Estimado', array('class' => 'btn btn-primary')) ]] --}}
 <div class="row">
   [[ Form::submit('Actualizar Fuel Release', array('class' => 'btn btn-primary','ng-click'=>'edit($event)')) ]]
   {{--<a name="btnFR" id="btnFR" class="btn btn-primary">Generar Fuel Release</a> --}}
 </div>
  [[ Form::close() ]]
</div>

@endsection
@section('scripts')

<script>
$('#m4').removeClass('');
$('#m4').addClass('active');
</script>

@endsection
