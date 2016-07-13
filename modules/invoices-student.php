<?php
		
	/* For Session Control - Don't remove this */
//	$user->allow_access(34);	
	/* End Session Control */
	
	//print_r($_SESSION);
	$desde = "01-01-1990";
	$m = date("m");
	$m = 12;
	$y = date("Y");
	$y = 2014;

	$hasta =	date("t")."-".$m."-".$y;
	$count = $payments->InvoicesCount($desde, $hasta, "", "", "", $User["numControl"]);
	$invoices = $payments->Invoices($desde, $hasta, "", "", "", $User["numControl"]);
	//print_r($invoices);

	//print_r($invoices);
	$smarty->assign('invoices', $invoices);
	$smarty->assign('arrPage', $arrPage);
	$smarty->assign('invoicesCount', $count);

	$smarty->assign('desde', $desde);
	$smarty->assign('hasta', $hasta);
	
	$smarty->assign('mnuMain','cobranza');
	
	$activeCourses = $course->EnumerateActive();
	$smarty->assign('courses', $activeCourses);

	$smarty->assign('return', WEB_ROOT."/invoices-student/message/complete");
	$smarty->assign('notify_url', WEB_ROOT."/notify_paypal.php");

?>