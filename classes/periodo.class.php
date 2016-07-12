<?php 

class Periodo extends Main
{
	private $periodoId;
	private $identifier;
	private $name;
	private $starts;
	private $ends;
	private $fichasStarts;
	private $fichasEnds;
	private $vacationsStarts;
	private $vacationsEnds;
	private $active;

	public function setPeriodoId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->periodoId = $value;
	}

	public function getPeriodoId()
	{
		return $this->periodoId;
	}

	public function setIdentifier($value)
	{
		$this->Util()->ValidateString($value, 10000, 1, 'Periodo');
		$this->identifier = $value;
	}

	public function getIdentifier()
	{
		return $this->identifier;
	}

	public function setName($value)
	{
		$this->Util()->ValidateString($value, 10000, 1, 'Nombre');
		$this->name = $value;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setStarts($value)
	{
		$this->Util()->ValidateString($value, 10, 10, 'Fecha Inicia');
		if(!strtotime($value))
			$this->Util()->setError(50204, 'error', '', '');
		$this->starts = $value;
	}

	public function getStarts()
	{
		return $this->starts;
	}

	public function setEnds($value)
	{
		$this->Util()->ValidateString($value, 10, 10, 'Fecha Termina');
		if(!strtotime($value))
			$this->Util()->setError(50205, 'error', '', '');
		else
		{
			if(strtotime($this->starts) >= strtotime($value))
				$this->Util()->setError(50208, 'error', '', '');
		}
		$this->ends = $value;
	}

	public function getEnds()
	{
		return $this->ends;
	}

	public function setFichasStarts($value)
	{
		$this->Util()->ValidateString($value, 10, 10, 'Fichas Ini');
		if(!strtotime($value))
			$this->Util()->setError(50206, 'error', '', '');
		$this->fichasStarts = $value;
	}

	public function getFichasStarts()
	{
		return $this->fichasStarts;
	}

	public function setFichasEnds($value)
	{
		$this->Util()->ValidateString($value, 10, 10, 'Fichas Fin');
		if(!strtotime($value))
			$this->Util()->setError(50207, 'error', '', '');
		$this->fichasEnds = $value;
	}
	
	public function setVacationsStarts($value)
	{
		$this->Util()->ValidateString($value, 10, 10, 'Vacaciones Inicio');	
		if(!strtotime($value))
			$this->Util()->setError(50209, 'error');
		$this->vacationsStarts = $value;
	}
	
	public function getVacationsStarts()
	{
		return $this->vacationsStarts;	
	}
	
	public function setVacationsEnds($value)
	{
		$this->Util()->ValidateString($value, 10, 10, 'Vacaciones Final');	
		if(!strtotime($value))
			$this->Util()->setError(50210, 'error');
		$this->vacationsEnds = $value;
	}
	
	public function getVacationsEnds()
	{
		return $this->vacationsEnds;	
	}
	
	public function getFichasEnds()
	{
		return $this->fichasEnds;
	}

	public function setActive($value)
	{
		if($value == '*')
			$this->Util()->setError(50211, 'error');
			
		$this->active = $value;
	}

	public function getActive()
	{
		return $this->active;
	}

	public function Enumerate()
	{
		$this->Util()->DB()->setQuery('SELECT * FROM periodo ORDER BY periodoId ASC');
		$result = $this->Util()->DB()->GetResult();

		foreach($result as $key => $row)
		{
		}
		return $result;
	}

	public function Info()
	{
		$sql = "SELECT * FROM periodo WHERE periodoId = '".$this->periodoId."'";
		$this->Util()->DB()->setQuery($sql);
		$row = $this->Util()->DB()->GetRow();
		return $row;
	}

	public function Edit()
	{
		if($this->Util()->PrintErrors()){ return false; }

		$this->Util()->DB()->setQuery("
			UPDATE
				periodo
			SET
				`periodoId` = '".$this->periodoId."',
				`identifier` = '".$this->identifier."',
				`name` = '".$this->name."',
				`starts` = '".$this->starts."',
				`ends` = '".$this->ends."',
				`fichasStarts` = '".$this->fichasStarts."',
				`fichasEnds` = '".$this->fichasEnds."',
				`vacationsStarts` = '".$this->vacationsStarts."',
				`vacationsEnds` = '".$this->vacationsEnds."',
				`active` = '".$this->active."'
			WHERE periodoId = '".$this->periodoId."'");
		$this->Util()->DB()->UpdateData();
		
		if($this->active == 'yes')
		{
			if($this->CountTableRows() > 1)
			{
				$this->UpdateOtherStatusActives($this->periodoId);
			}
		}
		
		$this->Util()->setError(50201, "complete");
		$this->Util()->PrintErrors();
		return true;
	}

	public function Save()
	{
		if($this->Util()->PrintErrors()){ return false; }

		$this->Util()->DB()->setQuery("
			INSERT INTO
				periodo
			(
				`periodoId`,
				`identifier`,
				`name`,
				`starts`,
				`ends`,
				`fichasStarts`,
				`fichasEnds`,
				`vacationsStarts`,
				`vacationsEnds`,
				`active`
		)
		VALUES
		(
				'".$this->periodoId."',
				'".$this->identifier."',
				'".$this->name."',
				'".$this->starts."',
				'".$this->ends."',
				'".$this->fichasStarts."',
				'".$this->fichasEnds."',
				'".$this->vacationsStarts."',
				'".$this->vacationsEnds."',
				'".$this->active."'
		);");
		$newId = $this->Util()->DB()->InsertData();
		
		if($this->active == 'yes')
		{
			if($this->CountTableRows() > 1)
			{
				$this->UpdateOtherStatusActives($newId);
			}
		}
		
		$this->Util()->setError(50200, "complete");
		$this->Util()->PrintErrors();
		return true;
	}

	public function Delete()
	{
		if($this->Util()->PrintErrors()){ return false; }
		
		$result = $this->info();

		$this->Util()->DB()->setQuery("
			DELETE FROM
				periodo
			WHERE
				periodoId = '".$this->periodoId."'");
		$this->Util()->DB()->DeleteData();
		if($result['active'] == 'yes')
		{
			$this->Util()->DB()->setQuery("SELECT * FROM periodo ORDER BY starts");
			$result = $this->Util()->DB()->GetResult();
			if(count($result) > 0)
			{
				$row = $result[count($result)-1];
				$this->Util()->DB()->setQuery("UPDATE periodo SET active = 'yes' WHERE periodoId = '" . $row['periodoId'] . "'");
				$this->Util()->DB()->UpdateData();
			}
		}
		$this->Util()->setError(50203, "complete");
		$this->Util()->PrintErrors();
		return true;
	}
	
	public function UpdateOtherStatusActives($id)
	{
		if(!$id) return 0;
		$this->Util()->DB()->setQuery("UPDATE periodo SET active = 'no' WHERE periodoId <> '" . $id . "'");
		$result = $this->Util()->DB()->UpdateData();
		return $result;
	}
	
	public function CountTableRows()
	{
		$this->Util()->DB()->setQuery('SELECT COUNT(*) FROM periodo');
		$result = $this->Util()->DB->GetSingle();
		return $result;
	}
	
	public function GetPeriodoActive()
	{
		$sql = "SELECT 
					periodoId 
				FROM 
					periodo 
				WHERE 
					active = 'yes'";
	
		$this->Util()->DB()->setQuery($sql);
		$periodoId = $this->Util()->DB()->GetSingle();
		return $periodoId;
	}
	
	public function GetNameById()
	{
		$sql = "SELECT 
					name 
				FROM 
					periodo 
				WHERE 
					periodoId = ".$this->periodoId;
	
		$this->Util()->DB()->setQuery($sql);
		$name = $this->Util()->DB()->GetSingle();
		
		return $name;
	}
	
	public function GetIdentifierById()
	{
		$sql = "SELECT 
					identifier 
				FROM 
					periodo 
				WHERE 
					periodoId = ".$this->periodoId;
	
		$this->Util()->DB()->setQuery($sql);
		$identifier = $this->Util()->DB()->GetSingle();
		
		return $identifier;
	}

}

?>