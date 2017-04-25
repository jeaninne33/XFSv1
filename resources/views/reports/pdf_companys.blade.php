<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
    
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
      <h2>Reporte de Compañias</h2>
      <h3>{{$titu}}</h3>
  </div>

  <table class="display" cellspacing="0" width="527" border="0">
      <thead >
          <tr>
              <td><strong>ID</strong></td>
              <td><strong>Nombre</strong></td>
              <td><strong>Estado / Pais</strong></td>
              <td><strong>Representante</strong></td>
              <td><strong>Correo</strong></td>
              <td><strong>Tipo</strong></td>
          </tr>
      </thead>
      <tbody>

         <?php  $i=0;?>
      @if(!empty($company))

         @foreach($company as $key => $value)
           <?php  $i++;?>
           <tr >

              <td>{{ $value->id }}</td>
                <td>{{ $value->cliente }}</td>
               <td>{{ $value->estado }} / {{ $value->pais }}</td>
               <td>{{ $value->representante }}</td>
               <td> {{ $value->correo }}</td>
                <td>{{ $compa->tipos($value->tipo) }}</td>
          </tr>
        @endforeach
     @endif
      @if($i==0)
        <tr>
          <td colspan="6" align="center">No se encontraron registros</td>
        </tr>
      @endif
      </tbody>
      <tfoot>
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
