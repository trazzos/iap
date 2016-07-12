<?php

	include_once('../init.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');
	
	session_start();
	
	switch($_POST["type"])
	{
		case "notificar2":	
			
			  if(!$forum->replyNoti()){				
					echo "fail[#]";
					echo "Esto es un error";
					$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
					}else{
					echo "ok[#]";
					$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
					}
					
				break;
	
	}

?>
