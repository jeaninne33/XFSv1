<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    
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
      <h2>Listado de Servicios de Xflight Support</h2>

  </div>

  <table class="display" cellspacing="0" width="527" border="0">
      <thead >
          <tr>
              <td><strong>ID</strong></td>
              <td><strong>Nombre</strong></td>
              <td><strong>Descripción</strong></td>
              <td><strong>Categoria</strong></td>
          </tr>
      </thead>
      <tbody>

         <?php  $i=0;?>
        @if(!$servicio->isEmpty())

         @foreach($servicio as $key => $value)
           <?php  $i++;?>
           <tr >

              <td>{{ $value->id }}</td>
                <td>{{ $value->nombre }}</td>
               <td>{{$value->descripcion  }}</td>
               <td>{{ $value->categoria->nombre }}</td>
          </tr>
        @endforeach
      @else
        <tr>
          <td colspan="4" align="center">No se encontraron registros</td>
        </tr>
      @endif
      </tbody>
      <tfoot>
        <tr>
          <td colspan="4"></td>
        </tr>
        <tr>
          <td colspan="4" align="left"><strong>Total Servicios: {{$i}}</strong></td>
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
