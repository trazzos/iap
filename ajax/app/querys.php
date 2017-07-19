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
			// if($activeCourses as $key=>$aux){
				
				// $aux["name"] = strtolower($aux["name"]);
			// }
			// text-transform: lowercase !important'
			// strtolower($aux["name"]
			echo "ok[#]";
			echo $urlFoto;
			echo "[#]";
			echo "<p class='h3'><b>".$info["name"]." ".$info["lastNamePaterno"]." ".$info["lastNameMaterno"]."</b><br>";
			echo "".$info["email"]."<br>";
			echo "No. Control:".$info["controlNumber"]."</p>";
			echo "[#]";
			echo "<table style='color:#93a2a9; align-text:center; font-size:13px; ' >";
			echo "<thead>";
			echo "</thead>";
			echo "<tbody>";
			
			foreach($activeCourses as $key=>$aux){
				echo "<tr>";
				// echo "<td style='width:200px; text-align:center'>".$aux["majorName"]."</td>";
				echo "
				<td style='text-align:left'>
					<b>
						<a href='' style=' text-decoration:none; color: #93a2a9;'  onClick='verDetalle(".$aux["courseId"].")'><font>".($aux["name"])."</font></a>
					</b>
				<br>".$aux["majorName"]."</td>";
				echo "</tr>";
			}
			echo "</tbody>";	
			echo "</table>";
			echo "[#]";
			echo $fotoHeader;
					
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
