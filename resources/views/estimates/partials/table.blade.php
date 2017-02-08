
<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <td>ID</td>
            <td>Nombre</td>
            <td>Direccion</td>
            <td>Tipo</td>
            <td>Aciones</td>
        </tr>
    </thead>
    <tbody>
    @foreach($estimates as $key => $value)
        <tr data-id="{{$value->id}}">
            <td>{{ $value->fbo }}</td>
            <td>{{ $value->fecha_soli }}</td>
            <td>{{ $value->localidad }}</td>
            <td>{{ $value->metodo_segui }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
              <a class="glyphicon glyphicon-zoom-in" title="Mostrar" aria-hidden="true" href="{{ URL::to('estimates/' . $value->id) }}"></a>

                 <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
              <a class="glyphicon glyphicon-pencil" title="Editar" aria-hidden="true" href="{{ URL::to('estimates/'. $value->id .'/edit') }}"></a>

                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
              <a class="btn-delete" title="Eliminar" aria-hidden="true" href="#!"><span class="glyphicon glyphicon-trash"></span></a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
