<?php

	class Activity extends Module
	{
		private $timeLimit;

		public function setTimeLimit($value)
		{
			$this->Util()->ValidateInteger($value,999,1);
			$this->timeLimit = $value;
		}

		public function getTimeLimit()
		{
			return $this->timeLimit;
		}

		private $noQuestions;

		public function setNoQuestions($value)
		{
			$this->Util()->ValidateInteger($value,100,1);
			
			$this->noQuestions = $value;
		}

		public function getNoQuestions()
		{
			return $this->noQuestions;
		}

		private $ponderation;

		public function setPonderation($value)
		{
			$this->Util()->ValidateInteger($value,100,0);
			$this->ponderation = $value;
		}

		public function getPonderation()
		{
			return $this->ponderation;
		}
		
		private $activityId;
		public function setActivityId($value)
		{
			$this->activityId = $value;
		}

		public function getActivityId()
		{
			return $this->activityId;
		}

		private $requiredActivity;
		public function setRequiredActivity($value)
		{
			$this->requiredActivity = $value;
		}

		public function getRequiredActivity()
		{
			return $this->requiredActivity;
		}

		private $activityType;

		public function setActivityType($value)
		{
			$this->Util()->ValidateString($value, 60, 1, 'Tipo de Actividad');
			$this->activityType = $value;
		}

		public function getActivityType()
		{
			return $this->activityType;
		}		

		private $resumen;

		public function setResumen($value)
		{
			$this->Util()->ValidateString($value, 60, 1, 'Tipo de Actividad');
			$this->resumen = $value;
		}

		public function getResumen()
		{
			return $this->resumen;
		}		

		public function Save()
		{
			if($this->Util()->PrintErrors())
			{
				// si hay errores regresa false
				return false;
			}
			$final= $this->getFinalDate() . " 23:59:59";
			//si no hay errores
			//creamos la cadena de insercion
			$sql = "INSERT INTO
						activity
						( 	
						 	courseModuleId,
							activityType,
							initialDate,
							finalDate,
							modality,
							description,
							resumen,
							ponderation,
							requiredActivity
						)
					VALUES (
							'" . $this->getCourseModuleId() . "', 
							'" . $this->activityType . "',
							'" . $this->getInitialDate() . "',
							'" . $final . "',
							'" . $this->getModality() . "',
							'" . $this->getDescription() . "',
							'" . $this->resumen . "',
							'" . $this->ponderation . "',
							'" . $this->requiredActivity . "'
							)";
			//configuramos la consulta con la cadena de insercion
			$this->Util()->DB()->setQuery($sql);
			//ejecutamos la consulta y guardamos el resultado, que sera el ultimo positionId generado
			$result = $this->Util()->DB()->InsertData();
			if($result > 0)
			{
				//si el resultado es mayor a cero, se inserto el nuevo registro con exito...se regresara true
				$result = true;
				$this->Util()->setError(90000, 'complete', "Se ha creado un nueva actividad");
			}
			else
			{
				//si el resultado es cero, no se pudo insertar el nuevo registro...se regresara false
				$result = false;
				$this->Util()->setError(90010, 'error');
			}
			$this->Util()->PrintErrors();
			return $result;
		}

		public function Edit()
		{
			if($this->Util()->PrintErrors())
			{
				// si hay errores regresa false
				return false;
			}
			
			//si no hay errores
			//creamos la cadena de insercion
			$sql = "UPDATE
						activity
						SET
							activityType = '".$this->activityType."',
							initialDate = '".$this->getInitialDate()."',
							finalDate = '".$this->getFinalDate()."',
							modality = '".$this->getModality()."',
							description = '".$this->getDescription()."',
							resumen = '".$this->resumen."',
							ponderation = '".$this->ponderation."',
							requiredActivity = '".$this->requiredActivity."'
						WHERE activityId = '".$this->activityId."'";
			//configuramos la consulta con la cadena de insercion
			$this->Util()->DB()->setQuery($sql);
			//ejecutamos la consulta y guardamos el resultado, que sera el ultimo positionId generado
			$result = $this->Util()->DB()->UpdateData();
			$this->Util()->setError(90000, 'complete', "Se ha editado la actividad");
			$this->Util()->PrintErrors();
			return $result;
		}

		public function Delete()
		{
			if($this->Util()->PrintErrors())
			{
				// si hay errores regresa false
				return false;
			}
			
			$sql = "DELETE FROM activity
						WHERE activityId = '".$this->activityId."'";
			//configuramos la consulta con la cadena de insercion
			$this->Util()->DB()->setQuery($sql);
			//ejecutamos la consulta y guardamos el resultado, que sera el ultimo positionId generado
			$result = $this->Util()->DB()->DeleteData();
			$this->Util()->setError(90000, 'complete', "Se ha eliminado la actividad");
			$this->Util()->PrintErrors();
			return $result;
		}
				
		
				
		public function Enumerate($tipo = NULL)
		{
			if(!$this->getUserId())
			{
				$this->setUserId($_SESSION["User"]["userId"]);
			}
			
			if($tipo == "Examen")
			{
				$add = " AND activityType = 'Examen'";
			}
			elseif($tipo == "Tarea")
			{
				$add = " AND activityType != 'Examen'";
			}
		
			 $sql = "
				SELECT *,@rownum:=@rownum+1 AS rownum  FROM (SELECT @rownum:=0) r,activity
				WHERE courseModuleId = '".$this->getCourseModuleId()."' ".$add."
				ORDER BY initialDate ASC, activityId ASC";
				
				// exit;
		
			$this->Util()->DB()->setQuery($sql);
			$result = $this->Util()->DB()->GetResult();
			
			$module = new Module;
			$module->setCourseModuleId($this->getCourseModuleId());
			$myModule = $module->InfoCourseModule();
			//print_r($myModule);
			
			$count = 1;
			//print_r($result);exit;
			foreach($result as $key => $res)
			{
				$result[$key]["count"] = $count;
				$count++;
				$result[$key]["descriptionShort"] = substr($result[$key]["description"], 0, 30);
				$this->setActivityId($res["requiredActivity"]);
				  
				  if($tipo == "Tarea"){
				  
				  foreach($result as $keys=> $resultado){
				         if($res["requiredActivity"]==$resultado["activityId"])
						    $result[$key]["numreq"]=$resultado["rownum"];
				          	$result[$key]["tipo"]="Examen";
						  }
				
				 
				}
				else{
							$adds = " AND activityType != 'Examen'";
							$this->Util()->DB()->setQuery("
							SELECT *,@rownum:=@rownum+1 AS rownum  FROM (SELECT @rownum:=0) r,activity
							WHERE courseModuleId = '".$this->getCourseModuleId()."' ".$adds."
							ORDER BY initialDate ASC");
							$datosExa = $this->Util()->DB()->GetResult();
					
							foreach($datosExa as $keys=>$dat){
							    if($res["requiredActivity"]==$dat["activityId"])
						        $result[$key]["numreq"]=$dat["rownum"];
								$result[$key]["tipo"]="Examen";
							 }

				
						//	print_r($resultado);
			   }
			   
			   
			   
				$result[$key]["requerida"] = $this->Info();
				//$result[$key]["req"]=$this->ver("Tarea");

				$result[$key]["available"] = true;
				//if requerida checamos si ya entregamos la tarea
				
				$result[$key]["initialDateTimestamp"] = strtotime($res["initialDate"]);
				$result[$key]["finalDateTimestamp"] = strtotime($res["finalDate"]);
				
				$explodedInitialDate = explode("-", $res["initialDate"]);
				$date = mktime(0, 0, 0, $explodedInitialDate[1], $explodedInitialDate[2], $explodedInitialDate[0]); 
				$result[$key]["week"] = date('W', $date) - $myModule["week"] + 1; 
				
				//checar tareas
				$homework = new Homework;
				$homework->setActivityId($res["activityId"]);
				$homework->setUserId($this->getUserId());
				$result[$key]["homework"] = $homework->Uploaded();
				
				if($result[$key]["requerida"]["activityId"])
				{
					$homework->setActivityId($result[$key]["requerida"]["activityId"]);
					$entregada = $homework->Uploaded();
					if(!$entregada)
					{
						$result[$key]["available"] = false;
					}
				}


				$result[$key]["score"] = $result[$key]["ponderation"];
				$this->setActivityId($res["activityId"]);
				$this->setUserId($this->getUserId());
				$result[$key]["ponderation"] = $this->Score();
				$result[$key]["retro"] = $this->Retro();
				
				$result[$key]["retroFile"] = $this->RetroFile();
				
				$realScore = $result[$key]["ponderation"] * $result[$key]["score"] / 100;
				$result[$key]{"realScore"} = $realScore;
				
			}
			
			// echo "<pre>"; print_r($result);
			// exit;
			return $result;
		}

		function Retro()
		{
			$this->Util()->DB()->setQuery("
				SELECT retro FROM activity_score
				WHERE activityId = '".$this->getActivityId()."' AND userId = '".$this->getUserId()."'");
			$result = $this->Util()->DB()->GetSingle();
			
			return $result;
		}
		
		
		function RetroFile()
		{
			$this->Util()->DB()->setQuery("
				SELECT rutaArchivoRetro FROM activity_score
				WHERE activityId = '".$this->getActivityId()."' AND userId = '".$this->getUserId()."'");
			$result = $this->Util()->DB()->GetSingle();
			
			return $result;
		}
		
		
		function Score()
		{
			$this->Util()->DB()->setQuery("
				SELECT ponderation FROM activity_score
				WHERE activityId = '".$this->getActivityId()."' AND userId = '".$this->getUserId()."'");
			$result = $this->Util()->DB()->GetSingle();
			
			return $result;
		}
		
		
		public function Info()
		{
			//creamos la cadena de seleccion
			$sql = "SELECT 
						* 
					FROM
						activity
					WHERE
							activityId='" . $this->getActivityId() . "'";
			//configuramos la consulta con la cadena de actualizacion
			$this->Util()->DB()->setQuery($sql);
			//ejecutamos la consulta y obtenemos el resultado
			$result = $this->Util()->DB()->GetRow();
			
			
			$f = explode(" ",$result["finalDate"]);

			$result["initialDate"] = $this->Util()->FormatDateBack($result["initialDate"]);
			$result["finalDateNoFormat"] = $result["finalDate"];
			$result["finalDate"] = $this->Util()->FormatDateBack($f[0]);
			if($result)
				$result = $this->Util->EncodeRow($result);

			return $result;	
		}

		public function TotalPonderation()
		{
			$this->Util()->DB()->setQuery("
				SELECT SUM(ponderation) FROM activity
				WHERE courseModuleId = '".$this->getCourseModuleId()."'");
			$result = $this->Util()->DB()->GetSingle();
			
			return $result;
		}
		
		public function EditExamen()
		{
			if($this->Util()->PrintErrors())
			{
				// si hay errores regresa false
				return false;
			}
			
			//si no hay errores
			//creamos la cadena de insercion
			$sql = "UPDATE
						activity
						SET
							timeLimit = '".$this->timeLimit."',
							noQuestions = '".$this->noQuestions."'
						WHERE activityId = '".$this->activityId."'";
			//configuramos la consulta con la cadena de insercion
			$this->Util()->DB()->setQuery($sql);
			$this->Util()->DB()->UpdateData();
			
			//generamos preguntas en blanco(o borramos segun sea el caso
			$sql = "SELECT COUNT(*)
						FROM activity_test
						WHERE activityId = '".$this->activityId."'";
			//configuramos la consulta con la cadena de insercion
			$this->Util()->DB()->setQuery($sql);
			$questions = $this->Util()->DB()->GetSingle();
			
			//crear 2 preguntas para dar margen a examenes random
			$extraQuestions = $this->noQuestions * 2;
			
			$missing = $extraQuestions - $questions;
			if($missing > 0)
			{
				for($ii = 0; $ii < $missing - 1; $ii++)
				{
					$sql = "
					INSERT INTO  `activity_test` (
						`activityId` ,
						`question` ,
						`opcionA` ,
						`opcionB` ,
						`opcionC` ,
						`opcionD` ,
						`opcionE` ,
						`answer`
						)
						VALUES (
						'".$this->activityId."',  
						'Haz tu Pregunta',  
						'Cambiar Opcion A',  
						'Cambiar Opcion B',  
						'',  
						'',  
						'',  
						'optionA')";
					//configuramos la consulta con la cadena de insercion
					$this->Util()->DB()->setQuery($sql);
					$questions = $this->Util()->DB()->InsertData();
				}
			}

			if($missing < 0)
			{
				for($ii = 0; $ii < abs($missing); $ii++)
				{
					$sql = "SELECT MAX(testId) FROM `activity_test`
					WHERE activityId = '".$this->activityId."'";
					$this->Util()->DB()->setQuery($sql);
					$maxTestId = $this->Util()->DB()->GetSingle();

					$sql = "
					DELETE FROM `activity_test`
					WHERE testId = '".$maxTestId."' LIMIT 1";
					$this->Util()->DB()->setQuery($sql);
					$questions = $this->Util()->DB()->DeleteData();
				}
			}
			
			//ejecutamos la consulta y guardamos el resultado, que sera el ultimo positionId generado
			$result = $this->Util()->DB()->UpdateData();
			$this->Util()->setError(90000, 'complete', "Se ha editado la actividad");
			$this->Util()->PrintErrors();
			return $result;
		}
		
		function GetMajorModality()
		{
			 $sql = "SELECT 
						course.modality FROM activity
						LEFT JOIN course_module ON activity.courseModuleId = course_module.courseModuleId
						LEFT JOIN course ON course.courseId = course_module.courseId
						WHERE activityId = '".$this->activityId."'";
			$this->Util()->DB()->setQuery($sql);
			//ejecutamos la consulta y guardamos el resultado, que sera el ultimo positionId generado
			$result = $this->Util()->DB()->GetSingle();
			return $result;
		}
		
	}	
?>