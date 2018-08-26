<?php

define('T_ESPERA',500000);

class autostar
{
	var $_device = null;
	var $_cmd = null;
	
	var $coord_AR = '';
	var $coord_DEC = '';
	

//	## CONEXION
	var $_com = 5331;
	var $_server = "127.0.0.1";

//	var $serial_port = "COM1";	
	
	## INTERNAS
	
//	function __construct()
//	{
//		$str = 'mode '.strtolower($this->serial_port).': BAUD=9600  PARITY=N data=8  stop=1 xon=off';
//		system($str);
//		echo $str;
 
//		$this->_device = fopen ($this->serial_port, "w+");
//			$this->_device = $_SESSION['conexion'];
//	}
	
//	function __destruct()
//	{
 
//		fclose($this->_device);
//	}
	
	## COMUNICACION
	
	
	function OpenConnect()
	{
			$esperar=0;
			
			$i=1;
			do
			{
				usleep($esperar);
				$resp = fsockopen ($this->_server, $this->_com, $errno, $errstr, 5);
				$esperar = T_ESPERA;
				$i++;
			}	
			while (!$resp);
			
			stream_set_blocking ($resp , 1 );
			$this->_device = $resp;
			
	}	

	function CloseConnect()
	{
			fclose($this->_device);
	}			
	
	function sendCommand()
	{
			 fputs ($this->_device, $this->msg );
	}
	
	function getMessage($num = 0)
	{
		stream_set_timeout($this->_device, 1);

		$respuesta ="";
		$i=0;
		$respuesta = stream_get_contents($this->_device);
/*		while ($caracter!='#' AND ($num==0 OR $i<$num))
		{
			$caracter = fgetc($this->_device);
			if($caracter!='#')
				$respuesta .= $caracter;
			$i++;
		}
*/		return ($respuesta);	
	}
	
	
	## MOVIMIENTOS
	
	
	function MoveNorth()
	{
		$this->OpenConnect();
		$this->msg = ":Mn#";
		$this->sendCommand();
		$this->CloseConnect();

		return $this->msg;

	}
	
	function MoveSouth()
	{
		$this->OpenConnect();
		$this->msg = ":Ms#";
		$this->sendCommand();
		$this->CloseConnect();
		
		return $this->msg;
	}

	
	function MoveWest()
	{
		$this->OpenConnect();
		$this->msg = ":Mw#";
		$this->sendCommand();
		$this->CloseConnect();
		
		return $this->msg;
	}

	function MoveEast()
	{
		$this->OpenConnect();
		$this->msg = ":Me#";
		$this->sendCommand();
		$this->CloseConnect();
		
		return $this->msg;
	}

	function Move2Target()
	{
		$this->OpenConnect();
		$this->msg = ":MS#";
		$this->sendCommand();
		
		$response = $this->getMessage(1);
		if($response)
		{
			$response_text = $this->getMessage();
		}
		else
		{
			$response_text = "OK";
		}
		$this->CloseConnect();

		return($response_text);
	}
	
	
	function StopNorth()
	{
		
		$this->OpenConnect();
		$this->msg = ":Qn#";
		$this->sendCommand();
		$this->CloseConnect();

		return $this->msg;
	}

	function StopSouth()
	{
		$this->OpenConnect();
		$this->msg = ":Qs#";
		$this->sendCommand();
		$this->CloseConnect();

		return $this->msg;
	}

	function StopWest()
	{
		$this->OpenConnect();
		$this->msg = ":Qw#";
		$this->sendCommand();
		$this->CloseConnect();

		return $this->msg;
	}

	function StopEast()
	{
		$this->OpenConnect();
		$this->msg = ":Qe#";
		$this->sendCommand();
		$this->CloseConnect();

		return $this->msg;
	}
	
	function StopAll()
	{
		$this->OpenConnect();
		$this->msg = ":Q#";
		$this->sendCommand();
		$this->CloseConnect();
		
		return $this->msg;
	}


	
	## ENFOCADOR
	
	function FocusIn()
	{
		$this->OpenConnect();
		$this->msg = ":F+#";
		$this->sendCommand();
		$this->CloseConnect();
		
		return $this->msg;
	}

	function FocusOut()
	{
		$this->OpenConnect();
		$this->msg = ":F-#";
		$this->sendCommand();
		$this->CloseConnect();
		
		return $this->msg;
	}
	
	function StopFocus()
	{
		$this->OpenConnect();
		$this->msg = ":FQ#";
		$this->sendCommand();
		$this->CloseConnect();
		
		return $this->msg;
	}

	function SetAR($hora,$minuto,$segundo)
	{
		$this->OpenConnect();
		$this->msg = ":Sr".$hora.":".$minuto.":".$segundo."#";
		$this->sendCommand();
		$respuesta = $this->getMessage(1);
		$this->CloseConnect();

		return $respuesta;
	}

	function SetDec($signo,$grado,$minuto,$segundo)
	{
		$this->OpenConnect();
		$this->msg = ":Sd".$signo.$grado.":".$minuto.":".$segundo."#";
		$this->sendCommand();
		$respuesta = $this->getMessage(1);
		$this->CloseConnect();

		return $respuesta;
	}


