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
                        <li><a href="{{URL::to('pagina/acerca')}}">QUIENES SOMOS</a></li>

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
