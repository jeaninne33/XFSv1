
function header(){
    document.getElementById('header1').innerHTML =
                   ' <div class="container">' +
                       ' <ul class="quick-menu pull-left">' +
                           ' <!--<li><a href="#">My Account</a></li>-->' +
                           ' <li ><a>TELEFONOS +1 888 414 2838</a></li>' +
                           ' <li class="ribbon">' +
                               ' <a href="#">Español</a>' +
                               ' <ul class="menu mini">   ' +
                                 '   <li ><a href="#" title="English" onclick="mjsidioma()">English</a></li>' +
                                   ' <li class="active"><a href="#" title="Español">Español</a></li>   ' +
                               ' </ul>' +
                           ' </li>' +
                       ' </ul>' +

                      '  <ul class="quick-menu pull-right"> ' +

                           ' <li><a href="#" class="soap-popupbox" onclick="mjslogin()">INICIO SESIÓN</a></li> ' +
                            '<!--<li><a href="#" class="soap-popupbox">SIGNUP</a></li>--> ' +
                            '<!--<li class="ribbon currency"> ' +
                             '   <a href="#" title="">USD</a> ' +
                              '  <ul class="menu mini"> ' +
                               '     <li><a href="#" title="AUD">AUD</a></li> ' +
                                '    <li><a href="#" title="BRL">BRL</a></li> ' +
                                 '   <li class="active"><a href="#" title="USD">USD</a></li> ' +
                                 '   <li><a href="#" title="CAD">CAD</a></li> ' +
                                  '  <li><a href="#" title="CHF">CHF</a></li> ' +
                                  '  <li><a href="#" title="CNY">CNY</a></li> ' +
                                  '  <li><a href="#" title="CZK">CZK</a></li> ' +
                                  '  <li><a href="#" title="DKK">DKK</a></li> ' +
                                  '  <li><a href="#" title="EUR">EUR</a></li> ' +
                                  '  <li><a href="#" title="GBP">GBP</a></li> ' +
                                  '  <li><a href="#" title="HKD">HKD</a></li> ' +
                                  '  <li><a href="#" title="HUF">HUF</a></li> ' +
                                   ' <li><a href="#" title="IDR">IDR</a></li> ' +
                                '</ul> ' +
                            '</li>--> ' +
                        '</ul> ' +
                    '</div> ';


    document.getElementById('header2').innerHTML =

                   '<a href="#mobile-menu-01" data-toggle="collapse" class="mobile-menu-toggle">' +
                      ' Mobile Menu Toggle' +
                  ' </a>' +

                   '<div class="container">' +
                      ' <h1 class="logo navbar-brand">' +
                          ' <a href="index.html" title="XFlight Support - Inicio">' +
                             '  <img src="images/logo.png" alt="XflightSupport"/>' +
                         '  </a>' +
                     '  </h1>' +

                      ' <nav id="main-menu" role="navigation">' +
                        '   <ul class="menu">' +
                         '      <li class="menu-item-has-children">' +
                           '        <a href="index.html">INICIO</a>' +
                            '       <ul>' +
                              '         <li><a href="acerca.html">QUIENES SOMOS</a></li>' +
                                       '<li><a href="politica_privacidad.html">POLÍTICAS DE PRIVACIDAD</a></li>' +
                                       '<li><a href="terminos_de_usos.html">TERMINOS DE USOS</a></li> ' +
                                   '</ul>' +
                               '</li>' +
                               '<li class="menu-item-has-children">' +
                                   '<a href="servicios.html">SERVICIOS</a>' +
                                  ' <ul>' +
                                       '<li><a href="servicio_meteorologico.html">SERVICIO METEOROLÓGICO</a></li>' +
                                       '<li><a href="handling.html">HANDLING</a></li>' +
                                       '<li><a href="Catering.html">CATERING DELUXE</a></li>' +
                                       '<li><a href="planificacion_vuelo.html">PLANIFICACIÓN DE VUELO</a></li> ' +
                                       '<li><a href="permisos_vuelo.html">PERMISOS DE VUELO</a></li> ' +
                                       '<li><a href="tramites_inmigracion.html">TRAMITES DE INMIGRACIÓN</a></li>' +
                                       '<li><a href="reserva_hotel.html">RESERVA DEL HOTEL</a></li>' +
                                       '<li><a href="asistencia_viajero.html">ASISTENCIA DEL VIAJERO 24/7</a></li>' +
                                       '<li><a href="alquiler_autos.html">ALQUILER DE AUTOS</a></li>' +
                                       '<li><a href="traslados.html">TRANSPORTACIÓN TERRESTRE </a></li>' +
                                       '<li><a href="servicios_especiales.html">SERVICIOS ESPECIALES</a></li>' +
                                   '</ul>' +
                               '</li>' +
                               '<li class="menu-item-has-children">' +
                                   '<a href="compañia.html">COMPAÑIA</a>' +
                               '</li>' +
                              ' <li class="menu-item-has-children">' +
                                   '<a href="tarjetas_servicios.html">TARJETA DE SERVICIOS</a>' +
                              ' </li>' +
                              ' <li class="menu-item-has-children">' +
                                  ' <a href="combustible.html">COMBUSTIBLE</a>' +
                               '</li>' +
                               '<li class="menu-item-has-children">' +
                                   '<a href="contacto.html">CONTACTO</a>' +
                               '</li>' +

                          ' </ul>' +
                      ' </nav>' +
                   '</div>' +

                  ' <nav id="mobile-menu-01" class="mobile-menu collapse">' +
                       '<ul id="mobile-primary-menu" class="menu">' +
                          ' <li class="menu-item-has-children">' +
                               '<a href="index.html">INICIO</a>' +
                              ' <ul>' +
                                  ' <li><a href="acerca.html">QUIENES SOMOS</a></li>' +
                                  ' <li><a href="politica_privacidad.html">POLÍTICAS DE PRIVACIDAD</a></li>' +
                                  ' <li><a href="terminos_de_usos.html">TERMINOS DE USOS</a></li>' +
                              ' </ul>' +
                          ' </li>' +
                           '<li class="menu-item-has-children">' +
                               '<a href="servicios.html">SERVICIOS</a>' +
                              ' <ul>' +
                                   '<li><a href="servicio_meteorologico.html">SERVICIO METEOROLÓGICO</a></li>' +
                                  ' <li><a href="handling.html">HANDLING</a></li>' +
                                  ' <li><a href="Catering.html">CATERING DELUXE</a></li>' +
                                  ' <li><a href="planificacion_vuelo.html">PLANIFICACIÓN DE VUELO</a></li> ' +
                                 '  <li><a href="permisos_vuelo.html">PERMISOS DE VUELO</a></li>   ' +
                                  ' <li><a href="tramites_inmigracion.html">TRAMITES DE INMIGRACIÓN</a></li>' +
                                 '  <li><a href="reserva_hotel.html">RESERVA DEL HOTEL</a></li>' +
                                 '  <li><a href="asistencia_viajero.html">ASISTENCIA DEL VIAJERO 24/7</a></li>' +
                                 '  <li><a href="alquiler_autos.html">ALQUILER DE AUTOS</a></li>' +
                                  ' <li><a href="traslados.html">TRANSPORTACIÓN TERRESTRE </a></li>' +
                                  ' <li><a href="servicios_especiales.html">SERVICIOS ESPECIALES</a></li>' +
                               '</ul>' +
                          ' </li>' +
                           '<li class="menu-item-has-children">' +
                               '<a href="compañia.html">COMPAÑIA</a>' +
                           '</li>' +
                           '<li class="menu-item-has-children">' +
                               '<a href="tarjetas_servicios.html">TARJETA DE SERVICIOS</a>' +
                          ' </li>' +
                           '<li class="menu-item-has-children">' +
                               '<a href="combustible.html">COMBUSTIBLE</a>' +
                           '</li>' +
                           '<li class="menu-item-has-children">' +
                               '<a href="contacto.html">CONTACTO</a>' +
                           '</li>' +

                       '</ul>' +

                       '<ul class="mobile-topnav container">' +
                           '<!--<li><a href="#">MY ACCOUNT</a></li>-->' +
                           '<li><a href="#">TELEFONOS +1 888 414 2838</a></li>' +
                           '<li class="ribbon language menu-color-skin">' +
                               '<a href="#" data-toggle="collapse">ESPAÑOL</a>' +
                               '<ul class="menu mini">' +
                                   '<li><a href="#" title="English" onclick="mjsidioma()">English</a></li>' +
                                   '<li><a class="active" title="Español">Español</a></li>' +
                              ' </ul>' +
                          ' </li>' +

                           '<li><a href="#" class="soap-popupbox" onclick="mjslogin">INICIO SESIÓN</a></li>' +
                           '<!--<li><a href="#travelo-signup" class="soap-popupbox">SIGNUP</a></li>-->' +
                           '<!--<li class="ribbon currency menu-color-skin">' +
                               '<a href="#">USD</a>' +
                              ' <ul class="menu mini">' +
                                  ' <li><a href="#" title="AUD">AUD</a></li>' +
                                   '<li><a href="#" title="BRL">BRL</a></li>' +
                                  ' <li class="active"><a href="#" title="USD">USD</a></li>' +
                                  ' <li><a href="#" title="CAD">CAD</a></li>' +
                                  ' <li><a href="#" title="CHF">CHF</a></li>' +
                                  ' <li><a href="#" title="CNY">CNY</a></li>' +
                                  ' <li><a href="#" title="CZK">CZK</a></li>' +
                                  ' <li><a href="#" title="DKK">DKK</a></li>' +
                                  ' <li><a href="#" title="EUR">EUR</a></li>' +
                                  ' <li><a href="#" title="GBP">GBP</a></li>' +
                                  ' <li><a href="#" title="HKD">HKD</a></li>' +
                                  ' <li><a href="#" title="HUF">HUF</a></li>' +
                                  ' <li><a href="#" title="IDR">IDR</a></li>' +
                              ' </ul>' +
                           '</li>-->' +
                      ' </ul>' +

                  ' </nav>';
         
}
    
