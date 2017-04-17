@extends('layouts.app')
@section('css')
  <!-- Datatable Styles -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">

@endsection
@section('contenido')
<div class="tabla">
    <p><h2 ><i class="soap-icon-card circle"></i> <strong>Estimados</strong></h2>
    @if (Auth::user()->type!='despacho')
      <div class="pull-right">
               <a class="btn btn-primary" href="" id="fuelre"> Ver Listado de Fuel Release</a>
      </div>
    @endif
     <p><h2 > <strong>Listado de Estimados</strong></h2></p></p>

  <div class="alert alert" id="mensaje" style="display: none;">
  </div>
  <div class="panel-body">

    <p>
      <a class="btn btn-info" href="{{URL::to('estimates/create')}}" role="button">
        Nuevo Estimado
      </a>
    </p>

    @include('estimates.partials.table')

[[Form::open(['route' => ['estimates.destroy', ':COM_ID'], 'method' => 'DELETE','id'=>'form-delete']) ]]

[[Form::close()]]
</div>
</div>
<div class="fuel" style="display:none;">
  <div class="pull-right">
           <a class="btn btn-primary" href="" id="volver"> Atrás</a>
       </div>
       <br>
    <p><h2 > <strong>Listado de Fuel Release</strong></h2></p>
    <div class="panel-body">

      <div class="col-sms-12 col-sm-12"  >

            	  @include('fuelreleases.partials.table')
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
    $('#m4').removeClass('');
    $('#m4').addClass('active');
    $(document).on('click', '#fuelre',function (e) {
      $(".tabla").css("display", "none");
      $(".fuel").css("display", "block");
    });
    $(document).on('click', '#volver',function (e) {
      $(".tabla").css("display", "block");
      $(".fuel").css("display", "none");
    });
</script>

@endsection
