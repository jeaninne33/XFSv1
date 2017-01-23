<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('companys') }}">Compañias</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('companys') }}">Ver Todas Compañias</a></li>
        <li><a href="{{ URL::to('companys/create') }}">Crear Compañia</a>
    </ul>
</nav>

<h1>Listado de Comnpañias</h1>
@if ($message = Session::get('success'))
      <div class="alert alert-success">
          <p>{{ $message }}</p>
      </div>
  @endif


  [[Form::model (Request::all(), ['route' => 'companys.index','method' =>'GET','class'=> 'navbar-form navbar-left pull-right', 'role'=>'search'])]]
    <div class="form-group">
      [[Form::text( 'busqueda', null, ['class'=>'form-control', 'placeholder'=>'Busqueda'] )]]

    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  [[ Form::close()]]
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Nombre</td>
            <td>Direccion</td>
            <td>Correo</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($companys as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->nombre }}</td>
            <td>{{ $value->direccion }}</td>
            <td>{{ $value->correo }}</td>

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
   [[ $companys->appends(Request::all())->render() ]]
</div>
</body>
</html>
