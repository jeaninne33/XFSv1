  <table id="example1" class="display" cellspacing="0" width="100%">
      <thead>
          <tr>
              <td data-field="ID">ID</td>
              <td data-field="Company">Compañia</td>
              <td data-field="Pais">País</td>
              <td data-field="Tipo">Tipo de Cliente</td>
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
