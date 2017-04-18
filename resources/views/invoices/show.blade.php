@extends('layouts.app')

@section('contenido')
  <?php $fe=date('m/d/Y');
   $nombre="Invoice_".$fe.".pdf";
   $correo=$invoice->company->correo;
   $company=$invoice->company->nombre;
   $url=URL::to('invoices_pdf/' . $invoice->id);
   ?>
   <div class="" ng-controller="EditInvoiceCtrl" ng-init="invoice.company={{json_encode($company)}}; invoice.id={{json_encode($invoice->id)}}; mail.to={{json_encode($correo)}}; mail.adjunto={{json_encode($nombre)}};">
     @include('errors.message')
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
<h1>Mostrando la Factura Número: <strong> {{ $invoice->id }}</strong></h1>
<div class="pull-right">
         <a class="btn btn-primary" href="{{ URL::previous() }}"> Atrás</a>
     </div>
     <div class="pull-right col-sm-6">
       <a class="btn btn-primary soap-icon-list" target="_blank" href="{{ URL::to('invoices_pdf/' . $invoice->id) }}"> Imprimir</a>
       <button id="email" value="2" ng-click='correo()' class="email btn btn-primary soap-icon-generalmessage" href="#" data-toggle="modal" data-target="#clientes"> Enviar Correo</button>
     </div>
     <br/><br/>
     <ul class="nav nav-tabs">
       <li class="active"><a data-toggle="tab" href="#home">Datos de la Factura</a></li>
       <li><a data-toggle="tab" href="#menu1">Items de la Factura</a></li>
       <li><a data-toggle="tab" href="#menu2">Datos de la Compañia</a></li>
     </ul>

     <div class="tab-content">
       <div id="home" class="tab-pane fade in active">
         <h3>Datos Generales de la Factura</h3>
         <br/>
         <h5>
           <table border="0" style="with:600px;" class="table table-condensed">
             <tr>
                <td><strong>Número Factura:</strong> {{ $invoice->id }}<br></td>
               <td><strong>Número del Estimado:</strong> {{ $invoice->estimate_id }}<br></td>
             </tr>
             <tr>
             <tr>
               <td><strong>FBO:</strong> {{ $invoice->fbo }}<br></td>
               <td><strong>Localidad:</strong> {{ $invoice->localidad }}<br></td>
             </tr>
             <tr>
               <td><strong>Fecha de la Factura:</strong> {{date_format(date_create( $invoice->fecha), 'm/d/Y') }}</td>
                <td><strong>Matricula del Avion:</strong> {{ $invoice->avion->matricula }}<br></td>
             </tr>
              <tr>
               <td><strong>Plazos:</strong> {{ $invoice->plazo($invoice->plazo) }}<br></td>
                <td><strong>Fecha de Vencimiento:</strong> {{date_format(date_create( $invoice->fecha_vencimiento), 'm/d/Y') }}</td>

             </tr>
             <tr>
               <td><strong>Estado Factura:</strong> {{ $invoice->estados($invoice->estado) }}</td>
               <td><strong>Información:</strong> {{ $invoice->informacion }}</td>
             </tr>
             <tr>
                <td><strong>Método de Pago:</strong> {{ $invoice->metodo_pago }}</td>
               <td><strong>Fecha de Pago:</strong>@if(!empty($invoice->fecha_pago)) {{ date_format(date_create($invoice->fecha_pago), 'm/d/Y')}} @endif</td>

             </tr>
               <tr>
               <td colspan="2"><strong>Resumen:</strong> {{ $invoice->resumen }}</td>
             </tr>

          </table>
       </h5>
      </div>
        <div id="menu1" class="tab-pane fade">
          <h3>Items de la Factura
            <small>
                         Datos de la factura.
                </small>
          </h3>
          <table border="0" style="with:900px;" class="table table-hover">
            <thead>
              <tr>
                <th>Servicio</th>
                <th>Descripción</th>
                <th>Fecha del Servicio</th>
                <th>Cantidad </th>
                <th>$Precio </th>
                <th>$Subtotal</th>
                <th>$Ganancia</th>
                <th>$Total</th>
              </tr>
            </thead>
            <tbody>
          @if(!empty($items))
             @foreach($items as $key => $value)
            <tr>
              <td>
              {{  $value->servicio->nombre}}
              </td>
              <td>
                {{  $value->descripcion}}
              </td>
              <td>
                {{date_format(date_create( $value->fecha_servicio), 'm/d/Y') }}
              </td>
              <td>
               {{  $value->cantidad}}

              </td>
              <td>
                $ {{  $value->precio}}

              </td>
              <td>
                $ {{  $value->subtotal}}

              </td>
              <td>
               $ {{  $value->recarga}}
              </td>
              <td>
               $ {{  $value->total}}
              </td>
            </tr>
              @endforeach
          @endif
            <tfoot>
              <tr>
                <td colspan="9"><!--<span class="help-block" ng-show="!form1.$pristine && !form1.precio.$valid"><p style="color:rgb(235, 160, 162)">  Precio Invalido! Debe introducir un decimal con 2 caracteres ej: 5.23 (Solo admite el .)</p>
              </span>--></td>
              </tr>
            </tfoot>
              </tbody>
            </table>
            <div class="row">
                <div class="col-sm-6 col-md-4 pull-right" style="text-align:right;">
                 <h4>Subtotal: $ {{$invoice->subtotal}}
                     <br/>Descuento: % {{$invoice->descuento}}
                  <br/>Total Descuento: $ {{$invoice->total_descuento}}
                  </h4>
               </div>
            </div>
            <div class="col-sm-6 col-md-8 pull-right" style="text-align:right;">
                  <h2><span style="color: green;">Total Ganancia: $ {{$invoice->ganancia}}</span>        -    <span style="color: rgb(21, 28, 116);">Total: $ {{$invoice->total}}</span>  <h2>
               </div>

            <br/>
        </div>
        <div id="menu2" class="tab-pane fade">
          <h3>Datos del Cliente</h3>
          <h5>


          <table border="0" style="with:600px;" class="table">
            <tr>
              <td colspan="2"><strong>Número: </strong> {{ $invoice->company->id}}<br></td>
            </tr>
            <tr>
              <td colspan="2"><strong>Nombre de la Compañia: </strong>{{ $company }}<br></td>
            </tr>
            <tr>
              <td colspan="2"><strong>Dirección: </strong>{{ $invoice->company->direccion}} </td>
            </tr>
            <tr>
             <td colspan="2"><strong>Teléfono: </strong>{{ $invoice->company->telefono_admin}}<br></td>
           </tr>
             <tr>
              <td colspan="2"><strong>Ganacia %: </strong>{{  $invoice->categoria($invoice->company->categoria)}}<br></td>
            </tr>
            </table>
           </h5>
        </div>

 </div>
</div>
@endsection

@section('scripts')

<script>
  $('#m2').removeClass('');
  $('#m2').addClass('active');
</script>

@endsection
