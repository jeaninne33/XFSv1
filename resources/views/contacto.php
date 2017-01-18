<?php 
$errors = '';
$myemail = 'johnny@xflightsupport.com';//<-----Put Your email address here.
if(empty($_POST['name'])  || 
   empty($_POST['email']) || 
   empty($_POST['message']) ||
   empty($_POST['phone']))
{
    $errors .= "Error: Nombre Completo, Correo y Mensaje Estan Vacios";
}else{

$name = $_POST['name']; 
$email_address = $_POST['email']; 
$subject = isset($_POST['subject']) ? $_POST['subject'] : "";
$message = $_POST['message'];
$website = isset($_POST['website']) ? $_POST['website'] : "";
$phone   = isset($_POST['phone']) ? $_POST['phone']: "";

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "<br />Error: Dirección de Correo Electronico Invalida";
}

if( empty($errors))
{
    $to = $myemail; 
    $email_subject = "Formulario de contacto" . (empty($subject) ? "" : ": " . $subject);
    $email_body = "Has recibido nuevo mensaje. ".
    " Aqui estan los detalles:\n\nNombre Completo: $name \nCorreo: $email_address " . (empty($website) ? "" : "\nWebsite: " . $website). (empty($phone) ? "" : "\nTelefono: " . $phone) . "\nMensaje: \n\n$message"; 
    
    $headers = "From: $myemail\n"; 
    $headers .= "Reply-To: $email_address";
	$headers .='Cc: gregorio@xflightsupport.com' . "\r\n";
    
    mail($to,$email_subject,$email_body,$headers);

    $success_msg = "Su mensaje se envio correctamente, pronto recibira respuesta por parte del equipo de Xflight Support!";
} 
}
?>

<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
<head>
    <!-- Page Title -->
    <title>XFlightSupport</title>
    
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="keywords" content="fuel" />
    <meta name="description" content="XFlightSupport">
    <meta name="author" content="XFS">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icoXFS.ico" type="image/x-icon">
    
    <!-- Theme Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/animate.min.css">
    
    <!-- Current Page Styles -->
    <link rel="stylesheet" type="text/css" href="components/revolution_slider/css/settings.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="components/revolution_slider/css/style.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="components/jquery.bxslider/jquery.bxslider.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="components/flexslider/flexslider.css" media="screen" />
    
    <!-- Main Style -->
    <link id="main-style" rel="stylesheet" href="css/style.css">
    
    <!-- Updated Styles -->
    <link rel="stylesheet" href="css/updates.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="css/custom.css">
    
    <!-- Responsive Styles -->
    <link rel="stylesheet" href="css/responsive.css">
    
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
    <!-- <script type="text/javascript" src="js/pace.min.js" data-pace-options='{ "ajax": false }'></script>
    <script type="text/javascript" src="js/page-loading.js"></script> -->
