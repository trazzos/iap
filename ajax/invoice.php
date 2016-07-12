<?php

	include_once('../init.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');
	
	session_start();
	
	switch($_POST["type"])
	{
		case 'deleteInvoice':
			
				$payments->setInvoiceId($_POST['id']);	
						
				$payments->InvoiceDelete();
				echo "ok[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
				echo "[#]";
				
				$arrPage = array();		
				$viewPage = 1;			
				$rowsPerPage = 30;		
				
				$pageVar = 'p';	
				
				if(isset($_GET["$pageVar"]))
					$viewPage = $_GET["$pageVar"];	
				
				$desde = "01-".date("m")."-".date("Y");
				$hasta =	date("t")."-".date("m")."-".date("Y");

			$invoices = $payments->Invoices($desde, $hasta, "Sin Pagar", NULL, NULL, NULL, $viewPage, $rowsPerPage, $pageVar, WEB_ROOT.'/invoices', $arrPage);
			
				$smarty->assign('invoices', $invoices);	
				$smarty->assign('arrPage', $arrPage);
				
				$smarty->assign("DOC_ROOT", DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/invoices.tpl');
					
				break;
		
		case 'searchInvoice':

				$invoices = $payments->Invoices($_POST["desde"], $_POST["hasta"], $_POST["status"], $_POST["courseId"], $_POST["name"], $_POST["controlNumber"]);
				
				echo "ok[#]";
				
					$smarty->assign('invoices', $invoices);	
					
					$smarty->assign("DOC_ROOT", DOC_ROOT);
					$smarty->display(DOC_ROOT.'/templates/lists/invoices.tpl');
						
			break;
		
		case 'searchStudentCalificacion':
				
				if($_POST['name'])
					$sqlSearch = ' AND names LIKE "%'.$_POST['name'].'%"';
				if($_POST['controlNumber'])
					$sqlSearch .= ' AND controlNumber LIKE "%'.$_POST['controlNumber'].'%"';
				if($_POST['apPaterno'])
					$sqlSearch .= ' AND lastNamePaterno LIKE "%'.$_POST['apPaterno'].'%"';
				if($_POST['apMaterno'])
					$sqlSearch .= ' AND lastNameMaterno LIKE "%'.$_POST['apMaterno'].'%"';
								
				echo "ok[#]";
							
				$resStudents = $student->Enumerate(' semesterId ASC, ', $sqlSearch);
				$students = $util->EncodeResult($resStudents);
				$smarty->assign('students', $students);	
							
				$smarty->assign("DOC_ROOT", DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/report-calificacion.tpl');
						
			break;
		
		case 'changeStatus':
			
			$status = $_POST['status'];
					
			$user->setUserId($_POST['userId']);
			$user->setStatus($status);
			
			if($status == 'baja')
				$user->setCodeId(0);
			
			if(!$user->changeStatus())
			{
				echo "fail[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{
				echo "ok[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
				echo "[#]";
			}
			
			break;
		
		case 'LoadGroups':
			
			$semesterId = intval($_POST['semesterId']);
			$majorId = $_POST['majorId'];
			
			$group->setSemesterId($semesterId);
			$group->setMajorId($majorId);
			$result = $group->Search();
			
			echo 'ok[#]';
			
			$smarty->assign('groups',$result);
			$smarty->assign("DOC_ROOT", DOC_ROOT);
			$smarty->display(DOC_ROOT.'/templates/lists/list-group.tpl');
					
			break;
	
	}

?>
