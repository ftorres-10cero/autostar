<?php
include "php_serial.class.php";

// Let's start the class
$serial = new phpSerial;


    //Specify the serial port to use... in this case COM1 
    $serial->deviceSet("COM4"); 
     
    //Set the serial port parameters. The documentation says 9600 8-N-1, so 
    $serial->confBaudRate(9600); //Baud rate: 9600 
    $serial->confParity("none");  //Parity (this is the "N" in "8-N-1") 
    $serial->confCharacterLength(8); //Character length (this is the "8" in "8-N-1") 
    $serial->confStopBits(1);  //Stop bits (this is the "1" in "8-N-1") 
    $serial->confFlowControl("none");
//Device does not support flow control of any kind, 
//so set it to none. 

    //Now we "open" the serial port so we can write to it 
    $serial->deviceOpen(); 


// To write into
$serial->sendMessage(":Mw#");


// To write into
$serial->sendMessage(":Mn#");


sleep(1);

// To write into
$serial->sendMessage(":Q#");


// If you want to change the configuration, the device must be closed
$serial->deviceClose();


// etc...


function string_to_ascii($string)
{
	$ascii = NULL;
	for ($i = 0; $i < strlen($string); $i++) 
	{ 
		$ascii .= ord($string[$i]); 
	}
	return($ascii);
}

?>
