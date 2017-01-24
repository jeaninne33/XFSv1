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
<body class="soap-login-page style3 body-blank">
    <div id="page-wrapper" class="wrapper-blank">
        <header id="header" class="navbar-static-top">
            <a href="#mobile-menu-01" data-toggle="collapse" class="mobile-menu-toggle blue-bg">Mobile Menu Toggle</a>
            <div class="container">
                <h1 class="logo">

                </h1>
            </div>

        </header>
        <section id="content">
            <div class="container">
                <div id="main">
                    <div class="welcome-text box" style="">INICIO DE SESIÓN</div>
                    {{-- <p class="white-color block" style="font-size: 1.5em;">Please login to your account.</p> --}}
                    <div class="col-sm-8 col-md-6 col-lg-5 no-float no-padding center-block">
                        <form class="login-form" method="POST" action="{{route('login')}}">
                          	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <input name="email" type="email" class="input-text input-large full-width" placeholder="Correo Electronico">
                            </div>
                            <div class="form-group">
                                <input name="password" type="password" class="input-text input-large full-width" placeholder="Contraseña">
                            </div>
                            <div class="form-group">
                                <label class="checkbox">
                                    <input name="remember" type="checkbox">Recordar Datos
                                </label>
                            </div>
                            <button type="submit" class="btn-large full-width yellow">INICIAR</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <footer id="footer">
            <div class="footer-wrapper">
                <div class="container">

                    <div class="copyright">
                        <p>&copy; 2017 Xflight Support</p>
                    </div>
                </div>
            </div>
        </footer>

    </div>


    <!-- Javascript -->
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.noconflict.js"></script>
    <script type="text/javascript" src="js/modernizr.2.7.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.placeholder.js"></script>
    <script type="text/javascript" src="js/jquery-ui.1.10.4.min.js"></script>

    <!-- Twitter Bootstrap -->
    <script type="text/javascript" src="js/bootstrap.js"></script>

    <!-- parallax -->
    <script type="text/javascript" src="js/jquery.stellar.min.js"></script>

    <!-- waypoint -->
    <script type="text/javascript" src="js/waypoints.min.js"></script>

    <!-- load page Javascript -->
    <script type="text/javascript" src="js/theme-scripts.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>

    <script type="text/javascript">
        enableChaser = 0; //disable chaser
    </script>
</body>
</html>
