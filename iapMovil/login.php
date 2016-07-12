<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

include_once("../config.php");
include_once(DOC_ROOT."/properties/config.php");
include_once(DOC_ROOT."/classes/db.class.php");	

$postData = file_get_contents('php://input');

$postDataArray = array();
$datos = array();

$postDataArray = explode('&',$postData);


foreach($postDataArray as $key => $dato)
{
	$dat = explode('=',$dato);
	$datos[$dat[0]] = $dat[1];
}

$db = new DB;

$query = "SELECT * FROM user WHERE type = 'student' AND controlNumber = '".$datos['usuario']."' AND password = '".$datos['pw']."'";
$db->setQuery($query);

$result = $db->getResult();

echo json_encode($result); // {"a":1,"b":2,"c":3,"d":4,"e":5}

?>