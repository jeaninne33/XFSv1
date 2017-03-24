@extends('layouts.app')
@section('css')
@endsection
@section('contenido')
   <div id="dashboard" class="tab-pane fade in active">
      <h1 class="no-margin skin-color">¡Bienvenid@ <strong> {{ strtoupper(Auth::user()->name) }} </strong>!</h1>
      <p><h3 ><i class="soap-icon-user circle"></i> Nivel de Usuario: <strong> {{$user->tipo(Auth::user()->type)}}</strong> </h3>
        <p><h2 ><i class=" soap-icon-plane"></i> <strong>Intranet de Xfligth Support </strong> <i class=" soap-icon-plane-right"></i></h2>
    </p>
      <br />
      <div class="row block">
          <div class="col-sm-6 col-md-3">
              <a href="{{ route('companys.index') }}">
                  <div class="fact blue">
                      <div class="numbers counters-box">
                          <dl>
                              <dt class="display-counter" data-value="3200">{{$companys}}</dt>
                              <dd>Compañias</dd>
                          </dl>
                          <i class="icon soap-icon-hotel-1"></i>
                      </div>
                      <div class="description">
                          <i class="icon soap-icon-longarrow-right"></i>
                          <span>Ver Compañias</span>
                      </div>
                  </div>
              </a>
          </div>
          <div class="col-sm-6 col-md-3">
              <a href="{{ route('servicios.index') }}">
                  <div class="fact yellow">
                      <div class="numbers counters-box">
                          <dl>
                              <dt class="display-counter" data-value="4509">{{$servicios}}</dt>
                              <dd>Servicios</dd>
                          </dl>
                          <i class="icon soap-icon-fueltank"></i>
                      </div>
                      <div class="description">
                          <i class="icon soap-icon-longarrow-right"></i>
                          <span>Ver Servicios</span>
                      </div>
                  </div>
              </a>
          </div>
          <div class="col-sm-6 col-md-3">
              <a href="{{ route('estimates.index') }}">
                  <div class="fact red">
                      <div class="numbers counters-box">
                          <dl>
                              <dt class="display-counter" data-value="3250">{{$estimates}}</dt>
                              <dd>Estimados</dd>
                          </dl>
                          <i class="icon soap-icon-card"></i>
                      </div>
                      <div class="description">
                          <i class="icon soap-icon-longarrow-right"></i>
                          <span>Ver Estimados</span>
                      </div>
                  </div>
              </a>
          </div>
          <div class="col-sm-6 col-md-3">
              <a href="{{ route('invoices.index') }}">
                  <div class="fact green">
                      <div class="numbers counters-box">
                          <dl>
                              <dt class="display-counter" data-value="1570">{{$invoices}}</dt>
                              <dd>Facturas</dd>
                          </dl>
                          <i class="icon soap-icon-stories"></i>
                      </div>
                      <div class="description">
                          <i class="icon soap-icon-longarrow-right"></i>
                          <span>Ver Facturas</span>
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
  $('#m1').removeClass('');
  $('#m1').addClass('active');
</script>

@endsection
