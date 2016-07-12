<?php

define("DOC_ROOT", "/home/iapchiap/public_html");

include_once(DOC_ROOT.'/init.php');
include_once(DOC_ROOT.'/config.php');
include_once(DOC_ROOT.'/libraries.php');

if (!isset($_SESSION)) 
{
  session_start();
}
$desde = "01-01-2010";
$hasta = "01-01-2030";

	$invoices  = $payments->Invoices($desde, $hasta, $status);
	
	$overdue = time() - 3600 * 24 * 10;
	foreach($invoices as $key => $invoice)
	{
		if($invoice["status"] == "Pagada")
		{
			continue;
		}
		$dueDate = strtotime($invoice["dueDate"]);
		
		//paso la fecha de pago
		if($dueDate < $overdue)
		{
			if($invoice["status"] == "Por Pagar")
			{
				$db->setQuery("
					UPDATE user_subject SET status = 'inactivo'
						WHERE alumnoId = '".$invoice["userId"]."' AND courseId = '".$invoice["courseId"]."'");
				//$db->UpdateData();		
			}
		}
	}

?>