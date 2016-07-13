<?php

include_once('init.php');
include_once('config.php');
include_once(DOC_ROOT.'/libraries.php');

if (!isset($_SESSION)) 
{
  session_start();
}

ini_set("display_errors", "1"); 
error_reporting(E_ALL ^ E_NOTICE);

// ------------------------------------------- SETUP THE APPLICATION ------------------------------------------------------
//----------**********************----------------------************************-----------------------********************
$hostname_greekConn = "localhost";
$database_greekConn = "iapchiap_cbta";
$username_greekConn = "iapchiap_iap";
$password_greekConn = "febe1645D";
$greekConn = mysql_connect($hostname_greekConn, $username_greekConn, $password_greekConn) or die(mysql_error()); 

mysql_select_db($database_greekConn, $greekConn);
$yfditemnam = "Colegiatura";	// name of the items they are buying as set in the paypal form
$specitemnam = 'points';
$yfdrecemail = "dlopez@trazzos.com";
$table = "players";
$idFieldName = "id";

function getdatawhere($id,$fields,$table,$field){
	$sql="select $fields from ".$table." where  ".$field."='$id' ";
	$query=mysql_query($sql);
	$rows=mysql_num_rows($query);
	if($rows==0){return;}
	$rs=mysql_fetch_assoc($query);
	return $rs;
}
function updateuserdata($id, $str)
{
	$str2 = "update `".$table."` set $str WHERE ".$idFieldName."='$id' ";
	$str3 = "update `".$table."` set $str, debug = ".$str." WHERE ".$idFieldName."='$id' ";
	
	$q = @mysql_query($str3);
	if (!$q) {
		print ('Query failed: '.mysql_error());
		return;
	}
	return $q;
}

