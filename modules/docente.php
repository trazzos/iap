<?php

/* For Session Control - Don't remove this */
//	$user->allow_access(8);

$module->setCourseModuleId($_GET["id"]);
$myModule = $module->InfoCourseModule();

// echo $myModule["access"][1];
// exit;
$personal->setPersonalId($myModule["access"][1]);
$docente = $personal->Info();

$smarty->assign('docente', $docente);


$date = date("d-m-Y");
$smarty->assign('date', $date);

$smarty->assign('invoiceId', $_GET["id"]);
$smarty->assign('myModule', $myModule);

$majorModality = $activity->GetMajorModality();
$smarty->assign('majorModality', $majorModality);

$smarty->assign('id', $_GET["id"]);

$smarty->assign('mnuMain', "modulo");
$smarty->assign('mnuSubmain','docente');

?>