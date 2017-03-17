@extends('layouts.app')
@section('css')
@endsection
@section('contenido')

  <!-- if there are creation errors, they will show here -->

  <div ng-controller="ReportsCtrl" class="col-sm-12 no-float no-padding" ng-init="tipo='invoice'; clientes={{json_encode($cliente)}};">
    <h2>Reporte de Facturas de XFS </h2>
    <div class="pull-right">
             <a class="btn btn-primary" href="{{ route('reports') }}"> Atrás</a>
    </div>

    <br/>
<p>
    @include('errors.message')
</p>
    [[ Form::open(['route'=>'invoice', 'name'=>'form1','method'=> 'POST', 'target'=>"_blank",  'novalidate', 'ng-submit'=>'relacion($event)']) ]]
    <h3>Filtros del Reporte</h3><p style="color:rgb(235, 160, 162)">Los campos con (*) son Obligatorios</p>
  [[ Form::hidden('tipo', null, ['class' => 'input-text full-width' ,'ng-model'=>'reporte.tipo','ng-value'=>'invoice']) ]]
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
          [[Form::label('Estado de la Factura') ]]
          [[ Form::select('estado', array(''=>'Seleccione','1'=>'No pagado','2'=>'Pagado','3'=>'Pago Vencido'), null,['id' => 'estado','class' => 'selector full-width' ,'ng-model'=>'reporte.estado']) ]]
        </div>
        <div class="col-sms-6 col-sm-6 ">
          [[Form::label('Cliente') ]]
          [[ Form::select('company_id', array(''=>'Seleccione'), null,['id' => 'company_id','ng-options'=>"cliente.id as cliente.nombre for cliente in clientes",'class' => 'selector full-width' ,'ng-model'=>'reporte.company_id']) ]]
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
