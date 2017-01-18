<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
<head>
    <!-- Page Title -->
    <title>XFlightSupport</title>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="keywords" content="Flight Support, Handling, Ground Handling, Flight, Jet fuel , Flight permits, Private Aviation,
    Charter, Aviation, Fuel, fbo, aircraft, fuel card, xflight support, Soporte de vuelo, Servicio aéreo, Volar, Combustible,
    Permiso de vuelos, Aviación privada, Aviación, Combustible, abastecimiento de combustible, Venezuela, Isla de Margarita,
    Nueva Esparta, jet privado, jet, apoyo en tierra, aeronave" />
    <meta name="description" lang="es" content="En XFlightSupport nos dedicamos a ofrecer soluciones aéreas y prestar servicios de calidad para la aviación en general;
    especializados en el suministro de combustible, seguridad, alojamiento, traslados, permiso de vuelo y sobre vuelo, planificación, soporte de navegación,
    tramites de impuesto y servicios meteorológicos">
    <meta name="author" content="XFS">
    <meta name="generator" content="HTML,BOOTSTRAP,JAVASCRIPT,JQUERY" />
    <!--<meta name="robots" content=""-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="icoXFS.ico" type="image/x-icon">

    <!-- Theme Styles -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/css/animate.min.css">

    <!-- Current Page Styles -->
    <link rel="stylesheet" type="text/css" href="components/revolution_slider/css/settings.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="components/revolution_slider/css/style.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="components/jquery.bxslider/jquery.bxslider.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="components/flexslider/flexslider.css" media="screen" />

    <!-- Main Style -->
    <link id="main-style" rel="stylesheet" href="assets/css/style.css">

    <!-- Updated Styles -->
    <link rel="stylesheet" href="assets/css/updates.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Responsive Styles -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!--SWEETALERT-->
    <!--<link href="sweetalert2/sweetalert2.css" rel="stylesheet" />-->
    <link href="dist/sweetalert.css" rel="stylesheet" />
    <!--footer header-->
    <script src="js/header-footer.js"></script>
    <!-- CSS for IE -->
    <!--[if lte IE 9]>
        <link rel="stylesheet" type="text/css" href="css/ie.css" />
    <![endif]-->


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->

    <!-- Javascript Page Loader -->
    <!--<script type="text/javascript" src="js/pace.min.js" data-pace-options='{ "ajax": false }'></script>
    <script type="text/javascript" src="js/page-loading.js"></script>-->
