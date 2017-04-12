@extends('layouts.app')
@section('contenido')
<h1>Mostrando el Servicio: <strong> {{ $servicios->nombre }}</strong></h1>


<div class="row form-group pull-right">
<a class="btn btn-primary" href="{{ route('servicios.index') }}"> Atrás</a>
</div>
     <br/>
     <div class="col-sm-10 no-float no-padding">
      <h5>
         <table border="0" style="with:600px;" class="table table-condensed">
           <tr>
                <td><strong>Nombre:</strong> {{$servicios->nombre}}<br></td>
           </tr>
           <tr>
                <td><strong>Descripción:</strong> {{$servicios->descripcion}}<br></td>
           </tr>
           <tr>

             <td><strong>Precio:</strong> $ {{$servicios->precio}}<br></td>
           </tr>
           <tr>

             <td><strong>Categoria:</strong> {{$servicios->categoria->nombre}}<br></td>
           </tr>
           <tr>

             <td><br></td>
           </tr>

           </table>
</h5>
</div>


@endsection
