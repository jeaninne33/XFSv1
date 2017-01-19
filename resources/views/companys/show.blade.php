<!-- app/views/nerds/show.blade.php -->

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

<h1>Showing {{ $companys->nombre }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $companys->nombre  }}</h2>
        <p>
            <strong>Correo:</strong> {{ $companys->correo }}<br>
            <strong>Dirección:</strong> {{ $companys->direccion }}
        </p>
    </div>

</div>
</body>
</html>
