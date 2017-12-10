<?php
// echo 'lled';
// echo '<pre>'; print_r($_GET);
// echo '<pre>'; print_r($_POST);
// exit;
include_once('../../init.php');
include_once('../../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

switch($_POST["type"])
{
    case "Student":

        $group->setCourseId($_POST['id']);
        $students=$group->DefaultGroup();
        $smarty->assign("courseId",$_POST['id']);
        $smarty->assign("DOC_ROOT", DOC_ROOT);
        $smarty->assign("students", $students);
		 $smarty->assign("tip",$_POST['tip']);
        $smarty->display(DOC_ROOT.'/templates/boxes/view-student.tpl');

        break;
		
	
	case "VerSolicitud":

        $group->setCourseId($_POST['id']);
        $students=$group->DefaultGroup();
        $smarty->assign("courseId",$_POST['id']);
        $smarty->assign("DOC_ROOT", DOC_ROOT);
        $smarty->assign("students", $students);
		 $smarty->assign("tip",$_POST['tip']);
        $smarty->display(DOC_ROOT.'/templates/actas.tpl');

       break;

    case "StudentAdmin":

        $group->setCourseId($_POST['id']);
        $students=$group->DefaultGroup();
        $smarty->assign("courseId",$_POST['id']);
        $smarty->assign("tip",$_POST['tip']);
        $smarty->assign("DOC_ROOT", DOC_ROOT);
        $smarty->assign("students", $students);
        $smarty->display(DOC_ROOT.'/templates/boxes/view-studentadmin.tpl');

        break;

    case "calificaciones":

        $module->setCourseModuleId($_POST['id']);
        $infoModule=$module->InfoCourseModule();
        $courseId=$infoModule['courseId'];
        //	print_r($infoModule);
        $activity->setCourseModuleId($_POST['id']);
        $activityInfoTask=$activity->Enumerate("Tarea");
        $userId=$_SESSION['User']['userId'];

        $activity->setUserId($userId);
        //$ponderation=$activity->Score();

        foreach($activityInfoTask as $key => $fila){
            $activity->setCourseModuleId($_POST['id']);
            $activity->setActivityId($fila['activityId']);
            $activityInfoTask[$key]['calificacion']=$activity->Score();
            $activityInfoTask[$key]['retroTotal']=$activity->Retro();

        }
        //print_r($activityInfoTask);exit;

        //print_r($fila['activityId']);

        //print_r($infoModule);
        //$students=$group->DefaultGroup();
        //print_r($_POST);
        //$smarty->assign("DOC_ROOT", DOC_ROOT);
        $tipo=1;
        $smarty->assign("tipo", $tipo);
        $smarty->assign("tareas", $activityInfoTask);
        $smarty->display(DOC_ROOT.'/templates/boxes/view-ponderation-student.tpl');

        break;

    case "calificacionesExa":
        $tipo=2;
        $module->setCourseModuleId($_POST['id']);
        $infoModule=$module->InfoCourseModule();
        $courseId=$infoModule['courseId'];
        //	print_r($infoModule);
        $activity->setCourseModuleId($_POST['id']);
        $activityInfoTask=$activity->Enumerate("Examen");
        $userId=$_SESSION['User']['userId'];

        $activity->setUserId($userId);
        //$ponderation=$activity->Score();

        foreach($activityInfoTask as $key => $fila){
            $activity->setCourseModuleId($_POST['id']);
            $activity->setActivityId($fila['activityId']);
            $activityInfoTask[$key]['calificacion']=$activity->Score();
            $activityInfoTask[$key]['retroTotal']=$activity->Retro();

        }
        //print_r($activityInfoTask);exit;

        //print_r($fila['activityId']);

        //print_r($infoModule);
        //$students=$group->DefaultGroup();
        //print_r($_POST);
        //$smarty->assign("DOC_ROOT", DOC_ROOT);
        $smarty->assign("tipo", $tipo);
        $smarty->assign("tareas", $activityInfoTask);
        $smarty->display(DOC_ROOT.'/templates/boxes/view-ponderation-student.tpl');

        break;

    case "deleteStudentCurricula":

        $student->setUserId($_POST['userId']);
        $student->setCourseId($_POST['courseId']);

        if(!$student->DeleteStudentCurricula())
        {
            echo "fail[#]";
            //$util->setError(10028, "error","Ocurrio un error al eliminar a este alumno");
            //$util->PrintErrors();
            $smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');

        }else{
            echo "ok[#]";
            $util->setError(10028, "complete","Alumno eliminado con exito de esta curricula");
            $util->PrintErrors();
            $smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');

        }



    case "StudentInactivo":

        $group->setCourseId($_POST['id']);
        $students=$group->DefaultGroupInactivo();
		 $smarty->assign("tip",$_POST['tip']);
        $smarty->assign("DOC_ROOT", DOC_ROOT);
        $smarty->assign("students", $students);
        $smarty->display(DOC_ROOT.'/templates/boxes/view-student.tpl');

        break;

    case "StudentInactivoAdmin":

        $group->setCourseId($_POST['id']);
        $students=$group->DefaultGroupInactivo();
		 $smarty->assign("tip",$_POST['tip']);
        $smarty->assign("DOC_ROOT", DOC_ROOT);
        $smarty->assign("students", $students);
        $smarty->display(DOC_ROOT.'/templates/boxes/view-studentadmin.tpl');

      break;

	case 'saveNumReferencia';
	
		// echo '<pre>'; print_r($_POST);
		// exit;
		 if ($group->saveNumReferencia()){
			 echo 'ok[#]';
			 echo '<div class="alert alert-info alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			 Los datos se guardaron correctamente
			</div>';
			echo $_SESSION['msj']='si';
		 }else{
			 echo 'fail[#]';
		 }
		
	break;
	
	case 'descargarConstancias':
	
		// echo '<pre>'; print_r($_POST);
		$student->setUserId($_POST["Id"]);
		$activeCourses = $student->StudentCourses("activo", "si");
		$finishedCourses = $student->StudentCourses("finalizado");
		
		// $finishedCourses = array();
		
		// if(count($activeCourses) == 1 and count($finishedCourses) == 0){

			// $solicitud->setTipo($_POST['tipodocId']);
			// $solicitud->setCursoId($activeCourses[0]['courseId']);
			// if($solicitud->SaveSolicitud()){
				// $lstSol = $solicitud->arraySolicitudes();
				// $registros = $solicitud->enumarateSolicitudesStden();
				// $smarty->assign('registros', $registros);
				// $smarty->assign("lstSol", $lstSol);
				// $smarty->display(DOC_ROOT.'/templates/lists/view-solicitud.tpl');
			// }else{

			// }
			// exit;
		// }
			
		
		
		
		$smarty->assign("finishedCourses", $finishedCourses);	
		$smarty->assign("solicitudId", $_POST['tipodocId']);	
		$smarty->assign("userId", $_POST['Id']);	
		
		// echo 'ok[#]';
		$smarty->assign("activeCourses", $activeCourses);
		$smarty->display(DOC_ROOT.'/templates/new/view-curricula-admin.tpl');
		exit;
			if($_POST['solicitudId']==''){
				echo 'fail[#]';
				echo '<center><font color="red">Por favor, seleccione el tipo de solicitud</font></center>';
				exit;
			}
		
	
	break;
	
	case 'addSaveSolicitud':

		
		// echo '<pre>'; print_r($_POST);
				$activa = 0;
				$inactiva = 0;
				foreach($_POST as $key=>$aux){
					$g = explode('_',$key);
					if($g[0]=='activa'){
						if($aux=='on'){
							$valoractiva = $g[1];
							$activa++;
						}
					}
					if($g[0]=='finalizada'){
						if($aux=='on'){
							$valorinactiva = $g[1];
							$inactiva++;
						}
					}
				}
				if(($activa+ $inactiva) <= 0){
						echo 'fail[#]';
						echo '<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						Debe seleccionar al menos una curricula
						</div>';
					exit;
				}
				
				if(($activa+ $inactiva) > 1){
						echo 'fail[#]';
						echo '<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						Solo puede seleccionar una curricula
						</div>';
					exit;
				}
				
				// echo $valoractiva.'___'; 
				// echo $valorinactiva; 
				// echo '<pre>'; print_r($_POST);
				// exit;
				if($valoractiva<>''){
					$cursoId = $valoractiva;
				}
				
				if($valorinactiva<>''){
					$cursoId = $valorinactiva;
				}
				
				// echo $cursoId;
				// exit;
				
				$solicitud->setTipo($_POST['solicitudId']);
				$solicitud->setCursoId($cursoId);
				// $solicitud->setPrecio($precio);
				if ($Id = $solicitud->SaveSolicitudAdmin($_POST['userId'])){
					echo 'ok[#]';
					echo $Id;
					// echo '<div class="alert alert-info alert-dismissable">
					  // <button type="button" class="close" data-dismiss="alert">&times;</button>
					  // La solicitud se genero correctamente
					// </div>';
					// echo '[#]';
					// $lstSol = $solicitud->arraySolicitudes();
						// $registros = $solicitud->enumarateSolicitudesStden();
						// $smarty->assign('registros', $registros);
					// $smarty->assign("lstSol", $lstSol);
					// $smarty->display(DOC_ROOT.'/templates/lists/view-solicitud.tpl');
				}else{
					echo 'fail[#]';
				}
	
	break;

}

?>
