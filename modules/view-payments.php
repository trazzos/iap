<?php
		
	/* For Session Control - Don't remove this */
//	$user->allow_access(34);	
	
	
	$smarty->assign('current', $current);
	$payments->setInvoiceId($_GET["id"]);
	$invoice = $payments->InvoiceInfo();
	$payments = $payments->EnumeratePayments();

	$smarty->assign('invoiceId', $_GET["id"]);
	$smarty->assign('payments', $payments);
	$smarty->assign('invoice', $invoice);

?>