<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <td>ID</td>
            <td>Nombre</td>
            <td>Correo</td>
            <td>Pais</td>
            <td>Tipo</td>
            <td>Aciones</td>
        </tr>
    </thead>
    <tbody>
    @foreach($companys as $key => $value)
        <tr data-id="{{$value->id}}">
            <td>{{ $value->id }}</td>
            <td>{{ $value->nombre }}</td>
            <td>{{ $value->correo }}</td>
            <td>{{ $value->pais->nombre }}</td>
            <td>{{ $value->tipo }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
              <a class="glyphicon glyphicon-zoom-in" title="Mostrar" aria-hidden="true" href="{{ URL::to('companys/' . $value->id) }}"></a>

                 <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
              <a class="glyphicon glyphicon-pencil" title="Editar" aria-hidden="true" href="{{ URL::to('companys/'. $value->id .'/edit') }}"></a>

                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
              <a class="btn-delete" title="Eliminar" aria-hidden="true" href="#!"><span class="glyphicon glyphicon-trash"></span></a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
