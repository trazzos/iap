<?php

class ScheduleGroup extends Main
{
	private $scheduleGroupId;
	private $majorId;
	private $semesterId;
	private $groupId;
	private $userId;
	
	public function setScheduleGroupId($value)
	{
		$this->Util()->ValidateOption($value, "ID SchGrupo");		
		$this->scheduleGroupId = $value;
	}
			
	public function setMajorId($value)
	{
		$this->Util()->ValidateOption($value, "Carrera");
		$this->majorId = $value;
	}
	
	public function setSemesterId($value)
	{
		$this->Util()->ValidateOption($value, "Semestre");		
		$this->semesterId = $value;
	}
	
	public function setGroupId($value)
	{
		$this->Util()->ValidateOption($value, "Grupo");		
		$this->groupId = $value;
	}
	
	public function setUserId($value)
	{
		$this->userId = $value;
	}
		
	public function getScheduleGroupId()
	{
		return $this->scheduleGroupId;
	}
	
	public function getMajorId()
	{
		return $this->majorId;
	}
		
	public function getSemesterId()
	{
		return $this->semesterId;
	}
	
	public function setSubgpoId($value)
	{
		$this->subgpoId = $value;
	}
			
	public function Enumerate()
	{
		global $semester;
		global $group;
		global $major;
				
		$sql = "SELECT 
					* 
				FROM 
					`schedule_group`
				ORDER BY
					semesterId ASC";
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		foreach($result as $key => $row)
		{
			$group->setGroupId($row['groupId']);
			$result[$key]['group'] = $group->GetNameById();
			
			$semester->setSemesterId($row['semesterId']);
			$result[$key]['semester'] = $semester->GetNameById();
						
			$major->setMajorId($row['majorId']);
			$result[$key]['major'] = $major->GetNameById();
			
		}
		
		return $result;
	}
	
	public function Search()
	{
				
		$sql = "SELECT 
					* 
				FROM 
					`schedule_group`
				WHERE
					semesterId = ".$this->semesterId."
				AND
					majorId = ".$this->majorId."
				ORDER BY
					name ASC";
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		return $result;
	}
		
