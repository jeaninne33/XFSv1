@extends('layouts.app')
@section('contenido')
<h1>Servicio <strong> {{ $servicios->nombre }}</strong></h1>


<div class="row form-group pull-right">
<a class="btn btn-primary" href="{{ route('servicios.index') }}"> Atrás</a>
</div>
<br/>
     <br/>
<div class="col-sm-12 no-float no-padding">
     <div class="row form-group">
       <div class="col-sms-6 col-sm-6">
         [[ Form::label('nombre', 'Nombre')]]
         [[Form::text('nombre', $servicios->nombre, ['class' => 'input-text full-width' , 'required' => 'required','readonly'=>'readonly'])]]
       </div>

       <div class="col-sms-6 col-sm-6">
           [[Form::label('descripcion', 'Descripción') ]]
           [[ Form::text('descripcion', $servicios->descripcion, ['class' => 'input-text full-width' , 'required' => 'required','readonly']) ]]
       </div>
     </div>
     <div class="row form-group">
       <div class="col-sms-6 col-sm-6">
         [[ Form::label('categoria_id', 'Categoria')]]
         [[ Form::select('categoria_id', $categorias, null, array('class' => 'input-text full-width','readonly')) ]]

       </div>
     </div>
</div>
    {{-- <div class="jumbotron text-center">
        <h2>{{ $servicios->nombre  }}</h2>
        <p>
            <strong>Descripcion:</strong> {{ $servicios->descripcion }}<br>
            <strong>Categoria:</strong> {{ $servicios->categoria->nombre }}
        </p>
    </div> --}}


@endsection
