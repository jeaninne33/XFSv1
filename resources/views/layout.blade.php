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
                      <li class="ribbon">
                        @if (Auth::guest())
                            <li><a href="{{route('auth/login')}}">INICIO DE SESIÓN</a></li>
                        @else
                                <a href="#">{{ Auth::user()->name }}</a>
                                <ul class="menu mini uppercase">

                                    <li><a href="#">Perfil</a></li>
                                    <li><a href="#">Configuración</a></li>
                                    <li><a href="{{route('auth/logout')}}">SignOut</a></li>
                                </ul>
                          @endif

                      </li>
                    </ul>
                </div>
            </div>

            @include('menu')
        </header>

        @yield('content')

          @include('footer')

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
