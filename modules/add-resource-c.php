<?php
		
	/* For Session Control - Don't remove this */
	$user->allow_access(37);	
	


	if($_POST)
	{
		$resource->setCourseModuleId($_GET["id"]);
		$resource->setName($_POST["name"]);
		$resource->setDescription($_POST["description"]);
		$resource->SaveResource();
		
		//segun la varible redireccionamos
		if($_POST["auxTpl"] == "admin"){
			
			header("Location:".WEB_ROOT."/edit-modules-course/id/".$_POST["cId"]."");
			exit;
		}
	}
	
	if($_GET['cId'])
	{
			// $resource->set();
			$infoT =	$resource->infoResource($_GET["id"]);
			$smarty->assign('resourceId', $_GET["id"]);
				// echo "<pre>"; print_r($infoT);
	// exit;
	}
	
	
	$smarty->assign('id', $_GET["id"]);
	$date = date("d-m-Y");
	$smarty->assign('infoT', $infoT);
	$smarty->assign('date', $date);
	
	

?>