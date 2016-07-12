<?php 

class Gradereport extends Main
{
	private $gradereportId;
	private $groupId;
	private $generation;
	private $periodoId;
	private $semesterId;
	private $regularization;
	// miembros para las calificaciones -- gradereport_user
	private $gradReportUserId;
	private $alumnoId;
	private $testIdentifier;
	private $datetest;
	private $gradescore;
	private $subjectId;
	private $attendance;
	private $printR1;
	
	// --------------------------------------------------------------------------------------------------
	// ya no se usa esta propiedad --- eliminarla cuando el modulo completo de calificaciones este bueno...
	//arreglo para mantener las claves de las calificaciones(parciales y globales) y las calificaciones
	private $reportScores = array();
	// --------------------------------------------------------------------------------------------------

	public function setGradereportId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->gradereportId = $value;
	}

	public function getGradereportId()
	{
		return $this->gradereportId;
	}

	public function setGroupId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->groupId = $value;
	}

	public function getGroupId()
	{
		return $this->groupId;
	}

	public function setGeneration($value)
	{
		$this->Util()->ValidateString($value, 4, 4, 'Generacion');
		$valueInt = (int)$value;
		if(!is_numeric($valueInt))
			$this->Util()->setError(30100, 'error', '', 'Generacion');
		else
		{
			if($valueInt < 1976 && $valueInt > 9999)
			{
				$this->Util()->setError(30101, 'error', '', 'Generacion');
				$valueInt = 0;
			}
		}
		$this->generation = $valueInt;
	}

	public function getGeneration()
	{
		return $this->generation;
	}
	
	public function setPeriodoId($value)
	{
		$this->periodoId = $value;	
	}
	
	public function getPeriodoId()
	{
		return $this->periodoId;	
	}
	
	public function setSemesterId($value)
	{
		$this->semesterId = $value;
	}
	
	public function getSemesterId()
	{
		return $this->semesterId;	
	}
	
	public function setRegularization($value)
	{
		$this->regularization = $value;
	}
	
	public function getRegularization($value)
	{
		return $this->regularization;
	}
	
	public function setGradReportUserId($value)
	{
		$this->Util()->ValidateInteger($value);	
		$this->gradReportUserId = $value;
	}
	
	public function getGradReportUserId()
	{
		return $this->gradReportUserId;
	}
	
	public function setAlumnoId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->alumnoId = $value;
	}
	
	public function setTestIdentifier($value)
	{
		$this->testIdentifier = $value;	
	}
	
	public function setDatetest($value)
	{
		$this->datetest = $value;
	}
	
	public function setGradeScore($value)
	{
		if(!is_numeric($value)){
			if($this->testIdentifier == 'PARCIAL')
				$this->Util()->setError(30105, 'error');
			else
				$this->Util()->setError(30106, 'error');
		}
		$this->gradescore = $value;
	}
	
	public function setSubjectId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->subjectId = $value;
	}
	
	public function setAddReportScore($datetest, $gradescore)
	{
		if(!is_numeric($gradescore)){
			if($testIdentifier == 'PARCIAL')
				$this->Util()->setError(30105, 'error');
			else
				$this->Util()->setError(30106, 'error');
		}
		$this->reportScores[$datetest] = $gradescore;
	}
	
	public function setAttendance($value){
		$this->Util()->ValidateInteger($value);
		$this->attendance = $value;
	}
	
	public function setPrintR1($value){
		$this->printR1 = $value;	
	}
	
	public function Enumerate()
	{
		//obtenemos el periodo activo
		$currPeriodo = $GLOBALS['periodo']->GetPeriodoActive();
		
		$this->Util()->DB()->setQuery("SELECT * FROM gradereport WHERE periodoId = '" . $currPeriodo . "' ORDER BY gradereportId ASC");
		$result = $this->Util()->DB()->GetResult();
		/*
		foreach($result as $key => $row)
		{
			
		}
		*/
		return $result;
	}
	
	public function EnumerateBySearch()
	{
		//Obtenemos el periodo activo
		$currPeriodo = $GLOBALS['periodo']->GetPeriodoActive();
		
		if($this->semesterId)
			$sqlAdd = ' AND semesterId = '.$this->semesterId;
		
		$this->Util()->DB()->setQuery(
			"SELECT * FROM gradereport 
			 WHERE periodoId = '" . $currPeriodo . "'
			 ".$sqlAdd." 
			 ORDER BY gradereportId ASC");
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function EnumerateByPersonalId()
	{
		//enumerar las actas del usuario (maestro) que haya iniciado sesion en el sistema

		//obtenemos el periodo activo
		$currPeriodo = $GLOBALS['periodo']->GetPeriodoActive();
		
		$sql = "SELECT gr.gradereportId, gr.groupId, gr.generation, gr.periodoId, gr.semesterId 
				FROM 
					personal AS p,
					subject_group AS sg,
					gradereport AS gr
				WHERE
					p.personalId = '" . $_SESSION['User']['userId'] . "'
				AND
					sg.personalId = p.personalId
				AND
					gr.groupId = sg.subgpoId
				AND
					gr.periodoId = '" . $currPeriodo . "'";
					
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		return $result;
	}

	public function Info()
	{
		$this->Util()->DB()->setQuery("SELECT * FROM gradereport WHERE gradereportId = '".$this->gradereportId."'");
		$gradeRepInfo = $this->Util()->DB()->GetRow();
		
		//recuperamos info del grupo
		$GLOBALS['subject']->setGroupId($gradeRepInfo['groupId']);
		$groupInfo = $GLOBALS['subject']->InfoGroup();
		if($groupInfo)
			$groupInfo = $this->Util()->DecodeRow($groupInfo);
		$gradeRepInfo['subjectId'] = $groupInfo['subjectId'];
		$gradeRepInfo['personalId'] = $groupInfo['personalId'];
		$gradeRepInfo['groupClave'] = $groupInfo['clave'];
		$gradeRepInfo['groupName'] = $groupInfo['name'];
		
		// recuperamos Info del maestro
		$GLOBALS['personal']->setPersonalId($groupInfo['personalId']);
		$personalInfo = $GLOBALS['personal']->Info();		// el DecodeRow ya se encuentra dentro del Info() de la clase personal
		$gradeRepInfo['personalFullName'] = $personalInfo['name'] . ' '. $personalInfo['lastname_paterno'] . ' ' . $personalInfo['lastname_materno'];
		
		//recuperamos info de la materia
		$GLOBALS['subject']->setSubjectId($groupInfo['subjectId']);
		$subjectInfo = $GLOBALS['subject']->Info();
		if($subjectInfo)
			$subjectInfo = $this->Util()->DecodeRow($subjectInfo);
		$gradeRepInfo['subjectClave'] = $subjectInfo['clave'];
		$gradeRepInfo['subjectName'] = $subjectInfo['name'];

		//recuperamos info del periodo
		$GLOBALS['periodo']->setPeriodoId($gradeRepInfo['periodoId']);
		$periodoInfo = $GLOBALS['periodo']->Info();
		if($periodoInfo)
			$periodoInfo = $this->Util()->DecodeRow($periodoInfo);
		$gradeRepInfo['periodoIdentifier'] = $periodoInfo['identifier'];
		$gradeRepInfo['periodoName'] = $periodoInfo['name'];

		//recuperamos info del semestre
		$GLOBALS['semester']->setSemesterId($gradeRepInfo['semesterId']);
		$semesterInfo = $GLOBALS['semester']->Info();
		if($semesterInfo)
			$semesterInfo = $this->Util()->DecodeRow($semesterInfo);
		$gradeRepInfo['semesterClave'] = $semesterInfo['clave'];
		$gradeRepInfo['semesterName'] = $semesterInfo['name'];

		return $gradeRepInfo;
	}
	
	public function InfoByGroupPeriodoSemester()
	{
		$sql = "SELECT 
					*
				FROM 
					gradereport
				WHERE
					groupId    = '" . $this->groupId    . "' AND
					periodoId  = '" . $this->periodoId   . "' AND
					semesterId = '" . $this->semesterId . "'";
		$this->Util()->Db()->setQuery($sql);
		$result = $this->Util()->DB()->GetRow();
		return $result;
	}
	
	public function GetPeriodoByGradReportUserId($gradReportUserId)
	{	//RECUPERA EL PERIODO ACTIVO PROPORCIONANDO EL ID DE UNA CALIFICACION (gradReportUserId de la tabla gradereport_user)
		//obtenemos la informacion del ID del reporte y del ID del alumno 
		$this->setGradReportUserId($gradReportUserId);
		$gradescoreInfo = $this->GetUserScoreByGradReportUserId();	
		//obtenemos la informacion del acta de calificaciones
		$this->setGradereportId($gradescoreInfo['gradereportId']);
		$gradereportInfo = $this->Info();
		//	recuperamos el id del periodo del acta de calificaciones
		$periodoReport = $gradereportInfo['periodoId'];
		// regresamos el ID del periodo del acta de calificaciones
		return $periodoReport;
	}

	public function Edit()
	{
		if($this->Util()->PrintErrors()){ return false; }

		$this->Util()->DB()->setQuery("
			UPDATE
				gradereport
			SET
				`generation` = '".$this->generation."',
				`regularization` = '".$this->regularization."'
			WHERE gradereportId = '".$this->gradereportId."'");
		$this->Util()->DB()->UpdateData();

		$this->Util()->setError(30103, "complete");
		$this->Util()->PrintErrors();
		return true;
	}

	public function Save()
	{
		if($this->Util()->PrintErrors()){ return false; }
		//guardamos el acta
		$this->Util()->DB()->setQuery("
			INSERT INTO
				gradereport
			(
				`gradereportId`,
				`groupId`,
				`generation`,
				`periodoId`,
				`semesterId`,
				`regularization`
		)
		VALUES
		(
				'".$this->gradereportId."',
				'".$this->groupId."',
				'".$this->generation."',
				'".$this->periodoId."',
				'".$this->semesterId."',
				'".$this->regularization."'
		)");
		$newId = $this->Util()->DB()->InsertData();
		$this->Util()->setError(30102, "complete");
		
		/*
		// **********************************************************************************************************************
		// ------ PEND... verificar la cantidad de parciales para generar los reg correspondientes _
		// -------			a las calificaciones parciales 
		// -------			verificar viabilidad de generar una tabla 'gradereport_scores para guardar las calificaciones
		// -------			o se crean en la misma tabla gradereport_user ... ??? ??? ???
		//recuperamos la cantidad de examenes parciales que se aplican
		$sql = "SELECT COUNT(*) FROM typepest WHERE identifier = 'P'";
		// ------ 
		// **********************************************************************************************************************
		
		//recuperamos la lista de alumnos del grupo y lo guardamos
		$sql = "SELECT alumnoId FROM user_subject WHERE subgpoId = '" . $this->groupId . "'";
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		foreach($result as $row)
		{
			$sql = "INSERT INTO gradereport_user (gradereportId, alumnoId, gradescore) 
					VALUES (" . $newId . ", " . $row['alumnoId'] . ", 'P||P||P||G||G||G||')";
			$this->Util()->DB()->setQuery($sql);
			$this->Util()->DB()->InsertData();
		}
		$this->Util()->setError(30104, 'complete');
		//presentamos al usuario el estado de las operaciones ejecutadas
		*/
		
		$this->Util()->PrintErrors();
		return true;
	}

	public function Delete()
	{
		if($this->Util()->PrintErrors()){ return false; }

		$this->Util()->DB()->setQuery("
			DELETE FROM
				gradereport
			WHERE
				gradereportId = '".$this->gradereportId."'");
		$this->Util()->DB()->DeleteData();
		$this->Util()->setError(30135, "complete");
		$this->Util()->PrintErrors();
		return true;
	}
	
	//*******************************************//
	// 			 GRADEREPORT_USER 				 //
	//*******************************************//
	
	//Obtenemos la lista de los Alumnos y sus Calificaciones 
	public function EnumerateUsersByGradeReport()
	{
		//Para verificar si un alumno es de Recursamiento, se necesita informacion de la materia
		
		//Recuperamos Info del Acta
		$gradereportInfo = $this->Info();
		
		//Recuperamos Info del Grupo
		$GLOBALS['subject']->setGroupId($gradereportInfo['groupId']);
		$subgpoInfo = $GLOBALS['subject']->InfoGroup();
		
		//Sacamos el subjectId
		$subjectId = $subgpoInfo['subjectId'];
		
		//Recuperamos alumnos del acta
		$sql = "SELECT 
					* 
				FROM 
					gradereport_user
				WHERE 
					gradereportId = '" . $this->gradereportId . "'";
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		$usersEnum = array();
		$newKey = -1;		//Con el primer registro se inicializa a cero
		$currentId = -1;
		$scoreSum = 0;
		$totalParcials = 0;	//1	
		
		//En caso de haber un examen R1 se toma la calificacion obtenida en dicho examen y ya NO se toman los Parciales
		$averageR1 = false;
				
		//Para NO tomar las calificaciones siguientes una vez que la de Recuperacion R1 es tomada como Promedio Final
		$averageNormal = true;
		
		$averageGlobal = false;
		$testIntersemester = false;
		
		foreach($result as $key => $row){
			
			if($row['alumnoId'] != $currentId){
				
				//Si el usuario del registro actual ya es diferente al del registro anterior
				//incrementas key para el nuevo alumno
				$newKey++;
				
				//Inicializamos el total de parciales
				$totalParcials = 0;		//1
				
				//Inicializamos la suma para el promedio
				$scoreSum = 0;
				
				//Tomamos el nuevo alumno para NO volver a repetir el mismo registro del mismo alumno
				$currentId = $row['alumnoId'];
				
				//En caso de haber un examen R1 se toma la calificacion obtenida en dicho examen y ya NO se toman los parciales
				$averageR1 = false;
				
				$averageGlobal = false;
				$averageNormal = true;
				$testIntersemester = false;
				
				//Guardamos el ID del Acta y el ID del Alumno
				$usersEnum[$newKey]['gradReportUserId'] = $row['gradReportUserId'];
				$usersEnum[$newKey]['gradereportId'] = $row['gradereportId'];
				$usersEnum[$newKey]['alumnoId'] = $row['alumnoId'];
				
				//Obtenemos el nombre del Alumno y el Grupo Inicial y los guardamos
				$sql = "SELECT * FROM user 
						WHERE userId = '" . $row['alumnoId'] . "'";
				$this->Util()->DB()->setQuery($sql);
				$infoStudent = $this->Util()->DB()->GetRow();
												
				$usersEnum[$newKey]['controlNumber'] = $infoStudent['controlNumber'];
				$usersEnum[$newKey]['studentFullName'] = strtoupper($infoStudent['lastNamePaterno'] . ' ' . $infoStudent['lastNameMaterno'] . ' ' . $infoStudent['names']);
				$usersEnum[$newKey]['studentGroup'] = $infoStudent['groupId'];
				
				//Sacamos el Grupo de inicio del Alumno
				$GLOBALS['group']->setGroupId($infoStudent['groupId']);
				$groupInfo = $GLOBALS['group']->Info();
				
				$usersEnum[$newKey]['studentGroupClave'] = $groupInfo['clave'];
				$usersEnum[$newKey]['studentGroupName'] = $groupInfo['name'];
				
				//Verificamos si el alumno es de recursamiento
				//para esto checamos en la tabla gradereport_recur, si hay un registro con alumnoId y subjectId
				//si existe un registro el alumno esta recursando esta materia...
				$usersEnum[$newKey]['recurSubject'] = false;
				
				$sql = "SELECT COUNT(*) FROM gradereport_recur 
						WHERE alumnoId = '" . $row['alumnoId'] . "' 
						AND subjectId = '" . $subjectId . "'";
				$this->Util()->DB()->setQuery($sql);
				$recurCount = $this->Util()->DB()->GetSingle();
				
				if($recurCount > 0)
					$usersEnum[$newKey]['recurSubject'] = true;
								
			}//if
			
			
			if($row['testIdentifier'] == 'PARCIAL')
			{
				//Solo se promedia por el total de los parciales que lleve la escuela
				$totalParcials++;
			}
			
			if($row['testIdentifier'] == 'GLOBAL')
			{
				$averageGlobal = true;				
			}
			
			if($row['testIdentifier'] == 'RECUPERACION')
			{
				$averageR1 = true;
			}
			
			if($row['testIdentifier'] == 'INTERSEMESTRAL')
			{
				$testIntersemester = true;
			}
			
			//Guardamos la fecha del examen como indice del arreglo y la calificacion como valor en esa posicion del arreglo
			//Quedando como ejemplo de la sig forma: $usersEnum[$newKey]['2011-01-13'] = 7;
			$usersEnum[$newKey][$row['datetest']] = $row['gradescore'];
			
			//Guardamos las Asistencias
			$usersEnum[$newKey]['attendance'][$row['datetest']] = $row['attendance'];
			
			//Solo se promedian calificaciones aprobatorias (Parciales y Globales)
			if($row['gradescore'] > 5)
			{
				$scoreSum += $row['gradescore'];
			}
			
			//Checamos si no hay un Examen Intersemestral
			//que en caso de las Actas Intersemestrales siempre sera Verdadero, y en los demas caso...Falso...
			if(!$testIntersemester){
				
				if(!$averageR1){
					
					if($averageGlobal){
						
						//Si es un examen Global se queda con esa calificacion
						$usersEnum[$newKey]['averageScore'] = number_format($row['gradescore'],2);
						
						//Re-iniciamos el valor de la variable para que deje de entrar a tomar el promedio como R1
						$averageR1 = false;
						
						//Re-iniciamos el valor de la variable para que deje de entrar a tomar los demas promedios 
						//si aun hay mas registros con calificaciones
						$averageNormal = false;
																							
					}elseif($averageNormal){
						
						//Si NO es Examen de Recuperacion...
						//Promedia con el total de los examene parciales que se llevan hasta el momento 
						//(antes de cambiar de alumno se obtendra el total)
						$average =  round($scoreSum / ( $totalParcials <= 0 ? 1 : $totalParcials ) );
						$usersEnum[$newKey]['averageScore'] = number_format($average,2);
						
					}//if
					
				}else{
										
					//Si es un Examen de Recuperacion se queda con esa calificacion
					$usersEnum[$newKey]['averageScore'] = number_format($row['gradescore'],2);
					
					//Re-iniciamos el valor de la variable para que deje de entrar a tomar el promedio como R1
					$averageR1 = false;
					
					//Re-iniciamos el valor de la variable para que deje de entrar a tomar los demas promedios 
					//si aun hay mas registros con calificaciones
					$averageNormal = false;				
					
				}//else
				
			}else{
				
				//Es una calificacion de intersemestral...guardamos la calificacion como el promedio
				$usersEnum[$newKey]['averageScore'] = number_format($row['gradescore'],2);
				
			}//else			
			
		}//foreach
				
		//Ordenamos el arreglo, usando una funcion para especificar la condicion de ordenamiento
		usort($usersEnum, 'fncCompByFullName');
		
		//Generamos el numero de lista sobre el arreglo ordenado
		$listNumber = 1;
		foreach($usersEnum as $index => $value)
		{
			$value['listNumber'] = $listNumber;
			$usersEnum[$index] = $value;
			$listNumber++;
		}
		
		
		return $usersEnum;
	}
	
	function GetTotalUsersByGradeReport(){
		
		$sql = "SELECT 
					alumnoId
				FROM 
					gradereport_user
				WHERE 
					gradereportId = '" . $this->gradereportId . "'
				GROUP BY alumnoId";
		$this->Util()->DB()->setQuery($sql);
		$total = $this->Util()->DB()->GetResult();
		
		return count($total);
	
	}
	
	//obtener el Usuario(alumno) con el Id de gradereport_user (ID primario de la tabla de calificaciones del alumno)
	public function GetUserScoreByGradReportUserId()
	{
		//recuperamos el ID del alumno y el ID del acta, usando el ID de gradReportUserId
		$sql = "SELECT gradereportId, alumnoId FROM gradereport_user WHERE gradReportUserId = '" . $this->gradReportUserId . "'";
		$this->Util()->DB()->setQuery($sql);
		$reportAlumnoInfo = $this->Util()->DB()->GetRow();
		//recuperamos el nombre y apellidos del alumno
		$sql = "SELECT * FROM user WHERE userId = '" . $reportAlumnoInfo['alumnoId'] . "'";;
		$this->Util()->DB()->setQuery($sql);
		$alumnoInfo = $this->Util()->DB()->GetRow();
		if($alumnoInfo)
			$alumnoInfo = $this->Util()->EncodeRow($alumnoInfo);
		//pasamos los datos obtenidos al arreglo que se va a regresar
		$result = array();
		$result['gradereportId'] = $reportAlumnoInfo['gradereportId'];
		$result['alumnoId'] = $reportAlumnoInfo['alumnoId'];
		$result['controlNumber'] = $alumnoInfo['controlNumber'];
		$result['names'] = strtoupper($alumnoInfo['names']);
		$result['lastNamePaterno'] = strtoupper($alumnoInfo['lastNamePaterno']);
		$result['lastNameMaterno'] = strtoupper($alumnoInfo['lastNameMaterno']);
		$result['groupId'] = $alumnoInfo['groupId'];
		//sacamos el grupo de inicio del alumno
		$sql = "SELECT * FROM `group` WHERE groupId = '" . $alumnoInfo['groupId'] . "'";
		$this->Util()->DB()->setQuery($sql);
		$groupInfo = $this->Util()->DB()->GetRow();
		if($groupInfo)
			$groupInfo = $this->Util()->EncodeRow($groupInfo);
		$result['studentGroupClave'] = $groupInfo['clave'];
		$result['studentGroupName'] = $groupInfo['name'];
		// recuperamos las calificaciones que pertenescan al alumno y al acta que se esta modificando
		$sql = "SELECT * FROM gradereport_user WHERE gradereportId = '" . $reportAlumnoInfo['gradereportId'] . "' AND alumnoId = '" . $reportAlumnoInfo['alumnoId'] . "' ORDER BY gradReportUserId";
		$this->Util()->DB()->setQuery($sql);
		$gradeScoresInfo = $this->Util()->DB()->GetResult();
		
		//echo ' *** <br/><br/><br/><br/><br/>';
		//print_r($gradeScoresInfo);
		
		//por cada uno de las calificaciones lo anexamos al arreglo que se va a regresar
		foreach($gradeScoresInfo as $scoreInfo)
		{
			//se genera un indice de la forma: $result['fecha_del_examen'] = calificacion_del_examen ( $result['2011-01-13'] = 8 )
			$result[$scoreInfo['datetest']] = $scoreInfo['gradescore'];
		}
		//regresamos la informacion (id del acta, id del alumno(user), nombre, y calificaciones de dicha acta)
		return $result;
	}
	
	public function GetScoresByGradreportAndAlumno()
	{
		$sql = "SELECT * FROM gradereport_user WHERE gradereportId = '" . $this->gradereportId . "' AND alumnoId = '" . $this->alumnoId . "' ORDER BY gradReportUserId";
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		//echo $sql;
		foreach($result as $key => $row)
		{
			//echo 'aqui... ';
			$sql = "SELECT * FROM schedule_test WHERE scheduletestId = '" . $row['scheduletestId'] . "'";	//	$row['datetest']
			//echo 'entonces aqui... ';
			$this->Util()->DB()->setQuery($sql);
			$scheduleInfo = $this->Util()->DB()->GetRow();
			//echo 'luego aqui... ';
			$result[$key]['testDescrip'] = $scheduleInfo['comments'];
		}
		return $result;
	}
	
	// -----------------------------------------------------------------------
	// --------------  GRADESCORE-USER  --------------------------------------
	
	public function InfoGradeScore()
	{
		$sql = "SELECT * FROM gradereport_user WHERE gradReportUserId = '" . $this->gradReportUserId . "'";
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetRow();
		
		$sql = "SELECT * FROM schedule_test WHERE datetest = '" . $result['datetest'] . "'";
		$this->Util()->DB()->setQuery($sql);
		$scheduleInfo = $this->Util()->DB()->GetRow();
		$result['testDescrip'] = $scheduleInfo['comments'];
		
		return $result;
	}
	
	public function DeleteReportScore()
	{
		
		$infoGradScore = $this->InfoGradeScore();
		
		if($infoGradScore['testIdentifier'] == 'PARCIAL')
		{
			$this->Util()->setError(30108,'error');
			$this->Util()->PrintErrors();
			return false;
		}
		
		/*
		echo '<br /> --- <br />';
		echo 'ident examen : ' . $infoGradScore['testIdentifier'];
		echo '<br /> --- <br />';
		*/
		
		if($infoGradScore['testIdentifier'] == 'GLOBAL')
		{
			// recuperar la lista de programa de examenes  parciales y globales del periodo al que pertenece el acta de calificaion
			// obtenemos el ID del Periodo del Acta de calificaciones ( se obtienen con el ID del la calificacion )
			$periodoReport = $this->GetPeriodoByGradReportUserId($this->gradReportUserId);
			//  recuperamos el ID de los examenes parcial y global
			$parcialId = $GLOBALS['typetest']->InfoIdByTypetest('PARCIAL');
			$globalId = $GLOBALS['typetest']->InfoIdByTypetest('GLOBAL');
			// obtener la lista de las fechas de los examenes parciales, proporcionando el ID del examen y el ID del periodo
			$parcialTests = $GLOBALS['schedule_test']->GetDatesScheduleBy($parcialId, $periodoReport);
			// obtener la lista de las fechas de los examenes globales, proporcionando el ID del examen y el ID del periodo
			$globalTests = $GLOBALS['schedule_test']->GetDatesScheduleBy($globalId, $periodoReport);
			// bucamos el correspondiente examen parcial del global que se va a eliminar para verificar que la calificacion
			// 	sea aprobatoria, si la calificacion del parcial es reprobatoria no se permite hasta que primero se modifique
			$index = -1;
			foreach($globalTests as $key => $value)
			{
				if($value == $infoGradScore['datetest'])
				{
					$index = $key;
				}
			}
			
			if($index == -1)
			{
				// si index vale -1 hay un problema con las fechas del calendario de examens
				// no se detecto una fecha de examen GLOBAL correspondiente al que se quiere eliminar
				$this->Util()->setError(30111,'error');
				$this->Util()->PrintErrors();
				return false;
			}
			else
			{
				//verificamos con el indice de los examenes parciales...deben haber igual numero de examenes parciales
				// como de examenes globales...todos estan ordenados por fecha asi que el indice del global corresponde con el indice del parcial
				if(!isset($parcialTests[$index]))
				{
					// sino hay valor en esta posicion del arreglo, hay un problema con las fechas de los Parciales
					$this->Util()->setError(30112,'error');
					$this->Util()->PrintErrors();
					return false;
				}
				$dateParcial = $parcialTests[$index];
			}
			
			//obtenemos las calificaciones del alumno como indices de un solo arreglo
			$userScoresInfo = $this->GetUserScoreByGradReportUserId();
			// verificamos que la calificacion del parcial sea mayor a 5, si no es asi, no se puede eliminar el examen global
			if($userScoresInfo[$dateParcial] <= 5)
			{
				$this->Util()->setError(30109, 'error');
				$this->Util()->PrintErrors();
				return false;
			}
		}
		if($infoGradScore['testIdentifier'] == 'RECUPERACION')
		{
			
			
			// obtenemos el ID del Periodo del Acta de calificaciones ( se obtienen con el ID del la calificacion )
			$periodoReport = $this->GetPeriodoByGradReportUserId($this->gradReportUserId);
			
			// recuperamos el ID del examen de Recuperacion R1 y el ID del los globales
			$idR1 = $GLOBALS['typetest']->InfoIdByTypetest('RECUPERACION');
			$globalId = $GLOBALS['typetest']->InfoIdByTypetest('GLOBAL');
			
			// recuperamos la Fecha y el Id del examen de recuperacion y las Fechas ylos IDs del calendario de los globales
			$listR1s = $GLOBALS['schedule_test']->GetDatesAndIDsScheduleBy($idR1, $periodoReport);
			$listGlobals = $GLOBALS['schedule_test']->GetDatesAndIDsScheduleBy($globalId, $periodoReport);
			// sacamos cuantas Fechas hay en el calendario de examenes
			$totalTests = count($listGlobals[0]);
			if($totalTests == 0)
			{
				// no se detectaron examenes globales...verificar
				$this->Util()->setError(30121,'error');
				$this->Util()->PrintErrors();
				return false;
			}
			// usamos una variable que nos sirva como bandera para determinar si hay examenes globales reprobados
			$existGlobals = 0;
			//	por cada fecha hay que buscar si existe un global con una calificacion reprobatoria ysi es asi no 
			//	se puede eliminar hasta que se modifique la calificacion
			/*
			echo '<br />-+-<br />';
			echo 'totalTests : ' . $totalTests . '<br />';
			echo '<br />-+-<br />';
			*/
			for($i = 1; $i <= $totalTests; $i++)
			{
				$sql = "SELECT * FROM 
							`gradereport_user` 
						WHERE 
							gradereportId = '" . $infoGradScore['gradereportId'] . "' AND
							alumnoId = '" . $infoGradScore['alumnoId'] . "' AND
							scheduletestId = '" . $listGlobals[1][$i] . "'";
				$this->Util()->DB()->setQuery($sql);
				$result = $this->Util()->DB()->GetRow();
				if( (int)$result['gradescore'] <= 5)
				{
					$existGlobals++;
				}
			}
			if($existGlobals > 0)
			{
				// hay	examenes globales reprobados por lo que no se puede eliminar el R1 sin antes modificar la
				// calificacion de(los) global(es) reprobado(s)
				$this->Util()->setError(30122,'error');
				$this->Util()->PrintErrors();
				return false;
			}
			// si no se detecta ningun Global que este reprobado entonces se puede proceder con la eliminacion del R1
		}
		
		//si llega hasta aqui es señal de que se puede eliminar la calificacion
		
		$sql = "DELETE FROM gradereport_user WHERE gradReportUserId = '" . $this->gradReportUserId . "' LIMIT 1";
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->DeleteData();
		
		if($infoGradScore['testIdentifier'] == 'GLOBAL')
			$this->Util()->setError(30110, 'complete');
		elseif($infoGradScore['testIdentifier'] == 'RECUPERACION')
			$this->Util()->setError(30120, 'complete');
		$this->Util()->PrintErrors();
		return true;
	}
	
	public function UpdateReportScore($showMessagesSingle = true)
	{
		if($this->Util()->PrintErrors()) { return false; }

		//Validamos el tipo de examen a capturar
		if( $this->testIdentifier != 'PARCIAL' && $this->testIdentifier != 'GLOBAL' && 
		    $this->testIdentifier != 'RECUPERACION' && $this->testIdentifier != 'INTERSEMESTRAL' )
		{
			//Si no es ninguno de los anteriores
			//Hay problemas recuperando la informacion del tipo de examen
			$this->Util()->setError(30131, 'error');
			$this->Util()->PrintErrors();
			return false;
		}
		
		//Guardamos el ID del acta y el ID del alumno
		$infoGradScore = $this->InfoGradeScore();

		if($this->testIdentifier == 'PARCIAL' && (int)$this->gradescore >= -1 && (int)$this->gradescore <= 5 )
		{
			//Si reprobo el Parcial, se genera un examen GLOBAL de ese Parcial
			
			//Verificamos si se lleva la materia como Recuperacion...
			//Recuperamos informacion del Acta
			//Recuperamos informacion del Grupo
			//Recuperamos informacion de la Materia
			
			//Recuperamos Info del Acta
			$this->gradereportId = $infoGradScore['gradereportId'];
			$reportInfo = $this->Info();
						
			//Recuperamos Info del Grupo
			$GLOBALS['subject']->setGroupId($reportInfo['groupId']);
			$groupInfo = $GLOBALS['subject']->InfoGroup();
			
			//Verificamos si el alumno lleva la materia como recuperacion...
			//Verificamos si exsite informacion del alumno con esta materia en la tabla gradereport_recur
			$sql = "SELECT 
						COUNT(*) 
					FROM 
						gradereport_recur 
					WHERE 
						alumnoId = '" . $infoGradScore['alumnoId'] . "' 
					AND 
						subjectId = '" . $groupInfo['subjectId'] . "'";			
			$this->Util()->DB()->setQuery($sql);
			$recurTotal = $this->Util()->DB()->GetSingle();
			
			//Si el resultado es 0, NO se esta llevando la materia en recursamiento
			if($recurTotal == 0)
			{				
				//Recuperar la lista de programa de examenes Parciales y Globales del periodo 
				//al que pertenece el acta de calificacion
				//Obtenemos el ID del Periodo del Acta de calificaciones (se obtienen con el ID del la calificacion)
				$periodoReport = $this->GetPeriodoByGradReportUserId($this->gradReportUserId);
				
				//Recuperamos el ID de los examenes parcial y global
				$parcialId = $GLOBALS['typetest']->InfoIdByTypetest('PARCIAL');
				$globalId = $GLOBALS['typetest']->InfoIdByTypetest('GLOBAL');
				
				//Obtenemos la lista de las fechas de los examenes parciales, 
				//proporcionando el ID del examen y el ID del periodo
				$parcialTests = $GLOBALS['schedule_test']->GetDatesScheduleBy($parcialId, $periodoReport);
				
				//Obtenemos la lista de las fechas de los examenes globales, 
				//proporcionando el ID del examen y el ID del periodo
				$globalTests = $GLOBALS['schedule_test']->GetDatesScheduleBy($globalId, $periodoReport);
				
				//Obtenemos la lista de los IDs y Fechas de los examenes Parcial y Globales
				//no estaba contemplado guardar el ID, pero posteriormente se hizo necesario asi que se
				//creo esta funcion y se dejo la anterior (GetDatesScheduleBy) debido a que se usa en otras partes
				$listParcials = $GLOBALS['schedule_test']->GetDatesAndIDsScheduleBy($parcialId, $periodoReport);
				$listGlobals = $GLOBALS['schedule_test']->GetDatesAndIDsScheduleBy($globalId, $periodoReport);
								
				$index = -1;
				foreach($parcialTests as $key => $value)
				{
					//Buscamos la fecha del examen que corresponda con la de la calificacion que se esta capturando
					if($value == $infoGradScore['datetest'])
					{
						//Si hay un valor que coincide encontramos el examen dentro del programa de calificaciones
						//que corresponde al que se esta capturando y tomamos el indice del arreglo de ese examen...
						$index = $key;
					}
				}
				
				if($index == -1)
				{
					//Si index vale -1 hay un problema con las fechas del calendario de examens
					//No se detecto una fecha de examen PARCIAL correspondiente al que se quiere capturar
					//Hay que verificar el calendario de examenes y ver porque no se encuentra registrado el examen parcial
					$this->Util()->setError(30112,'error');
					$this->Util()->PrintErrors();
					return false;
				}
				else
				{
					//Verificamos con el indice de los examenes globales...deben haber igual numero de examenes globales
					//como de examenes parciales...todos estan ordenados por fecha asi que el indice del global corresponde 
					//con el indice del parcial
					if(!isset($globalTests[$index]))
					{
						//Si no hay valor en esta posicion del arreglo, hay un problema con las fechas de los globales
						//hay que verificar el calendario de examenes y ver porque no se encuentra registrado el examen global
						$this->Util()->setError(30111,'error');
						$this->Util()->PrintErrors();
						return false;
					}
					
					
					// ***** ***** ***** ***** ***** *****
					//Si es el ultimo parcial, verificar que no se hayan reprobado los anteriores
					//Variable que nos verifica si debemos crear el examen de Recuperacion R1
					$createR1 = false;
					
					//Contamos cuantos examenes globales tiene este alumno en el acta de la materia
					$sql = "SELECT 
								COUNT(*) 
							FROM 
								gradereport_user 
							WHERE 
								gradereportId = '" . $infoGradScore['gradereportId'] . "' 
							AND 
								alumnoId = '" . $infoGradScore['alumnoId'] . "' 
							AND 
								testIdentifier = 'GLOBAL'";
					$this->Util()->DB()->setQuery($sql);
					$globalsFail = $this->Util()->DB()->GetSingle();
					
										
					//Comparamos $globalsFail+1(+1 = el que se esta capturando) con la cantidad de examenes globales 
					//en el calendario de examenes
					if( ($globalsFail + 1) == count($listParcials[0]) )
					{					
						//Si las cantidades son iguales ya se reprobaron todos los examenes parciales...
						//se tiene que generar un R1 
						//se utiliza la bandera para que sea creado despues de que es creado el examen global 
						$createR1 = true;
											
					}
								
					//Obtenemos la fecha del global correspondiente al examen parcial reprobado
					$dateGlobal = $globalTests[$index];
					
					//Si el examen global ya existe no se debe crear de nuevo
					//Buscamos el examen
					$sql = "SELECT 
								COUNT(*) 
							FROM
								`gradereport_user`
							WHERE
								`gradereportId` = '" . $infoGradScore['gradereportId'] . "' 
							AND
								`alumnoId` = '" . $infoGradScore['alumnoId'] . "' 
							AND
								`scheduletestId` = '" . $listGlobals[1][$index] . "'";
					$this->Util()->DB()->setQuery($sql);
					$result = $this->Util()->DB()->GetSingle();
					
					//Si el resultado es igual a cero el examen NO existe y hay que crearlo...
					//de otra forma ya existe y no se debe crear de nuevo
					if($result == 0)
					{
						//Insertar el registro del GLOBAL para su posterior edicion cuando este sea aplicado
						$sql = "INSERT INTO 
									gradereport_user 
								( 
									`gradereportId`, 
									`alumnoId`, 
									`testIdentifier`, 
									`datetest`, 
									`gradescore`, 
									`scheduletestId` 
								)
								VALUES 
								( 
									'" . $infoGradScore['gradereportId']. "', 
									'" . $infoGradScore['alumnoId'] . "', 
									'GLOBAL', 
									'" . $globalTests[$index] . "', 
									'-2', 
									'" . $listGlobals[1][$index] . "' 
								)";
						$this->Util()->DB()->setQuery($sql);
						$this->Util()->DB()->InsertData();
						
						if($showMessagesSingle)
							$this->Util()->setError(30113, 'error');
							
							
					}
					
					//Si todos los examenes parciales fueron reprobados...entonces la variable sera true y 
					//se debera crear el examen de recuperacion
					if($createR1)
					{	
						
						//Recuperamos el ID del examen R1
						$r1Id = $GLOBALS['typetest']->InfoIdByTypetest('RECUPERACION');
						
						//Obtenemosr la fecha del examene de Recuperacion R1, proporcionando el ID del examen y el ID del periodo
						//								[0][0] == fecha del examen,  [1][0] == Id del examen
						//	si hay mas de un examen	... [0][1] == fecha del seg exam [1][1] == Id del seg exam
						//								[0][2] == fecha deh 3er exam [1][3] == Id del 3er exam...
						//	en este caso solo hay un examen en el calendario para el tipo R1....
						$r1Tests = $GLOBALS['schedule_test']->GetDatesAndIDsScheduleBy($r1Id, $periodoReport);
			
						if(!$r1Tests)
						{
							//No se enconctro el examen de recuperacion en el calendario de examenes
							//verificar porque no esta registrado en el calendario de examenes
							$this->Util()->setError(30123, 'error');
							$this->Util()->PrintErrors();
							return false;
						}
						
						//Verificamos si ya existe un campo para la calificacion R1
						$sql = "SELECT 
									COUNT(*) 
								FROM 
									`gradereport_user` 
								WHERE 
									`gradereportId` = '" . $infoGradScore['gradereportId'] . "' 
								AND 
									`alumnoId` = '" . $infoGradScore['alumnoId'] . "' 
								AND 
									`scheduletestId` = '" . $r1Tests[1][0] . "'"; 
						$this->Util()->DB()->setQuery($sql);
						$result = $this->Util()->DB()->GetSingle();
						
						//Se genera un campo para la calificacion R1 si aun no existe, 
						//de otra forma ya no se vuelve a generar otro
						if($result == 0)
						{
							//No se encontro el campo para la calificacion R1...
							//hay que generarlo para capturar la calificacion
							//Insertar el registro del R1 para su posterior edicion cuando este sea aplicado
							$sql = "INSERT INTO 
										gradereport_user 
									( 
										`gradereportId`, 
										`alumnoId`, 
										`testIdentifier`, 
										`datetest`, 
										`gradescore`, 
										`scheduletestId` 
									)
									VALUES 
									( 
										'" . $infoGradScore['gradereportId'] . "', 
										'" . $infoGradScore['alumnoId'] . "', 
										'RECUPERACION', 
										'" . $r1Tests[0][0] . "', 
										'-2', 
										'" . $r1Tests[1][0] . "' 
									)";
							$this->Util()->DB()->setQuery($sql);
							$this->Util()->DB()->InsertData();
							
							if($showMessagesSingle)
								$this->Util()->setError(30118, 'error');
						}
					
					}  // if($createR1)
				}  // if($index == -1) ... else
			}  // if($recurTotal == 0)
		}  // if($this->testIdentifier == 'PARCIAL'
		elseif($this->testIdentifier == 'PARCIAL'){
			
			//Eliminamos si se genero un global
						
			$periodoReport = $this->GetPeriodoByGradReportUserId($this->gradReportUserId);
			$parcialId = $GLOBALS['typetest']->InfoIdByTypetest('PARCIAL');
			$globalId = $GLOBALS['typetest']->InfoIdByTypetest('GLOBAL');
			$parcialTests = $GLOBALS['schedule_test']->GetDatesScheduleBy($parcialId, $periodoReport);
			$globalTests = $GLOBALS['schedule_test']->GetDatesScheduleBy($globalId, $periodoReport);
			$listGlobals = $GLOBALS['schedule_test']->GetDatesAndIDsScheduleBy($globalId, $periodoReport);
			
			$index = -1;
			foreach($parcialTests as $key => $value)
			{
				//Buscamos la fecha del examen que corresponda con la de la calificacion que se esta capturando
				if($value == $infoGradScore['datetest'])
				{
					//Si hay un valr que coincide encontramos el examen dentro del programa de calificaciones
					// que corresponde al que se esta capturando y tomamos el indice del arreglo de ese examen...
					$index = $key;
				}
			}
			
			//Si el examen global ya existe no se debe crear de nuevo
			//buscamos el examen
			$sql = "SELECT gradReportUserId FROM
						`gradereport_user`
					WHERE
						`gradereportId` = '" . $infoGradScore['gradereportId'] . "' 
					AND
						`alumnoId` = '" . $infoGradScore['alumnoId'] . "' 
					AND
						`scheduletestId` = '" . $listGlobals[1][$index] . "'
					LIMIT 1";
			$this->Util()->DB()->setQuery($sql);
			$resGradReportUserId = $this->Util()->DB()->GetSingle();
			
			if($resGradReportUserId){
				$sql = 'DELETE FROM gradereport_user WHERE gradReportUserId = "'.$resGradReportUserId.'"';
				$this->Util()->DB()->setQuery($sql);
				$this->Util()->DB()->DeleteData();			
			}
			
			//Eliminamos el R1
									
			$periodoReport = $this->GetPeriodoByGradReportUserId($this->gradReportUserId);			
			$r1Id = $GLOBALS['typetest']->InfoIdByTypetest('RECUPERACION');
			
			$listR1 = $GLOBALS['schedule_test']->GetDatesAndIDsScheduleBy($r1Id, $periodoReport);
							
			//Si el examen global ya existe no se debe crear de nuevo
			//buscamos el examen
			$sql = "SELECT gradReportUserId FROM
						`gradereport_user`
					WHERE
						`gradereportId` = '" . $infoGradScore['gradereportId'] . "' AND
						`alumnoId` = '" . $infoGradScore['alumnoId'] . "' AND
						`scheduletestId` = '" . $listR1[1][0] . "'
					LIMIT 1";			
			$this->Util()->DB()->setQuery($sql);
			$resGradReportUserId = $this->Util()->DB()->GetSingle();
			
			if($resGradReportUserId){
				$sql = 'DELETE FROM gradereport_user WHERE gradReportUserId = "'.$resGradReportUserId.'"';
				$this->Util()->DB()->setQuery($sql);
				$this->Util()->DB()->DeleteData();			
			}			
			
			
		}
		
		
		if($this->testIdentifier == 'GLOBAL' && (int)$this->gradescore >= -1 && (int)$this->gradescore <= 5)
		{
			//Si se reprueba el examen global, generar el regsitro para el examen de recuperacion R1
			
			//Recuperamos la lista de programa de examenes  parciales y globales 
			//del periodo al que pertenece el acta de calificaion
			//Obtenemos el ID del Periodo del Acta de calificaciones ( se obtienen con el ID del la calificacion )
			$periodoReport = $this->GetPeriodoByGradReportUserId($this->gradReportUserId);
			
			//Recuperamos el ID del examen R1
			$r1Id = $GLOBALS['typetest']->InfoIdByTypetest('RECUPERACION');
			
			//Obtenemos la fecha del examene de Recuperacion R1, proporcionando el ID del examen y el ID del periodo
			//								[0][0] == fecha del examen,  [1][0] == Id del examen
			//	si hay mas de un examen	... [0][1] == fecha del seg exam [1][1] == Id del seg exam
			//								[0][2] == fecha deh 3er exam [1][3] == Id del 3er exam...
			//	en este caso solo hay un examen en el calendario para el tipo R1....
			$r1Tests = $GLOBALS['schedule_test']->GetDatesAndIDsScheduleBy($r1Id, $periodoReport);

			if(!$r1Tests)
			{
				//No se enconctro el examen de recuperacion en el calendario de examenes
				//verificamos porque no esta registrado en el calendario de examenes
				$this->Util()->setError(30123, 'error');
				$this->Util()->PrintErrors();
				return false;
			}
			
			//Verificamos si ya existe un campo para la calificacion R1
			$sql = "SELECT 
						COUNT(*) 
					FROM 
						`gradereport_user` 
					WHERE 
						`gradereportId` = '" . $infoGradScore['gradereportId'] . "' 
					AND 
						`alumnoId` = '" . $infoGradScore['alumnoId'] . "' 
					AND 
						`scheduletestId` = '" . $r1Tests[1][0] . "'";
			$this->Util()->DB()->setQuery($sql);
			$result = $this->Util()->DB()->GetSingle();
			
			//Se genera un campo para la calificacion R1 si aun no existe, de otra forma ya no se vuelve a generar otro
			if($result == 0)
			{
				//No se encontro el campo para la calificacion R1...hay que generarlo para capturar la calificacion
				//Insertar el registro del R1 para su posterior edicion cuando este sea aplicado
				$sql = "INSERT INTO gradereport_user ( `gradereportId`, `alumnoId`, `testIdentifier`, `datetest`, `gradescore`, `scheduletestId` )
						VALUES ( '" . $infoGradScore['gradereportId'] . "', '" . $infoGradScore['alumnoId'] . "', 'RECUPERACION', '" . $r1Tests[0][0] . "', '-2.0', '" . $r1Tests[1][0] . "' )";
				$this->Util()->DB()->setQuery($sql);
				$this->Util()->DB()->InsertData();
				
				if($showMessagesSingle)
					$this->Util()->setError(30118, 'error');
			}
		}elseif($this->testIdentifier == 'GLOBAL'){
			
			//Eliminamos el R1
									
			$periodoReport = $this->GetPeriodoByGradReportUserId($this->gradReportUserId);			
			$r1Id = $GLOBALS['typetest']->InfoIdByTypetest('RECUPERACION');
			
			$listR1 = $GLOBALS['schedule_test']->GetDatesAndIDsScheduleBy($r1Id, $periodoReport);
							
			//Si el examen global ya existe no se debe crear de nuevo
			//buscamos el examen
			$sql = "SELECT gradReportUserId FROM
						`gradereport_user`
					WHERE
						`gradereportId` = '" . $infoGradScore['gradereportId'] . "' AND
						`alumnoId` = '" . $infoGradScore['alumnoId'] . "' AND
						`scheduletestId` = '" . $listR1[1][0] . "'
					LIMIT 1";			
			$this->Util()->DB()->setQuery($sql);
			$resGradReportUserId = $this->Util()->DB()->GetSingle();
			
			if($resGradReportUserId){
				$sql = 'DELETE FROM gradereport_user WHERE gradReportUserId = "'.$resGradReportUserId.'"';
				$this->Util()->DB()->setQuery($sql);
				$this->Util()->DB()->DeleteData();			
			}			
			
		}//else
		
		if($this->testIdentifier == 'RECUPERACION' && (int)$this->gradescore >= -1 && (int)$this->gradescore <= 5)
		{
			// si se reprueba examen de recuperacion, crear el registro para el examen Intersemestral
			
			// recuperar la lista de programa del examen intersemestral del periodo al que pertenece el acta de calificaion

			// obtenemos el ID del Periodo del Acta de calificaciones ( se obtienen con el ID del la calificacion )
			$periodoReport = $this->GetPeriodoByGradReportUserId($this->gradReportUserId);
			//  recuperamos el ID del examen Intersemestral
			$interId = $GLOBALS['typetest']->InfoIdByTypetest('INTERSEMESTRAL');
			// obtener la fecha del examene de Recuperacion R1, proporcionando el ID del examen y el ID del periodo
			//								[0][0] == fecha del examen,  [1][0] == Id del examen
			//	si hay mas de un examen	... [0][1] == fecha del seg exam [1][1] == Id del seg exam
			//								[0][2] == fecha deh 3er exam [1][3] == Id del 3er exam...
			//	en este caso solo hay un examen en el calendario para el tipo R1....
			$interTests = $GLOBALS['schedule_test']->GetDatesAndIDsScheduleBy($interId, $periodoReport);
			
			if(!$interTests)
			{				
				//no se enconctro el examen Intersemestral en el calendario de examenes
				//verificar porque no esta registrado en el calendario de examenes
				$this->Util()->setError(30124, 'error');
				$this->Util()->PrintErrors();
				return false;
			}
			
			// sacamos informacion del grupo del registro de actas...
			$sql = "SELECT * FROM gradereport WHERE gradereportId = '" . $infoGradScore['gradereportId'] . "'";
			$this->Util()->DB()->setQuery($sql);
			$gradereportInfo = $this->Util()->DB()->GetRow();
			if(!$gradereportInfo)
			{
				//problemas con el acta de calificaciones...no se encontro				
				$this->Util()->setError(30125, 'error');
				$this->Util()->PrintErrors();
				return false;
			}
			
			//sacamos informacion de la materia del registro de grupos...
			$sql = "SELECT * FROM subject_group where subgpoId = '" . $gradereportInfo['groupId'] . "'";
			$this->Util()->DB()->setQuery($sql);
			$groupInfo = $this->Util()->DB()->GetRow();
			if(!$groupInfo)
			{
				//problemas localizando el grupo...no se encontro
				$this->Util()->setError(30126, 'error');
				$this->Util()->PrintErrors();
				return false;
			}
			
			//verificar si ya existe un campo para la calificacion Intersemestral de este alumno con esta materia...
			
			$sql = "SELECT COUNT(*) FROM
						`gradereport_inter`
					WHERE
						`alumnoId` = '" . $infoGradScore['alumnoId'] . "' AND 
						`subjectId` = '" . $groupInfo['subjectId'] . "'";
			$this->Util()->DB()->setQuery($sql);
			$result = $this->Util()->DB()->GetSingle();
			if($result == 0)
			{
				
				//no existe...generar el campo
				$sql = "INSERT INTO 
							`gradereport_inter` (`alumnoId`, `subjectId`, `datetest`, `scheduletestId`, `periodoId`, `semesterId`)
						VALUES (
									'" . $infoGradScore['alumnoId'] . "', 
							  		'" . $groupInfo['subjectId'] . "', 
							  		'" . $interTests[0][0] . "', 
							  		'" . $interTests[1][0] . "', 
							  		'" . $periodoReport . "', 
							  		'" . $gradereportInfo['semesterId'] . "'							  		
							   )";
				$this->Util()->DB()->setQuery($sql);
				$idGI = $this->Util()->DB()->InsertData();
				
				if($showMessagesSingle)
					$this->Util()->setError(30127, 'error');
			}
		}
		
		if($this->testIdentifier == 'INTERSEMESTRAL' && (int)$this->gradescore >= -1 && (int)$this->gradescore <= 5)
		{
			// si se reprueba el examen Intersemestral, registrar al alumno como de recursamiento
			
			// sacamos informacion del grupo del registro de actas...
			$sql = "SELECT * FROM gradereport WHERE gradereportId = '" . $infoGradScore['gradereportId'] . "'";
			$this->Util()->DB()->setQuery($sql);
			$gradereportInfo = $this->Util()->DB()->GetRow();
			if(!$gradereportInfo)
			{
				//problemas con el acta de calificaciones...no se encontro				
				$this->Util()->setError(30125, 'error');
				$this->Util()->PrintErrors();
				return false;
			}
			
			//sacamos informacion de la materia del registro de grupos...
			$sql = "SELECT * FROM subject_group where subgpoId = '" . $gradereportInfo['groupId'] . "'";
			$this->Util()->DB()->setQuery($sql);
			$groupInfo = $this->Util()->DB()->GetRow();
			if(!$groupInfo)
			{
				//problemas localizando el grupo...no se encontro
				$this->Util()->setError(30126, 'error');
				$this->Util()->PrintErrors();
				return false;
			}
			
			//verificar si ya existe un campo con la informacion de Recursamiento de este alumno con esta materia...
			$sql = "SELECT COUNT(*) FROM
						`gradereport_recur`
					WHERE
						`alumnoId` = '" . $infoGradScore['alumnoId'] . "' AND 
						`subjectId` = '" . $groupInfo['subjectId'] . "'";
			$this->Util()->DB()->setQuery($sql);
			$result = $this->Util()->DB()->GetSingle();
			if($result == 0)
			{
				// el alumno aun no ha sido registrado para llevar materias de recursamiento
				// generarle su registro en la tabla correspondiente
				$sql = "INSERT INTO 
							gradereport_recur ( alumnoId, subjectId, periodoId, semesterId ) 
						VALUES
							( '" . $infoGradScore['alumnoId'] . "', 
							  '" . $groupInfo['subjectId'] . "', 
							  '" . $gradereportInfo['periodoId'] . "', 
							  '" . $gradereportInfo['semesterId'] . "' 
							 )";
				$this->Util()->DB()->setQuery($sql);
				$this->Util()->DB()->InsertData();
				
				if($showMessagesSingle)
					$this->Util()->setError(30129, 'error');
			}
		}
		
		// se actualiza la calificacion
		$sql = "UPDATE gradereport_user SET gradescore = '" . $this->gradescore . "' WHERE gradReportUserId = '" . $this->gradReportUserId . "'";
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->UpdateData();
		
		// ----------------------------------------------------------------
		// INSERTAR CODIGO PARA ACTUALIZAR LOS DATOS DE KARDEX_CALIFICACION
		
		
		// ----------------------------------------------------------------
		
		if($showMessagesSingle)
		{
			if($this->testIdentifier == 'PARCIAL')
				$this->Util()->setError(30107, 'complete');
			elseif($this->testIdentifier == 'GLOBAL')
				$this->Util()->setError(30114, 'complete');
			elseif($this->testIdentifier == 'RECUPERACION')
				$this->Util()->setError(30119, 'complete');
			elseif($this->testIdentifier == 'INTERSEMESTRAL')
				$this->Util()->setError(30130, 'complete');
			$this->Util()->PrintErrors();
		}
		
		return true;
	}
	
	public function UpdateReportAttendance(){
		
		$sql = "UPDATE gradereport_user 
				SET attendance = '" . $this->attendance . "' 
				WHERE gradReportUserId = '" . $this->gradReportUserId . "'";
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->UpdateData();	
		
	}
	
	public function AddIrregularStudent()
	{
		// seleccionamos los alumnos que estan registrados en gradereport_inter...que son los que van a llevar el intersemestral
		$sql = "SELECT * FROM gradereport_inter WHERE subjectId = '" . $this->subjectId . "' AND periodoId = '" . $this->periodoId . "' AND semesterId = '" . $this->semesterId . "'";
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		// para llevar la cuenta de los alumnos agregados
		$countAdd = 0;
		foreach($result as $row)
		{
			// buscamos si el alumno se encuentra en el acta de calificaciones
			//	Nota: gradereport_inter es solo para saber que alumnos reprobaron...gradereport_user es donde se capturan las calificaciones
			$sql = "SELECT COUNT(*) FROM gradereport_user WHERE gradereportId = '" . $this->gradereportId . "' AND alumnoId = '" . $row['alumnoId'] . "'";
			$this->Util()->DB()->setQuery($sql);
			$resCount = $this->Util()->DB()->GetSingle();
			if($resCount == 0)
			{
				// si el alumno no esta en el acta de calificaciones, se insertan sus datos.
				$sql = "INSERT INTO 
							gradereport_user ( gradereportId, alumnoId, testIdentifier, datetest, gradescore, scheduletestId )
						VALUES
							( 
							  '" . $this->gradereportId . "',
							  '" . $row['alumnoId'] . "',
							  'INTERSEMESTRAL',
							  '" . $row['datetest'] . "',
							  '0.0',
							  '" . $row['scheduletestId'] . "'
							  )";
				$this->Util()->DB()->setQuery($sql);
				$newId = $this->Util()->DB()->InsertData();
				$countAdd++;
			}
		}
		$this->Util()->setError(30128, 'complete');
		$this->Util()->PrintErrors();
		return true;
	}
	
	public function GetListScoresByReportIdDatetest()
	{
				
		$sql = "SELECT 
					* 
				FROM 
					gradereport_user 
				WHERE 
					gradereportId = '" . $this->gradereportId . "' 
				AND 
					datetest = '" . $this->datetest . "'";
		$this->Util()->DB()->setQuery($sql);
		$results = $this->Util()->DB()->GetResult();
		
		$result = array();
		foreach($results as $index => $row)
		{			
			/*** VERIFICAMOS PARCIALES REPROBADOS ***/
					
			//Contamos cuantos examenes globales tiene este alumno en el acta de la materia			
			$sql = "SELECT 
						COUNT(*) 
					FROM 
						gradereport_user 
					WHERE 
						gradereportId = '".$this->gradereportId."' 
					AND 
						alumnoId = '" . $row['alumnoId'] . "' 
					AND 
						testIdentifier = 'GLOBAL'";
			$this->Util()->DB()->setQuery($sql);
			$globalsFail = $this->Util()->DB()->GetSingle();
			
			//Si tienes mas de 3 examenes globales = 3 parciales reprobados
			//se niega el global y se manda directamente a R1
			if($globalsFail >= 3 && $row['testIdentifier'] == 'GLOBAL')
				continue;
			
			/*** FIN VERIFICAMOS PARCIALES REPROBADOS ***/
			
			$card = $row;
			
			//Sacamos el nombre del alumno y el grupo inicial y los guardamos
			$sql = "SELECT * FROM user WHERE userId = '" . $row['alumnoId'] . "'";
			$this->Util()->DB()->setQuery($sql);
			$infoStudent = $this->Util()->DB()->GetRow();
			if($infoStudent)
				$infoStudent = $this->Util->EncodeRow($infoStudent);
			$card['controlNumber'] = $infoStudent['controlNumber'];
			$card['studentFullName'] = strtoupper($infoStudent['lastNamePaterno'] . ' ' . $infoStudent['lastNameMaterno'] . ' ' . $infoStudent['names']);
			$card['studentGroup'] = $infoStudent['groupId'];
			//sacamos el grupo de inicio del alumno
			$GLOBALS['group']->setGroupId($infoStudent['groupId']);
			$groupInfo = $GLOBALS['group']->Info();
			$card['studentGroupClave'] = $groupInfo['clave'];
			$card['studentGroupName'] = $groupInfo['name'];
			
			$result[$index] = $card;
			
		}
		// ordenamos el arreglo, usando una funcion para especificar la condicion de ordenamiento
		usort($result, 'fncCompByFullName');
		// generamos el numero de lista sobre el arreglo ordenado
		$listNumber = 1;
		foreach($result as $index => $row)
		{
			$row['listNumber'] = $listNumber;
			$result[$index] = $row;
			$listNumber++;
		}
		return $result;
	}
	
	function IsCalifComplete($gradeReportId){
	
		global $typetest;
		global $schedule_test;
				
		//Obtenemos la informacion del acta
		$this->setGradereportId($gradeReportId);
		$gradeReportInfo = $this->Info();
		
		//Obtenemos el periodo del acta
		$periodoReport = $gradeReportInfo['periodoId'];
		
		//Checamos si es un acta de alumnos Irregulares o Regulares
		if($gradeReportInfo['regularization'] == 'N')
		{
			// recuperar la lista de examenes del periodo activo, parciales y globales
			$parcialId = $typetest->InfoIdByTypetest('PARCIAL');
			$globalId = $typetest->InfoIdByTypetest('GLOBAL');
			
			// establecemos el id del periodo del programa de examenes
			$schedule_test->setPeriodoId($periodoReport);
			
			// recuperamos la lista de los examenes parciales del programa de examenes
			$schedule_test->setTypetestId($parcialId);
			$parcialEnum = $schedule_test->EnumerateDatetestByTypetestAndPeriodo();
			$parcialTests = array();
			foreach($parcialEnum as $index => $datetest)
			{
				$parcialTests[] = $datetest['datetest'];
			}		
		}
			
		//Obtenemos a los alumnos
		$this->setGradereportId($gradeReportId);
		$userList = $this->EnumerateUsersByGradeReport();
		
		$complete[1] = true;
		$complete[2] = true;
		$complete[3] = true;
		foreach($userList as $res){
			
			if($gradeReportInfo['regularization'] == 'N'){
				
				$fechaP = $parcialTests[0];
				$calif1 = $res[$fechaP];
				
				if($calif1 >= 0 && $calif1 <= 10){
					//$continue = true;
				}else{
					$complete[1] = false;					
				}//else
				
				$fechaP = $parcialTests[1];
				$calif2 = $res[$fechaP];
				
				if($calif2 >= 0 && $calif2 <= 10){
					//$continue = true;
				}else{
					$complete[2] = false;					
				}//else
				
				$fechaP = $parcialTests[2];
				$calif3 = $res[$fechaP];
				
				if($calif3 >= 0 && $calif3 <= 10){
					//$continue = true;
				}else{
					$complete[3] = false;					
				}//else
								
			}//if
			
		}//foreach
				
		return $complete;
		
	}//IsCalifComplete
	
	function SaveToKardex(){
	
		global $subject;
		global $db;
			
		$sql = 'SELECT * FROM gradereport_user WHERE gradReportUserId = '.$this->gradReportUserId;
		$db->setQuery($sql);
		$res = $db->GetRow();
		
		$userId = $res['alumnoId'];
		
		$semAct = 0;
		$idMajor = 0;
		
		$sql = 'SELECT * FROM user WHERE userId = '.$userId;
		$db->setQuery($sql);
		$infU = $db->GetRow();
		
		//Obtenemos la informacion del ACTA
		$sql = 'SELECT * FROM gradereport WHERE gradereportId = '.$res['gradereportId'];
		$db->setQuery($sql);
		$infG = $db->GetRow();
		
		//Obtenemos informacion del GRUPO
		$sql = 'SELECT * FROM subject_group WHERE subgpoId = '.$infG['groupId'];
		$db->setQuery($sql);
		$infS = $db->GetRow();
		
		$subjectId = $infS['subjectId'];		
		$majorId = $infU['majorId'];
		$userId = $res['alumnoId'];
		
		//Obtenemos el Semestre del Acta de Calificaciones y NO del alumno		
		$semesterId = $infG['semesterId'];		
		$periodoId = $infG['periodoId'];				
						
		//Obtenemos el promedio
		
		$subject->setSubjectId($subjectId);
		$materia = $subject->GetNameById();
		
		$gradereportId = $res['gradereportId'];
		
		$subject->setUserId($userId);
		$subject->setSubjectId($subjectId);
		$subject->setGradereportId($gradereportId);
							
		$prom = $subject->GetRecordBySubject();
		
		$sql = 'SELECT karCalId FROM kardex_calificacion 
				WHERE userId = '.$userId.'
				AND semesterId = '.$semesterId.'
				AND majorId = '.$majorId.'
				AND subjectId = '.$subjectId.'
				AND periodoId = '.$periodoId;
		$db->setQuery($sql);
		$karCalId = $db->GetSingle();
		
		$promedio = $prom['promedio'];
		$tipo = $prom['tipo'];
		
		if($tipo == 'FINAL')
			$tipoId = 1;
		elseif($tipo == 'R1')
			$tipoId = 2;
		else
			$tipoId = 0;
			
		if($karCalId){			
						
			$sql = 'UPDATE kardex_calificacion SET calif = '.$promedio.', typeCalifId = '.$tipoId.'
					WHERE karCalId = '.$karCalId;
			$db->setQuery($sql);
			$db->UpdateData();			
		}else{
			$sql = 'INSERT INTO kardex_calificacion (userId, semesterId, majorId, subjectId, calif, typeCalifId, periodoId)
					VALUES ('.$userId.','.$semesterId.','.$majorId.','.$subjectId.','.$promedio.','.$tipoId.','.$periodoId.')';
			$db->setQuery($sql);
			$db->InsertData();
		}
		
	}//SaveToKardex
	
	// --------------------
	public function PrintReport($gradereportId)
	{
		//Establecemos el ID del acta
		$this->gradereportId = $gradereportId;
		
		//Recuperamos la informacion del acta
		$gradereportInfo = $this->Info();
		
		//Recuperamos el listado de alumnos
		$resUserlist = $this->EnumerateUsersByGradeReport();
		
		//Recuperamos el periodo del acta
		$periodoReport = $gradereportInfo['periodoId'];
		
		//Verificamos si es un acta de alumnos irregulares o regulares
		if($gradereportInfo['regularization'] == 'N')
		{
			//Recuperar la lista de examenes del periodo activo, parciales y globales
			//Recuperamos los ID's de los examenes parcial y global
			$parcialId = $GLOBALS['typetest']->InfoIdByTypetest('PARCIAL');
			$globalId = $GLOBALS['typetest']->InfoIdByTypetest('GLOBAL');
			
			//Establecemos el id del periodo del programa de examenes
			$GLOBALS['schedule_test']->setPeriodoId($periodoReport);
			
			//Recuperamos la lista de los examenes parciales del programa de examenes
			$GLOBALS['schedule_test']->setTypetestId($parcialId);
			
			$parcialEnum = $GLOBALS['schedule_test']->EnumerateDatetestByTypetestAndPeriodo();
			
			$parcialTests = array();
			foreach($parcialEnum as $index => $datetest)
			{
				$parcialTests[] = $datetest['datetest'];
			}
			
			//Recuperamos la lista de los examenes globales del programa de examenes
			$GLOBALS['schedule_test']->setTypetestId($globalId);
			$globalEnum = $GLOBALS['schedule_test']->EnumerateDatetestByTypetestAndPeriodo();
			
			$globalTests = array();
			foreach($globalEnum as $key => $date)
			{
				$globalTests[] = $date['datetest'];
			}
			
			//Recuperamos el ID del examen R1
			$r1Id = $GLOBALS['typetest']->InfoIdByTypetest('RECUPERACION');
			
			//Recuperamos INfo del examen r1
			$r1Tests = $GLOBALS['schedule_test']->GetDatesAndIDsScheduleBy($r1Id, $periodoReport);
			
			//Recuperamos solo la fecha del R1
			$r1Test = $r1Tests[0][0];
			
		}
		else
		{
			//Recuperamos el ID del examen Intersemestral
			$interSemId = $GLOBALS['typetest']->InfoIdByTypetest('INTERSEMESTRAL');
			
			//Recuperamos la fecha del Intersemetral con el ID y el periodo del acta
			$interTests = $GLOBALS['schedule_test']->GetDatesAndIDsScheduleBy($interSemId, $periodoReport);
			
			//Tomamos la fecha del examen Intersemestral
			$interTest = $interTests[0][0];
			
		}
		
		/********* CALCULAMOS EL PROMEDIO *********/
		
		$userlist = array();
		//Obtenemos el Promedio	
		foreach($resUserlist as $key => $res){
			
			$card = $res;			
			
			$parciales = array();
			$globales = array();		
							
			foreach($parcialTests as $itm){
				
				$parciales[] = $res[$itm];			
			}
			
			foreach($globalTests as $itm){
				
				$globales[] = $res[$itm];			
			}
			
			$r1 = $res[$r1Test];			
						
			$promedio = 0;			
			
			if($parciales[2] != -2){
				
				//Checamos si no reprobo algun Parcial 
				//en caso afirmativo tomamos la calificacion del Global correspondiente			
				if($parciales[0] >= 0 && $parciales[0] < 6)
					$parciales[0] = $globales[0];
				if($parciales[1] >= 0 && $parciales[1] < 6)
					$parciales[1] = $globales[1];
				if($parciales[2] >= 0 && $parciales[2] < 6)
					$parciales[2] = $globales[2];
				
				//Si una calificacion es reprobatoria REPRUEBA el alumno
				if($parciales[0] < 6 || $parciales[1] < 6 || $parciales[2] < 6)
					$promedio = 5;
				else						
					$promedio = round(($parciales[0] + $parciales[1] + $parciales[2]) / 3);					
				
				//Si reprueba 3 parciales se va directo a R1
				if($parciales[0] < 6 && $parciales[1] < 6 && $parciales[2] < 6)
					$promedio = $r1;
				//Si reprobo algun global se va directo a R1
				elseif($parciales[0] < 6 || $parciales[1] < 6 || $parciales[2] < 6)
					$promedio = $r1;
							
			}elseif($parciales[1] != -2){
				
				if($parciales[0] >= 0 && $parciales[0] <= 5)
					$parciales[0] = $globales[0];
				if($parciales[1] >= 0 && $parciales[1] <= 5)
					$parciales[1] = $globales[1];
				
				//Si una calificacion es reprobatoria REPRUEBA el alumno
				if($parciales[0] < 6 || $parciales[1] < 6)
					$promedio = 5;
				else						
					$promedio = round(($parciales[0] + $parciales[1]) / 2);					
						
			}elseif($parciales[0] != -2){
				
				if($parciales[0] >= 0 && $parciales[0] <= 5)
					$parciales[0] = $globales[0];
				
				//Si una calificacion es reprobatoria REPRUEBA el alumno
				if($parciales[0] < 6)
					$promedio = 5;
				else						
					$promedio = $parciales[0];
					
			}
					
			 $promedio = number_format(round($promedio),2);
			 $card['averageScore'] = $promedio;
			
			$userlist[$key] = $card;
				
		}//foreach
		
		/********* CALCULAMOS EL PROMEDIO *********/
		
		$pdf = new CBTA_PDF_CALIF('P', 'mm', 'Letter');
		$pdf->SetMargins(5, 10, 5);	// documento contiene 206 columnas con margen de 5mm
		$pdf->setProfessorFullName($gradereportInfo['personalFullName']);
		$pdf->setRegularization($gradereportInfo['regularization']);
		$pdf->setSemesterClave($gradereportInfo['semesterClave']);
		$pdf->setGroupClave($gradereportInfo['groupClave']);
		$pdf->setSubjectName($gradereportInfo['subjectName']);
		$pdf->setGeneration($gradereportInfo['generation']);
		$pdf->setPeriodoName($gradereportInfo['periodoName']);
		
		if($this->printR1)
			$pdf->setPrintR1(true);
		
		$pdf->AliasNbPages();
		$pdf->AddPage();
		
		$altoListCeldas = 5;
		$pdf->SetFont('ARIAL', '', 7);
		$listR1 = 1;
		foreach($userlist as $row)
		{
			
			if($this->printR1 == true && ($row[$r1Test] < 0 || $row[$r1Test] == ''))
				continue;
			elseif($this->printR1 == true){ //Cambiamos la paginacion del Acta R1
				$row['listNumber'] = $listR1;
				$listR1++;	
			}
				
			
			$pdf->Cell(8, $altoListCeldas, $row['listNumber'], 1, 0, 'C');
			$pdf->Cell(72, $altoListCeldas, $row['studentFullName'], 1, 0, 'L');
			$pdf->Cell(25, $altoListCeldas, $row['controlNumber'], 1, 0, 'C');
			
			if( $gradereportInfo['regularization'] == 'N' )
			{
				if($this->printR1){
														
					$pdf->Cell(90, $altoListCeldas,'', 1, 0, 'C');
					$row['averageScore'] = ($row[$r1Test] == -2 ? ' ' : ($row[$r1Test] == -1 ? 'NP' : $row[$r1Test]) );
					
				}else{
					
					//Inasistencias
					$pdf->Cell(10, $altoListCeldas, ($row['attendance'][$parcialTests[0]] == 0) ? '' : $row['attendance'][$parcialTests[0]], 1, 0, 'C');
					$pdf->Cell(10, $altoListCeldas, ($row['attendance'][$parcialTests[1]] == 0) ? '' : $row['attendance'][$parcialTests[1]], 1, 0, 'C');
					$pdf->Cell(10, $altoListCeldas, ($row['attendance'][$parcialTests[2]] == 0) ? '' : $row['attendance'][$parcialTests[2]], 1, 0, 'C');
						
					//Examenes parciales
					$pdf->Cell(10, $altoListCeldas, ($row[$parcialTests[0]] == -2 ? ' ' : ($row[$parcialTests[0]] == -1 ? 'NP' : $row[$parcialTests[0]]) ), 1, 0, 'C');
					$pdf->Cell(10, $altoListCeldas, ($row[$parcialTests[1]] == -2 ? ' ' : ($row[$parcialTests[0]] == -1 ? 'NP' : $row[$parcialTests[1]]) ), 1, 0, 'C');
					$pdf->Cell(10, $altoListCeldas, ($row[$parcialTests[2]] == -2 ? ' ' : ($row[$parcialTests[0]] == -1 ? 'NP' : $row[$parcialTests[2]]) ), 1, 0, 'C');
					
					//Examenes globales
					$pdf->Cell(10, $altoListCeldas, ($row[$globalTests[0]] == -2 ? ' ' : ($row[$parcialTests[0]] == -1 ? 'NP' : $row[$globalTests[0]]) ), 1, 0, 'C');
					$pdf->Cell(10, $altoListCeldas, ($row[$globalTests[1]] == -2 ? ' ' : ($row[$parcialTests[0]] == -1 ? 'NP' : $row[$globalTests[1]]) ), 1, 0, 'C');
					$pdf->Cell(10, $altoListCeldas, ($row[$globalTests[2]] == -2 ? ' ' : ($row[$parcialTests[0]] == -1 ? 'NP' : $row[$globalTests[2]]) ), 1, 0, 'C');
				
				}//else
				
			}
			else
			{
				// examenes de Intersemestral
				$pdf->Cell(98, $altoListCeldas, ($row[$interTest] == -2 ? ' ' : ($row[$parcialTests[0]] == -1 ? 'NP' : $row[$parcialTests[0]] == -2 ? ' ' : $row[$interTest]) ), 1, 0, 'C');
			}
			$pdf->Cell(11, $altoListCeldas, $row['averageScore'], 1, 1, 'C');
			$pdf->Ln(0);
		}
		
		$pdf->Ln(5);
		$pdf->Output('ActaCalificaciones.pdf', 'D');
		
	}//PrintReport
		
	//Imprimir Lista de Alumnos
	public function PrintReportList($gradereportId)
	{
		// establecemos el ID del acta
		$this->gradereportId = $gradereportId;
		// recuperamos la informacion del acta
		$gradereportInfo = $this->Info();
		// recuperamos el listado de alumnos
		$userlist = $this->EnumerateUsersByGradeReport();
		
		//	recuperamos el periodo del acta
		$periodoReport = $gradereportInfo['periodoId'];
		
		$pdf = new CBTA_PDF_LISTADO('P', 'mm', 'Letter');
		$pdf->SetMargins(5, 10, 5);	// documento contiene 206 columnas con margen de 5mm
		$pdf->setProfessorFullName($gradereportInfo['personalFullName']);
		$pdf->setRegularization($gradereportInfo['regularization']);
		$pdf->setSemesterClave($gradereportInfo['semesterClave']);
		$pdf->setGroupClave($gradereportInfo['groupClave']);
		$pdf->setSubjectName($gradereportInfo['subjectName']);
		$pdf->setGeneration($gradereportInfo['generation']);
		$pdf->setPeriodoName($gradereportInfo['periodoName']);
		$pdf->AliasNbPages();
		$pdf->AddPage();
		
		
		$altoListCeldas = 5;
		$pdf->SetFont('ARIAL', '', 7);
		foreach($userlist as $row)
		{
			$pdf->Cell(8, $altoListCeldas, $row['listNumber'], 1, 0, 'C');
			$pdf->Cell(64, $altoListCeldas, $row['studentFullName'], 1, 0, 'L');
			$pdf->Cell(21, $altoListCeldas, $row['controlNumber'], 1, 0, 'C');
			
			//Inasistencias
			$pdf->Cell(4, $altoListCeldas, '', 1, 0, 'C');	
			$pdf->Cell(4, $altoListCeldas, '', 1, 0, 'C');	
			$pdf->Cell(4, $altoListCeldas, '', 1, 0, 'C');	
			$pdf->Cell(4, $altoListCeldas, '', 1, 0, 'C');	
			$pdf->Cell(4, $altoListCeldas, '', 1, 0, 'C');	
			$pdf->Cell(4, $altoListCeldas, '', 1, 0, 'C');	
			$pdf->Cell(4, $altoListCeldas, '', 1, 0, 'C');				
			$pdf->Cell(4, $altoListCeldas, '', 1, 0, 'C');
			$pdf->Cell(4, $altoListCeldas, '', 1, 0, 'C');
			$pdf->Cell(4, $altoListCeldas, '', 1, 0, 'C');
			$pdf->Cell(4, $altoListCeldas, '', 1, 0, 'C');
			$pdf->Cell(4, $altoListCeldas, '', 1, 0, 'C');
			
			$pdf->Cell(8, $altoListCeldas, '', 1, 0, 'C');
			$pdf->Cell(8, $altoListCeldas, '', 1, 0, 'C');
			$pdf->Cell(10, $altoListCeldas, '', 1, 0, 'C');
			$pdf->Cell(11, $altoListCeldas, '', 1, 0, 'C');
			$pdf->Cell(15, $altoListCeldas, '', 1, 0, 'C');
			$pdf->Cell(10, $altoListCeldas, '', 1, 1, 'C');
			
			$pdf->Ln(0);
		}
		
		$pdf->Output('ListaAlumnos.pdf', 'D');
	}
	
	
	
}

	function fncCompByFullName($val1, $val2)
	{
		// si $val1 es menor que $val2 regresa -1, si es igual regresa 0 y si es mayor regresa 1
		// -1, 0, 1 son los valores que se deben regresar a la funcion para que determinar si el
		//		primer parametro es menor, igual o mayor que el segundo parametro
		//	--- que es lo que hace strcmp al comparar dos cadenas
		return strcmp($val1['studentFullName'], $val2['studentFullName']);
	}

?>