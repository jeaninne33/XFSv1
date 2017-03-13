<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Example 2</title>
    <link rel="stylesheet" href="assets/css/print_pdf.css">
  </head>

<body>
    <div class="header">
      <img style=" margin-top:-90px; margin-left:-5px;  height:67px;width:200px;  position:absolute;" src="assets/images/pdf/header.png" >
      <img style=" margin-top:-85px; margin-left:463px  height:67px;width:250px;  position:absolute;" src="assets/images/pdf/fecha invoice.png" >
    </div>
    <div class="panel panel-primary11">
      <div class="panel-body" >
         <img style="margin-top:-15px; margin-left:-4px; height:20px;width:150px;  position:absolute;" src="assets/images/pdf/invoice.png" >
      </div>
    </div>


<div class="contenido" >
  <div class="cintillo">
      <span class="texto-i">
        <strong>Codigo Cliente: </strong> {{$invoice[0]->company_id}}
        <br/>
        <strong>Cliente: </strong> {{$invoice[0]->cliente}}
        <br/>
        <strong>Email: </strong> {{$invoice[0]->correo}}
        <br/>
        <strong>Representante: </strong> {{$invoice[0]->representante}}
        <br/>
        <strong>Dirección: </strong> {{$invoice[0]->representante}}
      </span>
      <span class="texto-d">
        <strong>Número de Factura:</strong> {{$invoice[0]->id}}
        <br/>
        <strong>Fecha Emisión: </strong> {{date_format(date_create( $invoice[0]->fecha), 'm/d/Y') }}
        <br/>
        <strong>FBO: </strong> {{$invoice[0]->fbo}}
        <br/>
        <strong>Codigo Areopuerto: </strong> {{$invoice[0]->localidad}}
        <br/>
        <strong>Placa: </strong> {{$invoice[0]->matricula}}
      </span>
      <img style="position: relative; height:130px;width:100%;" src="assets/images/pdf/cintillo.png" >

  </div>

  <table class="display" cellspacing="0" width="527" border="0">
      <thead >
          <tr>
              <td><strong>Servicio</strong></td>
              <td><strong>Descripcion</strong></td>
              <td><strong>Fecha del Servicio</strong></td>
              <td><strong>Cantidad</strong></td>
              <td><strong>x</strong></td>
              <td><strong>Precio</strong></td>
              <td><strong>Monto</strong></td>
          </tr>
      </thead>
      <tbody>
        @if(!$items->isEmpty())
         @foreach($items as $key => $value)
           <tr >
              <td>{{ $value->servicio->nombre }}</td>
                <td>{{ $value->descripcion }}</td>
               <td>{{date_format(date_create( $value->fecha_servicio), 'm/d/Y') }}</td>
               <td>{{ $value->cantidad }}</td>
               <td>x</td>
               <td>$ {{ $value->subtotal_recarga }}</td>
               <td>$ {{ $value->total }}</td>
          </tr>
        @endforeach
      @endif
      </tbody>
      <tfoot>
        <tr>
          <td ></td>
          <td ></td>
        </tr>
        <tr>
          <td colspan="5" ></td>
          <td >SUBTOTAL: </td><td> $ {{ $invoice[0]->subtotal }}</td>
        </tr>

        <tr>
          <td colspan="5" ></td>
          <td >DESCUENTO: </td><td> $ {{ $invoice[0]->total_descuento }}</td>
        </tr>
        <tr style="background-color: #A9A9A9;">
          <td colspan="5" background-color></td>
          <td ><strong>TOTAL: </strong></td><td> <strong>$ {{ $invoice[0]->total }}</strong></td>
        </tr>
      </tfoot>
  </table>
      <div class="otro">
        <p><strong>Resumen de la Factura: </strong>{{$invoice[0]->resumen}}</p>
        <p><strong>Fecha de Vencimeinto: </strong>{{date_format(date_create( $invoice[0]->fecha_vencimiento), 'm/d/Y')}}</p>
      </div>
      <div class="foot">
 <img style="height:100%;width:100%;" src="assets/images/pdf/invoice base.png" >
      </div>
</div>

    <div class="pie">
     <img style="margin-left:40px; height:20px;width:90%;  position:absolute;" src="assets/images/pdf/REDES.png" >
    </div>
  </body>
</html>
