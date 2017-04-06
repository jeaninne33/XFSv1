@extends('layouts.app')
@section('css')
  <!-- Datatable Styles -->
  {{-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"> --}}

{{-- <link rel="stylesheet" href="{{asset("assets/css/bootstrap-table.css")}}"> --}}
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
   [[ Form::open(['route'=>'fuel-release', 'method'=> 'POST','novalidate']) ]]
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
<!--scripts necesarios en esta vista -->
{{-- <script type="text/javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{ asset("assets/js/ScriptXFS.js") }}"></script>
<script src="{{asset("assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js")}}"></script>
<script src="{{asset("assets/js/sistemalaravel.js")}}"></script> --}}

<script>
$('#m4').removeClass('');
$('#m4').addClass('active');
</script>

@endsection
