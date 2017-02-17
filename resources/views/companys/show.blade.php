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
         <br/>
         <h5>
           <table border="0" style="with:600px;" class="table table-condensed">
             <tr>
               <td><strong>id:</strong> {{ $companys->id }}<br></td>
               <td><strong</strong> {{ $companys->website }}<br></td>
             </tr>
             <tr>
             <tr>
               <td><strong>Nombre de la Compañia:</strong> {{ $companys->nombre }}<br></td>
               <td><strong>Website:</strong> {{ $companys->website }}<br></td>
             </tr>
             <tr>
               <td><strong>Dirección:</strong> {{ $companys->direccion }}</td>
               <td><strong>Direccion de factura:</strong> {{ $companys->direccion_cuenta }}</td>
             </tr>
              <tr>
               <td><strong>Representante:</strong> {{ $companys->representante }}<br></td>
               <td><strong>Certificación:</strong> {{ $companys->certificacion }}<br></td>
             </tr>
             <tr>
               <td><strong>Pais:</strong> {{ $companys->pais->nombre }}</td>
               <td><strong>Estado:</strong> {{ $companys->estado->nombre }}</td>
             </tr>
               <tr>
               <td><strong>Codigo Postal:</strong> {{ $companys->codigop }}</td>
               <td><strong>Ciudad:</strong> {{ $companys->ciudad }}</td>
             </tr>
                  <tr>
               <td><strong>Tipo de Relación:</strong> {{ $companys->relacion }}</td>
               <td><strong></strong> </td>
             </tr>
          </table>
       </h5>
      </div>
        <div id="menu1" class="tab-pane fade">
          <h3>Datos de Operaciones</h3>
         <br/>
         <h5>
           <table border="0" style="with:600px;" class="table table-condensed">
             <tr>
               <td><strong>Correo:</strong> {{ $companys->correo }}<br></td>

             </tr>
             <tr>
               <td><strong>Teléfono:</strong> {{ $companys->telefono_admin }}<br></td>
             </tr>
              <tr>
               <td><strong>Celular:</strong> {{ $companys->celular }}<br></td>

             </tr>
          </table>
          </h5>
        </div>
        <div id="menu2" class="tab-pane fade">
          <h3>Datos Administrativos</h3>
         <br/>
         <h5>
           <table border="0" style="with:600px;" class="table table-condensed">
             <tr>
               <td><strong>Persona de Contacto:</strong> {{ $companys->contacto_admin }}<br></td>

             </tr>
             <tr>
               <td><strong>Correo:</strong> {{ $companys->correo_admin }}<br></td>
             </tr>
              <tr>
               <td><strong>Teléfono:</strong> {{ $companys->telefono }}<br></td>

             </tr>
          </table>
          </h5>
          <h3>Información de Transferencias Bancarias</h3>
         <br/>
         <h5>
           <table border="0" style="with:600px;" class="table table-condensed">
             <tr>
               <td><strong>Banco:</strong> {{ $companys->banco }}<br></td>

             </tr>
             <tr>
               <td><strong>Cuenta:</strong> {{ $companys->cuenta }}<br></td>
             </tr>
              <tr>
               <td><strong>ABA:</strong> {{ $companys->aba }}<br></td>

             </tr>
             <tr>
              <td><strong>Dirección:</strong> {{ $companys->direccion_cuenta }}<br></td>

            </tr>
          </table>
          </h5>
        </div>
        <div id="menu3" class="tab-pane fade">
          <h3><p>
          Aviones <small>
                    Se muestran los datos de los Aviones
              </small></p>
          </h3>
          <br/>
          <h5>

          @foreach( $companys->aviones as $indice =>$air )
          <table border="0" style="with:600px;" class="table table-condensed">
            <tr>  <p><strong>Datos del Avión #  {{$indice+1}}<strong><p/></tr>
            <tr>
              <td><strong>Tipo de Avión:</strong> {{ $air->tipo }}<br></td>
              <td><strong>Nombre:</strong> {{ $air->nombre }}<br></td>
              <td><strong>Modelo:</strong> {{ $air->modelo }}<br></td>
            </tr>
            <tr>
              <td><strong>Fabricante:</strong> {{ $air->fabricante }}<br></td>
              <td><strong>Matricula:</strong> {{ $air->matricula }}<br></td>
              <td><strong>Licencia 1:</strong> {{ $air->licencia }}<br></td>
            </tr>
            <tr>
              <td><strong>Licencia 2:</strong> {{ $air->licencia }}<br></td>
              <td><strong>Registro:</strong> {{ $air->registro }}<br></td>
              <td><strong>Piloto 1:</strong> {{ $air->piloto1 }}<br></td>
            </tr>
            <tr>
              <td><strong>Piloto 2:</strong> {{ $air->piloto2 }}<br></td>
              <td><strong>Certificado:</strong> {{ $air->certificado }}<br></td>
              <td><strong>Seguro:</strong> {{ $air->seguro }}<br></td>
            </tr>
          </table><br/>
          @endforeach

            </h5>
        </div>
        <div id="menu4" class="tab-pane fade">
        </div>
 </div>

@endsection

@section('scripts')

<script>
  $('#m2').removeClass('');
  $('#m2').addClass('active');
</script>

@endsection
