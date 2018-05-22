<?php
		
	/* For Session Control - Don't remove this */
	// $user->allow_access(37);	
	
	
	

	$student->setUserId($_GET['id']);
	$infoStudent8 = $student->InfoStudent8();
	
	
	// echo '<pre>'; print_r($infoStudent8);

	// exit;

	$smarty->assign('userPerfil', $_SESSION['User']['perfil']);
	$smarty->assign('infoStudent8', $infoStudent8);
	

?>