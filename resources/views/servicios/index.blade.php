<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <!-- Main Style -->
    <link id="main-style" rel="stylesheet" href="assets/css/style-sky-blue.css">

    <!-- Updated Styles -->
    <link rel="stylesheet" href="assets/css/updates.css">

    <!-- Responsive Styles -->
    <link rel="stylesheet" href="assets/css/responsive.css">
        <link href="dist/sweetalert.css" rel="stylesheet" />
</head>
<body>

<div class="row">
  <div class="col-md-8 col-md-offset-1">
    <div class="panel panel-default">

    <div class="panel-heading">Listado de Comnpañias</div>
    @if ($message = Session::get('success'))
          <div class="alert alert-success">
              <p>{{ $message }}</p>
          </div>
      @endif

    <div class="panel-body">
      [[Form::model (Request::all(), ['route' => 'servicios.index','method' =>'GET','class'=> 'navbar-form navbar-left pull-right', 'role'=>'search'])]]
        <div class="form-group">
            {{-- [[Form::text( 'busqueda', null, ['class'=>'form-control', 'placeholder'=>'Busqueda'] )]] --}}
            {{-- [[Form::select( 'relacion', config('options.relacion'), null, ['class'=>'form-control'] )]] --}}
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      [[ Form::close()]]
      <p>
        <a class="btn btn-info" href="{{URL::to('servicios/create')}}" role="button">
          Nueva Compañia
        </a>
      </p>

      @include('servicios.partials.table')

     </div>
    </div>
  </div>
</div>

</body>
</html>
