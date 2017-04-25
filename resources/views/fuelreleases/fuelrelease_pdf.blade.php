<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>FUEL RELEASE PDF</title>
     <link rel="stylesheet" href="{{ asset("assets/css/print_pdf.css") }}">
      <link rel="shortcut icon" href="{{ asset("assets/icoXFS.ico") }}" type="image/x-icon">
  </head>

<body>
    <div class="header">
      <img style=" margin-top:-90px; margin-left:-5px;  height:67px;width:200px;  position:absolute;" src="{{ asset("assets/images/pdf/header.png") }}" >
      <img style=" margin-top:-85px; margin-left:487px  height:67px;width:250px;  position:absolute;" src="{{ asset("assets/images/pdf/fecha_invoice.png") }}" >
    </div>
    <div class="panel panel-primary11">
      <div class="panel-body" >
         <img style="margin-top:-15px; margin-left:-4px; height:20px;width:150px;  position:absolute;" src="{{ asset("assets/images/pdf/FUEL_RELEASE.png") }}" >
      </div>
    </div>


<div class="contenido" >
  <div class="cintillo">
      <span class="texto-i">
        <strong>To: </strong> {{$fuel[0]->cliente}}
        <br/>
        <strong>From: </strong>  XFlight Support
        <br/>
        <strong>Request Date: </strong> {{date_format(date_create( $fuel[0]->date), 'm/d/Y') }}
        <br/>
        <strong>Release Ref#: </strong> {{$fuel[0]->cf_card}}
        <br/>
        <strong>Ref Info#: </strong> {{$fuel[0]->ref}}
      </span>
      <span class="texto-d" style="text-align: right;">
        <strong>Estimate Number:</strong> {{$fuel[0]->estimate_id}}
      </span>
      <img style="position: relative; height:130px;width:100%;" src="{{ asset("assets/images/pdf/cintillo.png") }}" >

  </div>
      <div class="otro" style=" margin-left: 25px;   font-size:13px;">
        <p><h3><strong>We  here by confirm the following fuel release, valid for 72 hours</strong></h3></p>
        </br>
        <br>
        <p><strong>Airport Code/Name: </strong>{{$fuel[0]->localidad}}</p>
        <p><strong>Supplier: </strong>{{$fuel[0]->prove}}</p>
        <p><strong>FBO: </strong>{{$fuel[0]->fbo}}</p>
        <p><strong>handling: </strong>{{$fuel[0]->handling}}</p>
        <p><strong>Into Plane: </strong>{{$fuel[0]->into_plane}}</p>
        <p><strong>Into-Plane Phone Number: </strong>{{$fuel[0]->into_plane_phone}}</p>
        <p><strong>Aircraft Registrarion #: </strong>{{$fuel[0]->matricula}}</p>
        <p><strong>Aircraft Type: </strong>{{$fuel[0]->tipo}}</p>
        <p><strong>Operator: </strong>{{$fuel[0]->operator}}</p>
        <p><strong>Call Sign / Fight Number: </strong>{{$fuel[0]->flight_number}}</p>
        <p><strong>ETA: </strong>{{date_format(date_create( $fuel[0]->eta), 'm/d/Y H:m:s') }}</p>
        <p><strong>ETD: </strong>{{date_format(date_create($fuel[0]->etd), 'm/d/Y H:m:s')}}</p>
        <p><strong>Flight Purpose: </strong>{{$fuel[0]->flight_purpose}}</p>
        <p><strong>Quantity: </strong>{{$fuel[0]->qty}}</p>
      </div>
      <div class="foot">
 <img style="height:100%;width:100%;" src="{{ asset("assets/images/pdf/FUEL_RELEASE_BASE.png") }}" >
      </div>
</div>
    <div class="pie">
     <img style="margin-left:40px; height:20px;width:90%;  position:absolute;" src="{{ asset("assets/images/pdf/REDES.png") }}" >
    </div>
  </body>
</html>
