<?php
	header('Access-Control-Allow-Origin: *'); 
	include_once('../../init.php');
	include_once('../../config.php');
	include_once(DOC_ROOT.'/libraries.php');

	session_start();

	
	// Content-Type: application/json
	// Method: POST
	// Request Raw Body: 
	// {
		// "badge":1,
		// "title":"Notification title",
		// "message":"A message",
		// "registrationIdsToSend":[
		// "APA91bE9f_SCHrrUvTlkibvAyfpk3Ai9YoEIAPhn50tVkryBLolM0RHdbh53tC27VdRcMTWwyervn4zL4SiDewp103qV1Rx_AaFs9szEnT1TKuptWm9p-4WLuGUiVvDy2VVoMy5X2YupjtKD-XA8Bf6b-4MW7U_mdojhU9JB1CD0-MIUW9qFNY0"
		// ]
	// }
	
	$data["registrationId"] = "b7655863178a9fa72bc042165b837bc218d73e65f3d78ebdd6cdf5135667cb2c";
	$data["message"] = "llego";
	$data["title"] = "titulo";
	header("Content-type: text/x-json");
	print json_encode($calibresList);
?>
