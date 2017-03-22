@extends('layouts.app')
@section('css')
  <!-- Datatable Styles -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">

@endsection
@section('contenido')
<div ng-controller="indexCompany">
<p><h2 ><i class=" icon soap-icon-stories circle"></i> Facturas de <strong>XFS</strong></h2>
  <p><h2 > <strong>Listado de Facturas</strong></h2></p>
</p>
  <div class="errorMessages"></div>
  <div class="successMessages"></div>
  <div class="" id="mensaje" style="display: none;">
  </div>
  <div class="panel-body">
  <!--<p>
      <a class="btn btn-info" href="{{--URL::to('invoices/create/3')--}}" role="button">
        Nueva factura
      </a>
    </p>-->

    <div class="col-sms-12 col-sm-12"  >

          	  @include('invoices.partials.table')
        </div>
      </div>


[[Form::open(['route' => ['invoices.destroy', ':COM_ID'], 'method' => 'DELETE','id'=>'form-delete']) ]]

[[Form::close()]]
</div>
@endsection

@section('scripts')
<!--scripts necesarios en esta vista -->
<!-- datatable jquery -->
<script type="text/javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

<script>
  $('#example').dataTable();
  $('#m5').removeClass('');
  $('#m5').addClass('active');
</script>
[[ Html::script('assets/js/scripts_funcionales.js') ]]
@endsection
