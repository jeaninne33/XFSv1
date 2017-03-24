<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <td>ID</td>
            <td>Nombre</td>
            <td>Descripcion</td>
            <td>Categoria</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @if(!$servicio->isEmpty())
    @foreach($servicio as $key => $value)
        <tr  data-id="{{ $value->id }}" class="{{ $value->id }}">
            <td>{{ $value->id }}</td>
            <td>{{ $value->nombre }}</td>
            <td>{{ $value->descripcion }}</td>
            <td>{{ $value->categoria->nombre }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
              <a class="glyphicon glyphicon-zoom-in" title="Mostrar" aria-hidden="true" href="{{ URL::to('servicios/' . $value->id) }}"></a>

                 <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
              <a class="glyphicon glyphicon-pencil" title="Editar" aria-hidden="true" href="{{ URL::to('servicios/'. $value->id .'/edit') }}"></a>

            @if (Auth::user()->type=='admin')
              <a class="btn-delete" title="Eliminar" aria-hidden="true"><i class="glyphicon glyphicon-trash"></i></a>
             @endif
            </td>
        </tr>
    @endforeach
   @endif
    </tbody>
</table>
