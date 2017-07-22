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
			// $smarty->display(DOC_ROOT.'/templates/app/curricula-activa.tpl');
					
		break;
		
		
		case "verDetalle":
		
			//anuncios
			$module->setCourseModuleId($_POST["courseId"]);
			$myModule = $module->InfoCourseModule();
			
			//informacion
			$module->setCourseModuleId($_POST["courseId"]);
			$infoMod = $module->InfoCourseModule();
			$announcements = $announcement->Enumerate($myModule["courseId"], $myModule["courseModuleId"]);
			
			echo "ok[#]";
			include(DOC_ROOT.'/ajax/app/view/anuncios.php');			
			echo "[#]";
			include(DOC_ROOT.'/ajax/app/view/informacion.php');

		
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

	}

?>
