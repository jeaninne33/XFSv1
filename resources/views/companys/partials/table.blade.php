<table class="table table-striped">
    <thead>
        <tr>
            <td>ID</td>
            <td>Nombre</td>
            <td>Direccion</td>
            <td>Tipo de Relacion</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($companys as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->nombre }}</td>
            <td>{{ $value->direccion }}</td>
            <td>{{ $value->relacion }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('companys/' . $value->id) }}">Mostrar</a>

                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('companys/' . $value->id . '/edit') }}">Editar</a>
              [[Form::open(['method' => 'DELETE','route' => ['companys.destroy', $value->id],'style'=>'display:inline']) ]]
                         [[Form::submit('Delete', ['class' => 'btn btn-danger'])]]
                        [[Form::close() ]]
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
