<?

$style_mando = "

.pantalla {
background:none repeat scroll 0 0 #000000;
color:#AA0000;
font-family:Verdana;
font-size:14px;
line-height:100%;
padding:2px;
overflow:hidden;
height:33px;
}

";

$mando = "<form id='formulario' name='formulario'>
<table id='Mando' width='292' height='477' border='0' cellpadding='0' cellspacing='0'>
	<tr>
		<td colspan='13'>
			<img src='imagenes/autostar_01.jpg' width='292' height='42' alt=''></td>
	</tr>
	<tr>
		<td colspan='2' rowspan='2'>
			<img src='imagenes/autostar_02.jpg' width='80' height='77' alt=''></td>
		<td colspan='9' height='37' style='background:none repeat scroll 0 0 #000000;'><div id='pantalla' class='pantalla'>Inicializando ... </div>
		<td colspan='2' rowspan='2'>
			<img src='imagenes/autostar_04.jpg' width='63' height='77' alt=''></td>
	</tr>
	<tr>
		<td colspan='9'>
			<img src='imagenes/autostar_05.jpg' width='149' height='40' alt=''></td>
	</tr>
	<tr>
		<td rowspan='9'>
			<img src='imagenes/autostar_06.jpg' width='74' height='357' alt=''></td>
		<td colspan='3'>
			<img src='imagenes/tecla_enter.jpg' width='58' height='34' alt=''></td>
		<td colspan='5'>
			<img src='imagenes/tecla_mode.jpg' width='53' height='34' alt=''></td>
		<td colspan='3'>
			<img src='imagenes/tecla_goto.jpg' width='52' height='34' alt='GoTo'  onclick='xajax_FGoTo()' ></td>
		<td rowspan='9'>
			<img src='imagenes/autostar_10.jpg' width='55' height='357' alt=''></td>
	</tr>
	<tr>
		<td colspan='2' rowspan='8'>
			<img src='imagenes/autostar_11.jpg' width='16' height='323' alt=''></td>
		<td colspan='7'>
			<IMG SRC='imagenes/tecla_cursores.jpg' WIDTH=133 HEIGHT=98 BORDER=0 ISMAP USEMAP='#tecla_cursores.jpg'></td>
		<td colspan='2' rowspan='8'>
			<img src='imagenes/autostar_13.jpg' width='14' height='323' alt=''></td>
	</tr>
	<tr>
		<td colspan='2'>
			<img src='imagenes/tecla_1.jpg' width='45' height='34' href='#' onmousedown='xajax_SetSpeed(1);xajax_SetFocus(1)' alt='Velocidad de movimiento/enfoque: Muy Lento'></td>
		<td colspan='2'>
			<img src='imagenes/tecla_2.jpg' width='43' height='34'  href='#' onmousedown='xajax_SetSpeed(2);xajax_SetFocus(2)' alt='Velocidad de movimiento/enfoque: Lento'></td>
		<td colspan='3'>
			<img src='imagenes/tecla_3.jpg' width='45' height='34'  href='#' onmousedown='xajax_SetSpeed(2);xajax_SetFocus(2)' alt='Velocidad de movimiento/enfoque: Lento'></td>
	</tr>
	<tr>
		<td colspan='2'>
			<img src='imagenes/tecla_4.jpg' width='45' height='32'  href='#' onmousedown='xajax_SetSpeed(3);xajax_SetFocus(3)' alt='Velocidad de movimiento/enfoque: Rapido'></td>
		<td colspan='2'>
			<img src='imagenes/tecla_5.jpg' width='43' height='32'  href='#'  onmousedown='xajax_SetSpeed(3);xajax_SetFocus(3)' alt='Velocidad de movimiento/enfoque: Rapido'></td>
		<td colspan='3'>
			<img src='imagenes/tecla_6.jpg' width='45' height='32' href='#'  onmousedown='xajax_SetSpeed(3);xajax_SetFocus(3)' alt='Velocidad de movimiento/enfoque: Rapido'></td>
	</tr>
	<tr>
		<td colspan='2' rowspan='2'>
			<img src='imagenes/tecla_7.jpg' width='45' height='29' href='#'  onmousedown='xajax_SetSpeed(4);xajax_SetFocus(4)' alt='Velocidad de movimiento/enfoque: Muy Rapido'></td>
		<td colspan='2'>
			<img src='imagenes/tecla_8.jpg' width='43' height='28' href='#'  onmousedown='xajax_SetSpeed(4);xajax_SetFocus(4)' alt='Velocidad de movimiento/enfoque: Muy Rapido'></td>
		<td colspan='3'>
			<img src='imagenes/tecla_9.jpg' width='45' height='28' href='#'  onmousedown='xajax_SetSpeed(4);xajax_SetFocus(4)' alt='Velocidad de movimiento/enfoque: Muy Rapido'></td>
	</tr>
	<tr>
		<td colspan='3' rowspan='2'>
			<img src='imagenes/tecla_0.jpg' width='44' height='35' alt='Cambiar velocidad:".$texto_velocidad."' onclick='xajax_SetFocus(".$velocidad.")'></td>
		<td colspan='2'>
			<img src='imagenes/autostar_24.jpg' width='44' height='1' alt=''></td>
	</tr>
	<tr>
		<td colspan='2'>
			<img src='imagenes/autostar_25.jpg' width='45' height='34' alt=''></td>
		<td colspan='2'>
			<img src='imagenes/autostar_26.jpg' width='44' height='34' alt=''></td>
	</tr>
	<tr>
		<td colspan='3'>
			<img src='imagenes/tecla_up.jpg' width='46' height='36' alt='Enfoque +' onmousedown='xajax_FocusIn()' onmouseup='xajax_StopFocus()'></td>
		<td>
			<img src='imagenes/tecla_help.jpg' width='42' height='36' alt='Consultar Posición' onclick='xajax_GetCoord()' ></td>
		<td colspan='3'>
			<img src='imagenes/tecla_down.jpg' width='45' height='36' alt='Enfoque -'  onmousedown='xajax_FocusOut()' onmouseup='xajax_StopFocus()'></td>
	</tr>
	<tr>
		<td colspan='7'>
			<img src='imagenes/autostar_30.jpg' width='133' height='60' alt=''></td>
	</tr>
	<tr>
		<td>
			<img src='imagenes/espacio.gif' width='74' height='1' alt=''></td>
		<td>
			<img src='imagenes/espacio.gif' width='6' height='1' alt=''></td>
		<td>
			<img src='imagenes/espacio.gif' width='10' height='1' alt=''></td>
		<td>
			<img src='imagenes/espacio.gif' width='42' height='1' alt=''></td>
		<td>
			<img src='imagenes/espacio.gif' width='3' height='1' alt=''></td>
		<td>
			<img src='imagenes/espacio.gif' width='1' height='1' alt=''></td>
		<td>
			<img src='imagenes/espacio.gif' width='42' height='1' alt=''></td>
		<td>
			<img src='imagenes/espacio.gif' width='1' height='1' alt=''></td>
		<td>
			<img src='imagenes/espacio.gif' width='6' height='1' alt=''></td>
		<td>
			<img src='imagenes/espacio.gif' width='38' height='1' alt=''></td>
		<td>
			<img src='imagenes/espacio.gif' width='6' height='1' alt=''></td>
		<td>
			<img src='imagenes/espacio.gif' width='8' height='1' alt=''></td>
		<td>
			<img src='imagenes/espacio.gif' width='55' height='1' alt=''></td>
	</tr>
