  <table id="example" class="display" cellspacing="0" width="100%">
      <thead>
          <tr>
              <td data-field="ID">ID</td>
              <td data-field="Company">Compañia</td>
              <td data-field="Pais">País</td>
              <td data-field="celular">Celular</td>
              <td data-field="telefono">Telefono</td>
              <td data-field="correo">Correo</td>
              <td data-field="tipo">tipo</td>
              <td data-field="categoria">categoria</td>

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
