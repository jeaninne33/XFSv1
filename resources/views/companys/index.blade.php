@extends('layouts.app')
@section('css')
  <!-- Datatable Styles -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">

@endsection
@section('contenido')
<div ng-controller="indexCompany">
<p><h2 ><i class=" soap-icon-hotel-1 circle"></i> <strong>Compañias</strong></h2>
  <p><h2 > <strong>Listado de Compañias</strong></h2></p>
 <!--[[ Form::label('tipo', 'Filtrar por Tipo de Relacion: ')]]
    <select ng-change="filter_table()" ng-model="relacion" ng-options="filtro as filtro.nombre for filtro in filtros track by filtro.id" >
       <option value="">--Elige opcion--</option>
     </select>
<p><h2 > <strong>Listado de @{{ relacion.nombre }}</strong></h2></p>-->
</p>
  <div class="" id="mensaje" style="display: none;">
  </div>
  <div class="panel-body">
    <p>
      <a class="btn btn-info" href="{{URL::to('companys/create')}}" role="button">
        Nueva Compañia
      </a>
    </p>

    <div class="col-sms-12 col-sm-12" id="tabla" >
          	  @include('companys.partials.table')
        </div>
      </div>

[[Form::open(['route' => ['companys.destroy', ':COM_ID'], 'method' => 'DELETE','id'=>'form-delete']) ]]

[[Form::close()]]
</div>
@endsection

@section('scripts')
<!--scripts necesarios en esta vista -->
<!-- datatable jquery -->
<script type="text/javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

<script>
  $('#example').dataTable();
  $('#m2').removeClass('');
  $('#m2').addClass('active');
</script>
[[ Html::script('assets/js/scripts_funcionales.js') ]]
@endsection
