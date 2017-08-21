<?php

	include_once('../init.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');
	
	session_start();
	
	switch($_POST["type"])
	{
		case 'solicitarReferencia':
		

			$solicitud->setTipo(5);
			if ($solicitud->SaveSolicitud()){
				echo 'ok[#]';
				echo '<br><div class="alert alert-info alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  La Solicitud de tus datos de referencia se ha realizado con exito en breve nos pondremos en contacto contigo
					</div>';
				echo '[#]';

			}else{
				echo 'fail[#]';
			}
					
		break;

	
	}

?>
