@extends('layouts.app')
@section('css')
  <!-- Datatable Styles -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">

@endsection
@section('contenido')

<div class="row">
  <div class="col-md-11 col-md-offset-1">
    <div class="panel panel-default">

    <div class="panel-heading">Listado de Servicios</div>
    @if ($message = Session::get('success'))
          <div class="alert alert-success">
              <p>{{ $message }}</p>
          </div>
      @endif
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

      @include('servicios.partials.table')

     </div>
    </div>
  </div>
</div>
[[Form::open(['route' => ['servicios.destroy', ':COM_ID'], 'method' => 'DELETE','id'=>'form-delete']) ]]

[[Form::close()]]
@endsection

@section('scripts')
<!--scripts necesarios en esta vista -->
<!-- datatable jquery -->
<script type="text/javascript" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script>
  $('#example').dataTable();
  var tab= $('#example').DataTable();
  $('#example tbody').on('click', 'a.btn-delete', function (e) {
     e.preventDefault();//evita que se envie el formulario
     var id = tab.row($(this ).parents('tr')).data();
     var form =$('#form-delete');
     var url=form.attr('action').replace(':COM_ID',id[0]);
     var data=form.serialize();
     $("#dialog-confirm").html('<p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>¿Esta Seguro que desea Eliminar el Registro?</p>');
     $( "#dialog-confirm" ).dialog({
         resizable: false,
         height: "auto",
         width: 400,
         modal: true,
         buttons: {
           "Aceptar": function() {
             $( this ).dialog( "close" );
             //var row=$(this).parents('tr');
             $("#mensaje").css("display", "block");
                $('#mensaje').toggleClass('alert alert alert-success');//cambiar la clase
             $.post(url,data, function(result){
                $('#mensaje').html(result);
              // alert(result);
              $('#example').find('.'+id).fadeOut();

             }).fail(function(){
                 $('#mensaje').toggleClass('alert alert alert-danger');

                  $('#mensaje').html('La compañia no fue eliminada');
               //alert('La compañia no fue eliminada');
              $('#example').find('.'+id).show();
             });
           },
           "Cancelar": function() {
             $( this ).dialog( "close" );
           }
         }
       });

     //alert("ajaa");

  });
</script>
@endsection
