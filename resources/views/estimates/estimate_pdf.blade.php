<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Example 2</title>
    {{-- <link rel="stylesheet" href="{{ asset("assets/css/print_pdf.css") }}"> --}}
      [[ Html::style('assets/css/print_pdf.css') ]]
     {{-- <link rel="stylesheet" href="assets/css/print_pdf.css"> --}}
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
        <strong>Customer Code: </strong> {{$estimates[0]->id}}
        <br/>
        <strong>Customer: </strong> {{$estimates[0]->nombrec}}
        <br/>
        <strong>Email: </strong> {{$estimates[0]->correo}}
        <br/>
        <strong>Representative: </strong> {{$estimates[0]->representante}}
        <br/>
        <strong>Addres Customer: </strong> {{$estimates[0]->direccion}}
      </span>
      <span class="texto-d">
        <strong>Estimate Number:</strong> {{$estimates[0]->id}}
        <br/>
        <strong>Estimate Date: </strong> {{date_format(date_create( $estimates[0]->fecha_soli), 'm/d/Y') }}
        <br/>
        <strong>FBO: </strong> {{$estimates[0]->fbo}}
        <br/>
        <strong>Airport Code: </strong> {{$estimates[0]->localidad}}
        <br/>
        <strong>Tail #: </strong> {{$estimates[0]->matricula}}
      </span>
      <img style="position: relative; height:130px;width:100%;" src="assets/images/pdf/cintillo.png" >

  </div>

  <table class="display" cellspacing="0" width="527" border="0">
      <thead >
          <tr>
            <td><strong>Services</strong></td>
            <td><strong>Description</strong></td>
            <td><strong>Qty</strong></td>
            <td><strong>x</strong></td>
            <td><strong>Rate</strong></td>
            <td><strong>Amount</strong></td>
          </tr>
      </thead>
      <tbody>
        @if(!empty($data))
         @foreach($data as $key => $value)
           <tr>
             {{-- <td>{{ $values->servicioid }}</td> --}}
             <td>{{ $value->nbservicio }}</td>
             <td>{{ $value->descripcion }}</td>
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
          <td colspan="4" ></td>
          <td >SUBTOTAL: </td><td> $ {{ $estimates[0]->subtotal }}</td>
        </tr>

        <tr>
          <td colspan="4" ></td>
          <td >DISCOUNT: </td><td> $ {{ $estimates[0]->total_descuento }}</td>
        </tr>
        <tr style="background-color: #A9A9A9;">
          <td colspan="4" background-color></td>
          <td ><strong>TOTAL: </strong></td><td> <strong>$ {{ $estimates[0]->total }}</strong></td>
        </tr>
      </tfoot>
  </table>
      <div class="otro">
        <p><strong>Status: </strong>{{$esti->estadosEN($estimates[0]->estado) }}</p>
        <p><strong>Sumary: </strong>{{$estimates[0]->resumen}}</p>
        {{-- <p><strong>Fecha de Vencimeinto: </strong>{{date_format(date_create( $estimates[0]->fecha_vencimiento), 'm/d/Y')}}</p> --}}
      </div>
      <div class="foot">
 <img style="height:100%;width:100%;" src="assets/images/pdf/FUEL RELEASE BASE.png" >
      </div>
</div>

    <div class="pie">
     <img style="margin-left:40px; height:20px;width:90%;  position:absolute;" src="assets/images/pdf/REDES.png" >
    </div>
  </body>
</html>
