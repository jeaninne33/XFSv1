<?php 
$errors = '';
$myemail = 'josmer@xflightsupport.com';//<-----Put Your email address here.
if(empty($_POST['name'])  || 
   empty($_POST['email']) || 
   empty($_POST['message']) ||
   empty($_POST['phone']))
{
    $errors .= "Error: Nombre Completo, Correo y Mensaje Estan Vacios";
}

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
    
    mail($to,$email_subject,$email_body,$headers);

    $success_msg = "Su mensaje se envio correctamente, pronto recibira respuesta por parte del equipo de Xflight Support!";
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
<meta name="keywords" content="Flight Support, Handling, Ground Handling, Flight, Jet fuel , Flight permits, Private Aviation,
Charter, Aviation, Fuel, fbo, aircraft, fuel card, xflight support, Soporte de vuelo, Servicio aéreo, Volar, Combustible,
Permiso de vuelos, Aviación privada, Aviación, Combustible, abastecimiento de combustible, Venezuela, Isla de Margarita,
Nueva Esparta, jet privado, jet, apoyo en tierra, aeronave" />
<meta name="description" content="En XFlightSupport nos dedicamos a ofrecer soluciones aéreas y prestar servicios de calidad para la aviación en general;
especializados en el suministro de combustible, seguridad, alojamiento, traslados, permiso de vuelo y sobre vuelo, planificación, soporte de navegación,
tramites de impuesto y servicios meteorológicos">
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
<!--SWEETALERT-->
<!--<link href="sweetalert2/sweetalert2.css" rel="stylesheet" />-->
<link href="dist/sweetalert.css" rel="stylesheet" />
<!--footer header-->
<script src="js/header-footer.js"></script>
<script src="js/w3data.js"></script>
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
        
        <div w3-include-html="header.html"></div>
       
       
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
                            <ul class="discover triangle hover row">
                                <li class="col-xs-7"><a href="acerca.html">QUIENES SOMOS</a></li>
                                <li class="col-xs-12"><a href="politica-privacidad.html">POLÍTICAS DE PRIVACIDAD</a></li>
                                <li class="col-xs-7"><a href="terminos-de-usos.html">TERMINOS DE USOS</a></li>
                            </ul>
                            <br />
                          
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
                                <li class="col-xs-7"><a href="asistencia-viajero.html">ASISTENCIA DEL VIAJERO 24/7</a></li>
                                <li class="col-xs-7"><a href="alquiler-autos.html">ALQUILER DE AUTOS</a></li>
                                <li class="col-xs-8"><a href="traslados.html">TRANSPORTACIÓN TERRESTRE </a></li>
                                <li class="col-xs-7"><a href="servicios-especiales.html">SERVICIOS ESPECIALES</a></li>
                            </ul>

                        </div>
                        <div class="col-sm-6 col-md-1 col-md-pull-1">
                            <h2><a href="compañia.html">COMPAÑIA</a></h2>
                        </div>     
                        <div class="col-sm-6 col-md-3">
                            <h2><a href="tarjetas-servicios.html">TARJETA DE SERVICIOS</a></h2>
                        </div>     
                    <div class="col-sm-6 col-md-1">
                     <h2><a href="combustible.html">COMBUSTIBLE</a></h2>
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
                        <a href="index.html" title="XFlightSupport - Inicio">
                            <img src="images/logo.png" alt="XflightSupport" />
                        </a>
                    </div>
                    <div class="pull-right">
                        <a id="back-to-top" href="#" class="animated" data-animation-type="bounce"><i class="soap-icon-longarrow-up circle"></i></a>
                    </div>
                    <div class="copyright pull-right">
                        <p>&copy; 2016 XFlighSupport</p>
                    </div>
                    <!--<div class=" copyright pull-right">
                   <a href="terminos-de-usos.html">Terminos de Usos</a>
                    </div>
                    <div class=" copyright pull-right">
                        <a href="politica-privacidad.html">Politicas de Privacidad</a>
                    </div>-->
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

