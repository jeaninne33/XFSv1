@extends('layouts.app')
@section('css')
@endsection
@section('contenido')

   <div id="dashboard" class="tab-pane fade in active">
      <h1 class="no-margin skin-color">¡Bienvenido Usuario: {{ Auth::user()->name }} !</h1>
      <p></p>
      <br />
      <div class="row block">
          <div class="col-sm-6 col-md-3">
              <a href="hotel-list-view.html">
                  <div class="fact blue">
                      <div class="numbers counters-box">
                          <dl>
                              <dt class="display-counter" data-value="3200">0</dt>
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
              <a href="flight-list-view.html">
                  <div class="fact yellow">
                      <div class="numbers counters-box">
                          <dl>
                              <dt class="display-counter" data-value="4509">0</dt>
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
              <a href="car-list-view.html">
                  <div class="fact red">
                      <div class="numbers counters-box">
                          <dl>
                              <dt class="display-counter" data-value="3250">0</dt>
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
              <a href="cruise-list-view.html">
                  <div class="fact green">
                      <div class="numbers counters-box">
                          <dl>
                              <dt class="display-counter" data-value="1570">0</dt>
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
      <div class="notification-area">
          <div class="info-box block">
              <span class="close"></span>
              <p>This is your Dashboard, the place to check your Profile, respond to Reservation Requests, view upcoming Trip Information, and much more.</p>
              <br />
              <ul class="circle">
                  <li><span class="skin-color">Learn How It Works</span> — Watch a short video that shows you how Travelo works.</li>
                  <li><span class="skin-color">Get Help</span> — View our help section and FAQs to get started on Travelo. </li>
              </ul>
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
