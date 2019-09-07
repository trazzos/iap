<?php
// echo '<pre>'; print_r($_FILES);
		// echo '<pre>'; print_r($_POST);
include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

switch($_POST["type"])
{
	case "saveCalificacion": 
		
		$activity->setActivityId($_POST["id"]);
		$actividad = $activity->Info();
		$group->setCourseModuleId($actividad["courseModuleId"]);
		if($group->EditScore($actividad["modality"], $_POST["id"], $_POST["ponderation"], $_POST["retro"])){
			echo 'ok[#]';
			echo '<div class="alert alert-info alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  Las Calificaciones han sido actualizadas correctamente
			</div>';
		}else{
			echo 'fail[#]';
		}
		
		
		
	break;
	
	
}

?>
