<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Example 2</title>
    <style>
        html{
            margin: 0 0 1cm 0;
        }
        body{
            font-family: Myriad Pro, helvetica, sans-serif;
            font-size:11px;
            color: #000;
            background: #fff;
            text-align:justify;
            margin: 3cm 1cm 1cm 1cm;
            border: 4px solid #229FC3;
            }
        .header {
          /*border: 1px solid #C00;*/
        }
        table thead {
          /*color: #fff;*/
          background-color: #A9A9A9;
        }
        .contenido{
         text-align: center;
        }
        .otro{
          text-align: left;
          width: 527px;
        }
        div.contenido table {
           margin: 0 auto;
           text-align: left;
      }

      .cintillo{
        /*position: relative;*/
        top: 40px;
        height: 200px;
        margin-top:45px;
        /* background-image: url("assets/images/pdf/cintillo.png");*/
        /*background-color: #F5F5F5;*/
      }

      .footer { position: fixed; bottom: 0px; }
      .pagenum:before { content: counter(page); }
    </style>
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
<div class="cintillo">
  <p align="right"><h2>Factura Número: {{ $invoice[0]->id }}</h2></p>
  <div class="date"><h3>Fecha de Factura: {{date_format(date_create( $invoice[0]->fecha), 'm/d/Y')}}</h3></div>
</div>

<div class="contenido" >
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
</div>

  </body>
</html>
