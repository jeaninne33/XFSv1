<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Xfligth Support</title>
    <link rel="stylesheet" href="{{ asset("assets/css/print_pdf.css") }}">
  </head>
<body>
    <div class="header">
      <img style=" margin-top:-90px; margin-left:-5px;  height:67px;width:200px;  position:absolute;" src="{{ asset("assets/images/pdf/header.png") }}" >
      <img style=" margin-top:-85px; margin-left:463px  height:67px;width:250px;  position:absolute;" src="{{ asset("assets/images/pdf/fecha_invoice.png") }}" >
    </div>
    <div class="panel panel-primary11">
      <div class="panel-body" >

      </div>
    </div>

<div class="contenido" >
  <div class="cintillo">
      <h2>Reporte de Facturas desde {{date_format(date_create( $desde), 'm/d/Y')}} hasta {{date_format(date_create( $hasta), 'm/d/Y')}}</h2>
          <h3>{{$titu}}</h3>
  </div>

  <table class="display" cellspacing="0" width="527" border="0">
      <thead >
          <tr>
              <td><strong>ID</strong></td>
              <td><strong>Cliente</strong></td>
              <td><strong>Proveedor</strong></td>
              <td><strong>Fecha</strong></td>
              <td><strong>Estado</strong></td>
              <td><strong>Total</strong></td>
          </tr>
      </thead>
      <tbody>

         <?php  $i=0;
         $acum_total=0;
         ?>
        @if(!$invoice->isEmpty())

         @foreach($invoice as $key => $value)
           <?php  $i++;?>
           <tr >

              <td>{{ $value->id }}</td>
                <td>{{ $value->cliente }}</td>
               <td>{{$value->prove  }}</td>

               <td>{{ date_format(date_create( $value->fecha), 'm/d/Y')   }}</td>
               <td>{{ $inv->estados($value->estado) }}</td>
               <td>$ {{ $value->total }}
               <?php $acum_total+=$value->total; ?></td>
          </tr>
        @endforeach
      @else
        <tr>
          <td colspan="6" align="center">No se encontraron registros</td>
        </tr>
      @endif
      </tbody>
      <tfoot>
          @if(!$invoice->isEmpty())
            <tr bgcolor="#A9A9A9">
              <td colspan="5" align="right" >TOTAL</td>
              <td  >$ {{$acum_total}}</td>
            </tr>
          @endif
        <tr>
          <td colspan="6"></td>
        </tr>
        <tr>
          <td colspan="6" align="left"><strong>Total Resultados: {{$i}}</strong></td>
        </tr>
      </tfoot>
  </table>
      <div class="otro">
        <p><strong>Fecha: {{$date}} - Hora: {{date('h:i:s a')}}</strong></p>

        </div>
      <div class="foot">

      </div>
</div>

    <div class="pie">

    </div>
  </body>
</html>
