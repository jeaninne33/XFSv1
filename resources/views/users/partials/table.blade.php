<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
      <tr>
          <td>ID</td>
          <td>Nombre</td>
          <td>Correo</td>
          <td>Tipo</td>
          <td>Acciones</td>
      </tr>
  </thead>
  <tbody>
  @if(!$users->isEmpty())
   @foreach($users as $key => $value)
     <tr data-id="{{ $value->id }}" class="{{ $value->id }}">
        <td>{{ $value->id }}</td>
         <td>{{ $value->name}}</td>
         <td>{{ $value->email }}</td>
         <td>{{ $value->tipo($value->type) }}</td>
         <!-- we will also add show, edit, and delete buttons -->
         <td>
             <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
           <a class="glyphicon glyphicon-zoom-in" title="Mostrar" aria-hidden="true" href="{{ URL::to('users/' . $value->id) }}"></a>
              <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
           <a class="glyphicon glyphicon-pencil" title="Editar" aria-hidden="true" href="{{ URL::to('users/'. $value->id .'/edit') }}"></a>
             <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
           <a class="btn-delete" title="Eliminar" aria-hidden="true"><i class="glyphicon glyphicon-trash"></i></a>

         </td>
        </tr>
    @endforeach
   @endif
    </tbody>
</table>
