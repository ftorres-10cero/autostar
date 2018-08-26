<?

include ('xajax/xajax.inc.php');

$link=mysql_connect('localhost','root','root');
mysql_select_db('ngc',$link);


//instanciamos el objeto de la clase xajax
$xajax = new xajax(); 
$xajax->setCharEncoding('ISO-8859-1');
$xajax->decodeUTF8InputOn();


function select_combinado_cuerpos($catalogo){
   //función para crear el select combinado
   //debe extraer las opciones de un select a partir de un parámetro
   //creo las distintas opciones del select
   
   $nuevo_select = "<select name='cuerpo' id='cuerpo' title='Cuerpo'>";  
    
   if($catalogo == "Messier")
   {
				$sql_cuerpo = " SELECT ID, Messier FROM ngc WHERE Messier IS NOT NULL ORDER BY Messier";
				$query_cuerpo = mysql_query($sql_cuerpo);
				   		
				   		
   			while($row = mysql_fetch_array($query_cuerpo))
   			{
   		 		$nuevo_select .= '<OPTION value="'.$row['ID'].'">M-'.$row['Messier'].'</OPTION>';
   		 	}
   		
   }

   if($catalogo == "NGC")
   {
				$sql_cuerpo = " SELECT ID, NGC FROM ngc WHERE NGC IS NOT NULL ORDER BY NGC";
				$query_cuerpo = mysql_query($sql_cuerpo);
				   		
				   		
   			while($row = mysql_fetch_array($query_cuerpo))
   			{
   		 		$nuevo_select .= '<OPTION value="'.$row['ID'].'">NGC-'.$row['NGC'].'</OPTION>';
   		 	}
   		
   }

   if($catalogo == "GC")
   {
				$sql_cuerpo = " SELECT ID, GC FROM ngc WHERE GC!='-' GROUP BY GC ORDER BY GC ";
				$query_cuerpo = mysql_query($sql_cuerpo);
				   		
				   		
   			while($row = mysql_fetch_array($query_cuerpo))
   			{
   		 		$nuevo_select .= '<OPTION value="'.$row['ID'].'">GC-'.str_pad($row['GC'],4,"0",STR_PAD_LEFT).'</OPTION>';
   		 	}
   		
   }
   
   	 
/*
	$sql_destinos = " SELECT l.cod_destino,";
	$sql_destinos.= "        l.cod_zona, ";
	$sql_destinos.= "        l.estado, ";
	$sql_destinos.= "        d.nombre, ";
	$sql_destinos.= "        d.descripcion ";
	$sql_destinos.= "  FROM ".T_IDIOMA." i, " . T_RENT_DESTINO ." l LEFT JOIN ".T_RENT_DEST_DETALLE." d ON l.id_destino = d.id_destino";
	$sql_destinos.= "  WHERE cod_zona='" . $id_zona."' AND estado='1' AND i.idioma= '" . $_SESSION['sess_idioma'] . "' AND (d.id_idioma=i.id_idioma OR isnull(d.id_idioma)) ORDER BY d.nombre";


       $result_poblacion = mysql_query ($sql_destinos) or die (mysql_error());
       while ($row = mysql_fetch_array ($result_poblacion)){

		if ($loc_fin==$row['cod_destino'])
			$condicion = "selected";
		else
			$condicion = "";
              $nuevo_select .= '<OPTION value="'.$row['cod_destino'].'" '.$condicion.'>'.$row['nombre'].'</OPTION>';
         }
*/
   $nuevo_select .= "</select>";
   return $nuevo_select;
}




function generar_catalogo($catalogo){
   //instanciamos el objeto para generar la respuesta con ajax
   $respuesta = new xajaxResponse('ISO-8859-1');
   
   $nuevo_select = select_combinado_cuerpos($catalogo);
   //escribimos en la capa con id="seleccombinado" 
   $respuesta->addAssign("selectcuerpos","innerHTML",$nuevo_select);
   
   //tenemos que devolver la instanciación del objeto xajaxResponse
   return $respuesta;
}



$xajax->registerFunction("generar_catalogo");

//El objeto xajax tiene que procesar cualquier petición
$xajax->processRequests();

/// FIN AJAX



$combo_catalogo = "<select name='catalogo' onchange='xajax_generar_catalogo(document.formulario.catalogo.options[document.formulario.catalogo.selectedIndex].value)'>
		<option value=''>Todos</option>
		<option value='NGC'>NGC</option>
		<option value='GC'>GC</option>
		<option value='Messier'>Messier</option>
	</select>";

$html = "
<html>
<head>".$xajax->printJavascript("xajax/")."
</head>
<body>
<form name='formulario'>
".$combo_catalogo."
<div id='selectcuerpos'></div>
</form>
</body>
</html>";


echo $html;

?>