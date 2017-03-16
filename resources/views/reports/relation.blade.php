@extends('layouts.app')
@section('css')
@endsection
@section('contenido')

  <!-- if there are creation errors, they will show here -->

  <div ng-controller="ReportsCtrl" class="col-sm-12 no-float no-padding" ng-init="tipo='relation'; servicios={{json_encode($servicios)}};">
    <h2>Reporte de la Relación entre el Estimado y la Factura </h2>
    <div class="pull-right">
             <a class="btn btn-primary" href="{{ route('reports') }}"> Atrás</a>
    </div>


    <br/>
<p>
    @include('errors.message')
</p>
    [[ Form::open(['route'=>'relacion', 'name'=>'form1','method'=> 'POST', 'target'=>"_blank",  'novalidate', 'ng-submit'=>'relacion($event)']) ]]
    <h3>Filtros del Reporte</h3><p style="color:rgb(235, 160, 162)">Los campos con (*) son Obligatorios</p>
    <div class="row form-group">
        <div class="col-sms-6 col-sm-6 ">
          [[Form::label('Desde *') ]]
          [[ Form::date('desde', null, ['class' => 'input-text full-width' ,'ng-model'=>'reporte.desde']) ]]
        </div>
        <div class="col-sms-6 col-sm-6">
          [[Form::label( 'Hasta *') ]]
          [[ Form::date('hasta', null, ['class' => 'input-text full-width' ,'ng-model'=>'reporte.hasta']) ]]
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sms-6 col-sm-6 ">
          [[Form::label('Servicio') ]]
          [[ Form::select('servicio_id', array(''=>'Seleccione'), null, ['class' => 'input-text full-width','ng-options'=>"servicio.id as servicio.nombre for servicio in servicios",'id'=>'servicio_id', 'ng-model'=>'reporte.servicio_id',  ]) ]]
        </div>

    </div>
    [[ Form::submit('Generar Reporte', array('id'=>'registro','class' => 'btn btn-primary')) ]]
    [[ Form::close() ]]

  </div>
@endsection
@section('scripts')

<script>
  $('#m6').removeClass('');
  $('#m6').addClass('active');
</script>

@endsection
