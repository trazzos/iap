<?php 

class TypeCalif extends Main
{
	private $typeCalifId;
	private $identifier;
	private $name;
	
	public function setTypeCalifId($value){
		$this->typeCalifId = $value;
	}
	
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

	public function setName($value)
	{
		$this->Util()->ValidateString($value, 50, 1, 'Name');
		$this->name = $value;
	}

	public function getTypetest()
	{
		return $this->typetest;
	}

	public function Enumerate()
	{
		$this->Util()->DB()->setQuery('SELECT * FROM type_calif ORDER BY typeCalifId ASC');
		$result = $this->Util()->DB()->GetResult();
		return $result;
	}

	public function Info()
	{
		$this->Util()->DB()->setQuery("SELECT * FROM type_calif WHERE typeCalifId = '".$this->typeCalifId."'");
		$row = $this->Util()->DB()->GetRow();
		if($row)
			$row = $this->Util()->EncodeRow($row);
		return $row;
	}
}

?>