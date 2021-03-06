@extends('layouts.app')
@section('contenido')
<?php
 date_default_timezone_set('America/Caracas');
$fe=date('m/d/Y');
 $nombre="Estimate_".$fe.".pdf";
 $correo=$estimates[0]->correo;
 $url=URL::to('printestimates/'.$estimates[0]->id);
 ?>
<div class="" ng-controller="EstimateCtrl" ng-init="estimate.company={{json_encode($estimates[0]->nombrec)}}; estimate.id={{json_encode($estimates[0]->id)}}; mail.to={{json_encode($correo)}}; mail.adjunto={{json_encode($nombre)}};">
@include('errors.message')
<h1>Mostrando Estimado Número: <strong> {{ $estimates[0]->id }}</strong></h1>
{{-- {{var_dump($id_in)}} --}}
<div class="pull-right">
  <a class="btn btn-primary" href="{{ route('estimates.index') }}"> Atrás</a>
</div>
<div class="pull-right col-sm-8">
  <a class="btn btn-primary soap-icon-list" target="_blank" href="{{URL::to('printestimates/'.$estimates[0]->id)}}">  Imprimir</a>
  <button id="email" value="2"  ng-click='correo()' class="email btn btn-primary soap-icon-generalmessage" href="#" data-toggle="modal" data-target="#clientes"> Enviar Correo</button>

  @if ($estimates[0]->estado=="Aceptado")
     @if($invoice==0)
      <a id="invoices" class="btn btn-primary soap-icon-stories" href="{{URL::to('invoices/create/'.$estimates[0]->id)}}"> Generar Factura</a>
    @else
        <a id="invoices" class="btn btn-primary soap-icon-stories" href="{{URL::to('invoices/'.$id_in[0]->id)}}"> Ver Factura</a>
     @endif
     @if($fuel>0)
       @if($fuelrelease>0)
           <a class="btn btn-primary soap-icon-doc-minus"  href="{{URL::to('fuelreleases/'.$id_fuel[0]->id)}}"> Ver Fuel Release</a>
       @else
          <a class="btn btn-primary soap-icon-doc-minus"  href="{{URL::to('fuelreleases/create/'.$estimates[0]->id)}}"> Generar Fuel Release</a>
        @endif

     @endif
  @endif
