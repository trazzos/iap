<?php

	include_once('../init.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');
	
	session_start();
	
	switch($_POST["type"])
	{
		case 'deletePayment':
				$payments->setPaymentId($_POST['paymentId']);	
				$info = $payments->PaymentInfo();
						
				$payments->PaymentDelete();
				echo "ok[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status_no_ajax.tpl');
				echo "[#]";
				
				$payments->setInvoiceId($info["invoiceId"]);
				$invoice = $payments->InvoiceInfo();
				$payments = $payments->EnumeratePayments();
			
				$smarty->assign('invoiceId', $_GET["id"]);
				$smarty->assign('payments', $payments);
				$smarty->assign('invoice', $invoice);
				
				$smarty->assign("DOC_ROOT", DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/payments.tpl');
					
				break;
		case 'cancelPayment':
				$payments->setPaymentId($_POST['paymentId']);	
				$info = $payments->PaymentInfo();
						
				$payments->PaymentChangeStatus();
				echo "ok[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status_no_ajax.tpl');
				echo "[#]";
				
				$payments->setInvoiceId($info["invoiceId"]);
				$invoice = $payments->InvoiceInfo();
				$payments = $payments->EnumeratePayments();
			
				$smarty->assign('invoiceId', $_GET["id"]);
				$smarty->assign('payments', $payments);
				$smarty->assign('invoice', $invoice);
				
				$smarty->assign("DOC_ROOT", DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/payments.tpl');
					
				break;
		
	
	}

?>
