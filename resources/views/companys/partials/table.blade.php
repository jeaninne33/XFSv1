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
              <a class="glyphicon glyphicon-zoom-in" title="Mostrar" aria-hidden="true" href="{{ URL::to('companys/' . $value->id) }}"></a>

                 <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
              <a class="glyphicon glyphicon-pencil" title="Editar" aria-hidden="true" href="{{ URL::to('companys/'. $value->id .'/edit') }}"></a>  
  
                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
            [[Form::open(['route' => ['companys.destroy', $value->id], 'method' => 'DELETE', 'style'=>'display:inline', 'name' => 'post_' . md5($value->id . $value->created_at)])]]
              <a href="javascript:void(0)" title="delete" onclick="if (confirm('Are you sure?')) { document.post_<?= md5($value->id . $value->created_at) ?>.submit(); } event.returnValue = false; return false;">
                  <span class="glyphicon glyphicon-trash"></span>
              </a>
             [[Form::close()]]
              <!--  <a href="javascript:deleteUser(' $value->id }}');" class="glyphicon glyphicon-trash" title="Eliminar"></a>
            <a class="glyphicon glyphicon-trash" title="Eliminar" href="  route(['comp~~~~~~~~~~~\~^^~~~~~~~~~~~~~~~~~~~~~anys.destroy', $value->id]) }}"></a>

              [[Form::open(['method' => 'DELETE','route' => ['companys.destroy', $value->id],'style'=>'display:inline']) ]]

              <button type="submit" class="btn btn-default btn-lg">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
              </button>
                        [[Form::close() ]]-->
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
