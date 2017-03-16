@extends('layouts.app')
@section('css')
@endsection
@section('contenido')
<div id="dashboard" class="tab-pane fade in active">
  <p><h2 ><i class=" icon soap-icon-list circle"></i> Reportes de <strong>XFS</strong></h2>
  </p>   <br />
   <div class="row block">
       <div class="col-sm-6 col-md-3">
           <a href="{{ route('company')  }}">
               <div class="fact blue">
                   <div class="numbers counters-box">
                       <dl>
                           <dt class="display-counter" data-value="3200">{{--$companys--}}</dt>
                            <br/>
                           <dd>Reporte de Compañias</dd>
                       </dl>
                       <i class="icon soap-icon-hotel-1"></i>
                   </div>
                   <div class="description">
                       <i class="icon soap-icon-longarrow-right"></i>
                       <span>Ver Reporte</span>
                   </div>
               </div>
           </a>
       </div>
       <div class="col-sm-6 col-md-3">
           <a href="{{ route('servicios.pdf') }}" target="_blank">
               <div class="fact yellow">
                   <div class="numbers counters-box">
                       <dl>
                           <dt class="display-counter" data-value="4509">{{--$servicios--}}</dt>
                           <br/>
                           <dd>Listado de Servicios</dd>
                       </dl>
                       <i class="icon soap-icon-fueltank"></i>
                   </div>
                   <div class="description">
                       <i class="icon soap-icon-longarrow-right"></i>
                       <span>Ver Reporte</span>
                   </div>
               </div>
           </a>
       </div>
       <div class="col-sm-6 col-md-3">
           <a href="{{ route('estimate') }}">
               <div class="fact red">
                   <div class="numbers counters-box">
                       <dl>
                           <dt class="display-counter" data-value="3250">{{--$estimates--}}</dt>
                           <br/>
                           <dd> Reportes de Estimados</dd>
                       </dl>
                       <i class="icon soap-icon-card"></i>
                   </div>
                   <div class="description">
                       <i class="icon soap-icon-longarrow-right"></i>
                       <span>Ver Reporte</span>
                   </div>
               </div>
           </a>
       </div>
       <div class="col-sm-6 col-md-3">
           <a href="{{ route('invoice') }}">
               <div class="fact green">
                   <div class="numbers counters-box">
                       <dl>
                           <dt class="display-counter" data-value="1570">{{--$invoices--}}</dt>
                           <br/>
                           <dd>     Reportes de Facturas</dd>
                       </dl>
                       <i class="icon soap-icon-stories"></i>
                   </div>
                   <div class="description">
                       <i class="icon soap-icon-longarrow-right"></i>
                       <span>Ver Reporte</span>
                   </div>
               </div>
           </a>
       </div>
   </div>
   <div class="row block">
     <div class="col-sm-6 col-md-3">
     </div>
   <div class="col-sm-7 col-md-5">
       <a href="{{ route('relacion') }}">
           <div class="fact blue">
               <div class="numbers counters-box">
                   <dl>
                       <dt class="display-counter" data-value="3200">{{--$companys--}}</dt>
                       <br/>
                       <dd>Relación entre el Estimado y la Factura</dd>
                   </dl>
                   <i class="icon soap-icon-bag"></i>
               </div>
               <div class="description">
                   <i class="icon soap-icon-longarrow-right"></i>
                   <span>Ver Reporte</span>
               </div>
           </div>
       </a>
   </div>
   </div>
   <hr>
</div>
@endsection
@section('scripts')

<script>
  $('#m6').removeClass('');
  $('#m6').addClass('active');
</script>

@endsection
