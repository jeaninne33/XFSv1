@extends('layouts.app')
@section('css')
@endsection
@section('contenido')
<br/>
<!-- if there are creation errors, they will show here -->
@include('errors.errors')
<div class="col-sm-12 no-float no-padding" ng-controller="FuelreleaseCtrl">
  <h2>INFORMATION OF THE FUEL RELEASE
  </h2>
{{-- URL::previous() --}}
  <div class="pull-right">
    <a class="btn btn-primary" href="{{URL::to('estimates/' . $fuel[0]->estimate_id) }}"> Atrás</a>
  </div>
  <div class="pull-right col-sm-5">
      <a class="btn btn-primary soap-icon-card" href="{{URL::to('fuelreleases/'.$fuel[0]->id.'/edit')}}">  Editar Fuel Release</a>
      <a class="btn btn-primary soap-icon-list" target="_blank" href="{{URL::to('printfuelreleases/'.$fuel[0]->id)}}"><i class=""></i>  Imprimir</a>
  </div>
      <!-- if there are creation errors, they will show here -->

      <p>  <strong><label>Estimate Number: {{$fuel[0]->estimate_id}}</label></strong>

 {{-- [[ Form::submit('Editar Estimado', array('class' => 'btn btn-primary')) ]] --}}
 <div class="row">
  <h5>
     <table border="0" style="with:600px;" class="table table-condensed">
       <tr>
         <td><strong>Ref Info #:</strong> {{ $fuel[0]->ref }}<br></td>
         <td><strong>To:</strong> {{ $fuel[0]->cliente }}<br></td>
         <td><strong>From:</strong> XFlight Support<br></td>
       </tr>
       <tr>
         <td><strong>Request Date:</strong>{{ date_format(date_create( $fuel[0]->date), 'm/d/Y') }}<br></td>
         <td colspan="2"><strong>Release Ref#:</strong> {{  $fuel[0]->cf_card }}<br></td>
       </tr>
      <tr>
         <td colspan="3"><br><br><strong>We hereby confirm the following fuel release, valid for 72 hours</strong><br> <br></td>
      </tr>
        <tr>
          <td><strong>Airport Code/Name #:</strong> {{ $fuel[0]->localidad }}<br></td>
          <td><strong>Supplier:</strong> {{ $fuel[0]->prove }}<br></td>
          <td><strong>FBO:</strong> {{ $fuel[0]->fbo }}<br></td>
   </tr>
   <tr>
       <td><strong>Handling Agent:</strong> {{ $fuel[0]->handling }}<br></td>
       <td><strong>Into Plane:</strong> {{ $fuel[0]->into_plane }}<br></td>
       <td><strong>Into-Plane Phone Number:</strong> {{ $fuel[0]->into_plane_phone }}<br></td>
      </tr>
       <tr>
         <td><strong>Aircraft Registrarion #:</strong> {{ $fuel[0]->matricula }}<br></td>
         <td><strong>Operator:</strong> {{ $fuel[0]->operator }}<br></td>
         <td><strong>Aircraft Type:</strong> {{ $fuel[0]->tipo }}<br></td>
       </tr>
       <tr>
         <td><strong>Fight Number #:</strong> {{ $fuel[0]->flight_number }}<br></td>
         <td><strong>ETA:</strong> {{  date_format(date_create($fuel[0]->eta), 'm/d/Y h:m:s') }}<br></td>
         <td><strong>ETD:</strong> {{date_format(date_create($fuel[0]->etd), 'm/d/Y  h:m:s')  }}<br></td>
      </tr>
      <tr>
        <td><strong>Flight Purpose:</strong> {{ $fuel[0]->flight_purpose }}<br></td>
        <td colspan="2"><strong>Quantity:</strong> {{ $fuel[0]->qty }}<br></td>

     </tr>
     <tr>

       <td colspan="3"></td>

    </tr>
    </table>
 </h5>
 </div>

</div>

@endsection
@section('scripts')

<script>
$('#m4').removeClass('');
$('#m4').addClass('active');
</script>

@endsection
