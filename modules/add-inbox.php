<?php
		
	/* For Session Control - Don't remove this */
	// $user->allow_access(37);	
	
	// $lstChat = $student->entablandoConversacion($_GET["m"]);
// echo '<pre>'; print_r($_GET);
		// exit;

	$smarty->assign('profId',$_GET['id']);
	$smarty->assign('c5Id',$_GET['auxTpl']);
	$smarty->assign('lstchat',$lstChat);
	$smarty->assign('chatId',$_GET["m"]);

	

?>