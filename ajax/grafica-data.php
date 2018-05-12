<?php
	include_once('../init.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');

	session_start();

	header("Content-type: text/x-json");
	
	$lst = $activity->enumerateActividadCalendario($_GET['courseModuleId']);
	foreach($lst as $key=>$aux){
		$aux['description'] = htmlspecialchars_decode($aux['description']);   
		$resources[] = array('title'=>$aux['description'], 'start' => $aux["initialDate"]);
	}

	// echo 'dd';
	// echo '<pre>'; print_r($lst);
	// exit;
	print json_encode ($resources);

?>