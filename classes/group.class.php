<?php

	class Group extends Module
	{
		private $teamNumber;
		private $coursemoduleId;

		
		public function setCourseModuleId($value)
		{
			$this->Util()->ValidateInteger($value,999,1);
			$this->coursemoduleId = $value;
		}
		
		
		public function setTeamNumber($value)
		{
			$this->Util()->ValidateInteger($value,999,1);
			$this->teamNumber = $value;
		}

		function EditScore($modality, $id, $scores, $retros)
		{
			
			// echo '<pre>'; print_r($scores);
			// exit;
			// foreach($scores as $key => $score){
				// $this->setTeamNumber($key);
				// $members = $this->Team();
				// foreach($members as $member){
					// echo $retros[$key];
				// }
			// }
			
			// exit;
			
			foreach($scores as $key => $score)
			{
				$k = $key;
				$this->Util()->ValidateFloat($score, 2, 100,0);
				switch($modality)
				{
					case "Individual":   //{
						//checar si ya hay calificacion
						$this->Util()->DB()->setQuery("
							SELECT COUNT(*)
							FROM activity_score
							WHERE activityId = '".$id."' AND userId = '".$key."'");
						$count = $this->Util()->DB()->GetSingle();
						
						$this->Util()->DB()->setQuery("
							SELECT *
							FROM activity_score
							WHERE activityId = '".$id."' AND userId = '".$key."'");
						$activityAnt = $this->Util()->DB()->GetRow();
					//	print_r($activityAnt); exit;
						
						
						  //obteniendo la informacion de la actividad
				   $activity=new Activity();
				   $activity->setActivityId($id);
				   $infoActivity=$activity->Info();
				   //fin de informacion de actividad 
				   
				    //obteniendo informacion de Student
					$student=new Student;
					$student->setUserId($key);
					$infoStudent=$student->GetInfo();
															 					
															
					//fin informacion Student
						
						
						
						//print_r($calificacion); exit;
						if($count == 0)
						{
							$this->Util()->DB()->setQuery("
								INSERT INTO  `activity_score` (
									`userId` ,
									`activityId` ,
									`retro` ,
									`ponderation`
									)
									VALUES (
									'".$key."',  
									'".$id."',  
									'".$retros[$key]."',  
									'".$score."');");
							$result = $this->Util()->DB()->InsertData();	
							   $hecho=$_SESSION['User']['userId']."p";				       
							   $vista="1p,".$hecho.",".$key."u";
							   $tablas="activity_score";
							   $enlace="/score-activity/id/".$id;
							   $actividad="Se ha calificado la Actividad ".$infoActivity['resumen']." para ".$infoStudent['names']." ".$infoStudent['lastNamePaterno']." ".$infoStudent['lastNameMaterno']." Calificación(De ".$activityAnt['ponderation']." a ".number_format($score,2,'.','').")   Retroalimentación(De ".$activityAnt['retro']." a ".$retros[$key].")";;
									

							
							

						}
						else
						{
							$this->Util()->DB()->setQuery("
								UPDATE `activity_score` SET
									`ponderation` = '".$score."',
									`retro` = '".$retros[$key]."'
								WHERE
									`userId` = '".$key."' AND activityId = '".$id."' LIMIT 1");
							$this->Util()->DB()->UpdateData();	

							$this->Util()->DB()->setQuery("
							SELECT activityScoreId
							FROM activity_score
							WHERE activityId = '".$id."' AND userId = '".$key."'");
							$result = $this->Util()->DB()->GetSingle();

							// echo $result;
							// exit;
							$hecho=$_SESSION['User']['userId']."p";				       
							$vista="1p,".$hecho.",".$key."u";
							$tablas="activity_score";
							$enlace="/score-activity/id/".$id;

							if($activityAnt['ponderation']==number_format($score,2,'.','') &&  $activityAnt['retro']==$retros[$key])
							$actividad="NO";                       
							else					   
							$actividad="Se ha modificado calificación en ".$infoActivity['resumen']." para ".$infoStudent['names']." ".$infoStudent['lastNamePaterno']." ".$infoStudent['lastNameMaterno']." Calificación(De ".$activityAnt['ponderation']." a ".number_format($score,2,'.','').")   Retroalimentación(De ".$activityAnt['retro']." a ".$retros[$key].")";

						
						}
						
						$arch =  "fileRetro_".$key;
						$url = DOC_ROOT;
						foreach($_FILES as $key=>$var)
						{
						   switch($key)
						   {
							   case $arch:
							   if($var["name"]<>""){
									$aux = explode(".",$var["name"]);
									$extencion=end($aux);
									$temporal = $var['tmp_name'];
									$foto_name="doc_".$result.".".$extencion;	
									 $url."/file_retro/".$foto_name;
									if(move_uploaded_file($temporal,$url."/file_retro/".$foto_name)){		
												
										$sql = 'UPDATE 		
										activity_score SET 		
										rutaArchivoRetro = "'.$foto_name.'"			      		
										WHERE activityScoreId = '.$result.'';		
											
									$this->Util()->DB()->setQuery($sql);		
									$this->Util()->DB()->UpdateData();

								   }
									
							   }
						   }
						}
						
						//crear notificacion de actualizacion de calificaciones
						if($actividad!="NO"){
						  $notificacion= new Notificacion;
						  $notificacion->setActividad($actividad);
						  $notificacion->setVista($vista);
						  $notificacion->setHecho($hecho);
						  $notificacion->setTablas($tablas);
						  $notificacion->setEnlace($enlace);
						  
						  $notificacion->saveNotificacion();
						  
						}
						
						
						
						
						
					break;   //}
					default:
					
					
						$this->setTeamNumber($key);
						$members = $this->Team();
						foreach($members as $keyme=>$member)
						{
							// echo 'llega';;
							//checar si ya hay calificacion
							 $sql =	"
								SELECT COUNT(*)
								FROM activity_score
								WHERE activityId = '".$id."' AND userId = '".$member["userId"]."'";
							
							$this->Util()->DB()->setQuery($sql);
							$count = $this->Util()->DB()->GetSingle();
							
							if($count == 0)
							{
								  $sql = "
									INSERT INTO  `activity_score` (
										`userId` ,
										`activityId` ,
										`retro` ,
										`ponderation`
										)
										VALUES (
										'".$member["userId"]."',  
										'".$id."',  
										'".$retros[$k]."',  
										'".$score."');";
										
								// echo '<br>';
								$this->Util()->DB()->setQuery($sql);
								$result = $this->Util()->DB()->InsertData();					
							}
							else
							{
								$this->Util()->DB()->setQuery("
								SELECT activityScoreId
								FROM activity_score
								WHERE activityId = '".$id."' AND userId = '".$member["userId"]."'");
								$result = $this->Util()->DB()->GetSingle();
							
							$sql  = "
									UPDATE `activity_score` SET
										`ponderation` = '".$score."',
										`retro` = '".$retros[$k]."'
									WHERE
										`userId` = '".$member["userId"]."' AND activityId = '".$id."' LIMIT 1";
										
								$this->Util()->DB()->setQuery($sql);
								$this->Util()->DB()->UpdateData();					
							}
							
							$edit = 'no';
							// $editdos = '';
							$arch =  "fileRetro_".$k;
							$url = DOC_ROOT;
							if($_FILES['fileRetro_'.$k]["name"]<>""){
								$aux = explode(".",$_FILES['fileRetro_'.$k]["name"]);
								$extencion=end($aux);
								$temporal = $_FILES['fileRetro_'.$k]['tmp_name'];
								$foto_name="doc_".$result.".".$extencion;	
								 $url."/file_retro/".$foto_name;
								if(move_uploaded_file($temporal,$url."/file_retro/".$foto_name)){		
											
									$sql = 'UPDATE 		
									activity_score SET 		
									rutaArchivoRetro = "'.$foto_name.'"			      		
									WHERE activityScoreId = '.$result.'';		
								$this->Util()->DB()->setQuery($sql);		
								$this->Util()->DB()->UpdateData();
							   }
							   $edit = 'si';
							}
							if ($keyme >= 1){
								if ($editdos=='si'){
									copy($url.'/file_retro/'.$foto_nameant, $url."/file_retro/".$foto_name);
									$sql = 'UPDATE 		
										activity_score SET 		
										rutaArchivoRetro = "'.$foto_name.'"			      		
										WHERE activityScoreId = '.$result.'';		
									$this->Util()->DB()->setQuery($sql);		
									$this->Util()->DB()->UpdateData();
								}
								// echo 'copai';
							}else
							{
								$foto_nameant = $foto_name;
								 $editdos = $edit;
							}
							
								 
						}

				}
				
			}
			$this->Util()->setError(90000, 'complete', "Has modificado las calificaciones");
			$this->Util()->PrintErrors();	

			return true;
		}
		
		public function ScoreGroup($modality, $type, $id)
		{
			switch($modality)
			{
				case "Individual":
				 	 $sql = "
						SELECT *, user_subject.status AS status FROM user_subject
						LEFT JOIN user ON user_subject.alumnoId = user.userId
						WHERE courseId = '".$this->getCourseId()."' and user_subject.status = 'activo'
						ORDER BY lastNamePaterno ASC, lastNameMaterno ASC, names ASC";
					// exit
					$this->Util()->DB()->setQuery($sql);
					$result = $this->Util()->DB()->GetResult();
					
					foreach($result as $key => $res)
					{
						$this->Util()->DB()->setQuery("
							SELECT ponderation
							FROM activity_score
							WHERE activityId = '".$id."' AND userId = '".$res["alumnoId"]."'");
						$result[$key]["ponderation"] = $this->Util()->DB()->GetSingle();

						$this->Util()->DB()->setQuery("
							SELECT retro
							FROM activity_score
							WHERE activityId = '".$id."' AND userId = '".$res["alumnoId"]."'");
						$result[$key]["retro"] = $this->Util()->DB()->GetSingle();
						
						$this->Util()->DB()->setQuery("
							SELECT rutaArchivoRetro
							FROM activity_score
							WHERE activityId = '".$id."' AND userId = '".$res["alumnoId"]."'");
						$result[$key]["fileRetro"] = $this->Util()->DB()->GetSingle();

						$this->Util()->DB()->setQuery("
							SELECT *
							FROM homework
							WHERE activityId = '".$id."' AND userId = '".$res["alumnoId"]."'");
						$result[$key]["homework"] = $this->Util()->DB()->GetRow();
				
					}
				break;				
				default: 
				
				if($this->getCourseModuleId()=='') {
					$this->Util()->DB()->setQuery("
						SELECT teamNumber, teamId FROM team
						WHERE courseModuleId = '".$this->coursemoduleId."'
						GROUP BY teamNumber
						ORDER BY teamNumber ASC");
				}else{
					$this->Util()->DB()->setQuery("
						SELECT teamNumber, teamId FROM team
						WHERE courseModuleId = '".$this->getCourseModuleId()."'
						GROUP BY teamNumber
						ORDER BY teamNumber ASC");
				}
				
					$result = $this->Util()->DB()->GetResult();
					// echo "<pre>"; print_r($result);
					// exit;
					foreach($result as $key => $res)
					{
						//get all team members
						$this->setTeamNumber($res["teamNumber"]);
						$members = $this->Team();
						foreach($members as $member)
						{
							$this->Util()->DB()->setQuery("
								SELECT *
								FROM homework
								WHERE activityId = '".$id."' AND userId = '".$member["userId"]."'");
							$result[$key]["homework"] = $this->Util()->DB()->GetRow();


							$this->Util()->DB()->setQuery("
								SELECT ponderation
								FROM activity_score
								WHERE activityId = '".$id."' AND userId = '".$member["userId"]."'");
							$result[$key]["ponderation"] = $this->Util()->DB()->GetSingle();

							 $sql = "
								SELECT retro
								FROM activity_score
								WHERE activityId = '".$id."' AND userId = '".$member["userId"]."'";
							// echo '<br>';
								// exit;
							$this->Util()->DB()->setQuery($sql);
							$result[$key]["retro"] = $this->Util()->DB()->GetSingle();
							
							 $sql = "
								SELECT rutaArchivoRetro
								FROM activity_score
								WHERE activityId = '".$id."' AND userId = '".$member["userId"]."'";
							// echo '<br>';
								// exit;
							$this->Util()->DB()->setQuery($sql);
							$result[$key]["fileRetro"] = $this->Util()->DB()->GetSingle();

						}
						
					}
					break; 
					// return $result;
				
			}
			return $result;
		}

		
		public function genera(){
		        $this->Util()->DB()->setQuery("
				SELECT *, user_subject.status AS status FROM user_subject
				LEFT JOIN user ON user_subject.alumnoId = user.userId
				WHERE courseId = '".$this->getCourseId()."'
				ORDER BY lastNamePaterno ASC, lastNameMaterno ASC, names ASC");
			$result = $this->Util()->DB()->GetResult();
			$x=63;
			 foreach($result as $fila){
			 $year=date('Y');
			 //print_r($year);
			 $year = substr($year, -2);
			 if(strlen($x)==2){
			      $num="0".$x;
			 }else
			 $num=$x;
			   $matricula="5036101".$year.$num;
			  // print_r($matricula);
			 
			          $this->Util()->DB()->setQuery("
								UPDATE user_subject SET
									matricula = '".$matricula."'
							WHERE
									`alumnoId` = '".$fila['alumnoId']."'  AND courseId = '".$this->getCourseId()."' ");
							$actualiza = $this->Util()->DB()->UpdateData();
				   $x++;
			 
			 }
		   
		
		}
		
		public function matricula_maestrias(){
		        
			//resultados de maestrias
			$this->Util()->DB()->setQuery("
				SELECT *, user_subject.status AS status FROM user_subject
				LEFT JOIN user ON user_subject.alumnoId = user.userId
				WHERE matricula like '5036%'
				ORDER BY lastNamePaterno ASC, lastNameMaterno ASC, names ASC");
			$maestrias = $this->Util()->DB()->GetResult();
			//print_r($maestrias);
		     if(count($maestrias)==0){
			  $this->genera();
			  $this->Util()->setError(90000, 'complete', "Se ha generado correctamente todas las matriculas");
			  $this->Util()->PrintErrors();
			  
			    return true;       
			 }else{
			 $this->Util()->setError(90000, 'complete', "No se pueden generar las matriculas por que ya existen");
			  $this->Util()->PrintErrors();
			 
			 return false;
			 
			 }
			 }
			 
			public function generaEspecialidad(){
		        $this->Util()->DB()->setQuery("
				SELECT *, user_subject.status AS status FROM user_subject
				LEFT JOIN user ON user_subject.alumnoId = user.userId
				WHERE courseId = '".$this->getCourseId()."'
				ORDER BY lastNamePaterno ASC, lastNameMaterno ASC, names ASC");
			$result = $this->Util()->DB()->GetResult();
			$x=63;
			 foreach($result as $fila){
			 $year=date('Y');
			 //print_r($year);
			 $year = substr($year, -2);
			 if(strlen($x)==2){
			      $num="0".$x;
			 }else
			 $num=$x;
			   $matricula="5046101".$year.$num;
			  // print_r($matricula);
			 
			          $this->Util()->DB()->setQuery("
								UPDATE user_subject SET
									matricula = '".$matricula."'
							WHERE
									`alumnoId` = '".$fila['alumnoId']."'  AND courseId = '".$this->getCourseId()."' ");
							$actualiza = $this->Util()->DB()->UpdateData();
				   $x++;
			 
			 }
			 
			 }
			 
			 public function matricula_especialidad(){
		        
			//resultados de maestrias
			$this->Util()->DB()->setQuery("
				SELECT *, user_subject.status AS status FROM user_subject
				LEFT JOIN user ON user_subject.alumnoId = user.userId
				WHERE matricula like '5046%'
				ORDER BY lastNamePaterno ASC, lastNameMaterno ASC, names ASC");
			$especialidad = $this->Util()->DB()->GetResult();
			//print_r($maestrias);
		     if(count($especialidad)==0){
			  $this->generaEspecialidad();
			  $this->Util()->setError(90000, 'complete', "Se ha generado correctamente todas las matriculas");
			  $this->Util()->PrintErrors();
			  
			    return true;       
			 }else{
			 $this->Util()->setError(90000, 'complete', "No se pueden generar las matriculas por que ya existen");
			  $this->Util()->PrintErrors();
			 
			 return false;
			 
			 }
			 
			 		
		}//fin funcion matricula
		
		public function DefaultGroupInactivo()
		{
	
			$this->Util()->DB()->setQuery("
				SELECT *, user_subject.status AS status FROM user_subject
				LEFT JOIN user ON user_subject.alumnoId = user.userId
				WHERE courseId = '".$this->getCourseId()."'  and user_subject.status='inactivo'
				ORDER BY lastNamePaterno ASC, lastNameMaterno ASC, names ASC");
			$result = $this->Util()->DB()->GetResult();
			
			$student= new Student();
			
			foreach($result as $fila){
			      $x=0;
				     $alumnos=$student->EnumerateTotal();
					   
					   foreach($alumnos as $alumno){
					
						    
							if($fila["alumnoId"] == $alumno["userId"] ){
							         $x=1;
							
							}
						
						}
						if($x==0){
						    $student->setAlumnoId($fila["alumnoId"]);
							$student->DeleteLimpia();
						 //echo $fila["alumnoId"]."Este alumno no aparece en estudiantes</br>";
						}
						
			return $result;
			}
		
		}
		
		public function DefaultGroup()
		{
	
			$this->Util()->DB()->setQuery("
				SELECT *, user_subject.status AS status FROM user_subject
				LEFT JOIN user ON user_subject.alumnoId = user.userId
				WHERE courseId = '".$this->getCourseId()."' and user.activo='1' and user_subject.status='activo'
				ORDER BY lastNamePaterno ASC, lastNameMaterno ASC, names ASC");
			$result = $this->Util()->DB()->GetResult();
			
			$student= new Student();
			
			foreach($result as $fila){
			      $x=0;
				     $alumnos=$student->EnumerateTotal();
					   
					   foreach($alumnos as $alumno){
					
						    
							if($fila["alumnoId"] == $alumno["userId"] ){
							         $x=1;
							
							}
						
						}
						if($x==0){
						    $student->setAlumnoId($fila["alumnoId"]);
							$student->DeleteLimpia();
						 //echo $fila["alumnoId"]."Este alumno no aparece en estudiantes</br>";
						}
						
			//return $result;
			}
			
			
			foreach($result as $key => $res)
			{
				//get activities
				$activity = new Activity;
				$activity->setCourseModuleId($this->coursemoduleId);
				$actividades = $activity->Enumerate();
				$result[$key]["names"] = $this->Util()->DecodeTiny($result[$key]["names"]);
				$result[$key]["lastNamePaterno"] = $this->Util()->DecodeTiny($result[$key]["lastNamePaterno"]);
				$result[$key]["lastNameMaterno"] = $this->Util()->DecodeTiny($result[$key]["lastNameMaterno"]);

				$this->Util()->DB()->setQuery("
					SELECT teamNumber
					FROM team
					WHERE courseModuleId = '".$this->coursemoduleId."' AND userId = '".$res["alumnoId"]."'");
				$result[$key]["equipo"] = $this->Util()->DB()->GetSingle();
				
				$result[$key]{"addepUp"} = 0;
				foreach($actividades as $activity)
				{
					if($activity["score"] <= 0)
					{
						continue;
					}
					//revisar calificacion

					$this->Util()->DB()->setQuery("
						SELECT ponderation
						FROM activity_score
						WHERE activityId = '".$activity["activityId"]."' AND userId = '".$res["alumnoId"]."'");
//						echo $this->Util()->DB()->query;
					$score = $this->Util()->DB()->GetSingle();

					$result[$key]{"score"}[] = $score;
					$realScore = $score * $activity["score"] / 100;
					$result[$key]{"realScore"}[] = $realScore;
					
					$result[$key]{"addepUp"} += $realScore;
				}
			}
			
			// 
			return $result;
		}
		
		public function TeamsModule()
		{
			$this->Util()->DB()->setQuery("
				SELECT * FROM team
				LEFT JOIN user ON team.userId = user.userId
				WHERE courseModuleId = '".$this->coursemoduleId."'
				ORDER BY teamNumber ASC, lastNamePaterno ASC, lastNameMaterno ASC, names ASC");
			$result = $this->Util()->DB()->GetResult();
			
			foreach($result as $key => $res)
			{
				$result[$key]["names"] = $this->Util()->DecodeTiny($result[$key]["names"]);
				$result[$key]["lastNamePaterno"] = $this->Util()->DecodeTiny($result[$key]["lastNamePaterno"]);
				$result[$key]["lastNameMaterno"] = $this->Util()->DecodeTiny($result[$key]["lastNameMaterno"]);
			}
			return $result;
		}

		public function Teams()
		{
			$this->Util()->DB()->setQuery("
				SELECT * FROM team
				LEFT JOIN user ON team.userId = user.userId
				WHERE courseModuleId = '".$this->getCourseModuleId()."'
				ORDER BY teamNumber ASC, lastNamePaterno ASC, lastNameMaterno ASC, names ASC");
			$result = $this->Util()->DB()->GetResult();
			
			foreach($result as $key => $res)
			{
				$result[$key]["names"] = $this->Util()->DecodeTiny($result[$key]["names"]);
				$result[$key]["lastNamePaterno"] = $this->Util()->DecodeTiny($result[$key]["lastNamePaterno"]);
				$result[$key]["lastNameMaterno"] = $this->Util()->DecodeTiny($result[$key]["lastNameMaterno"]);
			}
			return $result;
		}	

		function MyTeam($userId, $courseModuleId)
		{
			$this->setCourseModuleId($courseModuleId);
			
			 $sql = "
				SELECT teamNumber FROM team
				WHERE courseModuleId = '".$this->getCourseModuleId()."'
					AND userId = '".$userId."'";
					
					// exit;
			$this->Util()->DB()->setQuery($sql);
			$teamNumber = $this->Util()->DB()->GetSingle();
			
			$this->setTeamNumber($teamNumber);
			$members = $this->Team();
			
			return $members;
		}

		public function Team()
		{
			if($this->getCourseModuleId()==''){
				$sql = "
				SELECT *, team.userId AS userId FROM team
				LEFT JOIN user ON team.userId = user.userId
				WHERE courseModuleId = '".$this->coursemoduleId."'
					AND teamNumber = '".$this->teamNumber."'
				ORDER BY teamNumber ASC, lastNamePaterno ASC, lastNameMaterno ASC, names ASC";
			}else{
				$sql = "
				SELECT *, team.userId AS userId FROM team
				LEFT JOIN user ON team.userId = user.userId
				WHERE courseModuleId = '".$this->getCourseModuleId()."'
					AND teamNumber = '".$this->teamNumber."'
				ORDER BY teamNumber ASC, lastNamePaterno ASC, lastNameMaterno ASC, names ASC";
			}
			// echo  
				// exit;
			$this->Util()->DB()->setQuery($sql);
			$result = $this->Util()->DB()->GetResult();
			foreach($result as $key => $res)
			{
				$result[$key]["names"] = $this->Util()->DecodeTiny($result[$key]["names"]);
				$result[$key]["lastNamePaterno"] = $this->Util()->DecodeTiny($result[$key]["lastNamePaterno"]);
				$result[$key]["lastNameMaterno"] = $this->Util()->DecodeTiny($result[$key]["lastNameMaterno"]);
			}
			return $result;
		}	

		public function TeamsScore()
		{
		}	
		
		public function NoTeam()
		{
			$this->Util()->DB()->setQuery("
				SELECT *, user_subject.status AS status FROM user_subject
				LEFT JOIN user ON user_subject.alumnoId = user.userId
				WHERE courseId = '".$this->getCourseId()."'
				ORDER BY lastNamePaterno ASC, lastNameMaterno ASC, names ASC");
			$result = $this->Util()->DB()->GetResult();
			
			foreach($result as $key => $res)
			{
				
				if($this->getCourseModuleId() == ''){
					$this->Util()->DB()->setQuery("
					SELECT COUNT(*)
					FROM team
					WHERE userId = '".$res["alumnoId"]."' AND courseModuleId = '".$this->coursemoduleId."'");
				
				}else{
					$this->Util()->DB()->setQuery("
					SELECT COUNT(*)
					FROM team
					WHERE userId = '".$res["alumnoId"]."' AND courseModuleId = '".$this->getCourseModuleId()."'");
				
				}
				
				
				
				$inTeam = $this->Util()->DB()->GetSingle();
				
				$result[$key]["names"] = $this->Util()->DecodeTiny($result[$key]["names"]);
				$result[$key]["lastNamePaterno"] = $this->Util()->DecodeTiny($result[$key]["lastNamePaterno"]);
				$result[$key]["lastNameMaterno"] = $this->Util()->DecodeTiny($result[$key]["lastNameMaterno"]);
				
				if($inTeam > 0)
				{
					unset($result[$key]);
				}
				
			}
			return $result;
		}	
		
		public function actaCalificacion()
		{
			
			
			$this->Util()->DB()->setQuery("
				SELECT *, user_subject.status AS status FROM user_subject
				LEFT JOIN user ON user_subject.alumnoId = user.userId
				WHERE courseId = '".$this->getCourseId()."'
				ORDER BY lastNamePaterno ASC, lastNameMaterno ASC, names ASC");
			$result = $this->Util()->DB()->GetResult();
			
			
			foreach($result as $key => $res)
			{
				 $sql = "
					SELECT *
					FROM course_module_score
					WHERE courseModuleId = '".$this->coursemoduleId."' and userId = ".$res["alumnoId"]." and courseId = ".$res["courseId"]."";

				$this->Util()->DB()->setQuery($sql);
				$infoCc = $this->Util()->DB()->GetRow();
				$result[$key]["score"] = $infoCc["calificacion"];
				
			}
			
			// echo "<pre>"; print_r($result);
			// exit;
			return $result;
		}	
		
		function GetTeamNumber()
		{
			if ($this->getCourseModuleId() == ''){
				$sql = "
					SELECT MAX(teamNumber)
					FROM team
					WHERE courseModuleId = '".$this->coursemoduleId."'";
			}
			else{
				$sql = "
					SELECT MAX(teamNumber)
					FROM team
					WHERE courseModuleId = '".$this->getCourseModuleId()."'";
			}
			
			$this->Util()->DB()->setQuery($sql);
			$max = $this->Util()->DB()->GetSingle() + 1;
			return $max;	
		}

		function DeleteTeam($id)
		{
			$this->Util()->DB()->setQuery("
					DELETE FROM team
					WHERE courseModuleId = '".$this->getCourseModuleId()."' AND teamNumber = '".$id."'");
			$this->Util()->DB()->DeleteData();
			$this->Util()->setError(90000, 'complete', "Se ha borrado el equipo");
			$this->Util()->PrintErrors();
			
		}

		function GetNumberOfTeams()
		{
			$this->Util()->DB()->setQuery("
					SELECT COUNT(DISTINCT(teamNumber))
					FROM team
					WHERE courseModuleId = '".$this->getCourseModuleId()."'");
			$no = $this->Util()->DB()->GetSingle();
			return $no;	
		}

		public function CreateTeam($team)
		{
			$teamNumber = $this->GetTeamNumber();
			foreach($team as $member)
			{
				$sql = "INSERT INTO
							team
							( 	
								userId,
								courseModuleId,
								teamNumber
							)
						VALUES (
								'" . utf8_decode($member) . "', 
								'" . utf8_decode($this->coursemoduleId) . "',
								'" . $teamNumber . "'
								)";
				$this->Util()->DB()->setQuery($sql);
				$result = $this->Util()->DB()->InsertData();
			}
			$this->Util()->setError(90000, 'complete', "Se ha creado un nuevo equipo");
			$this->Util()->PrintErrors();
		}

		function GetMenWomen($group)
		{
			$count["m"] = 0;
			$count["f"] = 0;
			$count["t"] = 0;
			if($group)
			{
				foreach($group as $alumn)
				{
					if($alumn["sexo"] == "m")
					{
						$count["m"]++;
					}
					if($alumn["sexo"] == "f")
					{
						$count["f"]++;
					}
					$count["t"] = $count["m"] + $count["f"];
				}
			}
			return $count;
		}
		
		function SendMailTeam()
		{
			$mails = explode(",", $_POST["list_roles"]);
			$sendmail = new Sendmail;
			
			$message[4]["subject"] = $_POST["subject"];
			$message[4]["body"] = $this->Util()->DecodeTiny($_POST["body"]);
			$details_body = array();
			$details_subject = array();

		foreach($mails as $mail)
			{
				$sendmail->Prepare($message[4]["subject"], $message[4]["body"], $details_body, $details_subject, $mail, $mail, $_FILES["file"]["tmp_name"], $_FILES["file"]["name"]); 						
			}
			

			$student = new Student;
			$student->setUserId($_SESSION["User"]["userId"]);
			$info = $student->InfoUser();

			$name = $info["names"]." ".$info["lastNamePaterno"]." ".$info["lastNameMaterno"];
			
			$sendmail->PrepareMulti($message[4]["subject"], $message[4]["body"], $details_body, $details_subject, $_POST["list_roles"], $mail, $_FILES["file"]["tmp_name"], $_FILES["file"]["name"], $info["email"], $name); 						
			
			$this->Util()->setError(90000, 'complete', "Has enviado un correo correctamente");
			$this->Util()->PrintErrors();
			
			
		}
		
		function EditCalificacion()
		{
			
			$this->Util()->DB()->setQuery("
					SELECT *
					FROM course_module
					WHERE courseModuleId = '".$this->coursemoduleId."'");
			$info = $this->Util()->DB()->GetRow();

			foreach($_POST as $key=>$aux){ 
				
				$e = explode("_",$key);
				if($e[0]=="cal"){
					
					$this->Util()->DB()->setQuery("
					SELECT *
					FROM course_module_score
					WHERE courseModuleId = '".$this->coursemoduleId."' and userId = ".$e[1]." and courseId = ".$info["courseId"]."");
					$infoCc = $this->Util()->DB()->GetRow();
					
					if($infoCc["courseModuleScoreId"] <= 0){
						
						$sql = "
							INSERT INTO  `course_module_score` (
								`courseModuleId` ,
								`courseId` ,
								`userId` ,
								`calificacion`
								)
								VALUES (
								'".$this->coursemoduleId."',  
								'".$info["courseId"]."',  
								'".$e[1]."',  
								'".$aux."')";
						$this->Util()->DB()->setQuery($sql);
						$result = $this->Util()->DB()->InsertData();
						
					}else{
						$this->Util()->DB()->setQuery("
								UPDATE `course_module_score` SET
									`calificacion` = '".$aux."'
								WHERE
									`courseModuleScoreId` = '".$infoCc["courseModuleScoreId"]."'");
							$this->Util()->DB()->UpdateData();	
					}
					
				}
			}
				return true;
		}
		
		function validarCalificacion()
		{
			$this->Util()->DB()->setQuery("
								UPDATE `course_module` SET
									`calificacionValida` = 'si'
								WHERE
									`courseModuleId` = '".$this->coursemoduleId."'");
							$this->Util()->DB()->UpdateData();	
			return true;
		}
		
		
	}	
?>