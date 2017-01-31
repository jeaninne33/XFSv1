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
    @foreach($servicio as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->nombre }}</td>
            <td>{{ $value->descripcion }}</td>
            <td>{{ $value->categoria->nombre }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
              <a class="glyphicon glyphicon-zoom-in" title="Mostrar" aria-hidden="true" href="{{ URL::to('servicios/' . $value->id) }}"></a>



                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
              <a class="glyphicon glyphicon-pencil" title="Editar" href="{{ URL::to('servicios/' . $value->id . '/edit') }}"></a>

              [[Form::open(['method' => 'DELETE','route' => ['servicios.destroy', $value->id],'style'=>'display:inline']) ]]

              <button type="submit" class="btn btn-default btn-lg">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
              </button>
                        [[Form::close() ]]
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
