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
				$smarty->display(DOC_ROOT.'/templates/boxes/confirma.tpl');
				
			}else{
				echo 'fail[#]';
			}
		break;
			
	}

?>
