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
        <li><a href="{{ URL::to('servicios') }}">Ver Todas</a></li>
        <li><a href="{{ URL::to('servicios/create') }}">Agregar Compañia</a>
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

[[ Form::open(['route'=>'servicios.store', 'method'=> 'POST']) ]]
@include('servicios.partials.fields')
[[ Form::submit('Agregar Compañia', array('class' => 'btn btn-primary')) ]]
[[ Form::close() ]]

</div>
</body>
</html>
<div id="travel-stories" class="tab-pane fade">
  <h2>Share Your Story</h2>
  <div class="col-sm-9 no-float no-padding">
	  <form>
		  <div class="row form-group">
			  <div class="col-sms-6 col-sm-6">
				  <label>Story Title</label>
				  <input type="text" class="input-text full-width">
			  </div>
			  <div class="col-sms-6 col-sm-6">
				  <label>Name</label>
				  <input type="text" class="input-text full-width">
			  </div>
		  </div>
		  <div class="row form-group">
			  <div class="col-sms-6 col-sm-6">
				  <label>Select Miles</label>
				  <div class="selector full-width">
					  <select>
						  <option>4,528 Miles</option>
						  <option>5,218 Miles</option>
					  </select>
				  </div>
			  </div>
			  <div class="col-sms-6 col-sm-6">
				  <label>Email Address</label>
				  <input type="text" class="input-text full-width">
			  </div>
		  </div>
		  <div class="row form-group">
			  <div class="col-sms-6 col-sm-6">
				  <label>Select Category</label>
				  <div class="selector full-width">
					  <select>
						  <option value="">Adventure, Romance, Beach</option>
					  </select>
				  </div>
			  </div>
		  </div>
		  <div class="form-group">
			  <label>Type Your Story</label>
			  <textarea rows="6" class="input-text full-width" placeholder="please tell us about you"></textarea>
		  </div>
		  <hr>
		  <div class="form-group">
			  <h4>Do you have photos to share? <small>(Optional)</small> </h4>
			  <div class="fileinput col-sm-6 no-float no-padding">
				  <input type="file" class="input-text" data-placeholder="select image/s" />
			  </div>
		  </div>
		  <div class="form-group">
			  <h4>Share with friends <small>(Optional)</small></h4>
			  <p>Share your review with your friends on different social media networks.</p>
			  <ul class="social-icons icon-circle clearfix">
				  <li class="twitter"><a title="Twitter" href="#" data-toggle="tooltip"><i class="soap-icon-twitter"></i></a></li>
				  <li class="facebook"><a title="Facebook" href="#" data-toggle="tooltip"><i class="soap-icon-facebook"></i></a></li>
				  <li class="googleplus"><a title="GooglePlus" href="#" data-toggle="tooltip"><i class="soap-icon-googleplus"></i></a></li>
				  <li class="pinterest"><a title="Pinterest" href="#" data-toggle="tooltip"><i class="soap-icon-pinterest"></i></a></li>
			  </ul>
		  </div>
		  <br>
		  <div class="form-group col-sm-5 col-md-4 no-float no-padding no-margin">
			  <button type="submit" class="btn-medium full-width">SUBMIT REVIEW</button>
		  </div>
	  </form>
  </div>
</div>
