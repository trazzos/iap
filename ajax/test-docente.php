<?php
	include_once('../init.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');
	
	session_start();
	
	switch($_POST["type"])
	{
		case 'SaveEncuesta':
			
			// guardar comentario
			// envia mensaje que se guardo y redireccionar a pagina

			
			
			$docente->setComentario($_POST['comentario']);
			if($docente->SaveEncuesta($_POST['courseModuleId'],$_POST['personalId'])){
				echo 'ok[#]';
				echo '<div class="alert alert-info">
				<button type="button" class="close" data-dismiss="alert">×</button>
				Las preguntas se enviaron satisfactoriamente, Gracias por participar. 
				</div>';
			}else{
				echo 'fail[#]';
			}
		break;
			
	}

?>