</table>
				<MAP NAME='tecla_cursores.jpg'>
				<AREA SHAPE='POLYGON' COORDS='39,21,58,36,69,35,82,36,99,21,92,17,84,14,69,13,53,15,39,21' href='#' onmousedown='xajax_MoveNorth()' onmouseup='xajax_StopNorth();xajax_GetCoord()' alt='Arriba'>
				<AREA SHAPE='POLYGON' COORDS='86,41,87,50,86,59,106,76,112,71,118,60,119,47,117,37,112,30,107,25,86,42' href='#' onmousedown='xajax_MoveWest()' onmouseup='xajax_StopWest();xajax_GetCoord()' alt='Derecha'>
				<AREA SHAPE='POLYGON' COORDS='82,65,99,80,95,83,80,88,68,89,49,86,39,80,58,65,69,67,82,65' href='#' onmousedown='xajax_MoveSouth()' onmouseup='xajax_StopSouth();xajax_GetCoord()' alt='Abajo'>
				<AREA SHAPE='POLYGON' COORDS='52,42,52,52,52,60,31,78,22,67,18,54,20,41,25,34,32,26,52,42' href='#' onmousedown='xajax_MoveEast()' onmouseup='xajax_StopEast();xajax_GetCoord()'  alt='Izquierda'>
				</MAP>
</form>
<div id='resultado'></div>";

?>