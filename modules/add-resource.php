<?php
		
	/* For Session Control - Don't remove this */
	$user->allow_access(37);	

	if($_POST)
	{
		$resource->setCourseModuleId($_GET["id"]);
		$resource->setName($_POST["name"]);
		$resource->setDescription($_POST["description"]);
		$resource->Save();
	}

	$date = date("d-m-Y");
	$smarty->assign('date', $date);
	
	

?>