<?php
	
//	session_start();
	//header('Content-Encoding: UTF-8');
	
	include_once('../init.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');
	
	//Obtenemos las materias
    
	
	$course->setCourseId($_GET["courseId"]);
	if($_GET["modality"]==1){
	$modality="Online";
	$modalidad="En linea";
	}
	if($_GET["modality"]==2){
 	$modality="Local";
$modalidad="Presenciales";
	 }
	$course->setModality($modality);
	
	
	if($_GET["modality"]==0)
	{$modalidad="En Linea y Presenciales";
	$infoCourse = $course->Info();
	$addedModules = $course->AddedCourseModules();
	$cuatrimesters = $course->HowManyCuatrimesters();
	}
	else{
	$infoCourse = $course->Info_modality();
	$addedModules = $course->AddedCourseModules_modality();
	$cuatrimesters = $course->HowManyCuatrimesters_modality();
	}
	
	

	
	$smarty->assign('cuatrimesters', $cuatrimesters);

	foreach($addedModules as $keyModule => $myModule)
	{
		$group->setCourseId($_GET["courseId"]);
		$group->setCourseModuleId($myModule["courseModuleId"]);			
		$theGroup = $group->DefaultGroup();
		
		if($myModule["semesterId"] != $_GET["cuatrimestre"] && $_GET["cuatrimestre"] != -1)
		{
			unset($addedModules[$keyModule]);
			continue;
		}
		//print_r($theGroup);
		foreach($theGroup as $keyGroup => $member)
		{
			$mark = $student->GetAcumuladoCourseModule($myModule["courseModuleId"], $member["userId"]);
			$marks[$member["userId"]]["marks"][$myModule["courseModuleId"]] = $mark;
		}
		
	}

	echo $util->ConvertStringToCSV($infoCourse["name"]);
	echo "\t";
	
	echo "Total";
	echo "\t";
	echo count($theGroup);
	echo "\t";
	echo $modalidad;
	echo "\n";
	$titulos .= "Id de Registro\tEstatus\tNumero de Control\tNombre\tApellido Paterno\tApellido Materno\tFecha de Nacimiento\tCorreo Electronico\tTelefono\tCalle\tNumero\tColonia\tCiudad\tEstado\tPais\tCodigo Postal\tSexo\tCURP\tEstado Civil\tTelefono de Emergencia\tCelular\tLugar de Trabajo\tOcupacion\tDireccion del Trabajo\tArea del trabajo\tPosicion de trabajo\tCiudad del Trabajo\tTelefono del trabajo\tEmail del trabajo\tGrado academico\tEscuela\tPreparatoria\tMaestria\tEscuela de maestria\t";
			
			
	echo $titulos;	
	echo "\n";
	
	if($theGroup){	
		
		foreach($theGroup as $res)
		{
		   	echo $res["registrationId"]."\t";
		   	echo $res["status"]."\t";
		   	echo $res["controlNumber"]."\t";
		   	echo $util->ConvertStringToCSV($res["names"])."\t";
		   	echo $util->ConvertStringToCSV($res["lastNamePaterno"])."\t";
		   	echo $util->ConvertStringToCSV($res["lastNameMaterno"])."\t";
		   	echo $res["birthdate"]."\t";
		   	echo $res["email"]."\t";
		   	echo $res["phone"]."\t";
		   	echo $res["street"]."\t";
		   	echo $res["number"]."\t";
		   	echo $res["colony"]."\t";
		   	echo $res["city"]."\t";
		   	echo $res["state"]."\t";
		   	echo $res["country"]."\t";
		   	echo $res["postalCode"]."\t";
		   	echo $res["sexo"]."\t";
		   	echo $res["curp"]."\t";
		   	echo $res["maritalStatus"]."\t";
		   	echo $res["fax"]."\t";
		   	echo $res["mobile"]."\t";
		   	echo $res["workplace"]."\t";
		   	echo $res["workplaceOcupation"]."\t";
		   	echo $res["workplaceAddress"]."\t";
		   	echo $res["workplaceArea"]."\t";
		   	echo $res["workplacePosition"]."\t";
		   	echo $res["workplaceCity"]."\t";
		   	echo $res["workplacePhone"]."\t";
		   	echo $res["workplaceEmail"]."\t";
		   	echo $res["academicDegree"]."\t";
		   	echo $res["school"]."\t";
		   	echo $res["highSchool"]."\t";
		   	echo $res["masters"]."\t";
		   	echo $res["mastersSchool"]."\t";
				echo "\n"; 
	  }
	}
	
//	echo "\xEF\xBB\xBF";
	header("Content-Type:application/vnd.ms-excel; charset=UTF-8");	
	header("content-disposition: attachment; filename=reporte_general_".$infoCourse["name"]."_".date('d_m_Y').".xls");	
	header("Pragma: no-cache"); 
	header("Expires: 0");	

	
?>