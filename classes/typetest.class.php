<?php 

class Typetest extends Main
{
	private $testId;
	private $identifier;
	private $typetest;
	private $regularization;

	public function setTestId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->testId = $value;
	}

	public function getTestId()
	{
		return $this->testId;
	}

	public function setIdentifier($value)
	{
		$this->Util()->ValidateString($value, 20, 1, 'Clave');
		$this->identifier = $value;
	}

	public function getIdentifier()
	{
		return $this->identifier;
	}

	public function setTypetest($value)
	{
		$this->Util()->ValidateString($value, 50, 1, 'Tipo');
		$this->typetest = $value;
	}

	public function getTypetest()
	{
		return $this->typetest;
	}

	public function setRegularization($value)
	{
		$this->Util()->ValidateString($value, 5, 1, 'Regularizacion');
		if($value == '*')
			$this->Util()->setError(50304, 'error', '', 'Regularizacion');
		$this->regularization = $value;
	}

	public function getRegularization()
	{
		return $this->regularization;
	}

	public function Enumerate()
	{
		$this->Util()->DB()->setQuery('SELECT * FROM typetest ORDER BY testId ASC');
		$result = $this->Util()->DB()->GetResult();
		return $result;
	}

	public function Info()
	{
		$this->Util()->DB()->setQuery("SELECT * FROM typetest WHERE testId = '".$this->testId."'");
		$row = $this->Util()->DB()->GetRow();
		if($row)
			$row = $this->Util()->EncodeRow($row);
		return $row;
	}
	
	public function InfoIdByTypetest($type = NULL)
	{
		if(is_null($type))
			$type = 'PARCIAL';
			
		$sql = "SELECT testId FROM typetest WHERE typetest = '" . $type . "'";
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetSingle();
		return $result;
	}

	public function Edit()
	{
		if($this->Util()->PrintErrors()){ return false; }

		$this->Util()->DB()->setQuery("
			UPDATE
				typetest
			SET
				`testId` = '".$this->testId."',
				`identifier` = '".utf8_decode($this->identifier)."',
				`typetest` = '".utf8_decode($this->typetest)."',
				`regularization` = '".$this->regularization."'
			WHERE testId = '".$this->testId."'");
		$this->Util()->DB()->UpdateData();
		$this->Util()->setError(50301, "complete");
		$this->Util()->PrintErrors();
		return true;
	}

	public function Save()
	{
		if($this->Util()->PrintErrors()){ return false; }

		//comprobamos que La clave del examen no se encuentre registrado
		$this->Util()->DB()->setQuery("SELECT * FROM typetest WHERE identifier = '" . $this->identifier . "'");
		$typetestInfo = $this->Util()->DB()->GetResult();
		if(count($typetestInfo) > 0)
		{
			$this->Util()->setError(50305, 'error');
			$this->Util()->PrintErrors();
			return false;
		}

		$this->Util()->DB()->setQuery("
			INSERT INTO
				typetest
			(
				`testId`,
				`identifier`,
				`typetest`,
				`regularization`
		)
		VALUES
		(
				'".$this->testId."',
				'".utf8_decode($this->identifier)."',
				'".utf8_decode($this->typetest)."',
				'".$this->regularization."'
		)");
		$this->Util()->DB()->InsertData();
		$this->Util()->setError(50302, "complete");
		$this->Util()->PrintErrors();
		return true;
	}

	public function Delete()
	{
		if($this->Util()->PrintErrors()){ return false; }
		
		$sql = "SELECT COUNT(*) FROM schedule_test WHERE typetestId = '" . $this->testId . "'";
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetSingle();
		if($result > 0)
		{
			$this->Util()->setError(50306, 'error');
			$this->Util()->PrintErrors();
			return false;
		}

		$this->Util()->DB()->setQuery("
			DELETE FROM
				typetest
			WHERE
				testId = '".$this->testId."'");
		$this->Util()->DB()->DeleteData();
		$this->Util()->setError(50303, "complete");
		$this->Util()->PrintErrors();
		return true;
	}

}

?>