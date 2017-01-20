<!-- app/views/nerds/create.blade.php -->

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
        <li><a href="{{ URL::to('companys') }}">Ver Todas</a></li>
        <li><a href="{{ URL::to('companys/create') }}">Agregar Compañia</a>
    </ul>
</nav>

<h1>Agregar Compañia</h1>
<div class="pull-right">
         <a class="btn btn-primary" href="{{ route('companys.index') }}"> Atrás</a>
     </div>
     <br/>

<!-- if there are creation errors, they will show here -->
@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>¡Vaya!</strong> Hubo algunos problemas con su entrada.<br><br>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

[[ Form::open(['route'=>'companys.store', 'method'=> 'POST']) ]]

    <div class="form-group">
      [[ Form::label('nombre', 'Nombre')]]
      [[Form::text('nombre', null, ['class' => 'form-control' , 'required' => 'required'])]]
    </div>

    <div class="form-group">
        [[Form::label('correo', 'Correo') ]]
        [[ Form::email('correo', null, ['class' => 'form-control' , 'required' => 'required']) ]]
    </div>
    <div class="form-group">
        [[Form::label('direccion', 'Dirección') ]]
        [[ Form::text('direccion', null, ['class' => 'form-control' , 'required' => 'required']) ]]
    </div>
    <div class="form-group">
        [[Form::label('website', 'Sitio Web') ]]
        [[ Form::text('website', null, ['class' => 'form-control' ]) ]]
    </div>
    <div class="form-group">
        [[Form::label('representante', 'Representante Legal') ]]
        [[ Form::text('representante', null, ['class' => 'form-control' , 'required' => 'required']) ]]
    </div>
    <div class="form-group">
      [[ Form::label('ciudad', 'Ciudad')]]
        [[ Form::text('ciudad', null, ['class' => 'form-control' , 'required' => 'required']) ]]
        <!--[[ Form::select('nerd_level', array('0' => 'Select a Level', '1' => 'Sees Sunlight', '2' => 'Foosball Fanatic', '3' => 'Basement Dweller'), Input::old('nerd_level'), array('class' => 'form-control')) ]]
-->
    </div>
    <div class="form-group">
        [[Form::label('pais', 'Pais') ]]
        [[ Form::text('pais', null, ['class' => 'form-control' , 'required' => 'required']) ]]
    </div>
    <div class="form-group">
        [[Form::label('codigop', 'Codigo Postal') ]]
        [[ Form::text('codigop', null, ['class' => 'form-control']) ]]
    </div>
    <div class="form-group">
        [[Form::label('telefono', 'Teléfono') ]]
        [[ Form::text('telefono', null, ['class' => 'form-control' , 'required' => 'required']) ]]
    </div>
[[ Form::submit('Agregar Compañia', array('class' => 'btn btn-primary')) ]]
[[ Form::close() ]]

</div>
</body>
</html>
