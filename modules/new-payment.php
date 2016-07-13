<?php
		
	/* For Session Control - Don't remove this */
	$user->allow_access(34);	
	//si esta definido el monto de pago se procede a guardar el registro
	if($_POST["amount"])
	{
		$payments->setDate($_POST["date"]);
		$payments->setDebt($_POST["debt"]);
		$payments->setAmount($_POST["amount"]);
		$payments->setAmountApplied($_POST["amountApplied"]);
		$payments->setCredit($_POST["credit"]);
		$payments->setAnticipo($_POST["anticipo"]);
		$payments->setPaymentMethod($_POST["paymentMethod"]);
		$payments->setComments($_POST["comments"]);
		$payments->setInvoiceId($_GET["id"]);
		$payments->setAutorize($_POST['autorize']);
		
		

		$payments->NewPayment();
$invoiceId=$_GET["id"];		
		
		echo "
		<script language='javascript'>
			
			window.location = 'http://www.iapchiapasenlinea.mx/invoicesrep.php?invoiceId=$invoiceId'
		</script>";
		//header("Location: http://google.com");

		
		
//		$new = $payments->New()
	}

	$current = $payments->CurrentPayment();
	
	$smarty->assign('current', $current);
	$payments->setInvoiceId($_GET["id"]);
	$invoice = $payments->InvoiceInfo();

	$smarty->assign('invoiceId', $_GET["id"]);
	$smarty->assign('invoice', $invoice);

	$smarty->assign('date', date("d-m-Y"));
	
?>