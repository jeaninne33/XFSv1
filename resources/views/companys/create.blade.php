@extends('principal')

@section('creates')
    @parent
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
@include('companys.partials.fields')
[[ Form::submit('Agregar Compañia', array('class' => 'btn btn-primary')) ]]
[[ Form::close() ]]

</div>
@endsection
@section('scripts')
<!--scripts necesarios en esta vista -->
  <script>
    tjq('#pais').on('change',function(e){
        console.log(e);
        var id=e.target.value;
        tjq.get('/ajax_estado='+id, function(data){
          console.log(data);
        });

    });
  </script>
@endsection