</head>
<body>
    <div id="page-wrapper">
        <header id="header" class="navbar-static-top">
            <div style="background-image:url(images/header.png)" class="topnav hidden-xs">
                <div class="container">
                    <ul class="quick-menu pull-left">
                        <!--<li><a href="#">My Account</a></li>-->
                        <li ><a>TELEFONOS +1 888 414 2838</a></li>
                        <li class="ribbon">
                            <a href="#">Español</a>
                            <ul class="menu mini">                               
                                <li><a href="en/index.html" title="Inglés">Inglés</a></li>
                                                           
                            </ul>
                        </li>
                    </ul>

              
                    <ul class="quick-menu pull-right">
                       
                        <li><a href="#" class="soap-popupbox">INICIO SESIÓN</a></li>
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
                
                <a href="#" data-toggle="collapse" class="mobile-menu-toggle">
                    Mobile Menu Toggle
                </a>

                <div class="container">
                    <h1 class="logo navbar-brand">
                        <a href="index.html" title="XFlight Support - Inicio">
                            <img src="images/logo.png" alt="XflightSupport" />
                        </a>
                    </h1>

                    <nav id="main-menu" role="navigation">
                        <ul class="menu">
                                  <li class="menu-item-has-children">
                                <a href="index.html">INICIO</a>
                              
                            </li>
                            <li class="menu-item-has-children">
                                <a href="servicios.html">SERVICIOS</a>
                                <ul>
                                    <li><a href="servicio-meteorologico.html">SERVICIO METEOROLÓGICO</a></li>
                                    <li><a href="handling.html">HANDLING</a></li>
                                    <li><a href="Catering.html">CATERING DELUXE</a></li>
                                    <li><a href="planificacion-vuelo.html">PLANIFICACIÓN DE VUELO</a></li>
                                    <li><a href="permisos-vuelo.html">PERMISOS DE VUELO</a></li>
                                    <li><a href="tramites-inmigracion.html">TRAMITES DE INMIGRACIÓN</a></li>
                                    <li><a href="reserva-hotel.html">RESERVA DEL HOTEL</a></li>
                                    <li><a href="asistencia-viajero.html">ASISTENCIA DEL VIAJERO 24/7</a></li>
                                    <li><a href="alquiler-autos.html">ALQUILER DE AUTOS</a></li>
                                    <li><a href="traslados.html">TRANSPORTACIÓN TERRESTRE </a></li>
                                    <li><a href="servicios-especiales.html">SERVICIOS ESPECIALES</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="compañia.html">COMPAÑIA</a>
                                  <ul>
                                    <li><a href="acerca.html">QUIENES SOMOS</a></li>
                                  
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="tarjetas-servicios.html">TARJETA DE SERVICIOS</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="combustible.html">COMBUSTIBLE</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="contacto.html">CONTACTO</a>
                            </li>

                        </ul>
                    </nav>
                </div>

                <nav id="mobile-menu-01" class="mobile-menu collapse">
                    <ul id="mobile-primary-menu" class="menu">
                        <li class="menu-item-has-children">
                            <a href="index.html">INICIO</a>
                           
                        </li>
                        <li class="menu-item-has-children">
                            <a href="servicios.html">SERVICIOS</a>
                            <ul>
                                <li><a href="servicio-meteorologico.html">SERVICIO METEOROLÓGICO</a></li>
                                <li><a href="handling.html">HANDLING</a></li>
                                <li><a href="Catering.html">CATERING DELUXE</a></li>
                                <li><a href="planificacion-vuelo.html">PLANIFICACIÓN DE VUELO</a></li>
                                <li><a href="permisos-vuelo.html">PERMISOS DE VUELO</a></li>
                                <li><a href="tramites-inmigracion.html">TRAMITES DE INMIGRACIÓN</a></li>
                                <li><a href="reserva-hotel.html">RESERVA DEL HOTEL</a></li>
                                <li><a href="asistencia-viajero.html">ASISTENCIA DEL VIAJERO 24/7</a></li>
                                <li><a href="alquiler-autos.html">ALQUILER DE AUTOS</a></li>
                                <li><a href="traslados.html">TRANSPORTACIÓN TERRESTRE </a></li>
                                <li><a href="servicios-especiales.html">SERVICIOS ESPECIALES</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="compañia.html">COMPAÑIA</a>
                             <ul>
                                <li><a href="acerca.html">QUIENES SOMOS</a></li>
                               
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="tarjetas_servicios.html">TARJETA DE SERVICIOS</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="combustible.html">COMBUSTIBLE</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="contacto.html">CONTACTO</a>
                        </li>
                       
                    </ul>
                    
                    <ul class="mobile-topnav container">
                        <!--<li><a href="#">MY ACCOUNT</a></li>-->
                        <li><a href="#">TELEFONOS +1 888 414 2838</a></li>
                        <li class="ribbon language menu-color-skin">
                            <a href="#" data-toggle="collapse">ESPAÑOL</a>
                            <ul class="menu mini">                             
                                <li><a href="#" title="English">English</a></li>
                                <li><a class="active" title="Español">Español</a></li>                               
                            </ul>
                        </li>
                      
                        <li><a href="#" class="soap-popupbox">INICIO SESIÓN</a></li>
                        <!--<li><a href="#" class="soap-popupbox">SIGNUP</a></li>-->
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
       
        <section id="content">
            <div class="container">
                <div id="main">
                    <?php if (!empty($errors)) { ?>
                        <div class="alert alert-error">
                            <?php echo $errors; ?>
                            <span class="close"></span>
                        </div>
                    <?php } else if (!empty($success_msg)) { ?>
                        <div class="alert alert-success">
                            <?php echo $success_msg; ?>
                            <span class="close"></span>
                        </div>
                    <?php }    ?>
                    <br />
                    <a class="button btn-small sky-blue1" onclick="history.go(-1);">Atrás</a>
                </div>
            </div>
        </section>
        
          <footer style="background-image: url(images/footer.png);" id="footer">
            <div class="footer-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <h2><a href="index.html">INICIO</a></h2>
                            <h2><a href="compañia.html">COMPAÑIA</a></h2>
                             <ul class="discover triangle hover row">
                                <li class="col-xs-7"><a href="acerca.html">QUIENES SOMOS</a></li>
                            </ul>
                            <br/>
                            <h2><a href="tarjetas-servicios.html">TARJETA DE SERVICIOS</a></h2>
                            <h2><a href="combustible.html">COMBUSTIBLE</a></h2>
                        </div>
                       

                        <div class="col-sm-6 col-md-4">
                            <h2><a href="servicios.html">SERVICIOS</a></h2>
                            <ul class="discover triangle hover row">
                                <li class="col-xs-7"><a href="servicio-meteorologico.html">SERVICIO METEOROLÓGICO</a></li>
                                <li class="col-xs-6"><a href="handling.html">HANDLING</a></li>
                                <li class="col-xs-7"><a href="Catering.html">CATERING DELUXE</a></li>
                                <li class="col-xs-7"><a href="planificacion-vuelo.html">PLANIFICACIÓN DE VUELO</a></li>
                                <li class="col-xs-7"><a href="permisos-vuelo.html">PERMISOS DE VUELO</a></li>
                                <li class="col-xs-7"><a href="tramites-inmigracion.html">TRAMITES DE INMIGRACIÓN</a></li>
                                <li class="col-xs-7"><a href="reserva-hotel.html">RESERVA DEL HOTEL</a></li>
                                <li class="col-xs-9"><a href="asistencia-viajero.html">ASISTENCIA DEL VIAJERO 24/7</a></li>
                                <li class="col-xs-7"><a href="alquiler-autos.html">ALQUILER DE AUTOS</a></li>
                                <li class="col-xs-8"><a href="traslados.html">TRANSPORTACIÓN TERRESTRE </a></li>
                                <li class="col-xs-7"><a href="servicios-especiales.html">SERVICIOS ESPECIALES</a></li>
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
                                <a  class="contact-email"><i style="color:#ffffff" class="soap-icon-letter"></i>  info@xflightsupport.com</a>
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
                        <a href="index.html" title="XFlightSupport - Inicio">
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
                   <a href="terminos-de-usos.html">Terminos de Usos</a>
                </div>
                <div class=" copyright pull-right">
                    <a href="politica-privacidad.html">Politicas de Privacidad</a>
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
    
</body>
</html>

