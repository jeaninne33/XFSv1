@extends('layouts.app')

@section('contenido')

<h1>Mostrando la Compañia <strong> {{ $companys->nombre }}</strong></h1>
<div class="pull-right">
         <a class="btn btn-primary" href="{{ route('companys.index') }}"> Atrás</a>
     </div>
     <br/>
     <ul class="nav nav-tabs">
       <li class="active"><a data-toggle="tab" href="#home">Datos de la Compañia</a></li>
       <li><a data-toggle="tab" href="#menu1">Datos de Operaciones</a></li>
       <li><a data-toggle="tab" href="#menu2">Datos Administrativos</a></li>
       <li><a data-toggle="tab" href="#menu3">Aviones</a></li>
       <li><a data-toggle="tab" href="#menu4" style="display:none;">Servicios</a></li>
     </ul>

     <div class="tab-content">
       <div id="home" class="tab-pane fade in active">
         <h3>Datos Generales</h3>
         <h5>
           <table border="0" style="with:600px;" class="table table-condensed">
             <tr>
               <td><strong>Nombre de la Compañia:</strong> {{ $companys->nombre }}<br></td>
               <td><strong>Website:</strong> {{ $companys->website }}<br></td>
             </tr>
             <tr>
               <td><strong>Dirección:</strong> {{ $companys->direccion }}</td>
               <td><strong>Direccion de factura:</strong> {{ $companys->direccion_cuenta }}</td>
             </tr>


          <table>


       </h5>
      </div>
        <div id="menu1" class="tab-pane fade">
        </div>
        <div id="menu2" class="tab-pane fade">
        </div>
        <div id="menu3" class="tab-pane fade">
        </div>
        <div id="menu4" class="tab-pane fade">
        </div>
 </div>

@endsection