</head>
<body>
    <div id="page-wrapper">
        <header id="header" class="navbar-static-top">
            <div style="background-image:url(images/header.png)" class="topnav hidden-xs">
                <div class="container">
                    <ul class="quick-menu pull-left">
                        <!--<li><a href="#">My Account</a></li>-->
                        <li><a>TELEFONOS +1 888 414 2838</a></li>
                        <li class="ribbon">
                            <a href="#">Español</a>
                            <ul class="menu mini">
                                <li><a href="en/index.html" title="Inglés">Inglés</a></li>

                            </ul>
                        </li>
                    </ul>

                    <ul class="quick-menu pull-right">

                        <li><a href="#" class="soap-popupbox" onclick="mjslogin()">INICIO SESIÓN</a></li>
                        <!--<li><a href="#" class="soap-popupbox">SIGNUP</a></li>-->
                        <!--<li class="ribbon currency">
                        <a href="#" title="">USD</a>
                        <ul class="menu mini">
                            <li><a href="#" title="AUD">AUD</a></li>
                            <li><a href="#" title="BRL">BRL</a></li>
                            <li class="active"><a href="#" title="USD">USD</a></li>
                            <li><a href="#" title="CAD">CAD</a></li>
                            <li><a href="#" title="CHF">CHF</a></li>
                            <li><a href="#" title="CNY">CNY</a></li>
                            <li><a href="#" title="CZK">CZK</a></li>
                            <li><a href="#" title="DKK">DKK</a></li>
                            <li><a href="#" title="EUR">EUR</a></li>
                            <li><a href="#" title="GBP">GBP</a></li>
                            <li><a href="#" title="HKD">HKD</a></li>
                            <li><a href="#" title="HUF">HUF</a></li>
                            <li><a href="#" title="IDR">IDR</a></li>
                        </ul>
                    </li>-->
                    </ul>
                </div>
            </div>

            <div class="main-header">

                <a href="#mobile-menu-01" data-toggle="collapse" class="mobile-menu-toggle">
                    Mobile Menu Toggle
                </a>

                <div class="container">
                    <h1 class="logo navbar-brand">
                        <a href="{{url('/')}}" title="XFlight Support - Inicio">
                            <img src="images/logo.png" alt="XflightSupport"/>
                        </a>
                    </h1>

                    <nav id="main-menu" role="navigation">
                        <ul class="menu">
                            <li class="menu-item-has-children">
                                <a href="{{url('/')}}">INICIO</a>

                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{url('/servicios')}}">SERVICIOS</a>
                                <ul>
                                    <li><a href="{{url('/servicio-meteorologica')}}">SERVICIO METEOROLÓGICO</a></li>
                                    <li><a href="{{url('/handling')}}">HANDLING</a></li>
                                    <li><a href="{{url('/catering')}}">CATERING DELUXE</a></li>
                                    <li><a href="{{url('/planificacion-vuelo')}}">PLANIFICACIÓN DE VUELO</a></li>
                                    <li><a href="{{url('/permisos-vuelo')}}">PERMISOS DE VUELO</a></li>
                                    <li><a href="{{url('/tramites-inmigracion')}}">TRAMITES DE INMIGRACIÓN</a></li>
                                    <li><a href="{{url('/reserva-hotel')}}">RESERVA DEL HOTEL</a></li>
                                    <li><a href="{{url('/asistencia-viajero')}}">ASISTENCIA DEL VIAJERO 24/7</a></li>
                                    <li><a href="{{url('/alquiler-autos')}}">ALQUILER DE AUTOS</a></li>
                                    <li><a href="{{url('/traslados')}}">TRANSPORTACIÓN TERRESTRE </a></li>
                                    <li><a href="{{url('/servicios-especiales')}}">SERVICIOS ESPECIALES</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{url('/compañia')}}">COMPAÑIA</a>
                                  <ul>
                                    <li><a href="{{url('/acerca')}}">QUIENES SOMOS</a></li>

                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{url('/tarjetas-servicios')}}">TARJETA DE SERVICIOS</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{url('/combustible')}}">COMBUSTIBLE</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{url('/contacto')}}">CONTACTO</a>
                            </li>

                        </ul>
                    </nav>
                </div>

                <nav id="mobile-menu-01" class="mobile-menu collapse">
                    <ul id="mobile-primary-menu" class="menu">
                        <li class="menu-item-has-children">
                            <a href="{{url('/')}}">INICIO</a>

                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{url('/servicios')}}">SERVICIOS</a>
                            <ul>
                              <li><a href="{{url('/servicio-meteorologico')}}">SERVICIO METEOROLÓGICO</a></li>
                              <li><a href="{{url('/handling')}}">HANDLING</a></li>
                              <li><a href="{{url('/catering')}}">CATERING DELUXE</a></li>
                              <li><a href="{{url('/planificacion-vuelo')}}">PLANIFICACIÓN DE VUELO</a></li>
                              <li><a href="{{url('/permisos-vuelo')}}">PERMISOS DE VUELO</a></li>
                              <li><a href="{{url('/tramites-inmigracion')}}">TRAMITES DE INMIGRACIÓN</a></li>
                              <li><a href="{{url('/reserva-hotel')}}">RESERVA DEL HOTEL</a></li>
                              <li><a href="{{url('/asistencia-viajero')}}">ASISTENCIA DEL VIAJERO 24/7</a></li>
                              <li><a href="{{url('/alquiler-autos')}}">ALQUILER DE AUTOS</a></li>
                              <li><a href="{{url('/traslados')}}">TRANSPORTACIÓN TERRESTRE </a></li>
                              <li><a href="{{url('/servicios-especiales')}}">SERVICIOS ESPECIALES</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{url('/compañia')}}">COMPAÑIA</a>
                             <ul>
                                <li><a href="{{url('acerca')}}">QUIENES SOMOS</a></li>

                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{url('/tarjetas-servicios')}}">TARJETA DE SERVICIOS</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{url('/combustible')}}">COMBUSTIBLE</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{url('/contacto')}}">CONTACTO</a>
                        </li>

                    </ul>

                    <ul class="mobile-topnav container">
                        <!--<li><a href="#">MY ACCOUNT</a></li>-->
                        <li><a href="#">TELEFONOS +1 888 414 2838</a></li>
                        <li class="ribbon language menu-color-skin">
                            <a href="#" data-toggle="collapse">ESPAÑOL</a>
                            <ul class="menu mini">
                                <li><a href="#" title="Inglés<">Inglés</a></li>

                            </ul>
                        </li>

                        <li><a href="#" class="soap-popupbox" onclick="mjslogin">INICIO SESIÓN</a></li>
                        <!--<li><a href="#travelo-signup" class="soap-popupbox">SIGNUP</a></li>-->
                        <!--<li class="ribbon currency menu-color-skin">
                        <a href="#">USD</a>
                        <ul class="menu mini">
                            <li><a href="#" title="AUD">AUD</a></li>
                            <li><a href="#" title="BRL">BRL</a></li>
                            <li class="active"><a href="#" title="USD">USD</a></li>
                            <li><a href="#" title="CAD">CAD</a></li>
                            <li><a href="#" title="CHF">CHF</a></li>
                            <li><a href="#" title="CNY">CNY</a></li>
                            <li><a href="#" title="CZK">CZK</a></li>
                            <li><a href="#" title="DKK">DKK</a></li>
                            <li><a href="#" title="EUR">EUR</a></li>
                            <li><a href="#" title="GBP">GBP</a></li>
                            <li><a href="#" title="HKD">HKD</a></li>
                            <li><a href="#" title="HUF">HUF</a></li>
                            <li><a href="#" title="IDR">IDR</a></li>
                        </ul>
                    </li>-->
                    </ul>

                </nav>
            </div>

        </header>

        @yield('content')

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
            </div>


            <!-- Javascript -->
            <script type="text/javascript" src="assets/js/jquery-1.11.1.min.js"></script>
            <script type="text/javascript" src="assets/js/jquery.noconflict.js"></script>
            <script type="text/javascript" src="assets/js/modernizr.2.7.1.min.js"></script>
            <script type="text/javascript" src="assets/js/jquery-migrate-1.2.1.min.js"></script>
            <script type="text/javascript" src="assets/js/jquery.placeholder.js"></script>
            <script type="text/javascript" src="assets/js/jquery-ui.1.10.4.min.js"></script>

            <!-- Twitter Bootstrap -->
            <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

            <!-- load revolution slider scripts -->
            <script type="text/javascript" src="components/revolution_slider/js/jquery.themepunch.tools.min.js"></script>
            <script type="text/javascript" src="components/revolution_slider/js/jquery.themepunch.revolution.min.js"></script>

            <!-- load BXSlider scripts -->
            <script type="text/javascript" src="components/jquery.bxslider/jquery.bxslider.min.js"></script>

            <!-- Flex Slider -->
            <script type="text/javascript" src="components/flexslider/jquery.flexslider.js"></script>

            <!-- parallax -->
            <script type="text/javascript" src="assets/js/jquery.stellar.min.js"></script>

            <!-- parallax -->
            <script type="text/javascript" src="assets/js/jquery.stellar.min.js"></script>

            <!-- waypoint -->
            <script type="text/javascript" src="assets/js/waypoints.min.js"></script>

            <!-- load page Javascript -->
            <script type="text/javascript" src="assets/js/theme-scripts.js"></script>
            <script type="text/javascript" src="assets/js/scripts.js"></script>
            <!--SWEETALERT-->
            <!--<script src="sweetalert2/sweetalert2.min.js"></script>-->
            <script src="assets/js/sweetalert.js"></script>
            <script src="dist/sweetalert.min.js"></script>
            <script type="text/javascript">
                tjq(document).ready(function() {
                    tjq('.revolution-slider').revolution(
                    {
                        sliderType:"standard",
        				sliderLayout:"auto",
        				dottedOverlay:"none",
        				delay:3000,
        				navigation: {
        					keyboardNavigation:"off",
        					keyboard_direction: "horizontal",
        					mouseScrollNavigation:"off",
        					mouseScrollReverse:"default",
        					onHoverStop:"on",
        					touch:{
        						touchenabled:"on",
        						swipe_threshold: 75,
        						swipe_min_touches: 1,
        						swipe_direction: "horizontal",
        						drag_block_vertical: false
        					}
        					,
        							  arrows: {
                                style: "default",
                                enable: true,
                                hide_onmobile: false,
                                hide_onleave: false,
                                tmp: '',
                                left: {
                                    h_align: "left",
                                    v_align: "center",
                                    h_offset: 20,
                                    v_offset: 0
                                },
                                right: {
                                    h_align: "right",
                                    v_align: "center",
                                    h_offset: 20,
                                    v_offset: 0
                                }
                            }
                        },
        				visibilityLevels:[1240,1024,778,480],
        				gridwidth:1170,
        				gridheight:646,
        				lazyType:"none",
        				shadow:0,
        				spinner:"spinner4",
        				stopLoop:"off",
        				stopAfterLoops:-1,
        				stopAtSlide:-1,
        				shuffle:"off",
        				autoHeight:"off",
        				hideThumbsOnMobile:"off",
        				hideSliderAtLimit:0,
        				hideCaptionAtLimit:0,
        				hideAllCaptionAtLilmit:0,
        				debugMode:false,
        				fallbacks: {
        					simplifyAll:"off",
        					nextSlideOnWindowFocus:"off",
        					disableFocusListener:false,
        				}
                    });
                });
            </script>

    </body>
</html>