	function GoTo($ARhora,$ARminuto,$ARsegundo,$Decsigno,$Decgrado,$Decminuto,$Decsegundo)
	{
		$this->OpenConnect();

		$grado = chr(223);
//		$grado = '*';


		$this->msg = ":Sr".$ARhora.":".$ARminuto.":".$ARsegundo."#";				// Configuramos la AR del destino
		$this->sendCommand();
		$command = $this->msg;
		$this->msg = ":Sd".$Decsigno.$Decgrado.$grado.$Decminuto.":".$Decsegundo."#"; // Configuramos la Dec del destino
		$this->sendCommand();
		$command .= $this->msg;
		$this->msg = ":MS#";	// Ejecutamos el GOTO
		$this->sendCommand();
		$command .= $this->msg;
		$respuesta = $this->getMessage(3);
		$this->CloseConnect();

		return $command."(".$respuesta.")";
	}

	
	
	## CONSULTA
	
	
	function GetAR()
	{
		$this->OpenConnect();
		$this->msg = ":GR#";
		$this->sendCommand();
		$coord_AR = substr($this->getMessage(), 0,8);
		$this->CloseConnect();
		$this->coord_AR = split(':',$coord_AR);

		return $coord_AR;
	}

	function GetDEC()
	{
		$this->OpenConnect();
		$this->msg = ":GD#";
		$this->sendCommand();
		$coord_DEC = $this->getMessage();
		$this->CloseConnect();
		$this->coord_DEC[0] = substr($coord_DEC, 0,1);
		$this->coord_DEC[1] = substr($coord_DEC, 1,2);
		$this->coord_DEC[2] = substr($coord_DEC, 4,2);
		$this->coord_DEC[3] = substr($coord_DEC, 7,2);
		$coord_DEC = $this->coord_DEC[0].$this->coord_DEC[1]."º".$this->coord_DEC[2].":".$this->coord_DEC[3];
		
		return $coord_DEC;
	}
	
	
	function StopGetCoord($msg)
	{
		$this->OpenConnect();
		$this->msg .= $msg.":GR#:GD#";
		$this->sendCommand();
		$coord = $this->getMessage();
		$this->CloseConnect();
		
		list($coord_AR,$coord_DEC) = split('#',$coord);
		$this->coord_AR = split(':',$coord_AR);
		$this->coord_DEC[0] = substr($coord_DEC, 0,1);
		$this->coord_DEC[1] = substr($coord_DEC, 1,2);
		$this->coord_DEC[2] = substr($coord_DEC, 4,2);
		$this->coord_DEC[3] = substr($coord_DEC, 7,2);
//		$coord_DEC = $this->coord_DEC[0].$this->coord_DEC[1]."º".$this->coord_DEC[2].":".$this->coord_DEC[3];
		
//		$msg = "AR&nbsp;&nbsp;=&nbsp;".$coord_AR."<br>Dec&nbsp;=&nbsp;".$coord_DEC;
		
//		return $msg;
	}

	function GetCoord()
	{
		$this->OpenConnect();
		$this->msg = ":GR#:GD#";
		$this->sendCommand();
		$coord = $this->getMessage();
//		echo $coord;
//		echo ord(substr($coord,9	,1));
		
		list($coord_AR,$coord_DEC) = split('#',$coord);
//		echo $coord_DEC;
		$this->coord_AR = split(':',$coord_AR);
		$this->coord_DEC[0] = substr($coord_DEC, 0,1);
		$this->coord_DEC[1] = substr($coord_DEC, 1,2);
		$this->coord_DEC[2] = substr($coord_DEC, 4,2);
		$this->coord_DEC[3] = substr($coord_DEC, 7,2);
		$coord_DEC = $this->coord_DEC[0].$this->coord_DEC[1]."º".$this->coord_DEC[2].":".$this->coord_DEC[3];
		
		$msg = "AR&nbsp;&nbsp;=&nbsp;".$coord_AR."<br>Dec&nbsp;=&nbsp;".$coord_DEC;
		
		return $msg;
	}

	
	## CONFIGURACION

	function SetSpeed($n)
	{
		switch($n)
		{
			case 4:
			$msg = ":RS#";
			break;
			case 3:
			$msg = ":RM#";
			break;
			case 2:
			$msg = ":RC#";
			break;
			default:
			$msg = ":RG#";
			break;
		}

		$this->OpenConnect();
		$this->msg = $msg;
		$this->sendCommand();
		$this->CloseConnect();
		
		return $this->msg;
	}


	function SetFocus($n)
	{
		if($n>0 && $n<5)
		{
		}
		else
		{
			$n=1;
		}

		$this->OpenConnect();
		$this->msg = ":F".$n."#";
		$this->sendCommand();
		$this->CloseConnect();
		
		return $this->msg;
	}


	
	## AUXILIAR
	
	function LastMsg()
	{
		return $this->msg;
	}
	
	
}


?>