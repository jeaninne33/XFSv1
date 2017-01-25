<footer style="background-image: url(images/footer.png);" id="footer">
            <div class="footer-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <h2><a href="{{url('/')}}">INICIO</a></h2>
                            <h2><a href="{{url('/compañia')}}">COMPAÑIA</a></h2>
                             <ul class="discover triangle hover row">
                                <li class="col-xs-7"><a href="{{url('/acerca')}}">QUIENES SOMOS</a></li>
                            </ul>
                            <br/>
                            <h2><a href="{{url('/tarjetas-servicios')}}">TARJETA DE SERVICIOS</a></h2>
                            <h2><a href="{{url('/combustible')}}">COMBUSTIBLE</a></h2>
                        </div>


                        <div class="col-sm-6 col-md-4">
                            <h2><a href="servicios.html">SERVICIOS</a></h2>
                            <ul class="discover triangle hover row">
                                <li class="col-xs-7"><a href="{{url('/servicio-meteorologico')}}">SERVICIO METEOROLÓGICO</a></li>
                                <li class="col-xs-6"><a href="{{url('/handling')}}">HANDLING</a></li>
                                <li class="col-xs-7"><a href="{{url('/catering')}}">CATERING DELUXE</a></li>
                                <li class="col-xs-7"><a href="{{url('/planificacion-vuelo')}}">PLANIFICACIÓN DE VUELO</a></li>
                                <li class="col-xs-7"><a href="{{url('/permisos-vuelo')}}">PERMISOS DE VUELO</a></li>
                                <li class="col-xs-7"><a href="{{url('/tramites-inmigracion')}}">TRAMITES DE INMIGRACIÓN</a></li>
                                <li class="col-xs-7"><a href="{{url('/reserva-hotel')}}">RESERVA DEL HOTEL</a></li>
                                <li class="col-xs-9"><a href="{{url('/asistencia-viajero')}}">ASISTENCIA DEL VIAJERO 24/7</a></li>
                                <li class="col-xs-7"><a href="{{url('/alquiler-autos')}}">ALQUILER DE AUTOS</a></li>
                                <li class="col-xs-8"><a href="{{url('/traslados')}}">TRANSPORTACIÓN TERRESTRE </a></li>
                                <li class="col-xs-7"><a href="{{url('/servicios-especiales')}}">SERVICIOS ESPECIALES</a></li>
                            </ul>

                        </div>
                        <div class="col-sm-4 col-md-3">

                            <div class="contact-form">
                                <h2><a href="contacto.html">CONTACTO</a></h2>
                                <form action="contacto.php" method="post">
                                    <div class="row">
                                        <div class="col-sm-4 col-md-9">
                                            <div class="form-group">
                                                <label>Nombre Completo</label>
                                                <input type="text" name="name" placeholder="xflightsupport" class="input-text full-width" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Correo</label>
                                                <input type="email" name="email" placeholder="info@xflightsupport.com" class="input-text full-width" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Telefono</label>
                                                <input type="text" name="phone" required placeholder="+55-555-55555" class="input-text full-width">
                                            </div>
                                            <div class="form-group">
                                                <label>Asunto</label>
                                                <input type="text" name="subject" required placeholder="Asunto" class="input-text full-width">
                                            </div>

                                        </div>
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <label>Mensaje</label>
                                                <textarea name="message" rows="3" class="input-text full-width" placeholder="Escribe un Mensaje"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-5 col-sms-offset-6 col-sm-offset-0 ">
                                        <button class="btn-large btn-info full-width">ENVIAR</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <address class="contact-details">
                                <span class="contact-phone"><i class="soap-icon-phone"></i> +1-888-414-2838</span>
                                <br />
                                <a class="contact-email"><i style="color:#ffffff" class="soap-icon-letter"></i>  info@xflightsupport.com</a>
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-3 col-md-offset-5">
                            <ul class="social-icons clearfix">
                                <li class="twitter"><a title="Twitter" href="https://twitter.com/xflightsupport" target="_blank" data-toggle="tooltip"><i class="soap-icon-twitter"></i></a></li>
                                <li class="instragram"><a title="Instagram" href="https://www.instagram.com/xflightsupport/?hl=es" target="_blank" data-toggle="tooltip"><i class="soap-icon-instagram"></i></a></li>
                                <li class="facebook"><a title="Facebook" href="https://www.facebook.com/Xflightsupport-306781969681228/" target="_blank" data-toggle="tooltip"><i class="soap-icon-facebook"></i></a></li>
                                <li class="linkedin"><a title="Linkedin" href="https://www.linkedin.com/company/xflightsupport" target="_blank" data-toggle="tooltip"><i class="soap-icon-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom gray-area">
                <div class="container">
                    <div class="logo pull-left">
                        <a href="{{url('/')}}" title="XFlightSupport - Inicio">
                            <img src="images/logo.png" alt="XflightSupport" />
                        </a>
                    </div>
                    <div class="pull-right">
                        <a id="back-to-top" href="#" class="animated" data-animation-type="bounce"><i class="soap-icon-longarrow-up circle"></i></a>
                    </div>
                    <div class="copyright pull-right">
                       &copy; 2016 XFlighSupport
                    </div>
                    <div class=" copyright pull-right">
                       <a href="{{url('/terminos-de-usos')}}">Terminos de Usos</a>
                    </div>
                    <div class=" copyright pull-right">
                        <a href="{{url('/politica-privacidad')}}">Politicas de Privacidad</a>
                    </div>
                </div>
            </div>
        </footer>
