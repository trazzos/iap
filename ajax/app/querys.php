<?php
	header('Access-Control-Allow-Origin: *'); 
	include_once('../../init.php');
	include_once('../../config.php');
	include_once(DOC_ROOT.'/libraries.php');

	session_start();

	switch($_POST["type"])
	{
		
		 case 'doLogin':
		 
			$username = strip_tags(trim($_POST['username']));
			$passwd = strip_tags(trim($_POST['passwd']));

			if($username == '' || $passwd == ''){
				echo 'fail[#]';
				echo 'empty';
				exit;
			}

			$user->setUsername($username);
			$user->setPassword($passwd);
			if($Id = $user->do_login()){
				echo "ok[#]";
				echo $Id;
			}else{
				echo "fail[#]";
				echo 'data';
			}
			
        break;
		
		case 'inicio':
		

			$student->setUserId($_POST["usuarioId"]);
			$info = $student->GetInfo();
			
			if(file_exists(DOC_ROOT."/alumnos/".$info["userId"].".jpg"))
			{
				$urlFoto = "<img src='".WEB_ROOT."/alumnos/".$info["userId"].".jpg?".rand()."' style='width:100px; border-radius: 50%;' '>";
				$fotoHeader = "<img src='".WEB_ROOT."/alumnos/".$info["userId"].".jpg?".rand()."' style='width:30px; border-radius: 50%;' >";
			}else{
				$urlFoto = "<img src='".WEB_ROOT."/alumnos/no_foto.JPG' style='width:100px; border-radius: 50%;' '>";
				$fotoHeader = "<img src='".WEB_ROOT."/alumnos/no_foto.JPG' style='width:30px; border-radius: 50%;' '>";
			}
			
			$activeCourses = $student->StudentCourses("activo", "si");
			$smarty->assign("urlFoto", $urlFoto);
			$smarty->assign("info", $info);
			$smarty->assign("activeCourses", $activeCourses);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			
			echo "ok[#]";
			echo $fotoHeader;
			echo "[#]";
			include(DOC_ROOT.'/ajax/app/view/perfil-inicio.php');
			echo "[#]";
			include(DOC_ROOT.'/ajax/app/view/curricula-activa.php');

					
		break;
		
		
		case "verDetalle":
		
			//anuncios
			$module->setCourseModuleId($_POST["courseId"]);
			$myModule = $module->InfoCourseModule();
			
			//informacion
			$module->setCourseModuleId($_POST["courseId"]);
			$infoMod = $module->InfoCourseModule();
			$announcements = $announcement->Enumerate($myModule["courseId"], $myModule["courseModuleId"]);
			
			//actividades
			$activity->setCourseModuleId($_POST["courseId"]);
			$actividades = $activity->Enumerate("Tarea");
			//examenes
			$activity->setCourseModuleId($_POST["courseId"]);
			$lstExmanenes = $activity->Enumerate("Examen");
			//recursos de apoyo
			$resource->setCourseModuleId($_POST["courseId"]);
			$resources = $resource->Enumerate();
			//foro
			$forum->setCourseId($_POST["courseId"]);
			$forums = $forum->Enumerate();
			//docente
			$module->setCourseModuleId($_POST["courseId"]);
			$myModule = $module->InfoCourseModule();

			$personal->setPersonalId($myModule["access"][1]);
			$docente = $personal->Info();

			$urlFotoDoc = "<img src='".WEB_ROOT."/alumnos/no_foto.JPG' style='width:100px; border-radius: 50%;' '>";
			

			echo "ok[#]";
			include(DOC_ROOT.'/ajax/app/view/anuncios.php');			
			echo "[#]";
			include(DOC_ROOT.'/ajax/app/view/informacion.php');
			echo "[#]";
			include(DOC_ROOT.'/ajax/app/view/actividades.php');
			echo "[#]";
			include(DOC_ROOT.'/ajax/app/view/examen.php');
			echo "[#]";
			include(DOC_ROOT.'/ajax/app/view/recursos.php');
			echo "[#]";
			include(DOC_ROOT.'/ajax/app/view/foro.php');
			echo "[#]";
			include(DOC_ROOT.'/ajax/app/view/docente.php');
		
		break;

		
		case "miCuenta":
			$student->setUserId($_POST["usuarioId"]);
			$info = $student->GetInfo();
			
			if(file_exists(DOC_ROOT."/alumnos/".$info["userId"].".jpg"))
			{
				$fotoHeader = "<img src='".WEB_ROOT."/alumnos/".$info["userId"].".jpg?".rand()."' style='width:30px; border-radius: 50%;' >";
			}else{
				$fotoHeader = "<img src='".WEB_ROOT."/alumnos/no_foto.JPG' style='width:30px; border-radius: 50%;' '>";
			}
		
			echo "ok[#]";
			echo $fotoHeader;
			echo "[#]";
			include(DOC_ROOT.'/ajax/app/view/mi-cuenta.php');
			

		break;

		
		case "detalleActividad":
		
			$activity->setActivityId($_POST["actividadId"]);
			$infoActividad = $activity->InfoApp();
			echo "ok[#]";
			include(DOC_ROOT.'/ajax/app/view/detalle-actividad.php');
			
		break;
		
		case "detalleRecurso":
		
			// $activity->setActivityId($_POST["actividadId"]);
			// $infoActividad = $activity->InfoApp();
			echo "ok[#]";
			include(DOC_ROOT.'/ajax/app/view/detalle-recurso.php');
			
		break;
	}

?>
