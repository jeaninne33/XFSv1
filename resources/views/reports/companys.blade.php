@extends('layouts.app')
@section('css')
@endsection
@section('contenido')

  <!-- if there are creation errors, they will show here -->
  <div ng-controller="ReportsCtrl" class="col-sm-12 no-float no-padding" ng-init="tipo='company';  paises={{json_encode($paises)}};">
    <h2>Reporte de Compañias de XFS </h2>
    <div class="pull-right">
             <a class="btn btn-primary" href="{{ route('reports') }}"> Atrás</a>
    </div>

    <br/>
<p>
    @include('errors.message')
</p>
    [[ Form::open(['route'=>'invoice', 'name'=>'form1','method'=> 'POST', 'target'=>"_blank",  'novalidate', 'ng-submit'=>'relacion($event)']) ]]
    <h3>Filtros del Reporte</h3>
  [[ Form::hidden('tipo', null, ['class' => 'input-text full-width' ,'ng-model'=>'reporte.tipo','ng-value'=>'invoice']) ]]
    <div class="row form-group">
        <div class="col-sms-6 col-sm-6 ">
          [[Form::label('Pais ') ]]
          [[ Form::select('pais_id', array('' => 'Seleccione el Pais'), null, ['class' => 'selector full-width',  'required' => 'required', 'id' => 'pais_id','ng-model'=>'reporte.pais_id', 'ng-options'=>"pais.id as pais.nombre for pais in paises"]) ]]
        </div>
        <div class="col-sms-6 col-sm-6">
          [[Form::label( 'Tipo de Relación') ]]
          [[ Form::select('tipo', config('options.tipo'), null,['id' => 'tipo','class' => 'selector full-width',  'required' => 'required' ,'ng-model'=>'reporte.tipo']) ]]
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
