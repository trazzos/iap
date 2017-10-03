<?php
include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

switch($_POST["type"])
{
	case "sincronizarDB": 
		

	$student->extraeInfoFire();
	$registros = $solicitud->enumerateSincronizacion();
			
	break;
	
	
}

?>