	public function Info()
	{
	
		$sql = "SELECT 
					* 
				FROM 
					`schedule_group` 
				WHERE 
					scheduleGroupId = '".$this->scheduleGroupId."'";
		
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();
		
		if($info)
			$row = $this->Util->EncodeRow($info);
		
		return $row;
	}
	
		
	public function Save(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "INSERT INTO 
					`schedule_group` 
					(
						majorId,						
						semesterId, 						
						groupId
					)
					 VALUES 
					 (
					 	".$this->majorId.",						
						".$this->semesterId.",						
						'".$this->groupId."'
					)";	
					
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$this->Util()->setError(10038, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
		
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "UPDATE 
					`schedule_group` 
				SET 
					majorId = ".$this->majorId.",
					semesterId = ".$this->semesterId.",
					groupId = ".$this->groupId."	
				WHERE 
					scheduleGroupId = ".$this->scheduleGroupId;
						
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$this->Util()->setError(10040, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "DELETE FROM 
					`schedule_group`
				WHERE 
					scheduleGroupId = ".$this->scheduleGroupId;		
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$this->DeleteScheduleById();
			
		$this->Util()->setError(10039, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	function GetSchGpoIdByIds(){
		
		$sql = 'SELECT scheduleGroupId FROM schedule_group 
				WHERE majorId = "'.$this->majorId.'" 
				AND semesterId = "'.$this->semesterId.'" 
				AND groupId = "'.$this->groupId.'"';		
		$this->Util()->DB()->setQuery($sql);
		$schGpoId = $this->Util()->DB()->GetSingle();
		
		return $schGpoId;
	}
	
	/* Schedule Functions */
	
	public function AddSubjectSchedule(){
		
		global $subject;
		
		if(!isset($_SESSION['basket']))
			$_SESSION['basket'] = new Basket;
			
		$basket = $_SESSION['basket'];
		
		$subgpoId = $this->subgpoId;
		
		if($basket->ExistItem($subgpoId))
			return 'exist';
		else{			
						
			$subject->setGroupId($subgpoId);
			
			$subjectId = $subject->GetGroupSubjectId();
			$subject->setSubjectId($subjectId);
			$subjectName = utf8_encode($subject->GetNameById($subjectId));
								
			if(!$subject->AllowStudentInGroup()){			
							
				return 'limit';				
				
			}elseif($subject->DuplicatedSubjectSchedule()){
			
				return 'duplicated';
			
			}else{
				$basket->AddItem($this->subgpoId);
				return 'ok';
			}
		}
	}
	
	public function DelSubjectSchedule(){
		
		if(!isset($_SESSION['basket']))
			$_SESSION['basket'] = new Basket;
			
		$basket = $_SESSION['basket'];
		
		$basket->RemoveItem($this->subgpoId);
		
	}
	
	public function SaveSchedule(){
	
		global $subject;
				
		if(!isset($_SESSION['basket']))
			$_SESSION['basket'] = new Basket;
			
		$basket = $_SESSION['basket'];
		
		$total = $basket->GetTotalItems();
		
		if($total == 0){
			
			$this->Util()->setError(10053, "error");
			$this->Util()->PrintErrors();
			
			return false;
			
		}					
		
		$this->Util()->setError(10054, "complete");
		$this->Util()->PrintErrors();
					
		return true;
	
	}
	
	function LoadSubgposSchedule(){
		
		global $subject;
		
		if(!isset($_SESSION['basket']))
			$_SESSION['basket'] = new Basket;
			
		$basket = $_SESSION['basket'];
		
		$sql = 'SELECT * FROM schgpo_subject WHERE scheduleGroupId = "'.$this->scheduleGroupId.'"';
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
				
		$subjects = array();
		foreach($result as $key => $res){
			
			$subgpoId = $res['subgpoId'];
						
			$card['subgpoId'] = $subgpoId;
			
			$basket->AddItem($subgpoId);
			
			$subject->setGroupId($subgpoId);
			$inf = $subject->InfoGroup();
						
			$subject->setSubjectId($inf['subjectId']);			
			$card['name'] = $subject->GetNameById();
			$subjects[$key] = $card;
		}
		
		return $subjects;
	
	}
	
	public function SaveScheduleBd(){
	
		global $subject;
		global $periodo;
		global $user;
		
		if(!isset($_SESSION['basket']))
			$_SESSION['basket'] = new Basket;
			
		$basket = $_SESSION['basket'];
				
		$total = $basket->GetTotalItems();
		
		if($total == 0){
			$this->Util()->setError(10077, "error");
			$this->Util()->PrintErrors();
			return false;
		}
		
		$items = $basket->GetItems();
						
		$periodoId = $periodo->GetPeriodoActive();
		$date = date('d-m-Y');
		
		//Getting The Current Registration
		
		/*
		$user->setUserId($userId);
				
		$user->setPeriodoId($periodoId);
		$registrationId = $user->GetCurrentRegistrationId();
		
		if($registrationId){
			
			//Borrando Actas
			$sqlQuery = 'SELECT * FROM user_subject WHERE registrationId = '.$registrationId;
			$this->Util()->DB()->setQuery($sqlQuery);
			$result = $this->Util()->DB()->GetResult();
			
			foreach($result as $res){
				
				$sqlQuery = 'SELECT * FROM gradereport 
						 	 WHERE groupId = '.$res['subgpoId'].'
						 	 AND periodoId = '.$res['periodoId'];
				$this->Util()->DB()->setQuery($sqlQuery);
				$gradereportId = $this->Util()->DB()->GetSingle();
				
				$sqlQuery = 'DELETE FROM gradereport_user 
							 WHERE gradereportId = '.$gradereportId.' AND alumnoId = '.$res['alumnoId'];
				$this->Util()->DB()->setQuery($sqlQuery);
				$this->Util()->DB()->ExecuteQuery();
			
			}//foreach
			
			$sqlQuery = 'DELETE FROM user_subject WHERE registrationId = '.$registrationId;
			$this->Util()->DB()->setQuery($sqlQuery);
			$this->Util()->DB()->ExecuteQuery();	
		
		}else{
		
			//Saving Register
			
			$sqlQuery = 'INSERT INTO 
							registration 
							(
								userId, 
								periodoId, 
								dateRegister
							)
							VALUES
							(
								'.$userId.', 
								'.$periodoId.', 
								"'.$date.'"
							)';
			$this->Util()->DB()->setQuery($sqlQuery);
			$registrationId = $this->Util()->DB()->InsertData();
		
		}//else		
		*/			
		//Saving Subjects
		
		foreach($items as $res){
						
			$subgpoId = $res[0];
			
			$subject->setGroupId($subgpoId);
			$inf = $subject->InfoGroup();
			
			$subjectId = $inf['subjectId'];
								
			$subject->setSubjectId($subjectId);
			$sub = $subject->Info();
			
			$semesterId = $sub['semesterId'];
							
			$sql = "INSERT INTO 
						`schgpo_subject` 
						(							
							scheduleGroupId,
							subgpoId, 
							subjectId, 
							semesterId, 
							periodoId
						)
						 VALUES 
						 (							
							'".$this->scheduleGroupId."',
							'".$subgpoId."',
							'".$subjectId."',
							'".$semesterId."', 
							'".$periodoId."'
						)";		
						
			$this->Util()->DB()->setQuery($sql);
			$this->Util()->DB()->ExecuteQuery();
			/*
			//Saving actas
			$sqlQuery = 'SELECT * FROM gradereport 
						 WHERE groupId = '.$subgpoId.'
						 AND periodoId = '.$periodoId;
			$this->Util()->DB()->setQuery($sqlQuery);
			$gradereportId = $this->Util()->DB()->GetSingle();			
			
			//Obtenemos los parciales
			$sqlQuery = 'SELECT * FROM schedule_test WHERE typetestId = 1 AND periodoId = '.$periodoId;
			$this->Util()->DB()->setQuery($sqlQuery);
			$result2 = $this->Util()->DB()->GetResult();
			
			foreach($result2 as $val){
			
				$scheduletestId =  $val['scheduletestId'];
				$sqlQuery = 'INSERT INTO gradereport_user (gradereportId, alumnoId, testIdentifier, datetest, gradescore, scheduletestId)
						 	 VALUES ('.$gradereportId.', '.$userId.', "PARCIAL", "'.$val['datetest'].'", -2.00, '.$val['scheduletestId'].')';		
				$this->Util()->DB()->setQuery($sqlQuery);
				$this->Util()->DB()->InsertData();
								
			}			
			*/
		}//foreach
		
		$_SESSION['basket'] = '';
		unset($_SESSION['basket']);			
		
		$this->Util()->setError(10054, "complete");
		$this->Util()->PrintErrors();
					
		return true;
	
	}
	
	function GetScheduleBySchGpoId(){
		
		$sql = 'SELECT * FROM schgpo_subject WHERE scheduleGroupId = "'.$this->scheduleGroupId.'"';
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	function DeleteScheduleById(){
		
		$sql = 'DELETE FROM schgpo_subject WHERE scheduleGroupId = "'.$this->scheduleGroupId.'"';
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$this->Util()->setError(10058, "complete");
		$this->Util()->PrintErrors();
		
		return true;
	
	}
	
	function print_schedule($schGpoId){
		
		global $periodo;
		global $scheduleTime;
		global $classroom;
		global $subject;
		global $semester;
		global $major;
		global $group;
		
		$periodoId = $periodo->GetPeriodoActive();
		$scheduleTime->setPeriodoId($periodoId);
		$time = $scheduleTime->Enumerate();
		
		$this->setScheduleGroupId($schGpoId);
		$scheduleUser = $this->GetScheduleBySchGpoId();		
				
		$infG = $this->Info();
						
		$major->setMajorId($infG['majorId']);
		$carrera = $major->GetNameById();
		
		$semester->setSemesterId($infG['semesterId']);
		$semestre = $semester->GetNameById();
		
		$group->setGroupId($infG['groupId']);
		$grupo = $group->GetNameById();
					
		foreach($scheduleUser as $row){
			
			$card = array();
			
			$subgpoId = $row['subgpoId'];
			
			$subject->setGroupId($subgpoId);
			$schGroup = $subject->EnumerateScheduleByGroup();
			
			foreach($schGroup as $val){
			
				$day = $val['day'];
				$schtimeId = $val['schtimeId'];
				
				$subject->setGroupId($subgpoId);
				$inf = $subject->InfoGroup();
				
				$classroom->setClassroomId($inf['classroomId']);
				$classRoomName = $classroom->GetNameById();
							
				$subject->setSubjectId($inf['subjectId']);
				
				$card['subject'] = $subject->GetNameById();				
				$card['group'] = $inf['clave'];
				$card['classRoom'] = $classRoomName;
				
				$assign[$schtimeId][$day] = $card;
				
			}//foreach
						
		}			
		
		$pdf = new PDF_MC_Table();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(0,0,'HORARIO DE CLASES',0,0,'C');
		$pdf->Ln(10);
		$pdf->Cell(0,0,'CARRERA: '.$carrera);
		$pdf->Ln(5);
		$pdf->Cell(0,0,'SEMESTRE: '.$semestre);
		$pdf->Ln(5);
		$pdf->Cell(0,0,'GRUPO: '.$grupo);
		$pdf->Ln(5);
		
		$pdf->SetFont('Arial','B',8);		
					
		$pdf->SetWidths(array(35,30,30,30,30,30));
		$pdf->Row(array('','Lunes','Martes','Miércoles','Jueves','Viernes'));
					
		foreach($time as $val){
		
			$schtimeId = $val['schtimeId'];
			$hrTime = $val['hrStart'].' - '.$val['hrEnd'];
			$desc1 = $assign[$schtimeId][1]['subject']."\n";
			if($assign[$schtimeId][1]['group'])
				$desc1 .= $assign[$schtimeId][1]['group'].' - ';
			$desc1 .= $assign[$schtimeId][1]['classRoom'];
			
			$desc2 = $assign[$schtimeId][2]['subject']."\n";
			if($assign[$schtimeId][2]['group'])
				$desc2 .= $assign[$schtimeId][2]['group'].' - ';
			$desc2 .= $assign[$schtimeId][2]['classRoom'];
			
			$desc3 = $assign[$schtimeId][3]['subject']."\n";
			if($assign[$schtimeId][3]['group'])
				$desc3 .= $assign[$schtimeId][3]['group'].' - ';
			$desc3 .= $assign[$schtimeId][3]['classRoom'];
			
			$desc4 = $assign[$schtimeId][4]['subject']."\n";
			if($assign[$schtimeId][4]['group'])
				$desc4 .= $assign[$schtimeId][4]['group'].' - ';
			$desc4 .= $assign[$schtimeId][4]['classRoom'];
			
			$desc5 = $assign[$schtimeId][5]['subject']."\n";
			if($assign[$schtimeId][5]['group'])
				$desc5 .= $assign[$schtimeId][5]['group'].' - ';
			$desc5 .= $assign[$schtimeId][5]['classRoom'];
						
			$pdf->Row(array($hrTime,$desc1,$desc2,$desc3,$desc4,$desc5));				
			
		}			
		
		$pdf->Output("horario.pdf","D");		
	
	}//print_schedule
		
}


?>