<?php

/* For Session Control - Don't remove this */
// $user->allow_access(37);


if($_GET['cId']=='admin'){
    $personalId = $_GET['id'];
}else{
    $personalId = $_SESSION['User']['userId'];
}

$personal->setPersonalId($personalId);
$registros = $personal->enumerateCatProductos();


$smarty->assign("cId", $_GET['cId']);
$smarty->assign("personalId", $personalId);
$smarty->assign("registros", $registros);



?>