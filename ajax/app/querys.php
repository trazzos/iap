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
		
			//Info Estudiante
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
			echo DOC_ROOT.'/ajax/app/view/perfil-inicio.php';
			echo "1";
			include(DOC_ROOT.'/ajax/app/view/perfil-inicio.php');
			include('perfil-inicio.php');
			echo "[#]";
			$smarty->display(DOC_ROOT.'/templates/app/curricula-activa.tpl');
					
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
			echo "<table border=1>";
			foreach($announcements as $key=>$aux){
			echo "<tr>";
			echo "<td>".$aux["title"]."<td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>".$aux["description"]."<td>";
			echo "</tr>";
			}
			echo "</table>";
			
			echo "[#]";
			echo "<table>";
			echo "<tr><td>Bienvenida</td></tr>";
			echo "<tr><td>".$infoMod["welcomeTextDecoded"]."</td></tr>";
			echo "<tr><td>Intenciones del Curso</td></tr>";
			echo "<tr><td>".$infoMod["intentionsDecoded"]."</td></tr>";
			echo "<tr><td>Temas</td></tr>";
			echo "<tr><td>".$infoMod["themesDecoded"]."</td></tr>";
			echo "<tr><td>Metodología</td></tr>";
			echo "<tr><td>".$infoMod["methodologyDecoded"]."</td></tr>";
			echo "<tr><td>Evaluacion</td></tr>";
			echo "<tr><td>".$infoMod["evaluationDecoded"]."</td></tr>";
			echo "<tr><td>Bibliografía</td></tr>";
			echo "<tr><td>".$infoMod["bibliographyDecoded"]."</td></tr>";
			echo "</table>";
		
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
			echo "<table>";
			echo "<tr><td class='label'>Nombre:<td><td><input type='text' name='' id='' value='".$info["names"]."' class='form-control'><td></tr>";
			echo "<tr><td class='label'>Apellido Paterno:<td><td><input type='text' name='' id='' value='".$info["lastNamePaterno"]."' class='form-control'><td></tr>";
			echo "<tr><td class='label'>Apellido Materno:<td><td><input type='text' name='' id='' value='".$info["lastNameMaterno"]."' class='form-control'><td></tr>";
			echo "<tr><td class='label'>Sexo:<td><td><select name='sexo' class='form-control'> <option value='m'>Masculino</opcion> <option value='f'>Femenino</opcion> </select><td></tr>";
			echo "<tr><td class='label'>Fecha de Nacimiento:<td><td><select name='sexo' class='form-control'> <option value='m'>Masculino</opcion> <option value='f'>Femenino</opcion> </select><td></tr>";
			echo "</table>";

		break;

	}

?>
