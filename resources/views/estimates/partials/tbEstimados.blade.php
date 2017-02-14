  <table id="example1" class="display" cellspacing="0" width="100%">
      <thead>
          <tr>
              <td data-field="Servicio">Servicio</td>
              <td data-field="Descripcion">Descripcion</td>
              <td data-field="Cantidad">Cantidad</td>
              <td data-field="Precio">Precio</td>
              <td data-field="subtotal">SubTotal</td>
              <td data-field="subtotal">Ganancia</td>
              <td data-field="subtotal">Total</td>
              {{-- <td>Aciones</td> --}}
          </tr>
      </thead>
      <tbody id="datos">
      {{-- @foreach($companys as $key => $value)
          <tr data-id="{{$value->id}}" ondblclick="tbClientes({{$value->id}})">
              <td>{{ $value->id }}</td>
              <td>{{ $value->nombre }}</td>
              <td>{{ $value->pais->nombre }}</td>
              <td>{{ $value->tipo }}</td>
              <td hidden>{{ $value->celular }}</td>
              <td hidden>{{ $value->telefono }}</td>

          </tr>
      @endforeach --}}
      </tbody>
  </table>
