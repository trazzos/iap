<?php
include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

	switch($_POST['type'])
	{
		case 'searchStudent':
			$controlNumber = $_POST['controlNumber'];
			$studentName = $_POST['studentName'];
			$studentPaterno = $_POST['studentPaterno'];
			$studentMaterno = $_POST['studentMaterno'];
			// validar entradas vacias
			if( empty($controlNumber) && empty($studentName) && empty($studentPaterno) && empty($studentMaterno) )
			{
				$error->setError(40101, 'error');
				$error->PrintErrors();
				echo "error[#]";
				$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
			}
			else
			{
				$conditionString = '';
				if(!empty($controlNumber))
				{
					// escapar la cadena para que sea seguro usarla con mysql_query()
					$controlNumber = sprintf("%s", mysql_real_escape_string($controlNumber, $db->getConnectionId()));
					// anexar a la condicion de busqueda
					$conditionString .= ( empty($conditionString) ? '' : ' AND ') . "`controlNumber` = '" . $controlNumber . "'";
				}
				if(!empty($studentName))
				{
					// escapar la cadena para que sea seguro usarla con mysql_query()
					$studentName = sprintf("$s", mysql_real_escape_string($studentName, $db->getConnectionId()));
					// anexar a la condicion de busqueda
					$conditionString .= ( empty($conditionString) ? '' : ' AND ') . "`names` = '" . $studentName . "'";
				}
				if(!empty($studentPaterno))
				{
					// escapar la cadena para que sea seguro usarla con mysql_query()
					$studentPaterno = sprintf("%s", mysql_real_escape_string($studentPaterno, $db->getConnectionId()));
					// anexar a la condicion de busqueda
					$conditionString .= ( empty($conditionString) ? '' : ' AND ' ) . "`lastNamePaterno` = '" . $studentPaterno . "'";
				}
				if(!empty($studentMaterno))
				{
					// escapar la cadena para que sea seguro usarla con mysql_query()
					$studentMaterno = sprintf("%s", mysql_real_escape_string($studentMaterno, $db->getConnectionId()));
					// anexar a la condicion de busqueda
					$conditionString .= ( empty($conditionString) ? '' : ' AND ' ) . "`lastNameMaterno` = '" . $studentMaterno . "'";
				}
				$sql = 'SELECT * FROM user WHERE ' . $conditionString;
				$db->setQuery($sql);
				$result = $db->GetResult();
				/*
				// salida de depuracion
				echo '<br /><br /><br /><br />';
				echo 'Consulta : ' . $sql . '<br />';
				echo 'count($result) = ' . count($result);
				echo '<br />';
				print_r($result);
				*/
				$smarty->assign('searchStudentCount', count($result));
				$smarty->assign('searchStudentResult', $result);
				if(count($result) == 0)
				{
					// dato(s) no existe(n)
					$error->setError(40102, 'error');
					$error->PrintErrors();
					echo "error[#]";
					$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
				}
				if(count($result) == 1)
				{
					// hay una coincidencia
					echo 'dataFound[#]';
					$smarty->display(DOC_ROOT.'/templates/study-constancy-data.tpl');
				}
				if(count($result) > 1)
				{
					// mas de una coincidencia	
					$error->setError(40103, 'complete');
					$error->PrintErrors();
					echo 'listFound[#]';
					$smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
					echo '[#]';
					$smarty->display(DOC_ROOT.'/templates/lists/study-constancy.tpl')
				}
			}
			
			break;
	}

?>