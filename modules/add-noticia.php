<?php
		
	/* For Session Control - Don't remove this */
	$user->allow_access(37);	

	if($_POST)
	{
		$announcement->setCourseModuleId($_POST["courseModuleId"]);
		$announcement->setTitle($_POST["title"]);
		$announcement->setDescription($_POST["description"]);
		$announcement->Save();
	}

	$date = date("d-m-Y");
	$smarty->assign('id', $_GET["id"]);
	
	

?>