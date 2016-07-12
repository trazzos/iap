<?php 

class Schedule_test extends Main
{
	private $scheduletestId;
	private $typetestId;
	private $datetest;
	private $comments;
	private $periodoId;

	public function setScheduletestId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->scheduletestId = $value;
	}

	public function getScheduletestId()
	{
		return $this->scheduletestId;
	}

	public function setTypetestId($value)
	{
		$this->Util()->ValidateInteger($value);
		if((int)$value == 0)
			$this->Util()->setError(50401,'error');
		$this->typetestId = $value;
	}

	public function getTypetestId()
	{
		return $this->typetestId;
	}

	public function setDatetest($year, $month, $day)
	{
		$day = (int)$day;
		$month = (int)$month;
		$year = (int)$year;
		if(!$this->Util()->ValidateDate($year, $month, $day))
			$this->Util()->setError(50400,'error');
		$value =  $year . '-' . ($month < 10 ? '0' . $month : $month) . '-' . ($day < 10 ? '0' . $day : $day);
		$this->datetest = $value;
	}

	public function getDatetest()
	{
		return $this->datetest;
	}

	public function setComments($value)
	{
		$this->Util()->ValidateString($value, 60, 0, 'datetest');
		$this->comments = $value;
	}

	public function getComments()
	{
		return $this->comments;
	}

	public function setPeriodoId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->periodoId = $value;
	}

	public function getPeriodoId()
	{
		return $this->periodoId;
	}

	public function Enumerate()
	{
		$this->Util()->DB()->setQuery('
									SELECT 
										* 
									FROM 
										schedule_test 
									WHERE
										periodoId = '.$this->periodoId.'
									ORDER BY 
										datetest ASC');
		$result = $this->Util()->DB()->GetResult();

		foreach($result as $key => $row)
		{
			$GLOBALS['typetest']->setTestId($row['typetestId']);
			$typetestInfo = $GLOBALS['typetest']->Info();
			$result[$key]['typetest'] = $typetestInfo['typetest'];
			$GLOBALS['periodo']->setPeriodoId($row['periodoId']);
			$periodoInfo = $GLOBALS['periodo']->Info();
			$result[$key]['periodo'] = $periodoInfo['identifier'];
		}
		return $result;
	}
	
	public function EnumerateDatetestByTypetestAndPeriodo()
	{
		$sql = "SELECT datetest FROM
					schedule_test
				WHERE
					typetestId = '" . $this->typetestId . "'
				AND
					periodoId = '" . $this->periodoId . "'
				ORDER BY datetest ASC";
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		return $result;
	}
	
	public function GetDatesScheduleBy($typetestId, $periodoId)
	{
		// establecemos el id del tipo de examen del programa de examenes
		$this->setTypetestId($typetestId);
		// establecemos el id del periodo del programa de examenes
		$this->setPeriodoId($periodoId);
		$resultEnum = $this->EnumerateDatetestByTypetestAndPeriodo();
		$listTests = array();
		foreach($resultEnum as $index => $datetest)
		{
			$listTests[] = $datetest['datetest'];
		}
		return $listTests;
	}
	
	public function GetDatesAndIDsScheduleBy($typeTestId, $periodoId)
	{
		$sql = "SELECT scheduletestId, datetest FROM
					schedule_test
				WHERE
					typetestId = '" . $typeTestId . "'
				AND
					periodoId = '" . $periodoId . "'
				ORDER BY 
					datetest ASC";
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		foreach($result as $index => $value)
		{
			$listTests[0][] = $value['datetest'];
			$listTests[1][] = $value['scheduletestId'];
		}
		
		return $listTests;
	}

	public function GetScheduletestIdByTypetestId($typeTestId, $periodoId)
	{
		$sql = "SELECT scheduletestId FROM
					schedule_test
				WHERE
					typetestId = '" . $typeTestId . "'
				AND
					periodoId = '" . $periodoId . "'
				ORDER BY 
					datetest ASC";
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		foreach($result as $value)
		{
			$schdTestsId[] = $value['scheduletestId'];
		}
		
		return $schdTestsId;
	}


	public function Info()
	{
		$this->Util()->DB()->setQuery("SELECT * FROM schedule_test WHERE scheduletestId = '".$this->scheduletestId."'");
		$row = $this->Util()->DB()->GetRow();
		return $row;
	}
	
	// Recupera la informacion de un examen por su tipo y por la fecha de aplicacion
	//			usado para saber si ya existe un examen  antes de guardar uno nuevo o editar uno ya existente
	public function InfoByTypetestIdDate()
	{
		$sql = "SELECT * FROM schedule_test WHERE typetestId = '" . $this->typetestId . "' AND datetest = '" . $this->datetest . "'";
		$this->Util()->DB()->setQuery($sql);
		$row = $this->Util()->DB()->GetRow();
		return $row;
	}

	public function Edit()
	{
		if($this->Util()->PrintErrors()){ return false; }
		
		//recuperamos la informacion del registro a modificar
		$scheduleInfo = $this->Info();

		//si se esta modificando el tipo de examen y la fecha ...
		if( $this->typetestId != $scheduleInfo['typetestId'] || 
			$this->datetest != $scheduleInfo['datetest'] )
		{
		
			//verificamos que la fecha y el tipo de examen no existan ya en la base de datos (para no dulicarlo)
			$sql = "SELECT * FROM schedule_test WHERE typetestId = '" . $this->typetestId . "' AND datetest = '" . $this->datetest . "' AND scheduletestId <> '" . $this->scheduletestId . "'";
			$this->Util()->DB()->setQuery($sql);
			$row = $this->Util()->DB()->GetRow();
			if($row)
			{
				// si ya existe no se puede crear otro examen del mismo tipo y con la misma fecha
				$this->Util()->setError(30115, 'error');
				$this->Util()->PrintErrors();
				return false;
			}
			
			// si no existe un examen del mismo tipo y con la misma fecha
			
			/*
			// verificar que no este siendo utilizado en las calificaciones de los alumno, si es asi no se puede modificar
			//verificamos si el ID esta siendo utilizada en las calificaciones de los alumnos
			$sql = "SELECT COUNT(*) FROM gradereport_user WHERE scheduletestId = '" . $this->scheduletestId . "'";
			$this->Util()->DB()->setQuery($sql);
			$result = $this->Util()->DB()->GetSingle();
			if($result > 0)
			{
				//si se esta utilizando, no se puede modificar
				$this->Util()->setError(30115, 'error');
				$this->Util()->PrintErrors();
				return false;
			}
			*/
			
			//si no es el caso de las condiciones anteriores...si se puede hacer el cambio
			$sql = "UPDATE
					schedule_test
				SET
					`typetestId` = '" . $this->typetestId . "',
					`datetest` = '" . $this->datetest . "',
					`comments` = '".utf8_decode($this->comments)."'
				WHERE scheduletestId = '".$this->scheduletestId."'";
			$this->Util()->DB()->setQuery($sql);
			$this->Util()->DB()->UpdateData();
	
			// ---- ACTUALIZAMOS LAS FECHAS DE LAS CALIFICACIONES DE LOS ALUMNOS
			// recuperamos Info del tipo de examen
			$GLOBALS['typetest']->setTestId($this->typetestId);
			$typetestInfo = $GLOBALS['typetest']->Info();
			// si el examen es Parcial, Global o Recuperacion o Intersemestral...actualizamo la tabla gradereport_user
			$sql = "UPDATE gradereport_user SET datetest = '" . $this->datetest . "' WHERE scheduletestId = '" . $this->scheduletestId . "'";
			//actualizamos las fechas del examen
			$this->Util()->DB()->setQuery($sql);
			$this->Util()->DB()->UpdateData();
			// si el examen es Intersemestral ademas tambien se actualiza la tabla gradereport_inter
			if($typetestInfo['typetest'] == 'INTERSEMESTRAL')
			{
				$sql = "UPDATE gradereport_inter SET datetest = '" . $this->datetest . "' WHERE scheduletestId = '" . $this->scheduletestId . "'";
				$this->Util()->DB()->setQuery($sql);
				$this->Util()->DB()->UpdateData();
			}
			// ----
				
			$this->Util()->setError(50404, "complete");
			$this->Util()->PrintErrors();
			return true;

		}
		//si solo se modifica el comentarios
		if($this->comments != $scheduleInfo['comments'])
		{			
			$sql = "UPDATE
					schedule_test
				SET
					`comments` = '".utf8_decode($this->comments)."'
				WHERE scheduletestId = '".$this->scheduletestId."'";
			
			$this->Util()->DB()->setQuery($sql);
			$this->Util()->DB()->UpdateData();
	
			$this->Util()->setError(50404, "complete");
			$this->Util()->PrintErrors();
			return true;
		}
	}

	public function Save()
	{
		if($this->Util()->PrintErrors()){ return false; }

		$row = $this->InfoByTypetestIdDate();
		if($row)
		{
			$this->Util()->setError(50405, 'error');
			$this->Util()->PrintErrors();
			return false;
		}

		$this->Util()->DB()->setQuery("
			INSERT INTO
				schedule_test
			(
				`scheduletestId`,
				`typetestId`,
				`datetest`,
				`comments`,
				`periodoId`
		)
		VALUES
		(
				'".$this->scheduletestId."',
				'".$this->typetestId."',
				'".$this->datetest."',
				'".utf8_decode($this->comments)."',
				'".$this->periodoId."'
		);");
		$this->Util()->DB()->InsertData();
		$this->Util()->setError(50402, "complete");
		$this->Util()->PrintErrors();
		return true;
	}

	public function Delete()
	{
		if($this->Util()->PrintErrors()){ return false; }

		//verificar los lugares donde podria estar usandose y evitar que se elimine....
		//obtenemos la informacion del programa de calificaciones de esta calificacion en paticular
		$scheduleInfo = $this->Info();
		
		//verificamos si el ID esta siendo utilizada en las calificaciones de los alumnos
		$sql = "SELECT COUNT(*) FROM gradereport_user WHERE scheduletestId = '" . $this->scheduletestId . "'";
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetSingle();
		if($result > 0)
		{
			$this->Util()->setError(50406, 'error');
			$this->Util()->PrintErrors();
			return false;
		}
		
		//verificamos que la fecha no este siendo usado en las calificaciones del alumno
		$sql = "SELECT COUNT(*) FROM gradereport_user WHERE datetest = '" . $scheduleInfo['datetest'] . "'";
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetSingle();
		if($result > 0)
		{
			$this->Util()->setError(50407, 'error');
			$this->Util()->PrintErrors();
			return false;
		}

		$this->Util()->DB()->setQuery("
			DELETE FROM
				schedule_test
			WHERE
				scheduletestId = '".$this->scheduletestId."'");
		
		$this->Util()->DB()->DeleteData();
		$this->Util()->setError(50403, "complete");
		$this->Util()->PrintErrors();
		return true;
	}

}

?>