<!-- app/views/nerds/edit.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">

      <div class="panel-heading">Editar Compañia {{ $companys->nombre }}</div>


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

   [[Form::model($companys, array('route' => array('companys.update', $companys->id), 'method' => 'PUT'))]]
    @include('companys.partials.fields')
  [[ Form::submit('Editar Compañia', array('class' => 'btn btn-primary')) ]]
  [[ Form::close() ]]
      </div>
    </div>
  </div>
</div>
</body>
</html>
