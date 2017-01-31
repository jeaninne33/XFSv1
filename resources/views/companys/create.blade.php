@extends('layouts.app')

@section('contenido')

<h2>Agregar Compañia</h2>
<p style="color:rgb(235, 160, 162)">Los campos con (*) son Obligatorios</p>

<div class="pull-right">
         <a class="btn btn-primary" href="{{ route('companys.index') }}"> Atrás</a>
</div>


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
<div class="col-sm-9 no-float no-padding">
[[ Form::open(['route'=>'companys.store', 'method'=> 'POST']) ]]
@include('companys.partials.fields')
[[ Form::submit('Agregar Compañia', array('class' => 'btn btn-primary')) ]]
[[ Form::close() ]]

</div>
@endsection
@section('scripts')
<!--scripts necesarios en esta vista -->
  <script>
    $('#pais').on('change',function(e){
      //alert('holaa');
        console.log(e);
        var id=e.target.value;
      $.get('/ajax_estado='+id, function(data){
          console.log(data);
        });

    });
  </script>
@endsection
