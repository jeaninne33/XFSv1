@extends('layouts.app')
@section('css')
  <!-- Datatable Styles -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">

@endsection
@section('contenido')

      <p><h2 ><i class=" soap-icon-fueltank circle"></i> <strong>Servicios</strong></h2>
        <p><h2 > <strong>Listado de Servicios</strong></h2></p></p>
        <div class="errorMessages"></div>
        <div class="successMessages"></div>
        <div class="" id="mensaje" style="display: none;">
        </div>
       <div class="panel-body">

      <p>
        <a class="btn btn-info" href="{{URL::to('servicios/create')}}" role="button">
          Nuevo Servicio
        </a>
      </p>
   <div class="col-sms-12 col-sm-12"  >
      @include('servicios.partials.table')

  </div>
</div>
[[Form::open(['route' => ['servicios.destroy', ':COM_ID'], 'method' => 'DELETE','id'=>'form-delete']) ]]

[[Form::close()]]

</div>

</script>
[[ Html::script('assets/js/scripts_funcionales.js') ]]
@endsection
