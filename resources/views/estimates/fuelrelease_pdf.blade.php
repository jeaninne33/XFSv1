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
        <strong>To: </strong> {{$estimates[0]->nombrec}}
        <br/>
        <strong>From: </strong> {{$from}}
        <br/>
        <strong>Request Date: </strong> {{$estimates[0]->fecha_soli}}
        <br/>
        <strong>Release Ref#: </strong> {{$releaseRef}}
        <br/>
        <strong>Ref Info#: </strong> {{$ref}}
      </span>
      <span class="texto-d">
        <strong>Número de Estimado:</strong> {{$estimates[0]->id}}
        {{-- <br/>
        <strong>Fecha Emisión: </strong> {{date_format(date_create( $estimates[0]->fecha_soli), 'm/d/Y') }}
        <br/>
        <strong>FBO: </strong> {{$estimates[0]->fbo}}
        <br/>
        <strong>Codigo Areopuerto: </strong> {{$estimates[0]->localidad}}
        <br/>
        <strong>Placa: </strong> {{$estimates[0]->matricula}} --}}
      </span>
      <img style="position: relative; height:130px;width:100%;" src="assets/images/pdf/cintillo.png" >

  </div>


      <div class="otro">
        {{-- <p><strong>Resumen de la Factura: </strong>{{$estimates[0]->resumen}}</p> --}}
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
