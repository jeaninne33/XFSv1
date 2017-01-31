<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
<head>
    <!-- Page Title -->
    <title>XFlightSupport</title>

    <!-- Meta Tags -->
    <meta charset="utf-8">

    <link rel="shortcut icon" href="{{ asset("assets/icoXFS.ico") }}" type="image/x-icon">

      <!-- Theme Styles -->
      <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.min.css") }}">
      <link rel="stylesheet" href="{{ asset("assets/css/font-awesome.min.css") }}">
      <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>



      <!-- Main Style -->
      <link id="main-style" rel="stylesheet" href="{{ asset("assets/css/style.css") }}">


      <!-- Datatable Styles -->
      <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

      <!-- Responsive Styles -->
      <link rel="stylesheet" href="{{ asset("assets/css/responsive.css") }}">
      <!--SWEETALERT-->
      <!--<link href="sweetalert2/sweetalert2.css" rel="stylesheet" />-->
      <link href="{{ asset("assets/dist/sweetalert.css") }}" rel="stylesheet" />



</head>
<body>
  <div id="page-wrapper">
  <header id="header" class="navbar-static-top">
    <div style="background-image:url({{ asset("assets/images/header.png") }}); position: fixed;" class="topnav hidden-xs">
        <div class="container">

            <ul class="quick-menu pull-right">
              <li class="ribbon">


                  @if (!Auth::guest())
                        <a href="#">Bienvenido Usuario: {{ Auth::user()->name }}</a>
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
  </header>
  <section id="content" class="gray-area">
      <div class="container">
          <div id="main">
              <div class="tab-container full-width-style arrow-left dashboard">
                  <ul class="tabs">
                      <li class="active"><a data-toggle="tab" href="#dashboard"><i class="soap-icon-anchor circle"></i>Inicio</a></li>
                      <li class=""><a data-toggle="tab" href="#booking"><i class="soap-icon-businessbag circle"></i>Compañias</a></li>
                      <li class=""><a data-toggle="tab" href="#wishlist"><i class="soap-icon-wishlist circle"></i>Servicios</a></li>
                      <li class=""><a data-toggle="tab" href="#travel-stories"><i class="soap-icon-conference circle"></i>Estimados</a></li>
                      <li class=""><a data-toggle="tab" href="#travel-stories"><i class="soap-icon-conference circle"></i>Facturas</a></li>
                      <li class=""><a data-toggle="tab" href="#travel-stories"><i class="soap-icon-conference circle"></i>Reportes</a></li>
                      <li class=""><a data-toggle="tab" href="#profile"><i class="soap-icon-user circle"></i>Perfil</a></li>
                      <li class=""><a data-toggle="tab" href="#settings"><i class="soap-icon-settings circle"></i>Configuración</a></li>
                  </ul>
                  <div class="tab-content">
                    <div id="contenido" class="tab-pane fade in active">


                        	@yield('contenido')

                    </div>
                  </div>
                </div>
              </div>
          </div>
      </section>
      <!-- Javascript -->
      <script type="text/javascript" src="{{ asset("assets/js/jquery-1.11.1.min.js") }}"></script>

      <script type="text/javascript" src="{{ asset("assets/js/jquery-ui.1.10.4.min.js") }}"></script>
      <!-- Twitter Bootstrap -->
      <script type="text/javascript" src="{{ asset("assets/js/bootstrap.min.js") }}"></script>
      @yield('scripts')
</body>
</html>
