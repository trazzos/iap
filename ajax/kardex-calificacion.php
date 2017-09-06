<?php

	include_once('../init.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');
	
	session_start();
	
	switch($_POST["type"])
	{
		
		case 'verifyControlNumber':
			
			$noControl = $_POST['controlNumber'];
			
			$student->setControlNumber($noControl);
			$userId = $student->GetStdIdByControlNo();
			
			if($userId)
				echo 'ok[#]';
			else{
				echo 'fail[#]';
				
				
				$util->setError(10071, "error", "");
				$util->PrintErrors();
				
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			
			break;
						
		case 'saveCalif':		
									
			$student->setUserId($_POST['userId']);
			$student->setMajorId($_POST['majorId']);
			$student->setSemesterId($_POST['semesterId']);
			
			$calif = $_POST['calif'];
			$tipo = $_POST['tipo'];
			$period = $_POST['period'];
			
			$done = false;
			$student->DeleteKardexCalif();
			foreach($calif as $key => $val){
				
				$typeCalifId = $tipo[$key];
				$periodoId = $period[$key];
				$calificacion = $val;
				$subjectId = $key;
				
				$student->setType($typeCalifId);
				$student->setPeriodoId($periodoId);
				$student->setAverage($calificacion);
				$student->setSubjectId($subjectId);				
				
				$student->SaveKardexCalif();
				
				$done = true;
						
			}
			
								
			if(!$done)
			{
				echo "fail[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
			}
			else
			{
				echo "ok[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			}		
			
			break;
		
		case 'GetNoControl':
			
			$userId = $_POST['idUser'];
			
			$student->setUserId($userId);
			$noControl = $student->GetNoControl();
			
			echo $noControl;
			
			break;
		
	}

?>
