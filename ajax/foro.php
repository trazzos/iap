<?php

	include_once('../init.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');
	
	session_start();
	
	switch($_POST["type"])
	{
		case 'updateForo':
		
			// $activity->setActivityId($_POST['activityId']);	
			// $info = $activity->Info();
			// echo "ok[#]";
			
			$smarty->assign('topicsubId', $_POST["topicsubId"]);
			$smarty->assign('positionId', $_POST["positionId"]);
			$smarty->assign('moduleId', $_POST['id']);
			
			$forum->setTopicsubId($_POST["topicsubId"]);
			
			
			
			$replies = $forum->Replies();
			
			// echo "<pre>"; print_r($replies);
			// exit;
			$smarty->assign('replies', $replies);
			
			$topic = $forum->TopicsubInfo();
			$smarty->assign('topic', $topic);
			
			//echo $_GET["course"];
			$smarty->assign('id', $_POST["id"]);
			
			if($User["positionId"]!=1 && $User["positionId"]!=4)
			$smarty->assign('mnuMain', "modulo");
			
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/new/topic-replies.tpl');
					
		break;
	
		case 'saveMsj':
		
			// echo '<pre>'; print_r($_POST);
			if( $student->SaveMensaje($_POST['chatId'],$_POST['mensaje'])){
				echo 'ok[#]';
			}else{
				echo 'fail[#]';
			}
		
		break;
		
		
		case 'saveNew':
		
			// echo '<pre>'; print_r($_POST);
			// exit;
			if( $student->SaveMensaje($_POST['mensaje'])){
				echo 'ok[#]';
			}else{
				echo 'fail[#]';
			}
		
		break;
	
	}

?>
