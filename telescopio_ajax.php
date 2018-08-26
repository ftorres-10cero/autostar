<?

// LIBRERIA DE FUNCIONES AJAX PARA EL CONTROL DEL MANDO A DISTANCIA


/// COMIENZO AJAX

include ('xajax/xajax.inc.php');


//instanciamos el objeto de la clase xajax
$xajax = new xajax(); 
$xajax->setCharEncoding('ISO-8859-1');
$xajax->decodeUTF8InputOn();




function MoveNorth()
{
	$tele = $_SESSION['telescopio'];
	$msg = $tele->MoveNorth();


	$respuesta = new xajaxResponse('ISO-8859-1');

	$respuesta->addPrepend("resultado","innerHTML",$msg);
	return $respuesta;

}

function StopNorth()
{
 	$tele = $_SESSION['telescopio'];
	$msg = $tele->StopNorth();

	$respuesta = new xajaxResponse('ISO-8859-1');

	$respuesta->addPrepend("resultado","innerHTML",$msg);
	return $respuesta;
}


function MoveSouth()
{
	$tele = $_SESSION['telescopio'];

	$msg = $tele->MoveSouth();

	$respuesta = new xajaxResponse('ISO-8859-1');
	$respuesta->addPrepend("resultado","innerHTML",$msg);
	return $respuesta;

}

function StopSouth()
{
 	$tele = $_SESSION['telescopio'];
	$msg = $tele->StopSouth();

	$respuesta = new xajaxResponse('ISO-8859-1');
	$respuesta->addPrepend("resultado","innerHTML",$msg);
	return $respuesta;
}

function MoveEast()
{
	$tele = $_SESSION['telescopio'];

	$msg = $tele->MoveEast();

	$respuesta = new xajaxResponse('ISO-8859-1');
	$respuesta->addPrepend("resultado","innerHTML",$msg);
	return $respuesta;

}

function StopEast()
{
   	$tele = $_SESSION['telescopio'];

	$msg = $tele->StopEast();

	$respuesta = new xajaxResponse('ISO-8859-1');
	$respuesta->addPrepend("resultado","innerHTML",$msg);
	return $respuesta;
}

function MoveWest()
{
	$tele = $_SESSION['telescopio'];

	$msg = $tele->MoveWest();


	$respuesta = new xajaxResponse('ISO-8859-1');
	$respuesta->addPrepend("resultado","innerHTML",$msg);
	return $respuesta;

}

function StopWest()
{
   	$tele = $_SESSION['telescopio'];

	$msg = $tele->StopWest();

	$respuesta = new xajaxResponse('ISO-8859-1');
	$respuesta->addPrepend("resultado","innerHTML",$msg);
	return $respuesta;
}



function StopAll()
{
   	$tele = $_SESSION['telescopio'];

	$msg = $tele->StopAll();

	$respuesta = new xajaxResponse('ISO-8859-1');
	$respuesta->addPrepend("resultado","innerHTML",$msg);
	return $respuesta;
}


function SetSpeed($n)
{
   	$tele = $_SESSION['telescopio'];

	$msg = $tele->SetSpeed($n);

	$respuesta = new xajaxResponse('ISO-8859-1');
	$respuesta->addPrepend("resultado","innerHTML",$msg);
	return $respuesta;
}


function GetCoord()
{
  $tele = $_SESSION['telescopio'];

//	$ar = $tele->GetAR($n);
	
//	$dec = $tele->GetDec($n);

	//$msg = "AR&nbsp;&nbsp;=&nbsp;".$tele->coord_AR[0].":".$tele->coord_AR[1].":".$tele->coord_AR[2]."<br>Dec&nbsp;=&nbsp;".$tele->coord_DEC[0].$tele->coord_DEC[1]."º".$tele->coord_DEC[2].":".$tele->coord_DEC[3];

	$msg = $tele->GetCoord();
	
	return (PrintScreen($msg));

}


function FocusIn()
{
 	$tele = $_SESSION['telescopio'];
	$msg = $tele->FocusIn();

	return PrintScreen("Control enfoque:<br> ATRAS",$msg);
	
}	

function FocusOut()
{
 	$tele = $_SESSION['telescopio'];
	$msg = $tele->FocusOut();

	return PrintScreen("Control enfoque:<br> ADELANTE",$msg);
	
}	

function StopFocus()
{
 	$tele = $_SESSION['telescopio'];
	$msg = $tele->StopFocus();

	return PrintScreen("",$msg);
	
}	

function SetFocus($n)
{
 	$tele = $_SESSION['telescopio'];
	$msg = $tele->SetFocus($n);
	
	$velocidad[1] = "Muy Lento";
	$velocidad[2] = "Lento";
	$velocidad[3] = "Rapido";
	$velocidad[4] = "Muy Rapido";

	return PrintScreen("Control Velodidad:<br> ".$velocidad[$n],$msg);
	
}	

function PrintScreen($msg,$cmd='')
{
	$respuesta = new xajaxResponse('ISO-8859-1');
	$respuesta->addAssign("pantalla","innerHTML",$msg);
	$respuesta->addPrepend("resultado","innerHTML",$cmd);
	return $respuesta;

}	

function FGoTo()
{
 	$tele = $_SESSION['telescopio'];
 	$coord = $_SESSION['coord'];
 	
 	$coord[AR][0]='12';
 	$coord[AR][1]='20';
 	$coord[AR][2]='20';
 	
 	$coord[Dec][0]=chr(45);
 	$coord[Dec][1]='50';
 	$coord[Dec][2]='20';
 	$coord[Dec][3]='20';
 	
	$msg = $tele->GoTo($coord['AR'][0],$coord['AR'][1],$coord['AR'][2],$coord['Dec'][0],$coord['Dec'][1],$coord['Dec'][2],$coord['Dec'][3]);

	return PrintScreen("GOTO:<br> ",$msg);
}	



//asociamos la función creada anteriormente al objeto xajax
$xajax->registerFunction("MoveNorth");
$xajax->registerFunction("StopNorth");
$xajax->registerFunction("MoveSouth");
$xajax->registerFunction("StopSouth");
$xajax->registerFunction("MoveWest");
$xajax->registerFunction("StopWest");
$xajax->registerFunction("MoveEast");
$xajax->registerFunction("StopEast");
$xajax->registerFunction("StopAll");
$xajax->registerFunction("SetSpeed");
$xajax->registerFunction("GetCoord");
$xajax->registerFunction("FocusIn");
$xajax->registerFunction("FocusOut");
$xajax->registerFunction("StopFocus");
$xajax->registerFunction("SetFocus");
$xajax->registerFunction("PrintScreen");
$xajax->registerFunction("FGoTo");

//El objeto xajax tiene que procesar cualquier petición
$xajax->processRequests();



/// FIN AJAX

?>