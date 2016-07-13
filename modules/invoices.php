<?php
		
	/* For Session Control - Don't remove this */
	$user->allow_access(34);	
	/* End Session Control */
	$desde = "01-".date("m")."-".date("Y");
	//$desde = "01-01-210";
	$m = date("m");
	$m = (int)$m;
	$m=$m+1 ;
	if($m==12)
	 $m=1;
	 if($m<10)
	 $m="0".$m;
	 //echo $m;
	//$m = 12;
	$y = date("Y");
	//$y = 2014;
	$hasta =	date("t")."-".$m."-".$y;
	
	$count = $payments->InvoicesCount($desde, $hasta, $status = "Por Pagar");

	$invoices = $payments->Invoices($desde, $hasta, $status = "Por Pagar");

	//print_r($invoices);
	$smarty->assign('invoices', $invoices);
	$smarty->assign('arrPage', $arrPage);
	$smarty->assign('invoicesCount', $count);

	$smarty->assign('desde', $desde);
	$smarty->assign('hasta', $hasta);
	
	$smarty->assign('mnuMain','cobranza');
	
	$activeCourses = $course->EnumerateActive();
	$smarty->assign('courses', $activeCourses);
?>