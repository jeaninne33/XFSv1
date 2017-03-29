@extends('layouts.app')
@section('css')
  <!-- Datatable Styles -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">

@endsection
@section('contenido')
<div ng-controller="indexCompany">

<p><h2 ><i class=" icon soap-icon-stories circle"></i> Facturas de <strong>XFS</strong></h2>
</p>

<div class="tabla">
  <div class="pull-right">
           <a class="btn btn-primary" href="" id="histo"> Ver Historial de Operaciones</a>
  </div>
  <br>

  <p><h2 > <strong>Listado de Facturas</strong></h2></p>
  <div class="errorMessages"></div>
  <div class="successMessages"></div>
  <div class="" id="mensaje" style="display: none;">
  </div>
  <div class="panel-body">

    <div class="col-sms-12 col-sm-12"  >

          	  @include('invoices.partials.table')
        </div>
      </div>


[[Form::open(['route' => ['invoices.destroy', ':COM_ID'], 'method' => 'DELETE','id'=>'form-delete']) ]]

[[Form::close()]]
</div>
<div class="historial" style="display:none;">
  <div class="pull-right">
           <a class="btn btn-primary" href="" id="volver"> Atrás</a>
       </div>
       <br>
    <p><h2 > <strong>Listado del Historial de Operaciones de Factura (Auditoría)</strong></h2></p>
    <div class="panel-body">

      <div class="col-sms-12 col-sm-12"  >

            	  @include('invoices.partials.historial_table')
          </div>
        </div>
</div>
</div>
@endsection

@section('scripts')
<!--scripts necesarios en esta vista -->
<!-- datatable jquery -->
<script type="text/javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

<script>
  $('#example').dataTable();
  $('#example2').dataTable();
  $('#m5').removeClass('');
  $('#m5').addClass('active');
  
</script>
[[ Html::script('assets/js/scripts_funcionales.js') ]]
@endsection
