@extends('layouts.app')
@section('css')
  <!-- Datatable Styles -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
  <link rel="stylesheet" href="{{asset("assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css")}}">
  <link rel="stylesheet" href="{{asset("assets/css/sistemalaravel.css")}}">
{{-- <link rel="stylesheet" href="{{asset("assets/css/bootstrap-table.css")}}"> --}}
@endsection
@section('contenido')

      {{-- <h2>Editar Estimado <strong> {{$estimates[0]->id}} </strong></h2>
      <div class="pull-right col-sm-5">
        <a id="invoices" class="btn btn-primary soap-icon-card" href="{{URL::to('invoices/create/'+$estimates[0]->id)}}"> Invoice</a>
        <button class="btn btn-primary soap-icon-stories" value="3" onclick="modal(this.value)" href="#" data-toggle="modal" data-target="#clientes">Fuel Release</button>
        <a class="btn btn-primary soap-icon-list" href="{{URL::to('printestimates/'.$estimates[0]->id)}}" target="_blank">Imprimir</a>
        <button id="email" value="2" onclick="modal(this.value)" class="email btn btn-primary soap-icon-generalmessage" href="#" data-toggle="modal" data-target="#clientes">Enviar Correo</button>
      </div> --}}


<br/>
<!-- if there are creation errors, they will show here -->
@include('errors.errors')
<div class="col-sm-12 no-float no-padding">
   [[ Form::open(['route'=>'fuel-release', 'method'=> 'POST']) ]]
    @include('estimates.partials.fuel-releaseFields')
 {{-- [[ Form::submit('Editar Estimado', array('class' => 'btn btn-primary')) ]] --}}
  [[ Form::close() ]]
</div>

@endsection
@section('scripts')
<!--scripts necesarios en esta vista -->
<!-- datatable jquery -->
{{-- <script type="text/javascript" src="{{asset("assets/js/bootstrap-table.js")}}"></script> --}}
<script type="text/javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{ asset("assets/js/ScriptXFS.js") }}"></script>
<script src="{{asset("assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js")}}"></script>
<script src="{{asset("assets/js/sistemalaravel.js")}}"></script>

<script>
// function activareditor(){
//   $("#contenido_mail").wysihtml5();
// };

//activareditor();

   $('#example').dataTable();
   $('#example1').dataTable();

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
