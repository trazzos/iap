<?php
		
	/* For Session Control - Don't remove this */
	// $user->allow_access(37);	
	
	

	$actividades = $student->Enumerate();
	
	
	// echo "<pre>"; print_r($actividades);
	// exit;
	$smarty->assign('actividades', $actividades);
	

?>