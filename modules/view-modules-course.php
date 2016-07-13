<?php
		
	/* For Session Control - Don't remove this */
	$user->allow_access(37);	
	
	$course->setCourseId($_GET["id"]);
	
	$date = date("d-m-Y");
	$addedModules = $course->AddedCourseModules();
	
	//checar a que curriculas tengo permiso
	if(in_array(2, $info["roles"]))
	{
		$smarty->assign('docente', 1);
		$permisosDocente = $user->PermisosDocente();
		
		foreach($addedModules as $key => $value)
		{
			if(!in_array($value["courseModuleId"], $permisosDocente["courseModule"]))
			{
				unset($addedModules[$key]);
			}
		}
	}
	
	$smarty->assign('date', $date);
	$smarty->assign('invoiceId', $_GET["id"]);
	$smarty->assign('subjects', $addedModules);

?>