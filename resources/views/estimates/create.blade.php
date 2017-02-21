@extends('layouts.app')
@section('css')
  <!-- Datatable Styles -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
{{-- <link rel="stylesheet" href="{{asset("assets/css/bootstrap-table.css")}}"> --}}
@endsection
@section('contenido')

<h2>Agregar Estimados</h2>
<div class="pull-right">
         <a class="btn btn-primary" href="{{ route('estimates.index') }}"> Atrás</a>
</div>
<p style="color:rgb(235, 160, 162)">Los campos con (*) son Obligatorios</p>

<br/>

<!-- if there are creation errors, they will show here -->
  @include('errors.errors')
<div class="col-sm-12 no-float no-padding">
[[ Form::open(['route'=>'estimates.store', 'method'=> 'POST']) ]]
  @include('estimates.partials.fields')
[[ Form::submit('Agregar Estimado', array('class' => 'btn btn-primary')) ]]
[[ Form::close() ]]
</div>
@endsection
@section('scripts')
<!--scripts necesarios en esta vista -->
<!-- datatable jquery -->
{{-- <script type="text/javascript" src="{{asset("assets/js/bootstrap-table.js")}}"></script> --}}
<script type="text/javascript" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{ asset("assets/js/ScriptXFS.js") }}"></script>


<script>
   $('#example').dataTable();
   $('#example1').dataTable();
  //  $('#example1').DataTable({
  //    "columnDefs": [
  //      { "visible": false, "targets": 0 }
  //    ]
  //  });
  var tab=  $('#example1').DataTable();
  tab.column( 0 ).visible( false );
   $('#example1 tbody').on( 'click', 'a.btn-delete', function () {

       tab
           .row( $(this).parents('tr') )
           .remove()
           .draw();
   } );
//    $('#example1 tbody').on( 'click', 'tr', function () {
//     var id = tab.row( this ).id();
// alert( 'Row index: '+tab.row( this ).index() );
//     alert( 'Clicked row id '+id );
// } );
  //end remove rows
  //dbclick table clientes
  $('#example1 tbody').on('click', 'a.btn-edit', function () {
       var index=tab.row($( this ).parents('tr')).index();
       var data = tab.row($(this ).parents('tr')).data();
       //alert( 'You clicked on '+data[0]+'\'s row' );
       $('#servicios').val(data[0]);
       $('#descripcion').val(data[2]);
       $('#cantidad').val(data[3]);
       $('#precio').val(data[4]);
       $('.plus').css("display","none");
       $('.edit').css("display","block");
   } );
  $('#example1 tbody').on('dblclick', 'tr', function () {
       var data = tab.row( this ).data();
       //alert( 'You clicked on '+data[0]+'\'s row' );
       $('#servicios').val(data[0]);
       $('#descripcion').val(data[2]);
       $('#cantidad').val(data[3]);
       $('#precio').val(data[4]);
      //  $('.plus').css("display","none");
      //  $('.edit').css("display","block");
   } );
  //end dbclick clientes
  $('#example1 tbody').on( 'click','a.editar', function () {
      var index=tab.row($( this ).parents('tr')).index();
      tab
          .row( $(index).parents('tr') )
          .remove()
          .draw();
        //  addRows();
  } );

// $(document).ready(function() {
//        var t = $('#example1').DataTable();
//        var counter = 1;
//
//        $('#btnAdd').on( 'click', function () {
//            t.row.add( [
//                counter +'.1',
//                counter +'.2',
//                counter +'.3',
//                counter +'.4',
//                counter +'.5'
//            ] ).draw( false );
//
//            counter++;
//        } );
//
//        // Automatically add a first row of data
//        $('#btnAdd').click();
//    } );
  $('.btn-delete').click(function(e){
     e.preventDefault();//evita que se envie el formulario
     $("#dialog-confirm").html('<p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>¿Esta Seguro que desea Eliminar el Registro?</p>');
     $( "#dialog-confirm" ).dialog({
         resizable: false,
         height: "auto",
         width: 400,
         modal: true,
         buttons: {
           "Aceptar": function() {
             $( this ).dialog( "close" );
             var row=$(this).parents('tr');
             var id=row.data('id');
             var form =$('#form-delete');
             var url=form.attr('action').replace(':COM_ID',id);
             var data=form.serialize();
             $("#mensaje").css("display", "block");
                $('#mensaje').toggleClass('alert alert alert-success');//cambiar la clase
             $.post(url,data, function(result){
                $('#mensaje').html(result);
              // alert(result);
               row.fadeOut();

             }).fail(function(){
                 $('#mensaje').toggleClass('alert alert alert-danger');

                  $('#mensaje').html('La compañia no fue eliminada');
               //alert('La compañia no fue eliminada');
               row.show();
             });
           },
           "Cancelar": function() {
             $( this ).dialog( "close" );
           }
         }
       });

     //alert("ajaa");

  });
  // $('#compañia').click(function(){
  //   location.href='companys';
  // });
</script>

@endsection
