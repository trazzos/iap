<?php
		
	/* For Session Control - Don't remove this */
	$user->allow_access(37);	
	
	$lstchat = $student->miChat();


	$smarty->assign('lstchat',$lstchat);

	

?>