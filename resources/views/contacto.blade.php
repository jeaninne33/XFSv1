@extends('layout')
@section('content')
  <section id="content">
      <div class="container">
          <div id="main">
              <div class="travelo-google-map block"></div>
              <div class="contact-address row block">
                  <div class="col-md-4">
                      <div class="icon-box style5">
                          <i class="soap-icon-phone"></i>
                          <div class="description">
                              <small>Telefono</small>
                              <h5>Local:  +1-888-414-2838</h5>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="icon-box style5">
                          <i class="soap-icon-message"></i>
                          <div class="description">
                              <small>Correo Electronico</small>
                              <h5>info@xflightsupport.com</h5>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="icon-box style5">
                          <i class="soap-icon-address"></i>
                          <div class="description">
                              <small>Dirección</small>
                              <h5>USA, P.O Box, 353 Three Avenue</h5>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="travelo-box box-full">
                  <div class="contact-form">
                      <h2>Enviar un Mensaje</h2>
                      <form action="contacto.php" method="post">
                          <div class="row">
                              <div class="col-sm-4">
                                  <div class="form-group">
                                      <label id="lbl">Nombre Completo</label>
                                      <input type="text" name="name" placeholder="XflightSupport" class="input-text full-width">
                                  </div>
                                  <div class="form-group">
                                      <label id="lbl">Correo Electronico</label>
                                      <input type="text" name="email" placeholder="info@xflightsupport.com" class="input-text full-width">
                                  </div>
                                  <div class="form-group">
                                      <label id="lbl">Telefono</label>
                                      <input type="text" name="phone" placeholder="+55-555-55555" class="input-text full-width">
                                  </div>
                                  <div class="form-group">
                                      <label id="lbl">Asunto</label>
                                      <input type="text" name="subject" class="input-text full-width">
                                  </div>
                              </div>
                              <div class="col-sm-8">
                                  <div class="form-group">
                                      <label id="lbl">Mensaje</label>
                                      <textarea name="message" rows="8" class="input-text full-width" placeholder="Escribe un mensaje"></textarea>
                                  </div>
                              </div>
                          </div>

                          <div class="col-sms-offset-6 col-sm-offset-6 col-md-offset-8 col-lg-offset-9">
                              <button class="btn-medium btn-info full-width">ENVIAR</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <script type="text/javascript">
      tjq(".travelo-google-map").gmap3({
          map: {
              options: {
                  center: [36.2928735, -95.1554853],
                  zoom: 12
              }
          },
          marker: {
              values: [
                  { latLng: [36.2928735, -95.1554853], data: "US" }

              ],
              options: {
                  draggable: false
              },
          }
      });
  </script>
  <!-- Google Map Api -->
  <script type='text/javascript' src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
  <script type="text/javascript" src="js/gmap3.min.js"></script>
  <script data-skip-moving="true">
  (function (w, d, u, b) {
  s = d.createElement('script'); r = 1 * new Date(); s.async = 1; s.src = u + '?' + r;
  h = d.getElementsByTagName('script')[0]; h.parentNode.insertBefore(s, h);
  })(window, document, 'https://cdn.bitrix24.com/b2689055/crm/site_button/loader_2_27qa1h.js');
  </script>
@endsection