$postmode=1;
$debugger=0;
if (phpversion() <= '4.0.6')
{
	$_SERVER = ($HTTP_SERVER_VARS);
	$_POST = ($HTTP_POST_VARS); 
}
// No ipn post means this script does not exist
if (!@$_POST['txn_type'])
{
	@header("Status: 404 Not Found"); exit; 
}
else
{
	@header("Status: 200 OK");  // Prevents ipn reposts on some servers

	$postipn = 'cmd=_notify-validate'; // Notify validate

	foreach ($_POST as $ipnkey => $ipnval)
	{
		if (get_magic_quotes_gpc())
			$ipnval = stripslashes ($ipnval); // Fix issue with magic quotes
		if (!preg_match("/^[_0-9a-z-]{1,30}$/i",$ipnkey) || !strcasecmp ($ipnkey, 'cmd'))
		{ // ^ Antidote to potential variable injection and poisoning
			unset ($ipnkey); unset ($ipnval); 
		} // Eliminate the above
		if (@$ipnkey != '') 
		{ // Remove empty keys (not values)
			@$_PAYPAL[$ipnkey] = $ipnval; // Assign data to new global array
			//unset ($_POST); // Destroy the original ipn post array, sniff...
			$postipn.='&'.@$ipnkey.'='.urlencode(@$ipnval); 
		}
	} // Notify string

	$postipn .= '&'.http_build_query($_POST); 

	$error=0; // No errors let's hope it's going to stays like this!

	if ($postmode == 1)
	{
		$domain = "www.paypal.com"; 
	}
	elseif ($postmode == 2)
	{
		$domain = "www.eliteweaver.co.uk"; 
	}
	else
	{
		$error=1;
		$bmode=1;
	}
	@set_time_limit(60); // Attempt to double default time limit incase we switch to Get

// Post back the reconstructed instant payment notification
	$socket = @fsockopen($domain,80,$errno,$errstr,30);
	$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
	$header.= "User-Agent: PHP/".phpversion()."\r\n";
	$header.= "Referer: ".$_SERVER['HTTP_HOST'].
	$_SERVER['PHP_SELF'].@$_SERVER['QUERY_STRING']."\r\n";
	$header.= "Server: ".$_SERVER['SERVER_SOFTWARE']."\r\n";
	$header.= "Host: ".$domain.":80\r\n";
	$header.= "Content-Type: application/x-www-form-urlencoded\r\n";
	$header.= "Content-Length: ".strlen($postipn)."\r\n";
	$header.= "Accept: */*\r\n\r\n";

//* Note: "Connection: Close" is not required using HTTP/1.0

// Problem: Now is this your firewall or your ports?

    if (!$socket && !$error)
    {
// Switch to a Get request for a last ditch attempt!
		$getrq=1;
		if (phpversion() >= '4.3.0' && function_exists('file_get_contents'))
		{
		} // Checking for a new function
		else
		{ // No? We'll create it instead
			function file_get_contents($ipnget) 
			{	
				$ipnget = @file($ipnget);
				return $ipnget[0];
			}
		}

        $response = @file_get_contents('http://'.$domain.':80/cgi-bin/webscr?'.$postipn);

		if (!$response)
		{
			$error=1;
			$getrq=0;

		}
	}
// If no problems have occured then we proceed with the processing
	else
	{
		@fputs ($socket,$header.$postipn."\r\n\r\n"); // Required on some environments
		while (!feof($socket))
		{
			$response = fgets ($socket,1024); 
		}
	}

	$response = trim ($response);
	$amount = $_PAYPAL['amount'];
	$receiver_email = $_PAYPAL['receiver_email'];
	$receiver_id = $_PAYPAL['receiver_id'];
	$business = $_PAYPAL['business'];
	$item_name = $_PAYPAL['item_name'];
	$item_number = $_PAYPAL['item_number'];
	$quantity = $_PAYPAL['quantity'];
	$invoice = $_PAYPAL['invoice'];
	$custom = $_PAYPAL['custom'];
	$option_name1 = $_PAYPAL['option_name1'];
	$option_selection1 = $_PAYPAL['option_selection1'];
	$option_name2 = $_PAYPAL['option_name2'];
	$option_selection2 = $_PAYPAL['option_selection2'];
	$num_cart_items = $_PAYPAL['num_cart_items'];
	$payment_status = $_PAYPAL['payment_status'];
	$pending_reason = $_PAYPAL['pending_reason'];
	$payment_date = $_PAYPAL['payment_date'];
	$settle_amount = $_PAYPAL['settle_amount'];
	$settle_currency = $_PAYPAL['settle_currency'];
	$exchange_rate = $_PAYPAL['exchange_rate'];
	$payment_gross = $_PAYPAL['payment_gross'];
	$payment_fee = $_PAYPAL['payment_fee'];
	$mc_gross = $_PAYPAL['mc_gross'];
	$mc_fee = $_PAYPAL['mc_fee'];
	$mc_currency = $_PAYPAL['mc_currency'];
	$tax = $_PAYPAL['tax'];
	$txn_id = $_PAYPAL['txn_id'];
	$txn_type = $_PAYPAL['txn_type'];
	$reason_code = $_PAYPAL['reason_code'];
	$for_auction = $_PAYPAL['for_auction'];
	$auction_buyer_id = $_PAYPAL['auction_buyer_id'];
	$auction_close_date = $_PAYPAL['auction_close_date'];
	$auction_multi_item = $_PAYPAL['auction_multi_item'];
	$memo = $_PAYPAL['memo'];
	$first_name = $_PAYPAL['first_name'];
	$last_name = $_PAYPAL['last_name'];
	$address_street = $_PAYPAL['address_street'];
	$address_city = $_PAYPAL['address_city'];
	$address_state = $_PAYPAL['address_state'];
	$address_zip = $_PAYPAL['address_zip'];
	$address_country = $_PAYPAL['address_country'];
	$address_status = $_PAYPAL['address_status'];
	$payer_email = $_PAYPAL['payer_email'];
	$payer_id = $_PAYPAL['payer_id'];
	$payer_business_name = $_PAYPAL['payer_business_name'];
	$payer_status = $_PAYPAL['payer_status'];
	$payment_type = $_PAYPAL['payment_type'];
	$notify_version = $_PAYPAL['notify_version'];
	$verify_sign = $_PAYPAL['verify_sign'];
	$userid = $option_name1;
	$username = $option_name2;
	$d=date("d");
	$m=date("M");
	$y=date("y");
	
	$date="$d/$m/$y";

	// IPN was confirmed as both genuine and VERIFIED
	if (!strcmp ($response, "VERIFIED"))
	{
    if($receiver_email==$yfdrecemail OR $receiver_email==$yfdrecemail)
		{
      $query = mysql_query("SELECT ipnid FROM ipn WHERE  trans='$txn_id'");
	    $txn_check = mysql_fetch_array($query);
      if($txn_check[id]=="")
			{
				if(($payment_gross / $quantity) < 0)
				{
		
		    }
				elseif($item_name==$yfditemnam)
				{ 
					$sql="SELECT * FROM ipn WHERE trans='".$txn_id."' AND verified='Completed'";
					$query=mysql_query($sql);
					$rows=mysql_num_rows($query);
					if($rows==0)
					{
						$points = $item_name;						
/*
						$sale=0; // if a sale is on then set the bonus amount below note 20 = 20% bonus
						if($sale==1 && $quantity >= 20)
						{
							$points = $points + ceil($points * 0.2);
						}

						$detailuser= getdatawhere($userid,'*',$table,$idFieldName);
						$before = $detailuser[$specitemnam];
						$after = 0;
*/						$now=time();
						$str = "INSERT INTO `ipn` ( `ipnid` , `name` , `user` , `points` , `trans` , `before` , `after`, `ipnstatus`, `verified`,  `time`) VALUES (NULL , '$item_number', '$userid', '$points', '$txn_id', '$before', '0', '0', '$payment_status', '$now')";
						//	echo "$str<br>";
						$q = @mysql_query($str);
						if($payment_status == 'Completed')
						{
							
							$sql = "
								INSERT INTO  `payment` (
									`date` ,
									`invoiceId` ,
									`amount` ,
									`paymentMethod` ,
									`comments` ,
									`credit` ,
									`amountApplied` ,
									`account` ,
									`anticipo`
									)
									VALUES (
										'".date("Y-m-d")."',  
										'".$item_number."',  
										'".$payment_gross."',  
										'Transferencia',  
										'Pago a traves de Paypal',  
										'0',  
										'".$payment_gross."', 
										'' ,  
										'0')";
							mysql_query($sql) or die(mysql_error());							
							//updateuserdata($userid, $specitemnam." = ".$specitemnam." + '".$points."' ");
							$payments = new Payments;
							$payments->setInvoiceId($item_number);
							$invoice = $payments->InvoiceInfo();
							error_log($invoice["status"]);

							if($invoice["status"] == "Pagada")
							{
								$db->setQuery("
									UPDATE user_subject SET status = 'activo'
										WHERE alumnoId = '".$invoice["userId"]."' AND courseId = '".$invoice["courseId"]."'");
								$db->UpdateData();		
							}

							
						}
						//$detailuser2=getdatawhere($userid,'*',$table,$idFieldName);
						$after = $detailuser2[$specitemnam];
						$str = "update `ipn` set after = '$after', ipnstatus = '1' where trans = '$txn_id' ";
						//	echo "$str<br>";
						$q = @mysql_query($str);
						if (!$q) 
						{
							print ('Query failed: '.mysql_error());
							return;
						}
					}
		        }
			}// txn exists
		}// is shadowops / modern-war-generals
        else
		{ // was not me, they tried to cheat!
			echo "cheater";
        }
	}
// IPN was not validated as genuine and is INVALID
	elseif (!strcmp ($response, "INVALID"))
	{
	}
	else
	{ // Just incase something serious should happen!
	}
}

function variableAudit($v,$c)
{
	global  $_PAYPAL;
    if (!strcasecmp($_PAYPAL[$v],$c))
    { return 1; } else { return 0; }
}

// Terminate the socket connection (if open) and exit

	@fclose ($socket); exit;

?>