<?php

	class Activity extends Module
	{
		private $timeLimit;
		private $testId;
		private $pregunta;
		private $opcionA;
		private $opcionB;
		private $opcionC;
		private $opcionD;
		private $opcionE;
		private $hora;
		private $usuarioId;
		private $horaInicial;
		private $verponderation;
		
		public function setVerponderation($value)
		{
			// $this->Util()->ValidateInteger($value);
			$this->verponderation = $value;
		}
		
		public function setHoraInicial($value)
		{
			// $this->Util()->ValidateInteger($value);
			$this->horaInicial = $value;
		}
		
		public function setUsuarioId($value)
		{
			$this->Util()->ValidateInteger($value);
			$this->usuarioId = $value;
		}
		
		public function setTestId($value)
		{
			$this->Util()->ValidateInteger($value);
			$this->testId = $value;
		}

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


		public function setPregunta($value)
		{
			// if($this->Util()->ValidateRequireField($value, 'RFC')){
			$this->Util()->ValidateString($value,10000,0);
			$this->pregunta = $value;
			// }
		}
		
		public function setOpcionA($value)
		{
			$this->Util()->ValidateString($value,10000,0);
			$this->opcionA = $value;
		}
		
		public function setOpcionB($value)
		{
			$this->Util()->ValidateString($value,10000,0);
			$this->opcionB = $value;
		}
		
		public function setOpcionC($value)
		{
			$this->Util()->ValidateString($value,10000,0);
			$this->opcionC = $value;
		}
		
		public function setOpcionD($value)
		{
			$this->Util()->ValidateString($value,10000,0);
			$this->opcionD = $value;
		}
		
		public function setOpcionE($value)
		{
			$this->Util()->ValidateString($value,10000,0);
			$this->opcionE = $value;
		}
		
		public function setRespuesta($value)
		{
			$this->Util()->ValidateString($value,10000,0);
			$this->respuesta = $value;
		}
		
		
		public function setHora($value)
		{
			$this->Util()->ValidateString($value,10000,0);
			$this->hora = $value;
		}
		
		public function SaveModule()
		{
			if($this->Util()->PrintErrors())
			{
				// si hay errores regresa false
				// return false;
			}
			$final= $this->getFinalDate()." ".$this->hora;
			
			// $fechaFinal = $this->getFinalDate()." ".$this->hora;
			//si no hay errores
			//creamos la cadena de insercion
			$sql = "INSERT INTO
						activity_config
						( 	
							diaInicial ,
							diaFinal ,
						 	subject_moduleId,
							activityType,
							initialDate,
							horaInicial,
							finalDate,
							modality,
							description,
							resumen,
							ponderation,
							requiredActivity
						)
					VALUES (
							'".$_POST['diaInicial']."',
							'".$_POST['diaFinal']."',
							'" . $this->getCourseModuleId() . "', 
							'" . $this->activityType . "',
							'" . $this->getInitialDate() . "',
							'" . $this->horaInicial. "',
							'" . $final . "',
							'" . $this->getModality() . "',
							'" . $this->getDescription() . "',
							'" . $this->resumen . "',
							'" . $this->ponderation . "',
							'" . $this->requiredActivity . "'
							)";
							
							// exit;
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
		
		
		public function Save()
		{
			if($this->Util()->PrintErrors())
			{
				// si hay errores regresa false
				return false;
			}
			$final= $this->getFinalDate()." ".$this->hora;
			
			// $fechaFinal = $this->getFinalDate()." ".$this->hora;
			//si no hay errores
			//creamos la cadena de insercion
			$sql = "INSERT INTO
						activity
						( 	
						 	courseModuleId,
							activityType,
							initialDate,
							horaInicial,
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
							'" . $this->horaInicial. "',
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
			
			$fechaFinal = $this->getFinalDate()." ".$this->hora;
			
			//si no hay errores
			//creamos la cadena de insercion
			$sql = "UPDATE
						activity
						SET
							activityType = '".$this->activityType."',
							initialDate = '".$this->getInitialDate()."',
							horaInicial = '".$this->horaInicial."',
							finalDate = '".$fechaFinal."',
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

		public function Delete($id = null)
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
				
				
		public function enumerateActivityModule($tipo = NULL)
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
			$pond = "";
			
			if($this->verponderation == 'no')
			{
				$pond = " and ponderation <> 0";
			}
		
			 $sql = "
				SELECT *,@rownum:=@rownum+1 AS rownum  FROM (SELECT @rownum:=0) r,activity_config
				WHERE subject_moduleId = '".$this->getCourseModuleId()."' ".$pond."  ".$add."
				ORDER BY initialDate ASC, activityConfigId ASC";
				
				
		
			$this->Util()->DB()->setQuery($sql);
			$result = $this->Util()->DB()->GetResult();
			// exit;
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
				
				$result[$key]["initialDateTimestamp"] = strtotime($res["initialDate"].' '.$res["horaInicial"]);
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
			$pond = "";
			
			if($this->verponderation == 'no')
			{
				$pond = " and ponderation <> 0";
			}
		
			 $sql = "
				SELECT *,@rownum:=@rownum+1 AS rownum  FROM (SELECT @rownum:=0) r,activity
				WHERE courseModuleId = '".$this->getCourseModuleId()."' ".$pond."  ".$add."
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
				
				$result[$key]["initialDateTimestamp"] = strtotime($res["initialDate"].' '.$res["horaInicial"]);
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
		
		
		public function Info($id = null)
		{
			//creamos la cadena de seleccion
			 $sql = "SELECT 
						* 
					FROM
						activity
					WHERE
							activityId='" . $this->getActivityId() . "'";
						// exit;
			//configuramos la consulta con la cadena de actualizacion
			$this->Util()->DB()->setQuery($sql);
			//ejecutamos la consulta y obtenemos el resultado
			$result = $this->Util()->DB()->GetRow();
			
			// ECHO "<PRE>"; print_r($result );
			// EXIT;
			$f = explode(" ",$result["finalDate"]);

			$result["initialDate"] = $this->Util()->FormatDateBack($result["initialDate"]);
			$result["finalDateNoFormat"] = $result["finalDate"];
			$result["finalDate"] = $this->Util()->FormatDateBack($f[0]);
			$result["horaFinal"] = $f[1];
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
		
		function EditTest()
		{
			

			if($this->Util()->PrintErrors()){ 
		
				return false; 
			}

			 $sql = "UPDATE
							activity_test
							SET
								question = '".$this->pregunta."',
								opcionA = '".$this->opcionA."',
								opcionB = '".$this->opcionB."',
								opcionC = '".$this->opcionC."',
								opcionD = '".$this->opcionD."',
								opcionE = '".$this->opcionE."',
								answer = '".$this->respuesta."'
							WHERE testId = '".$this->testId."'";
				//configuramos la consulta con la cadena de insercion
				$this->Util()->DB()->setQuery($sql);
				//ejecutamos la consulta y guardamos el resultado, que sera el ultimo positionId generado
				$result = $this->Util()->DB()->UpdateData();
				$this->Util()->setError(90000, 'complete', "Se ha editado la actividad");
				$this->Util()->PrintErrors();

			return true;
		}
		
		function InfoApp($tipo = NULL)
		{
			
			
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
				WHERE activityId = '".$this->activityId."' ".$add."";

			$this->Util()->DB()->setQuery($sql);
			$result = $this->Util()->DB()->GetRow();
			
			
			$module = new Module;
			$module->setCourseModuleId($this->getCourseModuleId());
			$myModule = $module->InfoCourseModule();
			//print_r($myModule);
			
			$count = 1;
			
			
				$result["count"] = $count;
				$count++;
				$result["descriptionShort"] = substr($result["description"], 0, 30);
				$this->setActivityId($this->activityId);
				  
				 if($tipo == "Tarea"){
						$result["numreq"]=$resultado["rownum"];
						$result["tipo"]="Examen";
				}
				else{
							$adds = " AND activityType != 'Examen'";
							$this->Util()->DB()->setQuery("
							SELECT *,@rownum:=@rownum+1 AS rownum  FROM (SELECT @rownum:=0) r,activity
							WHERE activityId = '".$this->activityId."' ".$adds."
							ORDER BY initialDate ASC");
							$datosExa = $this->Util()->DB()->GetRow();
												
							$result["numreq"]=$datosExa["rownum"];
							$result["tipo"]="Examen";

			   }
			   
			  
			  
				$result["requerida"] = $this->Info();
				//$result[$key]["req"]=$this->ver("Tarea");

				$result["available"] = true;
				//if requerida checamos si ya entregamos la tarea
				
				$result["initialDateTimestamp"] = strtotime($result["initialDate"]);
				$result["finalDateTimestamp"] = strtotime($result["finalDate"]);
				
				$explodedInitialDate = explode("-", $result["initialDate"]);
				$date = mktime(0, 0, 0, $explodedInitialDate[1], $explodedInitialDate[2], $explodedInitialDate[0]); 
				$result["week"] = date('W', $date) - $myModule["week"] + 1; 
				
				//checar tareas
				$homework = new Homework;
				$homework->setActivityId($result["activityId"]);
				$homework->setUser5Id($this->usuarioId);
				$result["homework"] = $homework->UploadedApp();
			
				
				if($result["requerida"]["activityId"])
				{
					$homework->setActivityId($result["requerida"]["activityId"]);
					$entregada = $homework->Uploaded();
					if(!$entregada)
					{
						$result["available"] = false;
					}
				}

				$result["score"] = $result["ponderation"];
				$this->setActivityId($result["activityId"]);
				$this->setUserId($this->usuarioId);
				$result["ponderation"] = $this->Score();
				$result["retro"] = $this->Retro();
				
				$result["retroFile"] = $this->RetroFile();
				
				$realScore = $result["ponderation"] * $result["score"] / 100;
				$result["realScore"] = $realScore;

			return $result;
			
		}	
		
		function deleteActividad($Id)
		{
			
			 $sql ="
				SELECT * FROM homework
				WHERE activityId = '".$Id."' AND userId = '".$_SESSION['User']['userId']."'";
			$this->Util()->DB()->setQuery($sql);
			$count = $this->Util()->DB()->GetRow();	
			
			@unlink(DOC_ROOT."/homework/".$count['path']);	
			
			$sql = "UPDATE
							homework
							SET
								path = ''
							WHERE activityId = '".$Id."'  AND userId = '".$_SESSION['User']['userId']."'";
			

			$this->Util()->DB()->setQuery($sql);

			$result = $this->Util()->DB()->DeleteData();
			$this->Util()->setError(90000, 'complete', "Se ha eliminado la actividad");
			$this->Util()->PrintErrors();
			return true;
		}
		
		function enumerateActividadCalendario($Id)
		{
			 $sql ="
				SELECT *,DATE( finalDate ) as fechaFinal FROM activity
				WHERE courseModuleId = ".$Id." order by initialDate,horaInicial ASC";
			$this->Util()->DB()->setQuery($sql);
			$count = $this->Util()->DB()->GetResult();	

			return $count;
		}
		
		public function infoActivityConfig($Id)
		{
			//creamos la cadena de seleccion
			 $sql = "SELECT 
						* 
					FROM
						activity_config
					WHERE
							activityConfigId='" . $Id . "'";
						// exit;
			//configuramos la consulta con la cadena de actualizacion
			$this->Util()->DB()->setQuery($sql);
			//ejecutamos la consulta y obtenemos el resultado
			$result = $this->Util()->DB()->GetRow();
			
			// ECHO "<PRE>"; print_r($result );
			// EXIT;
			$f = explode(" ",$result["finalDate"]);

			$result["initialDate"] = $this->Util()->FormatDateBack($result["initialDate"]);
			$result["finalDateNoFormat"] = $result["finalDate"];
			$result["finalDate"] = $this->Util()->FormatDateBack($f[0]);
			$result["horaFinal"] = $f[1];
			if($result)
				$result = $this->Util->EncodeRow($result);

			// echo "<pre>"; print_r($result);
			// exit;
			return $result;	
		}
		
		
		public function EditModule()
		{
			if($this->Util()->PrintErrors())
			{
				// si hay errores regresa false
				// return false;
			}
			
			$fechaFinal = $this->getFinalDate()." ".$this->hora;
			
			//si no hay errores
			//creamos la cadena de insercion
			$sql = "UPDATE
						activity_config
						SET
							diaInicial = '".$_POST['diaInicial']."',
							diaFinal = '".$_POST['diaFinal']."',
							activityType = '".$this->activityType."',
							initialDate = '".$this->getInitialDate()."',
							horaInicial = '".$this->horaInicial."',
							finalDate = '".$fechaFinal."',
							modality = '".$this->getModality()."',
							description = '".$this->getDescription()."',
							resumen = '".$this->resumen."',
							ponderation = '".$this->ponderation."',
							requiredActivity = '".$this->requiredActivity."'
						WHERE activityConfigId = '".$this->activityId."'";
			//configuramos la consulta con la cadena de insercion
			$this->Util()->DB()->setQuery($sql);
			//ejecutamos la consulta y guardamos el resultado, que sera el ultimo positionId generado
			$result = $this->Util()->DB()->UpdateData();
			$this->Util()->setError(90000, 'complete', "Se ha editado la actividad");
			$this->Util()->PrintErrors();
			return true;
		}
		
		
		
		public function deleteAct($Id)
		{
				$sql = "DELETE FROM activity_config
						WHERE activityConfigId = '".$Id."'";
						
				$this->Util()->DB()->setQuery($sql);
			//ejecutamos la consulta y guardamos el resultado, que sera el ultimo positionId generado
			$result = $this->Util()->DB()->DeleteData();
			
			return true;
		}
	}	
?>