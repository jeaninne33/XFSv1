@extends('layouts.app')
@section('css')
  <!-- Datatable Styles -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">

@endsection
@section('contenido')


<h3>Listado de Compañias</h3>
  <div class="errorMessages"></div>
  <div class="successMessages"></div>
  <div class="alert alert" id="mensaje" style="display: none;">
  </div>
  <div class="panel-body">
    <p>
      <a class="btn btn-info" href="{{URL::to('companys/create')}}" role="button">
        Nueva Compañia
      </a>
    </p>

    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#home">Clientes</a></li>
      <li><a data-toggle="tab" href="#menu1" id="<? $data = $companys_c ?>">Proveedores</a></li>
      <li><a data-toggle="tab" href="#menu2">Cliente/Proveedor</a></li>
    </ul>
    <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <h3>Listado de Clientes</h3>
        <br/>
        <?php //$data = $companys_c; ?>

        <div class="col-sms-12 col-sm-12">
            @include('companys.partials.table')
        </div>
      </div>

    </div>

   </div>


[[Form::open(['route' => ['companys.destroy', ':COM_ID'], 'method' => 'DELETE','id'=>'form-delete']) ]]

[[Form::close()]]

@endsection

@section('scripts')
<!--scripts necesarios en esta vista -->
<!-- datatable jquery -->
<script type="text/javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

<script>
  $('#example').dataTable();
</script>
[[ Html::script('assets/js/scripts_funcionales.js') ]]
@endsection
