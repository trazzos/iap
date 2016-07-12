<?php 

class ScheduleTime extends Main
{
	private $schtimeId;
	private $hr_start;
	private $min_start;
	private $hr_end;
	private $min_end;
	private $free_time;
	private $description;
	private $periodoId;

	public function setSchtimeId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->schtimeId = $value;
	}

	public function getSchtimeId()
	{
		return $this->schtimeId;
	}

	public function setHr_start($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->hr_start = $value;
	}

	public function getHr_start()
	{
		return $this->hr_start;
	}

	public function setMin_start($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->min_start = $value;
	}

	public function getMin_start()
	{
		return $this->min_start;
	}
		
	public function setHr_end($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->hr_end = $value;
	}

	public function getHr_end()
	{
		return $this->hr_end;
	}

	public function setMin_end($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->min_end = $value;
	}

	public function getMin_end()
	{
		return $this->min_end;
	}
	
	public function setFree_time($value)
	{
		$this->free_time = $value;
	}

	public function getFree_time()
	{
		return $this->free_time;
	}
	
	public function setDescription($value)
	{
		$this->description = $value;
	}

	public function getDescription()
	{
		return $this->description;
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
		
		$sql = 'SELECT 
					* 
				FROM 
					schedule_time 
				WHERE
					periodoId = '.$this->periodoId.'
				ORDER BY 
					hr_start ASC, 
					min_start ASC';		
				
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();

		foreach($result as $key => $val)
		{
			$card['schtimeId'] = $val['schtimeId'];
			$card['description'] = $val['description'];
			$card['free_time'] = $val['free_time'];
		
			$hrStart = $val['hr_start'];
			if($hrStart <= 9)
				$hrStart = '0'.$hrStart;
			
			$hrEnd = $val['hr_end'];
			if($hrEnd <= 9)
				$hrEnd = '0'.$hrEnd;
			
			$minStart = $val['min_start'];
			if($minStart <= 9)
				$minStart = '0'.$minStart;
			
			$minEnd = $val['min_end'];
			if($minEnd <= 9)
				$minEnd = '0'.$minEnd;
			
			$card['hrStart'] = $hrStart.':'.$minStart;
			$card['hrEnd'] = $hrEnd.':'.$minEnd;
			
			$hrs[$key] = $card;
		}
		
		return $hrs;	
	}
	

	public function Info()
	{
		$this->Util()->DB()->setQuery("SELECT * FROM schedule_time WHERE schtimeId = '".$this->schtimeId."'");
		$row = $this->Util()->DB()->GetRow();
		return $row;
	}

	public function Edit()
	{
		if($this->Util()->PrintErrors()){ return false; }

		$this->Util()->DB()->setQuery("
			UPDATE
				schedule_time
			SET
				`schtimeId` = '".$this->schtimeId."',
				`hr_start` = '".$this->hr_start."',
				`min_start` = '".$this->min_start."',
				`hr_end` = ".$this->hr_end.",
				`min_end` = ".$this->min_end.",				
				`free_time` = '".$this->free_time."',
				`description` = '".$this->description."'
			WHERE schtimeId = '".$this->schtimeId."'");
		$this->Util()->DB()->UpdateData();

		$this->Util()->setError(10036, "complete");
		$this->Util()->PrintErrors();
		
		return true;
	}

	public function Save()
	{
		if($this->Util()->PrintErrors()){ return false; }

		$this->Util()->DB()->setQuery("
			INSERT INTO
				schedule_time
			(				
				`hr_start`,
				`min_start`,
				`hr_end`,
				`min_end`,
				`periodoId`,
				`free_time`,
				`description`
		)
		VALUES
		(				
				".$this->hr_start.",
				".$this->min_start.",
				".$this->hr_end.",
				".$this->min_end.",
				".$this->periodoId.",
				'".$this->free_time."',
				'".$this->description."'
		);");
		$this->Util()->DB()->InsertData();
		$this->Util()->setError(10034, "complete");
		$this->Util()->PrintErrors();
		return true;
	}

	public function Delete()
	{
		if($this->Util()->PrintErrors()){ return false; }

		$this->Util()->DB()->setQuery("
			DELETE FROM
				schedule_time
			WHERE
				schtimeId = '".$this->schtimeId."'");
		$this->Util()->DB()->DeleteData();
		$this->Util()->setError(10035, "complete");
		$this->Util()->PrintErrors();
		return true;
	}
	
	function print_pdf($personalId){
		
		global $personal;
		global $periodo;
		global $subject;
		
		$periodoId = $periodo->GetPeriodoActive();
		
		$personal->setPersonalId($personalId);
		$name = strtoupper($personal->GetNameById());
		
		$this->setPeriodoId($periodoId);
		$time = $this->Enumerate();	
		
		$subject->setPersonalId($personalId);
		$subject->setPeriodoId($periodoId);
		$subjectGroups = $subject->EnumerateGroupByPersonal();
		
		foreach($subjectGroups as $row){
			
			$card = array();
			
			if($row['recursamiento'] == 0){
				
				$subgpoId = $row['subgpoId'];
				$subjectId = $row['subjectId'];
				
				$subject->setSubjectId($subjectId);
				$subjectName = $subject->GetNameById();
				$group = $row['clave'];
						
				$subject->setGroupId($subgpoId);
				$gpoTimes = $subject->EnumerateScheduleByGroup();
				foreach($gpoTimes as $val){
					$day = $val['day'];
					$schtimeId = $val['schtimeId'];
					
					$card["subject"] = $subjectName;
					$card["group"] = $group;			
					
					$assign[$schtimeId][$day] = $card;
							
				}//foreach
			
			}//if
						
		}//foreach
			
		$pdf = new PDF_MC_Table();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(40,10,'HORARIO DE CLASES');
		$pdf->Ln(5);
		$pdf->Cell(40,10,$name,0,1);
		$pdf->Ln();
		
		$pdf->SetWidths(array(35,30,30,30,30,30));
		$pdf->Row(array('','Lunes','Martes','Miércoles','Jueves','Viernes'));
		
		$pdf->SetFont('Arial','B',8);
		
		foreach($time as $val){
		
			$schtimeId = $val['schtimeId'];
			$hrTime = $val['hrStart'].' - '.$val['hrEnd'];
			$desc1 = $assign[$schtimeId][1]['subject']."\n".$assign[$schtimeId][1]['group'];
			$desc2 = $assign[$schtimeId][2]['subject']."\n".$assign[$schtimeId][2]['group'];
			$desc3 = $assign[$schtimeId][3]['subject']."\n".$assign[$schtimeId][3]['group'];
			$desc4 = $assign[$schtimeId][4]['subject']."\n".$assign[$schtimeId][4]['group'];
			$desc5 = $assign[$schtimeId][5]['subject']."\n".$assign[$schtimeId][5]['group'];
						
			$pdf->Row(array($hrTime,$desc1,$desc2,$desc3,$desc4,$desc5));				
			
		}
		
		$pdf->Output("horario.pdf","D");
		
	
	}//print_pdf
	
	function print_pdf_subject($subjectId){
		
		global $personal;
		global $periodo;
		global $subject;
		global $classroom;
		
		$periodoId = $periodo->GetPeriodoActive();
				
		$this->setPeriodoId($periodoId);
		$time = $this->Enumerate();	
		
		$subject->setSubjectId($subjectId);
		
		$subjectName = $subject->GetNameById();
		
		$subject->setPeriodoId($periodoId);
		$subjectGroups = $subject->EnumerateGroup();
		$groups = $subjectGroups;
		
		foreach($subjectGroups as $row){
			
			$card = array();
			
			$subgpoId = $row['subgpoId'];
			$personalId = $row['personalId'];
			$classroom->setClassroomId($row['classroomId']);
			$salon = $classroom->GetNameById();
		
			$personal->setPersonalId($personalId);
			$personalName = $personal->GetNameById();
								
			$subject->setGroupId($subgpoId);
			$gpoTimes = $subject->EnumerateScheduleByGroup();
			foreach($gpoTimes as $val){
				$day = $val['day'];
				$schtimeId = $val['schtimeId'];
				
				$card["personal"] = $personalName;
				$card["salon"] = $salon;		
				
				$assign[$subgpoId][$schtimeId][$day] = $card;
						
			}
						
		}
			
		$pdf = new PDF_MC_Table();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(40,10,'HORARIO DE CLASES - '.strtoupper($subjectName));
				
		$pdf->SetFont('Arial','B',8);
		
		foreach($groups as $val){
			
			$subgpoId = $val['subgpoId'];
			
			$pdf->Ln(5);
			$pdf->Cell(40,10,'GRUPO: '.$val['clave'],0,1);
					
			$pdf->SetWidths(array(35,30,30,30,30,30));
			$pdf->Row(array('','Lunes','Martes','Miércoles','Jueves','Viernes'));
						
			foreach($time as $val){
			
				$schtimeId = $val['schtimeId'];
				$hrTime = $val['hrStart'].' - '.$val['hrEnd'];
				$desc1 = $assign[$subgpoId][$schtimeId][1]['personal']."\n".$assign[$subgpoId][$schtimeId][1]['salon'];
				$desc2 = $assign[$subgpoId][$schtimeId][2]['personal']."\n".$assign[$subgpoId][$schtimeId][2]['salon'];
				$desc3 = $assign[$subgpoId][$schtimeId][3]['personal']."\n".$assign[$subgpoId][$schtimeId][3]['salon'];
				$desc4 = $assign[$subgpoId][$schtimeId][4]['personal']."\n".$assign[$subgpoId][$schtimeId][4]['salon'];
				$desc5 = $assign[$subgpoId][$schtimeId][5]['personal']."\n".$assign[$subgpoId][$schtimeId][5]['salon'];
							
				$pdf->Row(array($hrTime,$desc1,$desc2,$desc3,$desc4,$desc5));				
				
			}
			
		}//foreach
		
		$pdf->Output("horario.pdf","D");
		
	
	}//print_pdf_subject
	
	

}

?>