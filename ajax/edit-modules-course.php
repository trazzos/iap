<?php
// echo "<pre>"; print_r($_POST);
include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

switch($_POST["type"])
	{
		case 'SaveCalificacion':
		
			$group->setCourseModuleId($_POST["id"]);
			if($group->EditCalificacion()){
				echo "ok[#]";
				echo '<div class="alert alert-info alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  Las Calificaciones se guardaron exitosamente
					</div>';
			}else{
				echo "fail[#]";
			}
			
		break;

		case "validarCal":
		
			$group->setCourseModuleId($_POST["id"]);
			if($group->validarCalificacion()){
				echo "ok[#]";
				echo '<div class="alert alert-info alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  Las Calificaciones se han validado exitosamente
					</div>';
			}else{
				echo "fail[#]";
			}
		
		break;
	
	}

?>