function footer() {

    document.getElementById('footer1').innerHTML=
         '<div class="container">'+
                    '<div class="row">'+
                        '<div class="col-sm-6 col-md-4">'+
                            '<h2><a href="index.html">INICIO</a></h2>'+
                            '<ul class="discover triangle hover row">'+
                                '<li class="col-xs-7"><a href="acerca.html">QUIENES SOMOS</a></li>'+
                                '<li class="col-xs-12"><a href="politica_privacidad.html">POLÍTICAS DE PRIVACIDAD</a></li>'+
                                '<li class="col-xs-7"><a href="terminos_de_usos.html">TERMINOS DE USOS</a></li>'+
                            '</ul>'+
                            '<br />'+
                            '<h2><a href="compañia.html">COMPAÑIA</a></h2>'+
                            '<h2><a href="tarjetas_servicios.html">TARJETA DE SERVICIOS</a></h2>'+   
                            '<h2><a href="combustible.html">COMBUSTIBLE</a></h2>'+ 
                        '</div>'+
                     
                           '<div class="col-sm-6 col-md-4">'+
                               '<h2><a href="servicios.html">SERVICIOS</a></h2>'+
                               '<ul class="discover triangle hover row">'+
                                   '<li class="col-xs-7"><a href="servicio_meteorologico.html">SERVICIO METEOROLÓGICO</a></li>'+
                                   '<li class="col-xs-6"><a href="handling.html">HANDLING</a></li>'+
                                   '<li class="col-xs-7"><a href="Catering.html">CATERING DELUXE</a></li>'+
                                   '<li class="col-xs-7"><a href="planificacion_vuelo.html">PLANIFICACIÓN DE VUELO</a></li> '+                                  
                                   '<li class="col-xs-7"><a href="permisos_vuelo.html">PERMISOS DE VUELO</a></li>'+                                   
                                   '<li class="col-xs-7"><a href="tramites_inmigracion.html">TRAMITES DE INMIGRACIÓN</a></li>'+
                                   '<li class="col-xs-7"><a href="reserva_hotel.html">RESERVA DEL HOTEL</a></li>'+
                                   '<li class="col-xs-7"><a href="asistencia_viajero.html">ASISTENCIA DEL VIAJERO 24/7</a></li>'+
                                   '<li class="col-xs-7"><a href="alquiler_autos.html">ALQUILER DE AUTOS</a></li>'+
                                   '<li class="col-xs-8"><a href="traslados.html">TRANSPORTACIÓN TERRESTRE </a></li>'+
                                   '<li class="col-xs-7"><a href="servicios_especiales.html">SERVICIOS ESPECIALES</a></li>'+
                               '</ul>'+
                               
                           '</div> '+                
                        '<div class="col-sm-4 col-md-4">'+
                            
                            '<div class="contact-form">'+
                                '<h2><a href="contacto.html">CONTACTO</a></h2>'+
                                '<form action="contacto.php" method="post">'+
                                    '<div class="row">'+
                                       '<div class="col-sm-4 col-md-9">'+
                                            '<div class="form-group">'+
                                                '<label>Nombre Completo</label>'+
                                                '<input type="text" name="name" placeholder="xflightsupport" class="input-text full-width" required>'+
                                            '</div>'+
                                            '<div class="form-group">'+
                                                '<label>Correo</label>'+
                                                '<input type="email" name="email" placeholder="info@xflightsupport.com" class="input-text full-width" required>'+
                                            '</div>'+
                                            '<div class="form-group">'+
                                                '<label>Telefono</label>'+
                                                '<input type="text" name="phone" required placeholder="+55-555-55555" class="input-text full-width">'+
                                            '</div>'+
                                            '<div class="form-group">'+
                                                '<label>Asunto</label>'+
                                                '<input type="text" name="subject" required placeholder="Asunto" class="input-text full-width">'+
                                            '</div>'+
                                           
                                        '</div>'+
                                        '<div class="col-sm-9">'+
                                            '<div class="form-group">'+
                                                '<label>Mensaje</label>'+
                                                '<textarea name="message" rows="3" class="input-text full-width" placeholder="Escribe un Mensaje"></textarea>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+

                                    '<div class="col-md-5 col-sms-offset-6 col-sm-offset-0 ">'+
                                        '<button class="btn-large btn-info full-width">ENVIAR</button>'+
                                    '</div>'+
                                '</form>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                    '<div class="row"> '+                       
                        '<div class="col-sm-6 col-md-3">'+
                            '<address class="contact-details">'+
                                '<span class="contact-phone"><i class="soap-icon-phone"></i> +1-888-414-2838</span>'+
                                '<br />'+
                                '<a  class="contact-email"><i style="color:#ffffff" class="soap-icon-letter"></i>  info@xflightsupport.com</a>'+
                            '</address> '+                         
                        '</div>'+
                    '</div>'+
                    '<div class="row">'+
                        '<div class="col-sm-6 col-md-3 col-md-offset-5"> '+                         
                            '<ul class="social-icons clearfix">'+
                                '<li class="twitter"><a title="Twitter" href="https://twitter.com/xflightsupport" target="_blank" data-toggle="tooltip"><i class="soap-icon-twitter"></i></a></li>'+
                                '<li class="instragram"><a title="Instagram" href="https://www.instagram.com/xflightsupport/?hl=es" target="_blank" data-toggle="tooltip"><i class="soap-icon-instagram"></i></a></li>'+
                                '<li class="facebook"><a title="Facebook" href="https://www.facebook.com/Xflightsupport-306781969681228/" target="_blank" data-toggle="tooltip"><i class="soap-icon-facebook"></i></a></li>'+
                                '<li class="linkedin"><a title="Linkedin" href="https://www.linkedin.com/company/xflightsupport" target="_blank" data-toggle="tooltip"><i class="soap-icon-linkedin"></i></a></li>'+
                            '</ul>'+
                        '</div>'+
                    '</div>' +
                '</div> ';


    document.getElementById('footer2').innerHTML =
        '<div class="container">' +
                   ' <div class="logo pull-left">' +
                       ' <a href="index.html" title="XFlightSupport - Inicio">' +
                            '<img src="images/logo.png" alt="XflightSupport"/>' +
                       ' </a>' +
                   ' </div>' +
                   ' <div class="pull-right">' +
                       ' <a id="back-to-top" href="#" class="animated" data-animation-type="bounce"><i class="soap-icon-longarrow-up circle"></i></a>' +
                    '</div>' +
                   ' <div class="copyright pull-right">' +
                       ' <p>&copy; 2016 XFlighSupport</p>' +
                    '</div>' +
                '</div>';

}