<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Estimado {{$estimates['id']}}</title>
    <link rel="stylesheet" href="assets/css/print_pdf.css">
  </head>

<body>
    <div class="header">
      <img style=" margin-top:-90px; margin-left:-5px;  height:67px;width:200px;  position:absolute;" src="assets/images/pdf/header.png" >
      <img style=" margin-top:-85px; margin-left:463px  height:67px;width:250px;  position:absolute;" src="assets/images/pdf/fecha invoice.png" >
    </div>
    <div class="panel panel-primary11">
      <div class="panel-body" >
         <img style="margin-top:-15px; margin-left:-4px; height:20px;width:150px;  position:absolute;" src="assets/images/pdf/FUEL RELEASE.png" >
      </div>
    </div>


<div class="contenido" >
  <div class="cintillo">
      <span class="texto-i">
        <strong>To: </strong> {{$estimates['to']}}
        <br/>
        <strong>From: </strong> {{$estimates['from']}}
        <br/>
        <strong>Request Date: </strong> {{$estimates['fecha_s']}}
        <br/>
        <strong>Release Ref#: </strong> {{$estimates['releaseRef']}}
        <br/>
        <strong>Ref Info#: </strong> {{$estimates['ref']}}
      </span>
      <span class="texto-d">
        <strong>Número de Estimado:</strong> {{$estimates['id']}}
      </span>
      <img style="position: relative; height:130px;width:100%;" src="assets/images/pdf/cintillo.png" >

  </div>
      <div class="otro">
        <p><strong>We  here by confirm the following fuel release, valid for 72 hours</strong></p>
        </br>
        <p><strong>Airport Code/Name: </strong>{{$estimates['codeairport']}}</p>
        <p><strong>Supplier: </strong>{{$estimates['supplier']}}</p>
        <p><strong>FBO: </strong>{{$estimates['fbo1']}}</p>
        <p><strong>handling: </strong>{{$estimates['handling']}}</p>
        <p><strong>Into Plane: </strong>{{$estimates['intoPlane']}}</p>
        <p><strong>Into-Plane Phone Number: </strong>{{$estimates['phone']}}</p>
        <p><strong>Aircraft Registrarion #: </strong>{{$estimates['ar']}}</p>
        <p><strong>Operator: </strong>{{$estimates['operator']}}</p>
        <p><strong>Type: </strong>{{$estimates['type']}}</p>
        <p><strong>Call Sign / Fight Number: </strong>{{$estimates['fn']}}</p>
        <p><strong>ETA: </strong>{{$estimates['eta']}}</p>
        <p><strong>ETD: </strong>{{$estimates['etd']}}</p>
        <p><strong>Flight Purpose: </strong>{{$estimates['fp']}}</p>
        <p><strong>Quantity: </strong>{{$estimates['quantity']}}</p>
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
