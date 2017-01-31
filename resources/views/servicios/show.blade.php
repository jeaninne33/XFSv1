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
      <a class="navbar-brand" href="{{ URL::to('servicios') }}">Compañias</a>
  </div>
  <ul class="nav navbar-nav">
      <li><a href="{{ URL::to('servicios') }}">Ver Todas Compañias</a></li>
      <li><a href="{{ URL::to('servicios/create') }}">Crear Compañia</a>
    </ul>
</nav>

<h1>Showing {{ $servicios->nombre }}</h1>
<div class="pull-right">
         <a class="btn btn-primary" href="{{ route('servicios.index') }}"> Atrás</a>
     </div>
     <br/>

    <div class="jumbotron text-center">
        <h2>{{ $servicios->nombre  }}</h2>
        <p>
            <strong>Correo:</strong> {{ $servicios->correo }}<br>
            <strong>Dirección:</strong> {{ $servicios->direccion }}
        </p>
    </div>

</div>
</body>
</html>
