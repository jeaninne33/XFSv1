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
         <img style="margin-top:-15px; margin-left:-4px; height:20px;width:150px;  position:absolute;" src="assets/images/pdf/ESTIMATE.png" >
      </div>
    </div>


<div class="contenido" >
  <div class="cintillo">
      <span class="texto-i">
        <strong>Codigo Cliente: </strong> {{$estimates[0]->id}}
        <br/>
        <strong>Cliente: </strong> {{$estimates[0]->nombrec}}
        <br/>
        <strong>Email: </strong> {{$estimates[0]->correo}}
        <br/>
        <strong>Representante: </strong> {{$estimates[0]->representante}}
        <br/>
        <strong>Dirección: </strong> {{$estimates[0]->direccion}}
      </span>
      <span class="texto-d">
        <strong>Número de Estimado:</strong> {{$estimates[0]->id}}
        <br/>
        <strong>Fecha Emisión: </strong> {{date_format(date_create( $estimates[0]->fecha_soli), 'm/d/Y') }}
        <br/>
        <strong>FBO: </strong> {{$estimates[0]->fbo}}
        <br/>
        <strong>Codigo Areopuerto: </strong> {{$estimates[0]->localidad}}
        <br/>
        <strong>Placa: </strong> {{$estimates[0]->matricula}}
      </span>
      <img style="position: relative; height:130px;width:100%;" src="assets/images/pdf/cintillo.png" >

  </div>

  <table class="display" cellspacing="0" width="527" border="0">
      <thead >
          <tr>
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
        @if(!empty($data))
         @foreach($data as $key => $value)
           <tr>
             {{-- <td>{{ $value->servicioid }}</td> --}}
             <td>{{ $value->nbservicio }}</td>
             <td>{{ $value->descripcion }}</td>
             <td>{{ $value->cantidad }}</td>
             <td>{{ $value->precio }}</td>
             <td>{{ $value->subtotal }}</td>
             <td>{{ $value->recarga }}</td>
             <td>{{ $value->total }}</td>
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
          <td >SUBTOTAL: </td><td> $ {{ $estimates[0]->subtotal }}</td>
        </tr>

        <tr>
          <td colspan="5" ></td>
          <td >DESCUENTO: </td><td> $ {{ $estimates[0]->total_descuento }}</td>
        </tr>
        <tr style="background-color: #A9A9A9;">
          <td colspan="5" background-color></td>
          <td ><strong>TOTAL: </strong></td><td> <strong>$ {{ $estimates[0]->total }}</strong></td>
        </tr>
      </tfoot>
  </table>
      <div class="otro">
        <p><strong>Resumen de la Factura: </strong>{{$estimates[0]->resumen}}</p>
        {{-- <p><strong>Fecha de Vencimeinto: </strong>{{date_format(date_create( $estimates[0]->fecha_vencimiento), 'm/d/Y')}}</p> --}}
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
