<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html ng-app="XHR"> <!--<![endif]-->
<head>
    <!-- Page Title -->
    <title>XFlightSupport</title>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="generator" content="HTML,BOOTSTRAP,JAVASCRIPT,JQUERY" />
    <!--<meta name="robots" content=""-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link rel="shortcut icon" href="icoXFS.ico" type="image/x-icon">

    <!-- Theme Styles -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>

    <link id="main-style" rel="stylesheet" href="assets/css/style.css">

    <!-- Updated Styles -->
    <link rel="stylesheet" href="assets/css/updates.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Responsive Styles -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!--SWEETALERT-->
    <!--<link href="sweetalert2/sweetalert2.css" rel="stylesheet" />-->
    <link href="assets/dist/sweetalert.css" rel="stylesheet" />

</head>
<body class="soap-login-page style3 body-blank">
    <div id="page-wrapper" class="wrapper-blank">
        <header id="header" class="navbar-static-top">
            <a href="#mobile-menu-01" data-toggle="collapse" class="mobile-menu-toggle blue-bg">Mobile Menu Toggle</a>
            <div class="container">
            </div>
        </header>
        <section id="content">
            <div class="container">
                <div id="main">
                    <div class="welcome-text box" style="">INICIO DE SESIÓN</div>
                    {{-- @if(Session::has('flash_message'))
                      <div class="alert alert-danger">
                        <strong>¡Vaya!</strong> Hubo algunos problemas con su entrada.<br><br>
                          {{Session::get('flash_message')}}
                      </div>

                    @endif --}}
                      <div class="col-sm-8 col-md-6 col-lg-5 no-float no-padding center-block">

                        </div>
                     {{--  --}}
                    {{-- <p class="white-color block" style="font-size: 1.5em;">Please login to your account.</p> --}}
                    <div class="col-sm-8 col-md-6 col-lg-5 no-float no-padding center-block" ng-controller="LoginCtrl" ng-submit='enviar($event)' >
                        @include('errors.message')
                        <form class="login-form" method="POST" action="{{route('login')}}" >
                          	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <input ng-model='login.email' name="email" type="email" class="input-text input-large full-width" placeholder="Correo Electronico">
                            </div>
                            <div class="form-group">
                                <input ng-model='login.password' name="password" type="password" class="input-text input-large full-width" placeholder="Contraseña">
                            </div>
                            <div class="form-group">
                                <label class="checkbox">
                                    <input  name="remember" type="checkbox">Recordar Datos
                                </label>
                            </div>
                            <button type="submit" class="btn-large full-width blue-bg">INICIAR SESION</button>
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
    <script type="text/javascript" src="{{ asset("assets/js/jquery-1.11.1.min.js") }}"></script>

    <script type="text/javascript" src="{{ asset("assets/js/jquery-ui.1.10.4.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("assets/js/bootstrap.min.js") }}"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
    [[ Html::script('assets/js/app.js') ]]
</body>
</html>
