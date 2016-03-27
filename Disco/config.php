<?php
	if ($_GET['config'] == 'y') {
		$space = '../';
	}
	else $space='';
	$conecta=$space.'Estructura/conn.php';
	$genero=$space.'generos/';
	$extension='.php';
	$ruta_img_gen=$space.'img/gen/';
	$interpretes=$space.'interpretes/';
	$ruta_img_inter=$space.'img/interpretes/';
	$head='<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Grayscale - Start Bootstrap Theme</title>

        <!-- Bootstrap Core CSS -->
        <link href="'.$space.'css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="'.$space.'css/grayscale.css" rel="stylesheet">
    	<link href="'.$space.'css/estilos.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="'.$space.'font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->';
    $script = '<script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="'.$space.'js/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="'.$space.'js/jquery.easing.min.js"></script>

        <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

        <!-- Custom Theme JavaScript -->
        <script src="'.$space.'js/grayscale.js"></script>';
    $footer=' <footer>
            <div class="container text-center">
                <p>Copyright &copy; Your Website 2014</p>
            </div>
        </footer>';
?>