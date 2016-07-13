<?php
		
	/* For Session Control - Don't remove this */
	$user->allow_access(37);	

	if($_POST)
	{
		$test->setTestId($_GET["id"]);
		$test->setQuestion($_POST["question"]);
		$test->setOpcionA($_POST["opcionA"]);
		$test->setOpcionB($_POST["opcionB"]);
		$test->setOpcionC($_POST["opcionC"]);
		$test->setOpcionD($_POST["opcionD"]);
		$test->setOpcionE($_POST["opcionE"]);
		$test->setAnswer($_POST["answer"]);
		$test->Edit();
	}

	$test->setTestId($_GET["id"]);
	$question = $test->Info();
	$smarty->assign('question', $question);
	
	

?>