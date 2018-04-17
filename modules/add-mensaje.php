<?php
		
	/* For Session Control - Don't remove this */
	$user->allow_access(37);	
	
	$lstChat = $student->entablandoConversacion($_GET["m"]);
// echo '<pre>'; print_r($lstChat);
		// exit;

	$smarty->assign('lstchat',$lstChat);
	$smarty->assign('chatId',$_GET["m"]);

	

?>