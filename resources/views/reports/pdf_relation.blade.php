<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Xfligth Support</title>
    <link rel="stylesheet" href="assets/css/print_pdf.css">
  </head>

<body>
    <div class="header">
      <img style=" margin-top:-90px; margin-left:-5px;  height:67px;width:200px;  position:absolute;" src="assets/images/pdf/header.png" >
      <img style=" margin-top:-85px; margin-left:795px  height:67px;width:250px;  position:absolute;" src="assets/images/pdf/fecha invoice.png" >
    </div>


{{-- var_dump($datos_e[0]->nombre)--}}
<div class="contenido" >
  <div class="cintillo">
    <h2>Reporte de Relación entre el Estimado y la Factura, desde {{date_format(date_create( $desde), 'm/d/Y')}} hasta {{date_format(date_create( $hasta), 'm/d/Y')}}</h2>
        <h3>{{$titu}}</h3>
  </div>

  <table class="display" cellspacing="0" width="99.3%" border="0">
      <thead >
          <tr>
              <td><strong>Id Est.</strong></td>
              <td><strong>Fecha Fact.</strong></td>
              <td><strong>Matricula</strong></td>
              <td><strong>FBO</strong></td>
              <td><strong>Compañia</strong></td>
              <td><strong>Proveedor</strong></td>
              <td><strong>Servicio</strong></td>
              <td><strong>Cantidad Est.</strong></td>
              <td><strong>Precio BasF</strong></td>
              <td><strong>Costo BasF</strong></td>
              <td><strong>Cantidad Fact.</strong></td>
              <td><strong>Precio XFS</strong></td>
              <td><strong>Costo XFS</strong></td>
              <td><strong>Diferencia</strong></td>
          </tr>
      </thead>
      <tbody>

        <?php  $j=0;?>
       @if(!empty($report))
          @foreach($report as $key => $val)
            <?php  $k=0;?>
              <?php  $i=0;?>
              <?php  $cant_e=count($datos_e);?>
              @foreach($datos_in as $key => $value)
              <?php  $i++;?>
              <tr >

                 <td>{{ $val->id_estimate }}</td>
                   <td>{{ date_format(date_create( $val->fecha ), 'm/d/Y')}}</td>
                  <td>{{$val->matricula  }}</td>
                  <td>{{  $val->fbo }}</td>
                  <td>{{ $val->cliente}}</td>
                  <td>{{ $val->prove }}</td>
                  <td>{{$value->nombre}}</td>
                  <td>
                    {{var_dump(($cant_e<=$k++) )}}
                    <br/>
                    {{var_dump(($cant_e) )}}
                      <br/>
                      {{var_dump(($k++) )}}
                      <br/>
                      {{var_dump(($k) )}}
                        <br/>
                    @if(($cant_e<=$k++) && ($k==($i--)))
                          {{$datos_e[$k]->cant_basf}}
                    @else
                        0
                    @endif


                  </td>
                  <td>
                      {{--$datos_in[$j]->precio_basf--}}
                  </td>
                  <td></td>
                  <td>{{$value->cant_xfs}}</td>
                  <td>${{$value->precio_xfs}}</td>
                  <td>${{$value->costo_xfs}}</td>
                  <td></td>

             </tr>
               <?php  $k++;?>
           @endforeach
      @endforeach
    @else
      <tr>
        <td colspan="13" align="center">No se encontraron registros</td>
      </tr>
    @endif
    </tbody>
    <tfoot>
      <tr bgcolor="#A9A9A9">
        <td colspan="7">TOTAL</td>
      <td ></td>
      <td ></td>
      <td ></td>
      <td ></td>
      <td ></td>
      <td ></td>
      <td ></td>
      </tr>
      <tr>
        <td colspan="13" align="left"><strong>Total Resultados: {{$i}}</strong></td>
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
