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
			//curricula activa
			$activeCourses = $student->StudentCourses("activo", "si");

	
			echo "ok[#]";
			echo "<img src='".WEB_ROOT."/alumnos/".$info["userId"].".jpg' style='width:100px'>";
			echo "[#]";
			echo $info["name"]." ".$info["lastNamePaterno"]." ".$info["lastNameMaterno"]."<br>";
			echo $info["email"]."<br>";
			echo "No. Control:".$info["controlNumber"];
			echo "[#]";
			echo "<table border='0'>";
			echo "<tr>";
			echo "<td>TIPO</td>";
			echo "<td>NOMBRE</td>";
			echo "<td></td>";
			echo "<tr>";
			
			
			foreach($activeCourses as $key=>$aux){
				echo "<tr>";
				echo "<td>".$aux["majorName"]."</td>";
				echo "<td>".$aux["name"]."</td>";
				echo "<td>
				<a href='' onClick='verDetalle(".$aux["courseId"].")'>
				Ir
				</a>
				</td>";
				echo "</tr>";
			}
			echo "</table>";
					
		break;
		
		
		case "verDetalle":
		
			//anuncios
			$module->setCourseModuleId($_POST["courseId"]);
			// $module->setCourseModuleId(12);
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
			// echo "<pre>"; print_r($infoMod);
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


	}

?>
