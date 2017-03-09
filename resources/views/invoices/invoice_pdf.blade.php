<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Example 2</title>

  </head>
  <body>

    <main>
      <div id="details" class="clearfix">
        <div id="invoice">
          <h1>INVOICE {{ $invoice[0]->id }}</h1>
          <div class="date">Date of Invoice: {{ $date }}</div>
        </div>
      </div>
      <table id="example" class="display" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <td>Servicio</td>
                  <td>Descripcion</td>
                  <td>Fecha Servicio</td>
                  <td>Cantidad</td>
                  <td>Precio</td>
                  <td>Subtotal</td>
              </tr>
          </thead>
          <tbody>
            @if(!$items->isEmpty())
             @foreach($items as $key => $value)
               <tr >
                  <td>{{ $value->servicio->nombre }}</td>
                    <td>{{ $value->descripcion }}</td>
                   <td>{{ $value->fecha_servicio }}</td>
                   <td>{{ $value->cantidad }}</td>
                   <td>{{ $value->subtotal_recarga }}</td>
                   <td>{{ $value->total }}</td>

                   <!-- we will also add show, edit, and delete buttons -->

              </tr>
            @endforeach
          @endif
          </tbody>
      </table>
  </body>
</html>
