@extends('layouts.app')

@section('contenido')
@include('errors.message')
<h1>Mostrando Estimado <strong> {{ $estimates[0]->id }}</strong></h1>

<div class="pull-right">
  <a class="btn btn-primary" href="{{ route('estimates.index') }}"> Atrás</a>
</div>
<div class="pull-right col-sm-6">
  @if ($estimates[0]->metodo_segui=="Aceptado")
      <a id="invoices" class="btn btn-primary soap-icon-card" href="{{URL::to('invoices/create/'.$estimates[0]->id)}}"> Invoice</a>
      <a class="btn btn-primary soap-icon-stories"  href="{{URL::to('fuelreleases/'.$estimates[0]->id)}}">Fuel Release</a>
  @endif
  <a class="btn btn-primary soap-icon-list" target="_blank" href="{{URL::to('printestimates/'.$estimates[0]->id)}}">Imprimir</a>
  <button id="email" value="2" onclick="modal(this.value)" class="email btn btn-primary soap-icon-generalmessage" href="#" data-toggle="modal" data-target="#clientes">Enviar Correo</button>
</div>
     <br/>
     <ul class="nav nav-tabs">
       <li class="active"><a data-toggle="tab" href="#home">Datos de la Compañia</a></li>
       <li><a data-toggle="tab" href="#menu1">FBO</a></li>
       <li><a data-toggle="tab" href="#menu2">Imagen</a></li>
       <li><a data-toggle="tab" href="#menu3">Estimado</a></li>

     </ul>

     <div class="tab-content">
       <div id="home" class="tab-pane fade in active">
         <h3>Datos Generales</h3>
         <br/>
         <h5>
           <table border="0" style="with:600px;" class="table table-condensed">
             <tr>
               <td><strong>Cliente:</strong> {{ $estimates[0]->nombrec }}<br></td>
               <td><strong>Proveedor:</strong> {{ $estimates[0]->nombrep }}<br></td>
             </tr>
             <tr>
               <td><strong>Estado:</strong> {{ $estimates[0]->estado }}</td>
               <td><strong>Fecha Solicitada:</strong> {{ $estimates[0]->fecha_soli }}</td>
             </tr>
              <tr>
               <td><strong>Ganancia:</strong> {{ $estimates[0]->ganancia }}<br></td>
               <td><strong>Resumen:</strong> {{ $estimates[0]->resumen }}<br></td>
             </tr>
             <tr>
               <td><strong>Metodo:</strong> {{ $estimates[0]->metodo_segui }}</td>
               {{-- <td><strong>Estado:</strong> {{ $estimates[0]->estado }}</td> --}}
             </tr>
               <tr>
               <td><strong>Fecha de Seguimiento:</strong> {{ $estimates[0]->proximo_seguimiento }}</td>

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

             </tr>
             <tr>
               <td><strong>Cantidad Aproximada:</strong> {{ $estimates[0]->cantidad_fuel }}<br></td>
             </tr>
              <tr>
               <td><strong>Codigo Aereopuerto:</strong> {{ $estimates[0]->localidad }}<br></td>

             </tr>
             <tr>
              <td><strong>Tipo Aeronave:</strong> {{ $estimates[0]->tipo }}<br></td>

            </tr>
            <tr>
             <td><strong>Registro de Aeronaves:</strong> {{ $estimates[0]->matricula }}<br></td>

           </tr>
          </table>
          </h5>
        </div>
        <div id="menu2" class="tab-pane fade">
          <h3>Imagen</h3>
         <br/>

        </div>
 <div id="menu3" class="tab-pane fade">
   <h3>Estimado</h3>

    <table style="with:600px;" class="table table-bordered">
      <thead>
          <tr>
            {{-- <td data-field="idServicio">ID</td> --}}
              <td data-field="Servicio">Servicio</td>
              <td data-field="Descripcion">Descripcion</td>
              <td data-field="Cantidad">Cantidad</td>
              <td data-field="Precio">Precio</td>
              <td data-field="Subtotal">SubTotal</td>
              <td data-field="Ganancia">Ganancia</td>
              <td data-field="Total">Total</td>
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
              <td>{{ $value->subtotal }}</td>
              <td>{{ $value->recarga }}</td>
              <td>{{ $value->total }}</td>>
            </tr>
          @endforeach
       @endif
       <tr>
         <td colspan="7">Subtotal: {{$estimates[0]->subtotal}}</td>
       </tr>
       <tr>
         <td colspan="7">Descuento: {{$estimates[0]->descuento}}</td>
       </tr>
       <tr>
         <td colspan="7">Total Descuento: {{$estimates[0]->total_descuento}}</td>
       </tr>
       <tr>
         <td colspan="7">Total: {{$estimates[0]->total}}</td>
       </tr>
      </tbody>
   </table>

</div>
@endsection
@section('scripts')
  {{-- <script type="text/javascript" src="{{ asset("assets/js/ScriptXFS.js") }}"></script> --}}

@endsection