</div>
<!-- Trigger the modal with a button -->
<!-- Modal -->

 <div id="clientes" class="modal fade" role="dialog">
   <div class="modal-dialog modal-lg">
     <!-- Modal content-->
     <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title"><label id="titulo"></label></h4>
         </div>
         <div class="modal-body">
            <div class="correo" style="display:none">
               @include('Mail.mail')
           </div>
         </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
         </div>
    </div>

  </div>
 </div>
 <!--Modal-->
     <br/>
     <br/>
     <br>
     <ul class="nav nav-tabs">
       <li class="active"><a data-toggle="tab" href="#home">Datos del Estimado</a></li>
       <li><a data-toggle="tab" href="#menu1">Otros Datos</a></li>
       <li><a data-toggle="tab" href="#menu2">Archivo del Estimado</a></li>
       <li><a data-toggle="tab" href="#menu3">Items del Estimado</a></li>

     </ul>

     <div class="tab-content">
       <div id="home" class="tab-pane fade in active">
         <h3>Datos Generales</h3>
         <br/>
         <h5>
           <table border="0" style="with:600px;" class="table table-condensed">
             <tr>
               <td><strong>ID Cliente:</strong> {{ $estimates[0]->company_id }}<br></td>
               <td><strong>Cliente:</strong> {{ $estimates[0]->nombrec }}<br></td>
             </tr>
             <tr>
               <td><strong>ID Proveedor:</strong> {{ $estimates[0]->prove_id }}<br></td>
               <td><strong>Proveedor:</strong> {{ $estimates[0]->nombrep }}<br></td>
             </tr>
             <tr>
               <td><strong>Estado:</strong> {{ $estimates[0]->estado }}</td>
               <td><strong>Fecha de Solicitud:</strong> {{ date_format(date_create($estimates[0]->fecha_soli), 'm/d/Y') }}</td>
             </tr>
              <tr>

               <td><strong>Metodo de Seguimiento:</strong> {{ $estimates[0]->metodo_segui }}<br></td>
               <td><strong>Información de Seguimiento: </strong>{{ $estimates[0]->info_segui }}</td>
             </tr>

               <tr><td><strong>Ganancia: %</strong> {{ $estimates[0]->categoria }}<br></td>
               <td><strong>Fecha de Seguimiento:</strong> {{date_format(date_create($estimates[0]->proximo_seguimiento), 'm/d/Y')  }}</td>

             </tr>
             <tr>
               <td colspan="2"><strong>Resumen: </strong> {{ $estimates[0]->resumen }}</td>
             </tr>
             <tr>
              <td colspan="2"></td>

            </tr>

          </table>
       </h5>
      </div>
        <div id="menu1" class="tab-pane fade">
          <h3>Datos de Gasolina</h3>
         <br/>
         <h5>
           <table border="0" style="with:600px;" class="table table-condensed">
             <tr>
               <td><strong>FBO:</strong> {{ $estimates[0]->fbo }}<br></td>
               <td><strong>Cantidad Aproximada:</strong> {{ $estimates[0]->cantidad_fuel }}<br></td>

             </tr>
             <tr>
                  <td><strong>Codigo Aereopuerto:</strong> {{ $estimates[0]->localidad }}<br></td>
                  <td><strong>Tipo de Aeronave:</strong> {{ $estimates[0]->tipo }}<br></td>
             </tr>

            <tr>
             <td colspan="2"><strong>Matricula de Avión:</strong> {{ $estimates[0]->matricula }}<br></td>

           </tr>
           <tr>
            <td colspan="2"></td>

          </tr>
          </table>
          </h5>
          <h3>Datos de Congierge</h3>
         <br/>
         <h5>
           <table border="0" style="with:600px;" class="table table-condensed">
             <tr>
               <td><strong>Número de Habitación:</strong> {{ $estimates[0]->num_habitacion }}<br></td>
               <td><strong>Tipo de Habitación:</strong> {{ $estimates[0]->tipo_hab }}<br></td>

             </tr>
             <tr>
                  <td><strong>Tipo de Cama:</strong> {{ $estimates[0]->tipo_cama }}<br></td>
                  <td><strong>Número de Estrellas:</strong> {{ $estimates[0]->tipo_estrellas }}<br></td>
             </tr>
           <tr>
            <td colspan="2"></td>

          </tr>
          </table>
          </h5>
        </div>
        <div id="menu2" class="tab-pane fade">
          <h3>Archivo del Estimado</h3>
         <br/>
          <a class="glyphicon glyphicon-picture" title="Descargar Archivo" aria-hidden="true" href="{{ URL::to('capture/'.$estimates[0]->imagen) }}"> Descargar Archivo del Estimado</a>

        </div>
 <div id="menu3" class="tab-pane fade">

   <h3>Items del Estimado
     <small>
                  Datos del Estimado
         </small>
   </h3>

  <table border="0" style="with:900px;" class="table table-hover">
      <thead>
          <tr>
            <th>Servicio</th>
            <th>Descripción</th>
            <th>Cantidad </th>
            <th>$Precio </th>
            <th>$Subtotal</th>
            <th>$Ganancia</th>
            <th>$Total</th>
          </tr>
      </thead>
      <tbody>
        @if(!empty($date))
          @foreach($date as $key => $value)
            <tr>
              {{-- <td>{{ $value->servicioid }}</td> --}}
              <td>{{ $value->nbservicio }}</td>
              <td>{{ $value->descripcion }}</td>
              <td>{{ $value->cantidad }}</td>
              <td>{{ $value->precio }}</td>
              <td>$ {{ $value->subtotal }}</td>
              <td>$ {{ $value->recarga }}</td>
              <td>$ {{ $value->total }}</td>
            </tr>
          @endforeach
       @endif
      </tbody>
      <tfoot>
        <tr>
          <td colspan="7"><!--<span class="help-block" ng-show="!form1.$pristine && !form1.precio.$valid"><p style="color:rgb(235, 160, 162)">  Precio Invalido! Debe introducir un decimal con 2 caracteres ej: 5.23 (Solo admite el .)</p>
        </span>--></td>
        </tr>
      </tfoot>
   </table>
   <div class="row">
       <div class="col-sm-6 col-md-4 pull-right" style="text-align:right;">
        <h4>Subtotal: $ {{$estimates[0]->subtotal}}
            <br/>Descuento: % {{$estimates[0]->descuento}}
         <br/>Total Descuento: $ {{$estimates[0]->total_descuento}}
         </h4>
      </div>
   </div>
   <div class="col-sm-6 col-md-8 pull-right" style="text-align:right;">
         <h2><span style="color: green;">Total Ganancia: $ {{$estimates[0]->ganancia}}</span>        -    <span style="color: rgb(21, 28, 116);">Total: $ {{$estimates[0]->total}}</span>  <h2>
      </div>

   <br/>
  </div>

  </div>
</div>
@endsection
@section('scripts')
  {{-- <script type="text/javascript" src="{{ asset("assets/js/ScriptXFS.js") }}"></script> --}}
<script>
$('#m4').removeClass('');
$('#m4').addClass('active');
</script>
@endsection
