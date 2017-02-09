<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html ng-app="XHR"> <!--<![endif]-->
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

      <!-- Responsive Styles -->
      <link rel="stylesheet" href="{{ asset("assets/css/responsive.css") }}">
      <!--SWEETALERT-->
      <!--<link href="sweetalert2/sweetalert2.css" rel="stylesheet" />-->
      <link href="{{ asset("assets/dist/sweetalert.css") }}" rel="stylesheet" />

    @yield('css')

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
                      <li id="m1" class=""><a class="menu" id="1" data-toggle="tab" href="#dashboard"><i class="soap-icon-anchor circle"></i>Inicio</a></li>
                      <li id="m2" class=""><a class="menu" id="2" data-toggle="tab" href="#"><i class="soap-icon-businessbag circle"></i>Compañias</a></li>
                      <li id="m3" class=""><a class="menu" id="3"data-toggle="tab" href="#wishlist"><i class="soap-icon-wishlist circle"></i>Servicios</a></li>
                      <li id="m4" class=""><a class="menu" id="4" data-toggle="tab" href="#travel-stories"><i class="soap-icon-conference circle"></i>Estimados</a></li>
                      <li id="m5" class=""><a class="menu" id="5" data-toggle="tab" href="#travel-stories"><i class="soap-icon-conference circle"></i>Facturas</a></li>
                      <li id="m6" class=""><a class="menu" id="6"data-toggle="tab" href="#travel-stories"><i class="soap-icon-conference circle"></i>Reportes</a></li>
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
      <div id="dialog-confirm" title="Mensaje de Confirmación?">
      </div
      <!-- Javascript -->
      <script type="text/javascript" src="{{ asset("assets/js/jquery-1.11.1.min.js") }}"></script>

      <script type="text/javascript" src="{{ asset("assets/js/jquery-ui.1.10.4.min.js") }}"></script>
      <!-- Twitter Bootstrap -->
      <script type="text/javascript" src="{{ asset("assets/js/bootstrap.min.js") }}"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>

      <script>
      $('.menu').on('click',function(e){
            console.log(e);

            var id=$(this).attr("id");
           if (id==1){  // alert('10');
           }else if (id==2){
             window.location.href ="{{ route('companys.index') }}";
           }else if (id==3) {
              window.location.href ="{{ route('servicios.index') }}";
           }else if (id==4) {
            //  alert('31');
            window.location.href ="{{ route('estimates.index') }}";
           }else if (id==5) {
           }else  {
         //  alert('>41');
           }//fin si
      });
      </script>
      @yield('scripts')

</body>
</html>
