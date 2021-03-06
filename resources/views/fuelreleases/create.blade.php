@extends('layouts.app')
@section('css')
@endsection
@section('contenido')


<br/>
<!-- if there are creation errors, they will show here -->
@include('errors.errors')
<div class="col-sm-12 no-float no-padding" ng-controller="FuelreleaseCtrl" ng-init="fuel.company_id={{json_encode($estimates[0]->company_id)}}; fuel.estimate_id={{json_encode($estimates[0]->id)}}; estimate={{json_encode($estimates->last())}};">
  <h2>INFORMATION OF THE FUEL RELEASE

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
   [[ Form::open(['route'=>'fuelreleases.store', 'method'=> 'POST','novalidate']) ]]
    @include('fuelreleases.partials.fields')
 {{-- [[ Form::submit('Editar Estimado', array('class' => 'btn btn-primary')) ]] --}}
 <div class="row">
   [[ Form::submit('Generar Fuel Release', array('class' => 'btn btn-primary','ng-click'=>'save($event)')) ]]
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
