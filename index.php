<?php 


// CARGAMOS TELESOCPIO
include('autostar.class.php');

//	## CONEXION
//	$_com = 5334;
//	$_server = "127.0.0.1";

if(empty($_SESSION['telscopio']))
{
	// $_SESSION['conexion'] = fsockopen ($_server, $_com, $errno, $errstr, 5);
  // $_SESSION['conexion'] = fopen ("COM4:", "w+");
	$_SESSION['telescopio'] = new autostar;
}

// FIN TELESCOPIO



include('telescopio_ajax.php');
include('mando_autostar.php');


$plt = "<html>
<head><div></div>
<style>".$style_mando."
</style>
".$xajax->printJavascript("xajax/")."
</head>
<body onload='xajax_GetCoord()'>
".$mando."
</body>
</html>";

echo $plt;



?>























