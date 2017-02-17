@extends('layout')
@section('content')
  <div id="slideshow">
      <div class="fullwidthbanner-container">
          <div class="revolution-slider rev_slider" style="height: 0; overflow: hidden;">
              <ul>    <!-- SLIDE  -->
                  <!-- Slide1 -->
                  <li data-transition="slidedown" data-slotamount="5" data-masterspeed="1000">
                      <!-- MAIN IMAGE -->
                      <img src="{{ asset("assets/images/XfligthSupport_Rampa_G550.png") }}" alt="xflightsupport rampa g550"/>
                  </li>

                  <!-- Slide2 -->
                  <li data-transition="slidedown" data-slotamount="7" data-masterspeed="1000">
                      <!-- MAIN IMAGE -->
                      <img src="{{ asset("assets/images/XfligthSupport_RampaG550.png") }}" alt="xflightsupport rampa g550"/>
                  </li>

                  <!-- Slide3 -->
                  <li data-transition="slidedown" data-slotamount="7" data-masterspeed="1000">
                      <!-- MAIN IMAGE -->
                      <img src="{{ asset("assets/images/XfligthSupport_RampaG550.png") }}" alt="xflightsupport rampa G550"/>
                  </li>
              </ul>
          </div>
      </div>
  </div>

      <section id="content">
          <div class="large-block image-box style6">
                  <article class="box">
                      <figure class="col-md-5">
                          <a  title="" class="middle-block"><img class="middle-item" src="{{ asset("assets/images/XfligthSuppor_PRIVATE_JET_CHARTER.png") }}" alt="XFLIGHTSUPPORT QUIENES SOMOS" width="476" height="318" /></a>
                      </figure>
                      <div class="details col-md-offset-5">
                          <h4 class="box-title"><strong>QUIENES SOMOS</strong></h4>
                          <p style="text-align:justify;">

                      Xflight Support nace por la necesidad de atender la demanda de aviación general existente a nivel mundial, nos dedicamos a ofrecer
                      soluciones aéreas y a prestar servicios integrales gestionando cada detalle antes y después del aterrizaje,
                      especializados en el suministro de combustible, seguridad, alojamiento, traslados, permiso de vuelo y sobre vuelo,
                      planificación, soporte de navegación, tramites de impuesto y servicios meteorológicos adaptándonos a sus necesidades,
                      Contamos con un equipo de trabajo dinámico y calificado dispuesto a responder eficientemente a cualquier solicitud que se
                      presente al momento de coordinar su viaje. <br/>
                     <a href="acerca.html" title="" class="button">Ver mas</a>

                          </p>
                      </div>
                  </article>
              </div>


          <div class="container">
              <h1 class="text-center">NUESTROS SERVICIOS</h1>
              <p class="col-xs-9 center-block no-float text-center">Conoce más de nuestros servicios...   <a href="servicios.html" title="" class="button btn-mini">Ver Todos</a></p>
              <div class="row image-box style2">
                  <div class="col-md-6">
                      <article class="box">
                          <figure class="animated" data-animation-type="fadeInLeft" data-animation-duration="1">
                              <a href="combustible.html" title=""><img src="{{ asset("assets/images/XfligthSupport_fuel_private_jet_charter.png") }}" alt="Combustible" width="270" height="192" /></a>
                          </figure>
                          <div class="details">
                              <h4>COMBUSTIBLE</h4>
                              <p>Trabajamos con una agenda de aliados comerciales que nos permiten ofrecerle a su empresa el abastecimiento de...</p>
                              <a href="combustible.html" title="" class="button">Ver mas</a>
                          </div>
                      </article>
                  </div>
                  <div class="col-md-6">
                      <article class="box">
                          <figure class="animated" data-animation-type="fadeInLeft" data-animation-duration="1" data-animation-delay="0.4">
                              <a href="servicio-meteorologico.html" title=""><img src="{{ asset("assets/images/XfligthSupport_serviciometereologico_private_jet_charter.png") }}" alt="Servicio Metereologico" width="270" height="192" /></a>
                          </figure>
                          <div class="details">
                              <h4>SERVICIO METEOROLÓGICO</h4>
                              <p>Todo vuelo requiere una preparación previa, la seguridad de los pasajeros, la tripulación y aeronaves es nuestra...</p>
                              <a href="servicio-meteorologico.html" title="" class="button">Ver mas</a>
                          </div>
                      </article>
                  </div>
                  <div class="col-md-6">
                      <article class="box">
                          <figure class="animated" data-animation-type="fadeInLeft" data-animation-duration="1">
                              <a href="handling.html" title=""><img src="{{ asset("assets/images/XfligthSupport_handling_private_jet_charter.png") }}" alt="Handling" width="270" height="192" /></a>
                          </figure>
                          <div class="details">
                              <h4>HANDLING</h4>
                              <p>Tener el mejor aterrizaje, despegue y mantenimiento de su avión, depende en buena parte del servicio de asistencia...</p>
                              <a href="handling.html" title="" class="button">Ver mas</a>
                          </div>
                      </article>
                  </div>
                  <div class="col-md-6">
                      <article class="box">
                          <figure class="animated" data-animation-type="fadeInLeft" data-animation-duration="1" data-animation-delay="0.4">
                              <a href="Catering.html" title=""><img src="{{ asset("assets/images/XfligthSuppor_caterin_private_jet_charter.png") }}" alt="Catering" width="270" height="192" /></a>
                          </figure>
                          <div class="details">
                              <h4>CATERING DELUXE</h4>
                              <p>Nuestro catering deluxe es un servicio profesional que le brinda a nuestros pasajeros y a toda la tripulación...</p>
                              <a href="Catering.html" title="" class="button">Ver mas</a>
                          </div>
                      </article>
                  </div>
              </div>

      </div>
  </section>
@endsection
