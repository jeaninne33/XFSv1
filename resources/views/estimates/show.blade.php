@extends('layouts.app')

@section('contenido')
@include('errors.message')
<h1>Mostrando Estimado Número: <strong> {{ $estimates[0]->id }}</strong></h1>

<div class="pull-right">
  <a class="btn btn-primary" href="{{ route('estimates.index') }}"> Atrás</a>
</div>
<div class="pull-right col-sm-6">
  @if ($estimates[0]->metodo_segui=="Aceptado")
      <a id="invoices" class="btn btn-primary soap-icon-card" href="{{URL::to('invoices/create/'.$estimates[0]->id)}}"> Invoice</a>
      <a class="btn btn-primary soap-icon-stories"  href="{{URL::to('fuelreleases/'.$estimates[0]->id)}}"> Fuel Release</a>
  @endif
  <a class="btn btn-primary soap-icon-list" target="_blank" href="{{URL::to('printestimates/'.$estimates[0]->id)}}">  Imprimir</a>
  <button id="email" value="2" onclick="modal(this.value)" class="email btn btn-primary soap-icon-generalmessage" href="#" data-toggle="modal" data-target="#clientes"> Enviar Correo</button>
</div>
     <br/>
     <br/>
     <br>
     <ul class="nav nav-tabs">
       <li class="active"><a data-toggle="tab" href="#home">Datos del Estimado</a></li>
       <li><a data-toggle="tab" href="#menu1">Otros Datos</a></li>
       <li><a data-toggle="tab" href="#menu2">Imagen de la Captura del Estimado</a></li>
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
               <td><strong>Ganancia: %</strong> {{ $estimates[0]->categoria }}<br></td>
               <td><strong>Metodo de Seguimiento:</strong> {{ $estimates[0]->metodo_segui }}<br></td>
             </tr>
             <tr>
               <td colspan="2"><strong>Resumen: </strong> {{ $estimates[0]->resumen }}</td>
             </tr>
               <tr>
               <td colspan="2"><strong>Fecha de Seguimiento:</strong> {{ $estimates[0]->proximo_seguimiento }}</td>

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
          <h3>Imagen</h3>
         <br/>

        </div>
 <div id="menu3" class="tab-pane fade">
   <h3></h3>
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
@endsection
@section('scripts')
  {{-- <script type="text/javascript" src="{{ asset("assets/js/ScriptXFS.js") }}"></script> --}}

@endsection
