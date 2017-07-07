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
			// echo "<td>GRUPO</td>";
			// echo "<td>MODALIDAD</td>";
			// echo "<td>FECHA INICIAL</td>";
			// echo "<td>FECHA FINAL</td>";
			echo "<td></td>";
			echo "<tr>";
			
			
			foreach($activeCourses as $key=>$aux){
				echo "<tr>";
				echo "<td>".$aux["majorName"]."</td>";
				echo "<td>".$aux["name"]."</td>";
				// echo "<td>".$aux["initialDate"]."</td>";
				echo "<td>
				<a href='' onClick='verActividad()'>
				Ir
				</a>
				</td>";
				echo "</tr>";
			}
			echo "</table>";
					
		break;


	}

?>
