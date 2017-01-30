<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
<head>
    <!-- Page Title -->
    <title>XFlightSupport</title>

    <!-- Meta Tags -->
    <meta charset="utf-8">

	<link rel="shortcut icon" href="icoXFS.ico" type="image/x-icon">

    <!-- Theme Styles -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/css/animate.min.css">


    <!-- Main Style -->
    <link id="main-style" rel="stylesheet" href="assets/css/style.css">

    <!-- Updated Styles -->
    <link rel="stylesheet" href="assets/css/updates.css">
    <!-- Datatable Styles -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">


    <!-- Responsive Styles -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!--SWEETALERT-->
    <!--<link href="sweetalert2/sweetalert2.css" rel="stylesheet" />-->
    <link href="dist/sweetalert.css" rel="stylesheet" />


</head>
<body>
	<nav>
		<a href="/">Inicio</a> |
		@yield('menu-navegacion')
	</nav>

	<img src="http://www.unixstickers.com/image/cache/data/buttons/png/php_logo-600x600.png" alt="Logo PHP">

	<section>
		@yield('contenido')
	</section>

</body>
</html> 
