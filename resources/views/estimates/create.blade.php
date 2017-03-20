@extends('layouts.app')
@section('css')
  <!-- Datatable Styles -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
{{-- <link rel="stylesheet" href="{{asset("assets/css/bootstrap-table.css")}}"> --}}
@endsection
@section('contenido')
  <div id="mensaje" style="display:none" class="alert alert-danger alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error! </strong><label id='validar'></label><strong>Campos Requeridos!</strong>
  </div>
<h2>Agregar Estimados</h2>

<div class="pull-right">
  <a class="btn btn-primary" href="{{ route('estimates.index') }}"> Atrás</a>
</div>
{{-- <div class="pull-right col-sm-5">
  <a id="invoices" class="btn btn-primary soap-icon-card" href="#"> Invoice</a>
  <button class="btn btn-primary soap-icon-stories" value="3" onclick="modal(this.value)" href="#" data-toggle="modal" data-target="#clientes">Fuel Release</button>
  <a class="btn btn-primary soap-icon-list" href="#">Imprimir</a>
  <button id="email" value="2" onclick="modal(this.value)" class="email btn btn-primary soap-icon-generalmessage" href="#" data-toggle="modal" data-target="#clientes">Enviar Correo</button>
</div> --}}
<p style="color:rgb(235, 160, 162)">Los campos con (*) son Obligatorios</p>

<br/>


<!-- if there are creation errors, they will show here -->
  @include('errors.errors')
<div class="col-sm-12 no-float no-padding">
[[ Form::open(['route'=>'estimates.index']) ]]

  @include('estimates.partials.fields')
[[ Form::button('Agregar Estimado', array('class' => 'btn btn-primary','onclick'=>'saveEstimates()')) ]]
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
   var index;
  //  $('#example1').DataTable({
  //    "columnDefs": [
  //      { "visible": false, "targets": 0 }
  //    ]
  //  });
  var tab1=$('#example').DataTable();
  tab1.column(3).visible(false);
  tab1.column(4).visible(false);
  tab1.column(6).visible(false);
  tab1.column(7).visible(false);
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
       //index=tab.row($( this ).parents('tr')).index();
       var data = tab.row($(this ).parents('tr')).data();
      //var id = tab.row($(this).parents('tr')).id();
      // alert( 'ID:'+id+'index:'+index );
       $('#servicios').val(data[0]);
       $('#descripcion').val(data[2]);
       $('#cantidad').val(data[3]);
       $('#precio').val(data[4].replace('$',''));
       $('.plus').css("display","none");
       $('.edit').css("display","block");

       tab
           .row( $(this).parents('tr') )
           .remove()
           .draw();
   } );
  $('#example1').on('dblclick', 'tr', function () {
       var data = tab.row( this ).data();
      //  var id = tab.row(this).id();
      //  alert( 'You clicked on '+id+'\'s row' );
       $('#servicios').val(data[0]);
       $('#descripcion').val(data[2]);
       $('#cantidad').val(data[3]);
       $('#precio').val(data[4]);
       $('.plus').css("display","none");
       $('.edit').css("display","block");

              tab
                  .row( $(this).parents('tr') )
                  .remove()
                  .draw();
   } );


  //end dbclick clientes
  $('#btnedit').on( 'click',function () {
      //var index=tab.row($( this ).parents('tr')).index();
  // document.getElementById("example1").deleteRow(index+1);
   //tab.draw(true);
      // tab
      //     .row( $(this).parents('tr') )
      //     .remove()
      //     .draw();
      $('.plus').css("display","block");
      $('.edit').css("display","none");
         addRows();
  } );
$('#invoices').css("display","none");
$('#estado').on('change',function(){
  if ($('#estado').val()=='Aceptado') {
      $('#invoices').css("display","block");
  }
  else {
    $('#invoices').css("display","none");
  }
});

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
