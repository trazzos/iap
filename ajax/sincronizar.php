<?php
include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

switch($_POST["type"])
{
	case "sincronizarDB": 
		
	// echo '<pre>'; print_r($_POST);
	// exit;
	$student->extraeInfoFire($_POST['tipo']);
	$registros = $solicitud->enumerateSincronizacion();
			
	break;
	
	
}

?>
