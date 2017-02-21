<h1>Agregar Usuario</h1>
<div class="pull-right">
         <a class="btn btn-primary" href="{{ route('servicios.index') }}"> Atrás</a>
     </div>
     <p style="color:rgb(235, 160, 162)">Los campos con (*) son Obligatorios</p>

     <br/>
     <br/>
  @include('errors.errors')
<div class="col-sm-12 no-float no-padding">
[[ Form::open(['route'=>'servicios.store', 'method'=> 'POST']) ]]
@include('servicios.partials.fields')
[[ Form::submit('Agregar Servicio', array('class' => 'btn btn-primary')) ]]
[[ Form::close() ]]
</div>
@extends('xfs')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Regístrate</div>
				<div class="panel-body">
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

					<form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
						
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Regístrate
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
