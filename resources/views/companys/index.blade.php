@extends('principal')

@section('companys')
 <div class="row">
<div class="col-md-11 col-md-offset-1">
  <div class="panel panel-default">

  <div class="panel-heading">Listado de Compañias</div>
  @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="alert" id="mensaje" style="display: none;">
    </div>
  <div class="panel-body">

    <p>
      <a class="btn btn-info" href="{{URL::to('companys/create')}}" role="button">
        Nueva Compañia
      </a>
    </p>

    @include('companys.partials.table')

   </div>
  </div>
</div>
</div>
[[Form::open(['route' => ['companys.destroy', ':COM_ID'], 'method' => 'DELETE','id'=>'form-delete']) ]]

[[Form::close()]]

@endsection
