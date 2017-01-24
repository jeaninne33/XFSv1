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

    <div class="panel-heading">Listado de Comnpañias</div>
    @if ($message = Session::get('success'))
          <div class="alert alert-success">
              <p>{{ $message }}</p>
          </div>
      @endif

    <div class="panel-body">
      [[Form::model (Request::all(), ['route' => 'companys.index','method' =>'GET','class'=> 'navbar-form navbar-left pull-right', 'role'=>'search'])]]
        <div class="form-group">
            [[Form::text( 'busqueda', null, ['class'=>'form-control', 'placeholder'=>'Busqueda'] )]]
            [[Form::select( 'relacion', config('options.relacion'), null, ['class'=>'form-control'] )]]
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      [[ Form::close()]]
      <p>
        <a class="btn btn-info" href="{{URL::to('companys/create')}}" role="button">
          Nueva Compañia
        </a>
      </p>
      <p>{{$companys->total()}} compañias</p>
      @include('companys.partials.table')
       [[ $companys->appends(Request::all())->render() ]]
     </div>
    </div>
  </div>
</div>
</body>
</html>
