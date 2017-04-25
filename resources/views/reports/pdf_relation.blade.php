<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    
    <title>Xfligth Support</title>
    <link rel="stylesheet" href="{{asset("assets/css/print_pdf.css") }}">
  </head>

<body>
    <div class="header">
      <img style=" margin-top:-90px; margin-left:-5px;  height:67px;width:200px;  position:absolute;" src="{{asset("assets/images/pdf/header.png") }}" >
      <img style=" margin-top:-85px; margin-left:795px  height:67px;width:250px;  position:absolute;" src="{{asset("assets/images/pdf/fecha_invoice.png") }}" >
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
              <td><strong>Id Est. / Id Inv.</strong></td>
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

        <?php   $i=0;?>
       @if(!empty($report))
         <?php  $acum_cant_b=0;?>
         <?php  $acum_precio_b=0;?>
         <?php  $acum_precio_x=0;?>
         <?php  $acum_cant_x=0;?>
          <?php $acum_costo_b=0;?>
         <?php  $acum_costo_x=0;?>
         <?php  $acum_dif=0;?>
          @foreach($report as $key => $val)
            <?php
              $k=0;
              $id_e=$val->id_estimate;
              $id_in=$val->id_invoice;
              $datos_e=DB::select(DB::raw(
              "SELECT
               subtotal_recarga as precio_basf,
                cantidad as cant_basf,
                total as costo_basf,
                servicio_id,
                nombre,
                dates_estimates.id
               from dates_estimates, servicios
               where estimate_id='$id_e' and servicios.id=servicio_id;"));
               $cant_e=count($datos_e);
              $datos_in=DB::select(DB::raw(
              "SELECT
                subtotal_recarga as precio_xfs,
                cantidad as cant_xfs,
                total as costo_xfs,
                servicio_id,
                nombre, dates_invoices.id, date_estimate_id
               from dates_invoices ,servicios
               where invoice_id='$id_in' and servicios.id=servicio_id $servicio;"));//'datos_in','datos_e'?>

          @if(!empty($datos_in))
             @foreach($datos_in as $key => $value)
             <?php  $i++;?>
             <?php  $costo_b=0;?>
             <tr >
                <td>{{ $val->id_estimate }} / {{$val->id_invoice}}</td>
                  <td>{{ date_format(date_create( $val->fecha ), 'm/d/Y')}}</td>
                 <td>{{$val->matricula  }}</td>
                 <td>{{ $val->fbo }}</td>
                 <td>{{ $val->cliente}}</td>
                 <td>{{ $val->prove }}</td>
                 <td>{{$value->nombre}}</td>
                 <td>
                @if(!empty($value->date_estimate_id))
                  @foreach($datos_e as $key => $de)
                     @if($de->id==$value->date_estimate_id)
                        {{$de->cant_basf}}
                         <?php  $acum_cant_b+=$de->cant_basf;?>
                       @endif
                  @endforeach
                @else
                   0
                @endif
                 </td>
                 <td>
                   @if(!empty($value->date_estimate_id))
                     @foreach($datos_e as $key => $de)
                        @if($de->id==$value->date_estimate_id)
                           $ {{$de->precio_basf}}
                            <?php  $acum_precio_b+=$de->precio_basf;?>
                          @endif
                     @endforeach
                   @else
                      0
                   @endif
                 </td>
                 <td>
                   @if(!empty($value->date_estimate_id))
                     @foreach($datos_e as $key => $de)
                        @if($de->id==$value->date_estimate_id)
                           $ {{$de->costo_basf}}
                            <?php  $acum_costo_b+=$de->costo_basf;?>
                            <?php  $costo_b=$de->costo_basf;?>
                          @endif
                     @endforeach
                   @else
                      0
                   @endif
                 </td>
                 <td>{{$value->cant_xfs}}
                     <?php  $acum_cant_x+=$value->cant_xfs;?>
                 </td>
                 <td>$ {{$value->precio_xfs}}
                   <?php  $acum_precio_x+=$value->precio_xfs;?>
                 </td>
                 <td>$ {{$value->costo_xfs}}
                   <?php  $acum_costo_x+=$value->costo_xfs;?>
                 </td>
                 <td>$ {{$costo_b-($value->costo_xfs)}}
                      <?php  $acum_dif+=$costo_b-($value->costo_xfs);?>
                 </td>

            </tr>
              <?php  $k++;?>
          @endforeach
        @else
          <tr>
            <td colspan="13" align="center">No se encontraron registros</td>
          </tr>
       @endif
      @endforeach
    @else
      <tr>
        <td colspan="13" align="center">No se encontraron registros</td>
      </tr>
    @endif
    </tbody>
    <tfoot>
      @if(!empty($datos_in))
          <tr bgcolor="#A9A9A9">
            <td colspan="7">TOTAL</td>
          <td >{{ $acum_cant_b}}</td>
          <td >$ {{$acum_precio_b}}</td>
          <td >$ {{$acum_costo_b}}</td>
          <td >{{$acum_cant_x}}</td>
          <td >$ {{$acum_precio_x}}</td>
          <td >$ {{$acum_costo_x}}</td>
          <td >$ {{$acum_dif}}</td>
          </tr>
      @endif
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
