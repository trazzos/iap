<?php

	class Module extends Course
	{
		private $subjectModuleId;
		public function setSubjectModuleId($value)
		{
			$this->subjectModuleId = $value;
		}

		public function getSubjectModuleId()
		{
			return $this->subjectModuleId;
		}

		private $courseModuleId;
		public function setCourseModuleId($value)
		{
			$this->courseModuleId = $value;
		}

		public function getCourseModuleId()
		{
			return $this->courseModuleId;
		}
		
		public function EnumerateById($id)
		{
			$this->Util()->DB()->setQuery("
				SELECT * FROM subject_module
				WHERE subjectId = '".$id."'
				ORDER BY subject_module.semesterId ASC, subject_module.name ASC");
			$result = $this->Util()->DB()->GetResult();
			
			foreach($result as $key => $res)
			{
/*				$this->Util()->DB()->setQuery("
					SELECT COUNT(*) FROM subjectModule WHERE subjectId ='".$res["subjectId"]."'");
			
				$result[$key]["modules"] = $this->Util()->DB()->GetSingle();*/
			}
			return $result;
		}
		
		public function Save()
		{
			if($this->Util()->PrintErrors())
			{
				// si hay errores regresa false
				return false;
			}
			//si no hay errores
			//creamos la cadena de insercion
			$sql = "INSERT INTO
						subject_module
						( 	
						 	subjectId,
						 	clave,
							name,
							welcomeText,
							introduction,
							intentions,
							objectives,
							themes,
							scheme,
							methodology,
							politics,
							semesterId,
							evaluation,
							bibliography,							
							cost
						)
					VALUES (
							'" . $this->getSubjectId() . "', 
							'" . $this->getClave() . "', 
							'" . $this->getName() . "',
							'" . $this->getWelcomeText() . "',
							'" . $this->getIntroduction() . "',
							'" . $this->getIntentions() . "',
							'" . $this->getObjectives() . "',
							'" . $this->getThemes() . "',
							'" . $this->getScheme() . "',
							'" . $this->getMethodology() . "',
							'" . $this->getPolitics() . "',
							'" . $this->getSemesterId() . "',
							'" . $this->getEvaluation() . "',
							'" . $this->getBibliography() . "',
							'" . $this->getCost() . "'
							)";
			//configuramos la consulta con la cadena de insercion
			$this->Util()->DB()->setQuery($sql);
			//ejecutamos la consulta y guardamos el resultado, que sera el ultimo positionId generado
			$result = $this->Util()->DB()->InsertData();
			if($result > 0)
			{
				//si el resultado es mayor a cero, se inserto el nuevo registro con exito...se regresara true
				$result = true;
				$this->Util()->setError(90000, 'complete', "Se ha creado un nuevo curso");
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
		
		public function Info()
		{
			//creamos la cadena de seleccion
			$sql = "SELECT 
						* 
					FROM
						subject_module
					WHERE
							subjectModuleId='" . $this->	subjectModuleId . "'";
			//configuramos la consulta con la cadena de actualizacion
			$this->Util()->DB()->setQuery($sql);
			//ejecutamos la consulta y obtenemos el resultado
			$result = $this->Util()->DB()->GetRow();
			if($result)
				$result = $this->Util->EncodeRow($result);

			return $result;	
		}

		public function InfoCourseModule()
		{
			//creamos la cadena de seleccion
			$sql = "SELECT 
						*, subject_module.name AS name, subject.name AS subjectName, major.name AS majorName,
						subject_module.welcomeText as welcomeText,
						subject_module.introduction as introduction,
						subject_module.intentions as intentions,
						subject_module.objectives as objectives,
						subject_module.themes as themes,
						subject_module.scheme as scheme,
						subject_module.methodology as methodology,
						subject_module.politics as politics,
						subject_module.evaluation as evaluation,
						subject_module.bibliography as bibliography,
						subject_module.subjectModuleId as Id,
						subject_module.semesterId as semesId
					FROM
						course_module
					LEFT JOIN subject_module ON course_module.subjectModuleId = subject_module.subjectModuleId
					LEFT JOIN	subject ON subject.subjectId = subject_module.subjectId	
					LEFT JOIN	major ON major.majorId = subject.tipo	
					WHERE
							courseModuleId='" . $this->courseModuleId . "'";
			//configuramos la consulta con la cadena de actualizacion
			$this->Util()->DB()->setQuery($sql);
			//ejecutamos la consulta y obtenemos el resultado
			$result = $this->Util()->DB()->GetRow();

			$explodedInitialDate = explode("-", $result["initialDate"]);
			//$date = mktime(0, 0, 0, $explodedInitialDate[1], $explodedInitialDate[2], $explodedInitialDate[0]); 
		     //$date = @mktime(0, 0, 0, $explodedInitialDate[1], $explodedInitialDate[2], $explodedInitialDate[0]);
             $date = mktime(0, 0, 0, $explodedInitialDate[1], $explodedInitialDate[2], intval($explodedInitialDate[0]));
           
		   $result["name"]= $this->Util()->acento($result["name"]);


		   $result["week"] = date('W', $date); 
			
			$result["initialDate"] = $this->Util->FormatDateBack($result["initialDate"]);
			$result["finalDate"] = $this->Util->FormatDateBack($result["finalDate"]);
			$result["access"] = explode("|", $result["access"]);

			$result["welcomeTextDecoded"] = html_entity_decode($result["welcomeText"]);
			$result["introductionDecoded"] = html_entity_decode($result["introduction"]);
			$result["intentionsDecoded"] = html_entity_decode($result["intentions"]);
			$result["objectivesDecoded"] = html_entity_decode($result["objectives"]);
			$result["themesDecoded"] = html_entity_decode($result["themes"]);
			$result["schemeDecoded"] = html_entity_decode($result["scheme"]);
			$result["methodologyDecoded"] = html_entity_decode($result["methodology"]);
			$result["politicsDecoded"] = html_entity_decode($result["politics"]);
			$result["evaluationDecoded"] = html_entity_decode($result["evaluation"]);
			$result["bibliographyDecoded"] = html_entity_decode($result["bibliography"]);

			//print_r($result);
			return $result;	
		}

		public function Update()
		{
			if($this->Util()->PrintErrors())
			{
				// si hay errores regresa false
				return false;
			}
			//si no hay errores
			//creamos la cadena de actualizacion
			$sql = "UPDATE 
						subject_module
					SET
						clave='" 	. $this->getClave() . "', 
						name='" 	. $this->getName() . "',
						welcomeText='" 	. $this->getWelcomeText() . "',
						introduction='" 	. $this->getIntroduction() . "',
						intentions='" 	. $this->getIntentions() . "',
						objectives='" 	. $this->getObjectives() . "',
						themes='" 	. $this->getThemes() . "',
						scheme='" 	. $this->getScheme() . "',
						methodology='" 	. $this->getMethodology() . "',
						politics='" 	. $this->getPolitics() . "',
						semesterId='" 	. $this->getSemesterId() . "',
						evaluation='" 	. $this->getEvaluation() . "',
						bibliography='" 	. $this->getBibliography() . "',
						cost='" 	. $this->getCost() . "'
						WHERE 	subjectModuleId='" . $this->subjectModuleId. "'";
			//configuramos la consulta con la cadena de actualizacion
			$this->Util()->DB()->setQuery($sql);
			//ejecutamos la consulta y guardamos el resultado, que sera el numero de columnas afectadas
			$this->Util()->DB()->UpdateData();
			$result = 1;
			if($result > 0)
			{
				//si el resultado es mayor a cero, se actualizo el registro con exito
				$result = true;
				$this->Util()->setError(90002,'complete', 'El curso se ha actualizado correctamente');
			}
			else
			{
				//si el resultado es cero, no se pudo modificar el registro...se regresa false
				$result = false;
				$this->Util()->setError(90011,'error', "No se pudo modificar el curso");
			}
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
			//si no hay errores
			//creamos la cadena de eliminacion
			$sql = "DELETE FROM 
						subject_module
					WHERE 
						subjectModuleId='" . $this->subjectModuleId . "'";
			//configuramos la consulta con la cadena de eliminacion
			$this->Util()->DB()->setQuery($sql);
			//ejecutamos la consulta y regresamos el resultado, que sera el numero de columnas afectadas
			$result = $this->Util()->DB()->DeleteData();
			if($result > 0)
			{
				//si el resultado es mayor a cero, se actualizo el registro con exito
				$result = true;
				$this->Util()->setError(90001,'complete', "Se ha eliminado el modulo correctamente");
			}
			else
			{
				//si el resultado es cero, no se pudo modificar el registro...se regresa false
				$result = false;
				$this->Util()->setError(90012,'error');
			}
			$this->Util()->PrintErrors();
			return $result;
		}
			
		public function AddModuleToCourse()
		{
			if($this->Util()->PrintErrors())
			{
				// si hay errores regresa false
				return false;
			}
			//si no hay errores
			//creamos la cadena de insercion
		 $sql = "INSERT INTO
						course_module
						( 
							courseId,	
						 	subjectModuleId,
							initialDate,
							finalDate,
							daysToFinish,
							active,
							access
						)
					VALUES (
							'" . $this->getCourseId() . "',
							'" . $this->getSubjectModuleId() . "',
							'" . $this->getInitialDate() . "',
							'" . $this->getFinalDate() . "',
							'" . $this->getDaysToFinish() . "',
							'" . $this->getActive() . "',
							'".$this->getPersonalId()."|".$this->getTeacherId()."|".$this->getTutorId()."|".$this->getExtraId()."')";
			//configuramos la consulta con la cadena de insercion
			$this->Util()->DB()->setQuery($sql);
			//ejecutamos la consulta y guardamos el resultado, que sera el ultimo positionId generado
			$result = $this->Util()->DB()->InsertData();
			if($result > 0)
			{
				//si el resultado es mayor a cero, se inserto el nuevo registro con exito...se regresara true
				$result = true;
				$this->Util()->setError(90000, 'complete', "Has activado un nuevo modulo dentro de la curricula");
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
		
		public function DeleteModuleFromCourse()
		{
			if($this->Util()->PrintErrors())
			{
				// si hay errores regresa false
				return false;
			}
			//si no hay errores
			//creamos la cadena de insercion
		 $sql = "DELETE FROM course_module
		 	WHERE courseModuleId = '".$this->courseModuleId."'";
			//configuramos la consulta con la cadena de insercion
			$this->Util()->DB()->setQuery($sql);
			//ejecutamos la consulta y guardamos el resultado, que sera el ultimo positionId generado
			$result = $this->Util()->DB()->DeleteData();
			$this->Util()->setError(90000, 'complete', "Has borrado el modulo satisfactoriamente");
			$this->Util()->PrintErrors();
			return $result;
		}				
	
		public function EditModuleToCourse()
		{
			if($this->Util()->PrintErrors())
			{
				// si hay errores regresa false
				return false;
			}
			//si no hay errores
			//creamos la cadena de insercion
			$final=$this->getFinalDate();
			
		 $sql = "UPDATE course_module
			SET
				initialDate = '" . $this->getInitialDate() . "',
				finalDate = '" . $final . "',
				daysToFinish  = '" . $this->getDaysToFinish() . "',
				active = '" . $this->getActive() . "',
				access = '".$this->getPersonalId()."|".$this->getTeacherId()."|".$this->getTutorId()."|".$this->getExtraId()."'
			WHERE courseModuleId = ".$this->getCourseModuleId()."	LIMIT 1";
			//configuramos la consulta con la cadena de insercion
			$this->Util()->DB()->setQuery($sql);
			//ejecutamos la consulta y guardamos el resultado, que sera el ultimo positionId generado
			$result = $this->Util()->DB()->UpdateData();
			
			if($_FILES['presentacion'])
			{
				$id = $this->getCourseModuleId();
				$target_path = DOC_ROOT."/flash/";
				$ext = end(explode('.', basename($_FILES['presentacion']['name'])));			
				$target_path = $target_path . "flash_".$id. ".".$ext; 
				$relative_path = "flash_".$id. ".".$ext; 
				
				move_uploaded_file($_FILES['presentacion']['tmp_name'], $target_path);
			}

			if($_FILES['calendario'])
			{
				$id = $this->getCourseModuleId();
				$target_path = DOC_ROOT."/calendario/";
				$ext = end(explode('.', basename($_FILES['calendario']['name'])));			
				//echo $ext;
				$target_path = $target_path . "calendario_".$id. ".".$ext; 
				$relative_path = "flash_".$id. ".".$ext; 
				
				move_uploaded_file($_FILES['calendario']['tmp_name'], $target_path);
			}
			
			$this->Util()->setError(90000, 'complete', "Has actualizado el modulo satisfactoriamente");
			$this->Util()->PrintErrors();
			return $result;
		}				
		
		public function compruebaInscripcion($semestreId,$courseId,$subjectId)
		{
			 $sql = "SELECT 
						count(*)
					FROM
						confirma_inscripcion
					WHERE
						subjectId='".$subjectId."' and nivel = ".$semestreId." and userId = ".$_SESSION['User']['userId']."";
			// exit;
			$this->Util()->DB()->setQuery($sql);
			$result = $this->Util()->DB()->GetSingle();
			
			return $result;
		}
		
	}	
?>