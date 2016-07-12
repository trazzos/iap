<?php 

class Report extends Main
{	
	private $periodoId;
	private $semesterId;
	private $groupId;
	private $majorId;
	private $pdf;
	private $semsId;
	private $userId;
	private $average;
		
	public function setPeriodoId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->periodoId = $value;
	}

	public function getPeriodoId()
	{
		return $this->periodoId;
	}
	
	public function setSemesterId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->semesterId = $value;
	}
	
	public function setSemsId($value)
	{
		$this->semsId = $value;
	}

	public function getSemesterId()
	{
		return $this->semesterId;
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
	
	public function setMajorId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->majorId = $value;
	}
	
	public function setUserId($value)
	{
		$this->userId = $value;
	}
	
	public function EnumerateStudents($limit = '',$sqlFilter = '')
	{
		
		if($this->groupId)
			$sqlGroup = ' AND groupId = '.$this->groupId;
				
		$sqlQuery = 'SELECT 
						* 
					FROM 
						user 
					WHERE
						semesterId = '.$this->semesterId.$sqlGroup.$sqlFilter.'					
					ORDER BY 
						lastNamePaterno ASC, 
						lastNameMaterno ASC,
						names ASC 
					'.$limit;		

		$this->Util()->DB()->setQuery($sqlQuery);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;	
	}
	
	function GetHeaderRedi(){
	
		global $institution;
		global $semester;
		global $group;
		global $periodo;
		global $major;
		global $util;
				
		$institution->setInstitutionId(1);
		$info = $institution->Info();
		
		$plantel = $info['name'];
		$clave = $info['identifier'];
		$ubicacion = $info['ubication'];
		
		$semester->setSemesterId($this->semesterId);
		$semestre = $semester->GetNameById();
		
		$group->setGroupId($this->groupId);
		$infG = $group->Info();
		$grupo = $infG['clave'];
		
		//Obtenemos la carrera del grupo
		$major->setMajorId($this->majorId);
		$infM = $major->Info();
		$carrera = strtoupper($infM['name']);
		$ofiAut = strtoupper($infM['authorization']);
		
		//Obtenemos la información del periodo
		$periodoId = $periodo->GetPeriodoActive();
		$periodo->setPeriodoId($periodoId);
		$infP = $periodo->Info();
		$periodoName = strtoupper($infP['name']);
		
		//Obtenemos la generación del alumno de acuerdo al semestre y periodo
		$generacion = $util->GetGeneration($infP['starts'], $infP['ends'], $semestre);
					
		$this->pdf->Rect(10,10,190,58);
		
		$this->pdf->Image(WEB_ROOT.'/images/logos/sep_logo.jpg',170,13,25,15);
		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(0,10,'SECRETARIA DE EDUCACION PUBLICA',0,0,'C');
		$this->pdf->Ln(5);
		$this->pdf->Cell(0,10,'SUBSECRETARIA DE EDUCACION MEDIA SUPERIOR',0,0,'C');
		$this->pdf->Ln(5);
		$this->pdf->Cell(0,10,'DIRECCION GENERAL DE EDUCACION TECNOLOGICA AGROPECUARIA',0,0,'C');
		$this->pdf->Ln();
		$this->pdf->Cell(0,10,'REPORTE DE INSCRIPCION Y REINSCRIPCION (REDI)',0,0,'C');
			
		$this->pdf->Ln(12);
		$this->pdf->Cell(55,5,'PLANTEL SEDE Y UBICACION:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(55,5, $plantel);
		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(30,5,'CLAVE DE C.T.:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(0,5, $clave);
		
		$this->pdf->Ln();
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(55,5,'EXTENSION Y UBICACION:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(0,5, $ubicacion);
		
		$this->pdf->Ln();
		$this->pdf->SetFont('Arial','B',10);		
		$this->pdf->Cell(25,5,'CARRERA:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(85,5,$carrera);
		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(30,5,'SEMESTRE:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(10,5, $semestre);
		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(20,5,'GRUPO:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(0,5, $grupo);
		
		$this->pdf->Ln();
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(40,5,'PERIODO ESCOLAR:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(70,5, $periodoName);
		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(30,5,'GENERACION:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(0,5,$generacion);
		
		$this->pdf->Ln();
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(50,5,'OFICIO DE AUTORIZACION:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(0,5,$ofiAut);
	
	}//GetHeaderRedi
	
	function GetHeaderBoleta(){
	
		global $institution;
		global $semester;
		global $group;
		global $periodo;
		global $student;
		global $major;
		
		$institution->setInstitutionId(1);
		$info = $institution->Info();
		
		$plantel = $info['name'];
		$clave = $info['identifier'];
		$ubicacion = $info['ubication'];
		
		$student->setUserId($this->userId);
		$infS = $student->GetInfo();
		
		$nombre = $infS['names'].' '.$infS['lastNamePaterno'].' '.$infS['lastNameMaterno'];
		
		$semester->setSemesterId($this->semesterId);
		$semestre = $semester->GetNameById();
		
		$group->setGroupId($infS['groupId']);
		$grupo = $group->GetNameById();
		
		$major->setMajorId($infS['majorId']);
		$carrera = strtoupper($major->GetNameById());
				
		$periodo->setPeriodoId($this->periodoId);
		$periodoName = $periodo->GetNameById();
				
		$this->pdf->Rect(10,10,190,63);
		
		$this->pdf->Image(WEB_ROOT.'/images/logos/sep_logo.jpg',170,13,25,15);
		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(0,10,'SECRETARIA DE EDUCACION PUBLICA',0,0,'C');
		$this->pdf->Ln(5);
		$this->pdf->Cell(0,10,'SUBSECRETARIA DE EDUCACION MEDIA SUPERIOR',0,0,'C');
		$this->pdf->Ln(5);
		$this->pdf->Cell(0,10,'DIRECCION GENERAL DE EDUCACION TECNOLOGICA AGROPECUARIA',0,0,'C');
		$this->pdf->Ln();
		$this->pdf->Cell(0,10,'BOLETA DE CALIFICACIONES',0,0,'C');
		
		$this->pdf->Ln(12);
		$this->pdf->Cell(55,5,'PLANTEL SEDE Y UBICACION:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(55,5, $plantel);
		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(30,5,'CLAVE DE C.T.:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(0,5, $clave);
		
		$this->pdf->Ln();
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(55,5,'EXTENSION Y UBICACION:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(0,5, $ubicacion);
			
		$this->pdf->Ln();
		$this->pdf->SetFont('Arial','B',10);		
		$this->pdf->Cell(29,5,'NO. CONTROL:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(83,5, $infS['controlNumber']);
		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(30,5,'SEMESTRE:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(10,5, $semestre);
				
		$this->pdf->Ln();
		$this->pdf->SetFont('Arial','B',10);		
		$this->pdf->Cell(29,5,'NOMBRE:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(83,5, $nombre);
		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(30,5,'GRUPO:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(10,5, $grupo);
		
		$this->pdf->Ln();
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(29,5,'ESPECIALIDAD:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(83,5, $carrera);
		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(20,5,'PERIODO:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(0,5,$periodoName);
		
		$this->pdf->Ln();
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(45,5,'PROMEDIO SEMESTRAL:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(67,5, $this->average);
		
	
	}//GetHeaderBoleta
	
	function GetHeaderBoletaParcial(){
	
		global $institution;
		global $semester;
		global $group;
		global $periodo;
		global $student;
		global $major;
		
		$institution->setInstitutionId(1);
		$info = $institution->Info();
		
		$plantel = $info['name'];
		$clave = $info['identifier'];
		$ubicacion = $info['ubication'];
		
		$student->setUserId($this->userId);
		$infS = $student->GetInfo();
		
		$nombre = $infS['names'].' '.$infS['lastNamePaterno'].' '.$infS['lastNameMaterno'];
		
		$semester->setSemesterId($this->semesterId);
		$semestre = $semester->GetNameById();
		
		$group->setGroupId($infS['groupId']);
		$grupo = $group->GetNameById();
		
		$major->setMajorId($infS['majorId']);
		$carrera = strtoupper($major->GetNameById());
				
		$periodo->setPeriodoId($this->periodoId);
		$periodoName = $periodo->GetNameById();
				
		$this->pdf->Rect(10,10,190,63);
		
		$this->pdf->Image(WEB_ROOT.'/images/logos/sep_logo.jpg',170,13,25,15);
		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(0,10,'SECRETARIA DE EDUCACION PUBLICA',0,0,'C');
		$this->pdf->Ln(5);
		$this->pdf->Cell(0,10,'SUBSECRETARIA DE EDUCACION MEDIA SUPERIOR',0,0,'C');
		$this->pdf->Ln(5);
		$this->pdf->Cell(0,10,'DIRECCION GENERAL DE EDUCACION TECNOLOGICA AGROPECUARIA',0,0,'C');
		$this->pdf->Ln();
		$this->pdf->Cell(0,10,'BOLETA DE CALIFICACIONES PARCIALES',0,0,'C');
		
		$this->pdf->Ln(12);
		$this->pdf->Cell(55,5,'PLANTEL SEDE Y UBICACION:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(55,5, $plantel);
		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(30,5,'CLAVE DE C.T.:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(0,5, $clave);
		
		$this->pdf->Ln();
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(55,5,'EXTENSION Y UBICACION:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(0,5, $ubicacion);
			
		$this->pdf->Ln();
		$this->pdf->SetFont('Arial','B',10);		
		$this->pdf->Cell(29,5,'NO. CONTROL:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(83,5, $infS['controlNumber']);
		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(30,5,'SEMESTRE:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(10,5, $semestre);
				
		$this->pdf->Ln();
		$this->pdf->SetFont('Arial','B',10);		
		$this->pdf->Cell(29,5,'NOMBRE:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(83,5, $nombre);
		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(30,5,'GRUPO:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(10,5, $grupo);
		
		$this->pdf->Ln();
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(29,5,'ESPECIALIDAD:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(83,5, $carrera);
		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(20,5,'PERIODO:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(0,5,$periodoName);
		
		$this->pdf->Ln();
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(45,5,'');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(67,5,'');
		
	
	}//GetHeaderBoletaParcial
	
	function GetHeaderBoletaHist(){
	
		global $institution;
		global $semester;
		global $group;
		global $periodo;
		global $student;
		global $major;
		
		$institution->setInstitutionId(1);
		$info = $institution->Info();
		
		$plantel = $info['name'];
		$clave = $info['identifier'];
		$ubicacion = $info['ubication'];
		
		$student->setUserId($this->userId);
		$infS = $student->GetInfo();
		
		$nombre = $infS['names'].' '.$infS['lastNamePaterno'].' '.$infS['lastNameMaterno'];
		
		$semester->setSemesterId($this->semesterId);
		$semestre = $semester->GetNameById();
		
		$group->setGroupId($infS['groupId']);
		$grupo = $group->GetNameById();
		
		$major->setMajorId($infS['majorId']);
		$carrera = strtoupper($major->GetNameById());
				
		$this->pdf->Rect(10,10,190,28);
		
		$this->pdf->Image(WEB_ROOT.'/images/logos/sep_logo.jpg',175,13,20,12);
		
		$this->pdf->SetFont('Arial','B',7);
		$this->pdf->Cell(0,5,'SECRETARIA DE EDUCACION PUBLICA',0,0,'C');
		$this->pdf->Ln(3);
		$this->pdf->Cell(0,5,'SUBSECRETARIA DE EDUCACION MEDIA SUPERIOR',0,0,'C');
		$this->pdf->Ln(3);
		$this->pdf->Cell(0,5,'DIRECCION GENERAL DE EDUCACION TECNOLOGICA AGROPECUARIA',0,0,'C');
		$this->pdf->Ln(3);
		$this->pdf->Cell(0,5,'HISTORIAL DE CALIFICACIONES',0,0,'C');
		
		$this->pdf->Ln(5);
		$this->pdf->Cell(45,4,'PLANTEL SEDE Y UBICACION:');
		$this->pdf->SetFont('Arial','U',7);
		$this->pdf->Cell(65,4, $plantel);
		
		$this->pdf->SetFont('Arial','B',7);
		$this->pdf->Cell(30,4,'CLAVE DE C.T.:');
		$this->pdf->SetFont('Arial','U',7);
		$this->pdf->Cell(0,4, $clave);
		
		$this->pdf->Ln(3);
		$this->pdf->SetFont('Arial','B',7);
		$this->pdf->Cell(45,4,'EXTENSION Y UBICACION:');
		$this->pdf->SetFont('Arial','U',7);
		$this->pdf->Cell(0,4, $ubicacion);
			
		$this->pdf->Ln(3);
		$this->pdf->SetFont('Arial','B',7);		
		$this->pdf->Cell(26,4,'NOMBRE:');
		$this->pdf->SetFont('Arial','U',7);
		$this->pdf->Cell(84,4, $nombre);
		
		$this->pdf->SetFont('Arial','B',7);
		$this->pdf->Cell(30,4,'NO. CONTROL:');
		$this->pdf->SetFont('Arial','U',7);
		$this->pdf->Cell(10,4, $infS['controlNumber']);
						
		$this->pdf->Ln(3);
		$this->pdf->SetFont('Arial','B',7);
		$this->pdf->Cell(26,4,'ESPECIALIDAD:');
		$this->pdf->SetFont('Arial','U',7);
		$this->pdf->Cell(84,4, $carrera);
		
		$this->pdf->SetFont('Arial','B',7);
		$this->pdf->Cell(30,5,'GRUPO:');
		$this->pdf->SetFont('Arial','U',7);
		$this->pdf->Cell(10,5, $grupo);
		
		$this->pdf->SetFont('Arial','B',7);
		$this->pdf->Cell(30,5,'');
		$this->pdf->SetFont('Arial','U',7);
		$this->pdf->Cell(0,5,'');
		
	}//GetHeaderBoletaHist
	
	function GetHeaderBoletaConst(){
	
		global $institution;
		global $semester;
		global $group;
		global $periodo;
		global $student;
		global $major;
		
		$institution->setInstitutionId(1);
		$info = $institution->Info();
		
		$plantel = $info['name'];
		$clave = $info['identifier'];
		$ubicacion = $info['ubication'];
		$escuela = utf8_decode($info['name_long']);
		$clave = $info['identifier'];
		
		$student->setUserId($this->userId);
		$infS = $student->GetInfo();
		
		$nombre = $infS['names'].' '.$infS['lastNamePaterno'].' '.$infS['lastNameMaterno'];
		$controlNumber = $infS['controlNumber'];
		
		$major->setMajorId($infS['majorId']);
		$carrera = strtoupper($major->GetNameById());
		
		$semester->setSemesterId($infS['semesterId']);
		$sem = $semester->GetNameById();
		
		if($sem == 'I')
			$sem = 'el I ';
		else
			$sem = 'de I a '.$sem;
		
		/*
		$periodoId = $periodo->GetPeriodoActive();
		$periodo->setPeriodoId($periodoId);
		$periodoName = $periodo->GetNameById();
		*/			
		$this->pdf->Rect(10,10,190,43);
		
		$this->pdf->Image(WEB_ROOT.'/images/logos/sep_logo.jpg',170,13,25,15);
		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(0,10,'SECRETARIA DE EDUCACION PUBLICA',0,0,'C');
		$this->pdf->Ln(5);
		$this->pdf->Cell(0,10,'SUBSECRETARIA DE EDUCACION MEDIA SUPERIOR',0,0,'C');
		$this->pdf->Ln(5);
		$this->pdf->Cell(0,10,'DIRECCION GENERAL DE EDUCACION TECNOLOGICA AGROPECUARIA',0,0,'C');
		$this->pdf->Ln();
		$this->pdf->Cell(0,10,'CONSTANCIA DE CALIFICACIONES',0,0,'C');
		
		$this->pdf->Ln(12);
		$this->pdf->Cell(55,5,'PLANTEL SEDE Y UBICACION:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(55,5, $plantel);
		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(30,5,'CLAVE DE C.T.:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(0,5, $clave);
		
		$this->pdf->Ln();
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(55,5,'EXTENSION Y UBICACION:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(0,5, $ubicacion);
		
		$this->pdf->Ln(10);
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(55,5,'A QUIEN CORRESPONDA:');
		
		$this->pdf->Ln();
		$this->pdf->SetFont('Arial','',10);
		$this->pdf->MultiCell(0,5,'El que suscribe Subdirector Técnico del '.$escuela.' clave '.$clave.' de esta localidad, HACE CONSTAR que según documentos que existen en el archivo del plantel el (a): C. '.$nombre.' con el número de control '.$controlNumber.' curso '.$sem.' semestre del Bachillerato Tecnológico en la carrera de '.$carrera);
	
	}//GetHeaderBoletaConst
	
	function GetHeaderBaja(){
	
		global $institution;
		global $semester;
		global $group;
		global $periodo;
				
		$institution->setInstitutionId(1);
		$info = $institution->Info();
		
		$plantel = $info['name'];
		$clave = $info['identifier'];
		$ubicacion = $info['ubication'];
		
		$arrSems = explode(',',$this->semsId);
		
		foreach($arrSems as $val){
			if($val){
				$semester->setSemesterId($val);
				$semestres .= $semester->GetNameById();
				$semestres .= ', ';
			}
		}
		
		$group->setGroupId($this->groupId);
		$grupo = $group->GetNameById();
		
		$this->periodoId = $periodo->GetPeriodoActive();
		$periodo->setPeriodoId($this->periodoId);
		$periodoName = $periodo->GetNameById();
								
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(0,10,'SECRETARIA DE EDUCACION PUBLICA',0,0,'C');
		$this->pdf->Ln(5);
		$this->pdf->Cell(0,10,'SUBSECRETARIA DE EDUCACION MEDIA SUPERIOR',0,0,'C');
		$this->pdf->Ln(5);
		$this->pdf->Cell(0,10,'DIRECCION GENERAL DE EDUCACION TECNOLOGICA AGROPECUARIA',0,0,'C');
		$this->pdf->Ln();
		$this->pdf->Cell(0,10,'REPORTE DE BAJAS',0,0,'C');
			
		$this->pdf->Ln(12);
		$this->pdf->Cell(55,5,'PLANTEL SEDE Y UBICACION:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(110,5, $plantel);
		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(40,5,'CLAVE DE C.T.:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(0,5, $clave);
				
		$this->pdf->Ln();
		$this->pdf->SetFont('Arial','B',10);		
		$this->pdf->Cell(25,5,'CARRERA:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(140,5,'TECNICO AGROPECUARIO');
		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(40,5,'PERIODO ESCOLAR:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(70,5, $periodoName);
		
		$this->pdf->Ln();	
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(25,5,'SEMESTRE:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(0,5,$semestres);
			
	}//GetHeaderBaja
	
	function GetHeaderRegular(){
	
		global $institution;
		global $semester;
		global $group;
		global $periodo;
				
		$institution->setInstitutionId(1);
		$info = $institution->Info();
		
		$plantel = $info['name'];
		$clave = $info['identifier'];
		$ubicacion = $info['ubication'];
		
		$semester->setSemesterId($this->semesterId);
		$semestre = $semester->GetNameById();
								
		$group->setGroupId($this->groupId);
		$grupo = $group->GetNameById();
		
		$this->periodoId = $periodo->GetPeriodoActive();
		$periodo->setPeriodoId($this->periodoId);
		$periodoName = $periodo->GetNameById();
								
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(0,10,'SECRETARIA DE EDUCACION PUBLICA',0,0,'C');
		$this->pdf->Ln(5);
		$this->pdf->Cell(0,10,'SUBSECRETARIA DE EDUCACION MEDIA SUPERIOR',0,0,'C');
		$this->pdf->Ln(5);
		$this->pdf->Cell(0,10,'DIRECCION GENERAL DE EDUCACION TECNOLOGICA AGROPECUARIA',0,0,'C');
		$this->pdf->Ln();
		$this->pdf->Cell(0,10,'REPORTE DE ALUMNOS REGULARES E IRREGULARES',0,0,'C');
			
		$this->pdf->Ln(12);
		$this->pdf->Cell(55,5,'PLANTEL SEDE Y UBICACION:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(110,5, $plantel);
		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(40,5,'CLAVE DE C.T.:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(0,5, $clave);
				
		$this->pdf->Ln();
		$this->pdf->SetFont('Arial','B',10);		
		$this->pdf->Cell(25,5,'CARRERA:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(140,5,'TECNICO AGROPECUARIO');
		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(40,5,'PERIODO ESCOLAR:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(70,5, $periodoName);
		
		$this->pdf->Ln();	
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(25,5,'SEMESTRE:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(140,5,$semestre);
		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(40,5,'GENERACION:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(70,5, $generacion);
			
	}//GetHeaderRegular
	
	function GetHeaderDesercion(){
	
		global $institution;
		global $group;
		global $periodo;
				
		$institution->setInstitutionId(1);
		$info = $institution->Info();
		
		$plantel = $info['name'];
		$clave = $info['identifier'];
		$ubicacion = $info['ubication'];
												
		$this->periodoId = $periodo->GetPeriodoActive();
		$periodo->setPeriodoId($this->periodoId);
		$periodoName = $periodo->GetNameById();
								
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(0,10,'SECRETARIA DE EDUCACION PUBLICA',0,0,'C');
		$this->pdf->Ln(5);
		$this->pdf->Cell(0,10,'SUBSECRETARIA DE EDUCACION MEDIA SUPERIOR',0,0,'C');
		$this->pdf->Ln(5);
		$this->pdf->Cell(0,10,'DIRECCION GENERAL DE EDUCACION TECNOLOGICA AGROPECUARIA',0,0,'C');
		$this->pdf->Ln();
		$this->pdf->Cell(0,10,'INDICE DE REPROBACION Y DESERCION POR PLANTEL Y CARRERAS',0,0,'C');
			
		$this->pdf->Ln(12);
		$this->pdf->Cell(55,5,'PLANTEL SEDE Y UBICACION:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(110,5, $plantel);
		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(40,5,'CLAVE DE C.T.:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(0,5, $clave);
				
		$this->pdf->Ln();		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(40,5,'PERIODO ESCOLAR:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(70,5, $periodoName);
					
	}//GetHeaderDesercion
	
	function GetHeaderBajaRep(){
	
		global $institution;
		global $semester;
		global $group;
		global $periodo;
				
		$institution->setInstitutionId(1);
		$info = $institution->Info();
		
		$plantel = $info['name'];
		$clave = $info['identifier'];
		$ubicacion = $info['ubication'];
		
		$semester->setSemesterId($this->semesterId);
		$semestre = $semester->GetNameById();
				
		$periodoId = $periodo->GetPeriodoActive();
		$periodo->setPeriodoId($periodoId);
		$periodoName = $periodo->GetNameById();
					
		$this->pdf->Rect(10,10,190,48);
		
		$this->pdf->Image(WEB_ROOT.'/images/logos/sep_logo.jpg',170,13,25,15);
		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(0,10,'SECRETARIA DE EDUCACION PUBLICA',0,0,'C');
		$this->pdf->Ln(5);
		$this->pdf->Cell(0,10,'SUBSECRETARIA DE EDUCACION MEDIA SUPERIOR',0,0,'C');
		$this->pdf->Ln(5);
		$this->pdf->Cell(0,10,'DIRECCION GENERAL DE EDUCACION TECNOLOGICA AGROPECUARIA',0,0,'C');
		$this->pdf->Ln();
		$this->pdf->Cell(0,10,'REPORTE DE ALUMNOS QUE CAUSARON BAJA POR REPROBACION U OTROS MOTIVOS',0,0,'C');
			
		$this->pdf->Ln(12);
		$this->pdf->Cell(55,5,'PLANTEL SEDE Y UBICACION:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(55,5, $plantel);
		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(30,5,'CLAVE DE C.T.:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(0,5, $clave);
				
		$this->pdf->Ln();
		$this->pdf->SetFont('Arial','B',10);		
		$this->pdf->Cell(25,5,'CARRERA:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(85,5,'TECNICO AGROPECUARIO');
		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(30,5,'SEMESTRE:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(10,5, $semestre);
		
			
		$this->pdf->Ln();
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Cell(40,5,'PERIODO ESCOLAR:');
		$this->pdf->SetFont('Arial','U',10);
		$this->pdf->Cell(70,5, $periodoName);
		
		$this->pdf->Ln();
			
	}//GetHeaderBajaRep
	
	function GetFooterBaja(){
	
		global $personal;
		global $util;
				
		$personal->setPositionId(3);
		$pers = $personal->EnumerateByPosition();		
		$director = $pers[0]['name'];
		
		$personal->setPositionId(5);
		$pers = $personal->EnumerateByPosition();		
		$jefeSE = $pers[0]['name'];
		
		$anio = date('Y');
		$mes = $util->GetMonthByKey(intval(date('m')));
		$dia = date('d');
						
		$this->pdf->SetXY(40,155);
		$this->pdf->SetFont('Arial','U',9);
		$this->pdf->MultiCell(80,5, $director,0,'C');		
		$this->pdf->SetFont('Arial','B',9);
		$this->pdf->SetXY(40,160);
		$this->pdf->MultiCell(80,5,TIT_DIR.' DEL PLANTEL',0,'C');
		
		$this->pdf->SetXY(160,155);
		$this->pdf->SetFont('Arial','U',9);
		$this->pdf->MultiCell(80,5, $jefeSE,0,'C');		
		$this->pdf->SetXY(160,160);
		$this->pdf->SetFont('Arial','B',9);
		$this->pdf->MultiCell(80,5,'JEFE DEL DEPARTAMENTO DE SERVICIOS ESCOLARES',0,'C');
				
		$this->pdf->SetXY(40,175);
		$this->pdf->SetFont('Arial','U',9);
		$this->pdf->MultiCell(80,5,SUBDIR_ENLACE_OP,0,'C');		
		$this->pdf->SetXY(40,180);
		$this->pdf->SetFont('Arial','B',9);
		$this->pdf->MultiCell(80,5,'SUBDIRECTORA DE ENLACE OPERATIVO',0,'C');
		
		$this->pdf->SetXY(160,175);
		$this->pdf->SetFont('Arial','U',9);
		$this->pdf->MultiCell(80,5,DIR_TECNICO,0,'C');		
		$this->pdf->SetXY(160,180);
		$this->pdf->SetFont('Arial','B',9);
		$this->pdf->MultiCell(80,5,'DIRECTOR TECNICO',0,'C');
		
		$this->pdf->SetFont('Arial','B',8);
				
	}//GetFooterBaja
	
	function GetFooterRegular(){
	
		global $personal;
		global $util;
				
		$personal->setPositionId(3);
		$pers = $personal->EnumerateByPosition();		
		$director = $pers[0]['name'];
		
		$personal->setPositionId(5);
		$pers = $personal->EnumerateByPosition();		
		$jefeSE = $pers[0]['name'];
		
		$anio = date('Y');
		$mes = $util->GetMonthByKey(intval(date('m')));
		$dia = date('d');
						
		$this->pdf->SetXY(40,155);
		$this->pdf->SetFont('Arial','U',9);
		$this->pdf->MultiCell(80,5, $director,0,'C');		
		$this->pdf->SetFont('Arial','B',9);
		$this->pdf->SetXY(40,160);
		$this->pdf->MultiCell(80,5,TIT_DIR.' DEL PLANTEL',0,'C');
		
		$this->pdf->SetXY(160,155);
		$this->pdf->SetFont('Arial','U',9);
		$this->pdf->MultiCell(80,5, $jefeSE,0,'C');		
		$this->pdf->SetXY(160,160);
		$this->pdf->SetFont('Arial','B',9);
		$this->pdf->MultiCell(80,5,'JEFE DEL DEPARTAMENTO DE SERVICIOS ESCOLARES',0,'C');
				
		$this->pdf->SetXY(40,175);
		$this->pdf->SetFont('Arial','U',9);
		$this->pdf->MultiCell(80,5,SUBDIR_ENLACE_OP,0,'C');		
		$this->pdf->SetXY(40,180);
		$this->pdf->SetFont('Arial','B',9);
		$this->pdf->MultiCell(80,5,'SUBDIRECTORA DE ENLACE OPERATIVO',0,'C');
		
		$this->pdf->SetXY(160,175);
		$this->pdf->SetFont('Arial','U',9);
		$this->pdf->MultiCell(80,5,DIR_TECNICO,0,'C');		
		$this->pdf->SetXY(160,180);
		$this->pdf->SetFont('Arial','B',9);
		$this->pdf->MultiCell(80,5,'DIRECTOR TECNICO',0,'C');
		
		$this->pdf->SetFont('Arial','B',8);
				
	}//GetFooterRegular
		
	function GetFooterRedi(){
	
		global $personal;
		global $util;
				
		$personal->setPositionId(3);
		$pers = $personal->EnumerateByPosition();		
		$director = $pers[0]['name'];
		
		$personal->setPositionId(5);
		$pers = $personal->EnumerateByPosition();		
		$jefeSE = $pers[0]['name'];
		
		$anio = date('Y');
		$mes = $util->GetMonthByKey(intval(date('m')));
		$dia = date('d');
		
		$fecha = $dia.' de '.$mes.' de '.$anio;
				
		$this->pdf->SetXY(15,235);
		$this->pdf->SetFont('Arial','U',9);
		$this->pdf->MultiCell(80,5, $director,0,'C');		
		$this->pdf->SetFont('Arial','B',9);
		$this->pdf->SetXY(15,240);
		$this->pdf->MultiCell(80,5,TIT_DIR.' DEL PLANTEL',0,'C');
		
		$this->pdf->SetXY(115,235);
		$this->pdf->SetFont('Arial','U',9);
		$this->pdf->MultiCell(80,5, $jefeSE,0,'C');		
		$this->pdf->SetXY(115,240);
		$this->pdf->SetFont('Arial','B',9);
		$this->pdf->MultiCell(80,5,'JEFE DEL DEPARTAMENTO DE SERVICIOS ESCOLARES',0,'C');
		
		
		$this->pdf->SetXY(15,255);
		$this->pdf->SetFont('Arial','U',9);
		$this->pdf->MultiCell(80,5,SUBDIR_ENLACE_OP,0,'C');		
		$this->pdf->SetXY(15,260);
		$this->pdf->SetFont('Arial','B',9);
		$this->pdf->MultiCell(80,5,'SUBDIRECTORA DE ENLACE OPERATIVO',0,'C');
		
		$this->pdf->SetXY(115,255);
		$this->pdf->SetFont('Arial','U',9);
		$this->pdf->MultiCell(80,5,DIR_TECNICO,0,'C');		
		$this->pdf->SetXY(115,260);
		$this->pdf->SetFont('Arial','B',9);
		$this->pdf->MultiCell(80,5,'DIRECTOR TECNICO',0,'C');
		
		$this->pdf->SetFont('Arial','B',8);
		
		$this->pdf->Ln();
		$this->pdf->Cell(45,5,'FECHA DE ELABORACION:');
		$this->pdf->SetFont('Arial','U',8);
		$this->pdf->Cell(60,5, strtoupper($fecha));
		$this->pdf->SetFont('Arial','B',8);
		$this->pdf->Cell(0,5,'DGETA-SO2A-P0-01-04',0,0,'R');
		
	}//GetFooterRedi
	
	function GetFooterBoleta(){
	
		global $personal;
		global $util;
		global $institution;
		
		$institution->setInstitutionId(1);
		$info = $institution->Info();
				
		$personal->setPositionId(3);
		$pers = $personal->EnumerateByPosition();		
		$director = $pers[0]['name'];
		
		$personal->setPositionId(5);
		$pers = $personal->EnumerateByPosition();		
		$jefeSE = $pers[0]['name'];
		
		$anio = date('Y');
		$mes = $util->GetMonthByKey(intval(date('m')));
		$dia = date('d');
		
		$fecha = $dia.' de '.$mes.' de '.$anio;
		
		$ciudad = $info['ubication'];
		
		$this->pdf->Ln();
		$this->pdf->SetXY(15,220);
		$this->pdf->SetFont('Arial','',8);		
		$this->pdf->Cell(0,0,'Se extiende la presente el día '.$dia.' del mes de '.$mes.' del año de '.$anio.' en la ciudad de '.$ciudad.'.');
		
		$this->pdf->Ln();
				
		$this->pdf->SetXY(60,235);
		$this->pdf->SetFont('Arial','U',9);
		$this->pdf->MultiCell(80,5, $jefeSE,0,'C');		
		$this->pdf->SetXY(60,240);
		$this->pdf->SetFont('Arial','B',9);
		$this->pdf->MultiCell(80,5,'JEFE DEL DEPARTAMENTO DE SERVICIOS ESCOLARES',0,'C');
				
		$this->pdf->SetFont('Arial','B',8);
		
		$this->pdf->Ln();
		$this->pdf->Cell(0,0,'NOTA:');
		$this->pdf->SetFont('Arial','',8);
		$this->pdf->SetXY(25,253);
		$this->pdf->MultiCell(0,5,'Calificación mínima aprobatoria 6 (seis). Esta boleta no es válida para efectos de certificación de estudios si carece de firma correspondiente y presenta raspaduras o enmendaduras.');
		
	}//GetFooterBoleta
	
	function GetFooterBoletaHist(){
	
		global $personal;
		global $util;
		global $institution;
		
		$institution->setInstitutionId(1);
		$info = $institution->Info();
				
		$personal->setPositionId(3);
		$pers = $personal->EnumerateByPosition();		
		$director = $pers[0]['name'];
		
		$personal->setPositionId(5);
		$pers = $personal->EnumerateByPosition();		
		$jefeSE = $pers[0]['name'];
		
		$anio = date('Y');
		$mes = $util->GetMonthByKey(intval(date('m')));
		$dia = date('d');
		
		$fecha = $dia.' de '.$mes.' de '.$anio;
		
		$ciudad = $info['ubication'];
		
		$this->pdf->Ln();
		$this->pdf->SetXY(15,250);
		$this->pdf->SetFont('Arial','',7);		
		$this->pdf->Cell(0,0,'Se extiende la presente el día '.$dia.' del mes de '.$mes.' del año de '.$anio.' en la ciudad de '.$ciudad.'.');
		
		
		$this->pdf->SetXY(15,255);
		$this->pdf->SetFont('Arial','U',7);
		$this->pdf->MultiCell(0,5, $jefeSE,0,'C');		
		$this->pdf->SetXY(15,260);
		$this->pdf->SetFont('Arial','B',7);
		$this->pdf->MultiCell(0,3,"JEFE DEL DEPARTAMENTO \n DE SERVICIOS ESCOLARES",0,'C');
				
		$this->pdf->SetFont('Arial','B',7);
		
		$this->pdf->Ln();
		$this->pdf->Cell(0,0,'');
		$this->pdf->SetFont('Arial','',7);
		$this->pdf->SetXY(15,270);
		$this->pdf->MultiCell(0,3,"Calificación mínima aprobatoria 6 (seis). \nEste documento no es válido si carece de firma correspondiente y presenta raspaduras o enmendaduras.");
		
	}//GetFooterBoletaHist
	
	function GetFooterBoletaConst(){
	
		global $personal;
		global $util;
		global $institution;
		
		$institution->setInstitutionId(1);
		$info = $institution->Info();
				
		$personal->setPositionId(3);
		$pers = $personal->EnumerateByPosition();		
		$director = $pers[0]['name'];
		
		$personal->setPositionId(5);
		$pers = $personal->EnumerateByPosition();		
		$jefeSE = $pers[0]['name'];
		
		$anio = date('Y');
		$mes = $util->GetMonthByKey(intval(date('m')));
		$dia = date('d');
		
		$fecha = $dia.' de '.$mes.' de '.$anio;
		
		$ciudad = $info['ubication'];
		
		$this->pdf->Ln();
		//$this->pdf->SetXY(15,220);
		$this->pdf->SetFont('Arial','',8);		
		$this->pdf->MultiCell(0,5,'Se extiende la presente para los fines legales y administrativos que al interesado (a) convengan el día '.$dia.' del mes de '.$mes.' del año de '.$anio.' en la ciudad de '.$ciudad.'.');
		
		
		//$this->pdf->SetXY(15,235);
		$this->pdf->SetFont('Arial','U',9);
		$this->pdf->MultiCell(0,5, $director,0,'C');		
		//$this->pdf->SetXY(15,240);
		$this->pdf->SetFont('Arial','B',9);
		$this->pdf->MultiCell(0,5,TIT_DIR." DEL PLANTEL",0,'C');
						
	}//GetFooterBoletaConst
	
	function GetFooterBajaRep(){
	
		global $personal;
		global $util;
				
		$personal->setPositionId(3);
		$pers = $personal->EnumerateByPosition();		
		$director = $pers[0]['name'];
		
		$personal->setPositionId(5);
		$pers = $personal->EnumerateByPosition();		
		$jefeSE = $pers[0]['name'];
		
		$anio = date('Y');
		$mes = $util->GetMonthByKey(intval(date('m')));
		$dia = date('d');
		
		$fecha = $dia.' de '.$mes.' de '.$anio;
				
		$this->pdf->SetXY(15,235);
		$this->pdf->SetFont('Arial','U',9);
		$this->pdf->MultiCell(80,5, $director,0,'C');		
		$this->pdf->SetFont('Arial','B',9);
		$this->pdf->SetXY(15,240);
		$this->pdf->MultiCell(80,5,TIT_DIR.' DEL PLANTEL',0,'C');
		
		$this->pdf->SetXY(115,235);
		$this->pdf->SetFont('Arial','U',9);
		$this->pdf->MultiCell(80,5, $jefeSE,0,'C');		
		$this->pdf->SetXY(115,240);
		$this->pdf->SetFont('Arial','B',9);
		$this->pdf->MultiCell(80,5,'JEFE DEL DEPARTAMENTO DE SERVICIOS ESCOLARES',0,'C');
		
		
		$this->pdf->SetXY(15,255);
		$this->pdf->SetFont('Arial','U',9);
		$this->pdf->MultiCell(80,5,SUBDIR_ENLACE_OP,0,'C');		
		$this->pdf->SetXY(15,260);
		$this->pdf->SetFont('Arial','B',9);
		$this->pdf->MultiCell(80,5,'SUBDIRECTORA DE ENLACE OPERATIVO',0,'C');
		
		$this->pdf->SetXY(115,255);
		$this->pdf->SetFont('Arial','U',9);
		$this->pdf->MultiCell(80,5,DIR_TECNICO,0,'C');		
		$this->pdf->SetXY(115,260);
		$this->pdf->SetFont('Arial','B',9);
		$this->pdf->MultiCell(80,5,'DIRECTOR TECNICO',0,'C');		
				
	}//GetFooterBajaRep
		
	function PrintPdfRedi(){
	
		global $util;
		global $schoolType;
		
		$this->pdf = new PDF_MC_Table2();
		
		$sqlFilter = ' AND majorId = '.$this->majorId;
				
		$students = $this->EnumerateStudents('',$sqlFilter);		
		$totalStudents = count($students);
		
		$limit = 0;
		$registros = 23;
		$k = 1;
		
		$totalH = 0;
		$totalM = 0;
		while($totalStudents >= $limit){
			
			$sqlLimit = 'LIMIT '.$limit.','.$registros;
			
			$students = $this->EnumerateStudents($sqlLimit, $sqlFilter);
			
			$time = array();
					
			$this->pdf->AddPage();
			
			//Obtenemos la Cabecera
			$this->GetHeaderRedi();		
			
			$this->pdf->SetFont('Arial','B',10);
			
			$this->pdf->Ln(10);
			$this->pdf->SetAligns(array('C','C','C','C','C','C','C'));
			$this->pdf->SetWidths(array(10,85,35,15,15,15,15));
			$this->pdf->Row(array('No.','PATERNO MATERNO NOMBRE(S)','No. DE CONTROL','SEXO H | M','EDAD','PLANT. PROC.','COD. OBS.'));
			
			$this->pdf->SetFont('Arial','',10);
			
			$this->pdf->SetAligns(array('C','L','C','L','C','C','C'));
			
			$h = 0;
			$m = 0;
			foreach($students as $val){
				
				$name = $val['lastNamePaterno'].' '.$val['lastNameMaterno'].' '.$val['names'];
				$noControl = $val['controlNumber'];
				$yearsOld = $util->GetYearsOld($val['birthdate']);
				
				$schoolType->setSchtypId($val['prevSchType']);
				$claveProc = $schoolType->GetClaveById();
				
				if($val['sexo'] == 'f'){
					$m++;					
					$sexo = '      | X';
				}else{
					$h++;					
					$sexo = '  X | ';
				}
									
				$this->pdf->Row(array($k,$name,$noControl,$sexo,$yearsOld,$claveProc,''));				
				
				$k++;
			}
			
			$totalH += $h;
			$totalM += $m;
			
			$h = ($h < 10) ? "0$h" : $h;
			$m = ($m < 10) ? "0$m" : $m;				
			
			$this->pdf->SetFont('Arial','B',10);
			$this->pdf->Row(array('','','TOTAL'," $h | $m",'','',''));
						
						
			$limit += $registros;
			
			if($totalStudents >= $limit){
				
				$this->pdf->SetFont('Arial','B',9);
			
				//Pie de Pagina - Firmas Directivos
			
				$this->GetFooterRedi();
			
			}
			
		}//while
		
		$totalHM = $totalH + $totalM;
		
		$this->pdf->SetX(50);
		$this->pdf->Ln(10);
		$this->pdf->SetAligns(array('L','C'));
		$this->pdf->SetWidths(array(30,10));
		$this->pdf->Row(array('H. HOMBRES ', $totalH));
		$this->pdf->Row(array('M. MUJERES ', $totalM));
		$this->pdf->Row(array('SUMA:', $totalHM));
		
		
		$this->pdf->SetFont('Arial','B',9);
			
		//Pie de Pagina - Firmas Directivos
	
		$this->GetFooterRedi();
		
		$this->pdf->Output("report_redi.pdf","D");
		
	
	}//PrintPdfRedi
	
	function PrintPdfBoleta(){
	
		global $util;
		global $schoolType;
		global $student;
		global $subject;
		global $typeCalif;
		global $periodo;
		
		$this->pdf = new PDF_MC_Table2();		
		
		$this->pdf->AddPage();
		
		//Buscamos las Materias del Alumno y Semestre
		$student->setUserId($this->userId);
		$student->setSemesterId($this->semesterId);
		$subjects = $student->GetKardex();
		
		$average = 0;
		//$sum = 0;
		$periodoId = 0;
		$materias = count($subjects);
		foreach($subjects as $val){
			
			$subjectId = $val['subjectId'];								
			$average += $val['calif'];
			
			/*
			$periodo->setPeriodoId($val['periodoId']);
			$identifier = $periodo->GetIdentifierById();
			
			$ident = split('-',$identifier);
			$sumTemp = $ident[0] + $ident[1];
			
			if($sum < $sumTemp){	
				$sum = $sumTemp;
				$periodoId = $val['periodoId'];
			}
			*/
			$periodoId = $val['periodoId'];
						
		}
		
		if($materias)
			$average = $average / $materias;
		$this->average = number_format($average,2,'.','');
		
		$this->periodoId = $periodoId;
		
		//Obtenemos la Cabecera
		$this->GetHeaderBoleta();		
		
		$this->pdf->SetFont('Arial','B',10);
		
		$this->pdf->Ln(20);
		$this->pdf->SetAligns(array('C','C','C','C','C'));
		$this->pdf->SetWidths(array(105,25,35,25));
		$this->pdf->Row(array('MATERIAS DEL SEMESTRE','CALIF.','LETRA','OBS.'));
		
		$this->pdf->SetFont('Arial','',10);
		
		$this->pdf->SetAligns(array('L','C','C','C'));
		$this->pdf->Ln();
		
		
		foreach($subjects as $val){
			
			$subjectId = $val['subjectId'];
			$subject->setSubjectId($subjectId);
			$info = $subject->Info();
			
			$clave = $info['clave'];
			$materia = utf8_decode($info['name']);
			
			$average = $val['calif'];
			$typeCalifId = $val['typeCalifId'];
			
			$obs = '';
			if($typeCalifId > 1){
				$typeCalif->setTypeCalifId($typeCalifId);
				$inf = $typeCalif->Info();
				
				$obs = $inf['identifier'];
			}
			
			$letra = $util->GetLetterGradescore($average);
						
			$this->pdf->Row(array($materia,$average,$letra,$obs));				
		}
		
		$this->pdf->SetFont('Arial','B',9);
			
		//Pie de Pagina - Firmas Directivos
		$this->GetFooterBoleta();	
				
		$this->pdf->Output("report_boleta.pdf","D");
		
	
	}//PrintPdfBoleta
	
	function PrintPdfBoletaParcial(){
	
		global $util;
		global $schoolType;
		global $student;
		global $subject;
		global $typeCalif;
		global $periodo;
		global $schedule_test;
		global $personal;
		
		$this->pdf = new PDF_MC_Table2();		
		
		$this->pdf->AddPage();
		
		//Buscamos las Materias del Alumno y Semestre del Kardex
		$student->setUserId($this->userId);
		$student->setSemesterId($this->semesterId);
		$subjects = $student->GetKardex();
		
		$average = 0;		
		$periodoId = 0;
		$materias = count($subjects);
		foreach($subjects as $val){			
									
			$periodoId = $val['periodoId'];
						
		}
		
		$this->periodoId = $periodoId;
		
		//Obtenemos la Cabecera
		$this->GetHeaderBoletaParcial();		
		
		$this->pdf->SetFont('Arial','B',10);
		
		$this->pdf->Ln(20);
		$this->pdf->SetAligns(array('C','C','C','C','C','C','C','C','C','C','C','C','C'));
		$this->pdf->SetWidths(array(65,15,8,8,8,10,10,10,10,10,10,10,15));
		$this->pdf->Row(array('MATERIA/MAESTRO','GPO','A1','A2','A3','P1','P2','P3','G1','G2','G3','R1','PROM'));
		
		$this->pdf->SetFont('Arial','',9);
		
		$this->pdf->SetAligns(array('L','C','C','C','C','C','C','C','C','C','C','C','C','C'));
		$this->pdf->Ln();
		
		$promP1 = array();
		$promP2 = array();
		$promP3 = array();
		$promAv = array();
		foreach($subjects as $val){
			
			$subjectId = $val['subjectId'];
			$subject->setSubjectId($subjectId);
			$info = $subject->Info();
			
			$materia = utf8_decode($info['name']);
			
			//Obtenemos las calificaciones de la materia
			$sql = 'SELECT 
						gu.*, g.periodoId, sg.clave AS sgClave, sg.personalId AS sgPersonalId
					FROM 
						subject_group AS sg, 
						gradereport AS g, 
						gradereport_user AS gu
					WHERE 
						sg.subjectId = '.$subjectId.'
					AND 
						sg.subgpoId = g.groupId
					AND 
						g.gradereportId = gu.gradereportId
					AND 
						gu.alumnoId = '.$this->userId;
			
			$this->Util()->DB()->setQuery($sql);
			$result = $this->Util()->DB()->GetResult();
			
			$gpo = '';
			$a1 = '';
			$a2 = '';
			$a3 = '';
			$p1 = '';
			$p2 = '';
			$p3 = '';
			$g1 = '';
			$g2 = '';
			$g3 = '';
			foreach($result as $res){
				
				$gpo = $res['sgClave'];
				
				$personal->setPersonalId($res['sgPersonalId']);
				$docente = $personal->GetNameById();
				
				$schedule_test->setScheduletestId($res['scheduletestId']);
				$infSch = $schedule_test->Info();
				
				//Obtenemos los Parciales y las Asistencias
				$resSchdls = $schedule_test->GetScheduletestIdByTypetestId(1,$res['periodoId']);
								
				if($resSchdls[0] == $res['scheduletestId']){ //1er. Parcial					
					$p1 = ($res['gradescore'] == '-2') ? '' : $res['gradescore'];
					$a1 = $res['attendance'];
				}
				if($resSchdls[1] == $res['scheduletestId']){ //2o. Parcial
					$p2 = ($res['gradescore'] == '-2') ? '' : $res['gradescore'];
					$a2 = $res['attendance'];
				}
				if($resSchdls[2] == $res['scheduletestId']){ //3er. Parcial
					$p3 = ($res['gradescore'] == '-2') ? '' : $res['gradescore'];
					$a3 = $res['attendance'];
				}
				
				//Obtenemos los globales
				$resSchdls = $schedule_test->GetScheduletestIdByTypetestId(2,$res['periodoId']);
								
				if($resSchdls[0] == $res['scheduletestId']) //1er. Global
					$g1 = $res['gradescore'];
				if($resSchdls[1] == $res['scheduletestId']) //2o. Global
					$g2 = $res['gradescore'];
				if($resSchdls[2] == $res['scheduletestId']) //3er. Global
					$g3 = $res['gradescore'];
				
				//Obtenemos el R1
				$resSchdls = $schedule_test->GetScheduletestIdByTypetestId(3,$res['periodoId']);
				if($resSchdls[0] == $res['scheduletestId']) //R1
					$r1 = $res['gradescore'];				
					
			}
			
			//Obtenemos promedio de las calificaciones parciales			
			if($p3 != ''){
				
				//Si una calificacion es reprobatoria REPRUEBA el alumno
				if($p1 < 6 || $p2 < 6 || $p3 < 6)
					$avSub = 5;
				else
					$avSub = round(($p1 + $p2 + $p3) / 3);

				$promP1[] = $p1;
				$promP2[] = $p2;
				$promP3[] = $p3;
				
			}elseif($p2 != ''){
				
				//Si una calificacion es reprobatoria REPRUEBA el alumno
				if($p1 < 6 || $p2 < 6)
					$avSub = 5;
				else
					$avSub = round(($p1 + $p2) / 2);
				
				$promP1[] = $p1;
				$promP2[] = $p2;
				
			}elseif($p1 != ''){
				
				//Si una calificacion es reprobatoria REPRUEBA el alumno
				if($p1 < 6)				
					$avSub = 5;
				else
					$avSub = round($p1);
				
				$promP1[] = $p1;
			}
						
			//Obtenemos el promedio de los globales si aplican
			if($g3 != '')
				$avSub = round($g3);
			elseif($g2 != '')
				$avSub = round($g2);
			elseif($g1 != '')
				$avSub = round($g1);
			
			//Obtenemos el R1 si aplica
			if($r1 != '')
				$avSub = round($r1);
			
			$avSub = number_format($avSub,2);
			$promAv[] = $avSub;
			
			$materia .= ' - '.$docente;
									
			$this->pdf->Row(array($materia,$gpo,$a1,$a2,$a3,$p1,$p2,$p3,$g1,$g2,$g3,$r1,$avSub));			
		
		}//foreach
		
		//Promedio del 1er Parcial de Todas las Materias.
		if($promP1){
			$avP1 = 0;
			foreach($promP1 as $val)
				$avP1 += $val;
				
			$avP1 = $avP1 / count($promP1);
			$avP1 = number_format($avP1,2,'.','');
			
		}
		
		//Promedio del 2o Parcial de Todas las Materias.
		if($promP2){
			$avP2 = 0;
			foreach($promP2 as $val)
				$avP2 += $val;
				
			$avP2 = $avP2 / count($promP2);
			$avP2 = number_format($avP2,2,'.','');
			
		}
		
		//Promedio del 3er Parcial de Todas las Materias.
		if($promP3){
			$avP3 = 0;
			foreach($promP3 as $val)
				$avP3 += $val;
				
			$avP3 = $avP3 / count($promP3);
			$avP3 = number_format($avP3,2,'.','');
			
		}
		
		//Promedio Gral de Todas las Materias.
		if($promAv){
			$avGral = 0;
			foreach($promAv as $val)
				$avGral += $val;
				
			$avGral = $avGral / count($promAv);
			$avGral = number_format($avGral,2,'.','');
			
		}
		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Ln();
		
		$this->pdf->SetAligns(array('R','C','C','C','C','C','C','C','C','C','C','C','C'));		
		$this->pdf->Row(array("PROMEDIO",'','','','',$avP1,$avP2,$avP3,'','','','',$avGral));
		
		$this->pdf->Ln();
		$this->pdf->Ln();
		$this->pdf->Ln();
		$this->pdf->Cell(0,10,'PROMEDIO: '.$avGral,0,0,'L');
		
		$this->pdf->SetFont('Arial','B',9);
			
		//Pie de Pagina - Firmas Directivos
		$this->GetFooterBoleta();	
				
		$this->pdf->Output("report_boleta_parcial.pdf","D");
		
	
	}//PrintPdfBoletaParcial
	
	
	function PrintPdfBoletaHist(){
	
		global $util;
		global $schoolType;
		global $subject;
		global $student;
		global $semester;
		global $typeCalif;
		global $periodo;
		
		$this->pdf = new PDF_MC_Table2();
		
		$this->pdf->AddPage();
		
		$resSemesters = $semester->Enumerate();
		
		$sems = 0;
		$promGral = 0;
		foreach($resSemesters as $row){
		
			$semesterId = $row['semesterId'];
			
			//Obtenemos las calificaciones del Kardex
			
			$student->setUserId($this->userId);
			$student->setSemesterId($semesterId);
			$subjects = $student->GetKardex();
			
			$average = 0;
			$materias = count($subjects);
			foreach($subjects as $val){
				
				$subjectId = $val['subjectId'];								
				$average += $val['calif'];				
							
			}
			
			if($materias){
				$average = $average / $materias;
				$promGral += $average;
				$sems++;
			}
			
			if($semesterId == $this->semesterId)
				break;
		}
		
		if($sems){
			$average = $promGral / $sems;
			$this->average = number_format($average,2,'.','');
		}
						
		//Obtenemos la Cabecera
		$this->GetHeaderBoletaHist();		
		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Ln(4);
				
		foreach($resSemesters as $row){
		
			$semesterId = $row['semesterId'];
			
			//Obtenemos las calificaciones del Kardex
			
			$student->setUserId($this->userId);
			$student->setSemesterId($semesterId);
			$subjects = $student->GetKardex();
			
			foreach($subjects as $val)
				$periodoId = $val['periodoId'];
			
			$periodo->setPeriodoId($periodoId);
			$nomPeriodo = $periodo->GetNameById();
			
			$semClave = $row['clave'];
									
			$this->pdf->SetFont('Arial','B',7);			
			$this->pdf->Ln(5);			
			$this->pdf->SetAligns(array('C','C','C','C','C'));
			$this->pdf->SetWidths(array(120,15,15,20,20));
			$this->pdf->Row(array('ASIGNATURAS CURSADAS','CAL.','SEM.','PER.','OBS.'));
			
			$this->pdf->SetFont('Arial','',7);
			
			$this->pdf->SetAligns(array('L','C','C','C','C','C'));
			
			//Imprimimos las calificaciones del kardex
			
			foreach($subjects as $val){
				
				$subjectId = $val['subjectId'];
				$subject->setSubjectId($subjectId);
				$info = $subject->Info();
				
				$clave = $info['clave'];
				$materia = utf8_decode($info['name']);
				
				$average = $val['calif'];
				$typeCalifId = $val['typeCalifId'];
				
				$periodo->setPeriodoId($val['periodoId']);
				$per = $periodo->GetIdentifierById();
				
				$obs = '';
				if($typeCalifId > 1){
					$typeCalif->setTypeCalifId($typeCalifId);
					$inf = $typeCalif->Info();
					
					$obs = $inf['identifier'];
				}
							
				$this->pdf->Row(array($materia,$average,$semClave,$per,$obs));				
			}			
			
			if($semesterId == $this->semesterId)
				break;
		
		}
		
		$this->pdf->SetFont('Arial','B',8);
		$this->pdf->Ln(3);
		$this->pdf->Cell(0,8,'PROMEDIO: '.$this->average,0,0,'L');
		
		$this->pdf->SetFont('Arial','B',9);
			
		//Pie de Pagina - Firmas Directivos
		$this->GetFooterBoletaHist();									
						
		$this->pdf->Output("report_boleta_hist.pdf","D");
			
	}//PrintPdfBoletaHist
	
	function PrintPdfBoletaConst(){
	
		global $util;
		global $schoolType;
		global $subject;
		global $student;
		global $semester;
		global $typeCalif;
		
		$this->pdf = new PDF_MC_Table2();
		
		$this->pdf->AddPage();
		
		//Obtenemos el promedio
		$resSemesters = $semester->Enumerate();
		
		$sems = 0;
		$promGral = 0;
		foreach($resSemesters as $row){
		
			$semesterId = $row['semesterId'];
			
			//Obtenemos las calificaciones del Kardex
			
			$student->setUserId($this->userId);
			$student->setSemesterId($semesterId);
			$subjects = $student->GetKardex();
			
			$average = 0;
			$materias = count($subjects);
			foreach($subjects as $val){
				
				$subjectId = $val['subjectId'];								
				$average += $val['calif'];				
							
			}
			
			if($materias){
				$average = $average / $materias;
				$promGral += $average;
				$sems++;
			}
			
			if($semesterId == $this->semesterId)
				break;
		}
		
		if($sems){
			$average = $promGral / $sems;
			$this->average = number_format($average,2,'.','');
		}
			
		//Obtenemos la Cabecera
		$this->GetHeaderBoletaConst();		
				
		$resSemesters = $semester->Enumerate();
		
		foreach($resSemesters as $row){
		
			$semesterId = $row['semesterId'];
									
			$this->pdf->SetFont('Arial','B',10);			
			$this->pdf->Ln(10);
			$this->pdf->SetFont('Arial','B',10);
			$this->pdf->Cell(0,10,'SEMESTRE '.$row['clave'],0,0,'L');
			$this->pdf->Ln();
			$this->pdf->SetAligns(array('C','C','C','C','C'));
			$this->pdf->SetWidths(array(25,85,20,35,25));
			$this->pdf->Row(array('Clave','Asignaturas Cursadas','Cal.','Notación','Obs.'));
			
			$this->pdf->SetFont('Arial','',10);
			
			$this->pdf->SetAligns(array('L','L','C','C','C'));
			
			//Obtenemos las calificaciones del Kardex
			
			$student->setUserId($this->userId);
			$student->setSemesterId($semesterId);
			$subjects = $student->GetKardex();
			
			foreach($subjects as $val){
				
				$subjectId = $val['subjectId'];
				$subject->setSubjectId($subjectId);
				$info = $subject->Info();
				
				$clave = $info['clave'];
				$materia = utf8_decode($info['name']);
				
				$average = $val['calif'];
				$typeCalifId = $val['typeCalifId'];
				
				$obs = '';
				if($typeCalifId > 1){
					$typeCalif->setTypeCalifId($typeCalifId);
					$inf = $typeCalif->Info();
					
					$obs = $inf['identifier'];
				}
							
				$this->pdf->Row(array($clave,$materia,$average,'',$obs));				
			}			
			
			if($semesterId == $this->semesterId)
				break;
		
		}					
		
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Ln();
		$this->pdf->Cell(0,10,'PROMEDIO: '.$this->average,0,0,'L');
			
		$this->pdf->SetFont('Arial','B',9);
			
		//Pie de Pagina - Firmas Directivos
		$this->GetFooterBoletaConst();	
				
		$this->pdf->Output("report_constancia.pdf","D");		
	
	}//PrintPdfBoletaConst
	
	function PrintPdfBajaRep(){
	
		global $util;
		global $semester;
		global $group;
		global $code;
		
		$this->pdf = new PDF_MC_Table2();
		
		$sqlFilter = ' AND status = "baja"';
				
		$students = $this->EnumerateStudents('', $sqlFilter);		
				
		$time = array();
				
		$this->pdf->AddPage();
		
		//Obtenemos la Cabecera
		$this->GetHeaderBajaRep();		
		
		$this->pdf->SetFont('Arial','B',10);
		
		$this->pdf->Ln(10);
		$this->pdf->SetAligns(array('C','C','C','C','C','C','C'));
		$this->pdf->SetWidths(array(10,30,80,10,15,15,25));
		$this->pdf->Row(array('No.','NO. CONTROL','NOMBRE DEL ALUMNO','SEM.','GRUPO','CAUSA','DOMICILIO'));
		
		$this->pdf->SetFont('Arial','',10);
		
		$this->pdf->SetAligns(array('C','C','L','C','C','C','C'));		
		
		$k = 1;
		
		foreach($students as $val){
			
			$name = $val['lastNamePaterno'].' '.$val['lastNameMaterno'].' '.$val['names'];
			$noControl = $val['controlNumber'];
			
			$semester->setSemesterId($val['semesterId']);
			$semestre = $semester->GetNameById();
			
			$group->setGroupId($val['groupId']);
			$grupo = $group->GetNameById();
			
			$code->setCodeId($val['codeId']);
			$causa = $code->GetClaveById();
														
			$this->pdf->Row(array($k,$noControl,$name,$semestre,$grupo,$causa,''));				
			
			$k++;
						
		}
								
		
		$this->pdf->SetFont('Arial','B',9);
	
		//Pie de Pagina - Firmas Directivos
	
		$this->GetFooterBajaRep();				
								
		$this->pdf->Output("report_baja.pdf","D");
		
	
	}//PrintPdfBajaRep
	
	function PrintPdfBaja(){
	
		global $util;
		global $code;
				
		$this->pdf = new PDF_MC_Table2();
						
		$this->pdf->AddPage('L');
		
		//Obtenemos la Cabecera
		$this->GetHeaderBaja();		
		
		$this->pdf->SetFont('Arial','B',10);
		
		$this->pdf->Ln(10);
		$this->pdf->SetAligns(array('L','C','C','C','C','C','C','C'));
		$this->pdf->SetWidths(array(75,25,25,25,25,25,25,45));
		$this->pdf->Row(array('SEMESTRE: ','1o','2o','3o','4o','5o','6o','TOTAL'));
		$this->pdf->Row(array('GRUPOS: ','','','','','','',''));
		$this->pdf->Row(array('SEXO: ','H  |  M','H  |  M','H  |  M','H  |  M','H  |  M','H  |  M','H  |  M'));
		$this->pdf->Row(array('CODIGO DE BAJA ','','','','','','',''));
		$this->pdf->Row(array('','','','','','','',''));
		
		$this->pdf->SetFont('Arial','',10);
		
		$totalH_1 = 0;
		$totalH_2 = 0;
		$totalH_3 = 0;
		$totalH_4 = 0;
		$totalH_5 = 0;
		$totalH_6 = 0;
				
		$totalH1 = 0;
		$totalH2 = 0;
		$totalH3 = 0;
		$totalH4 = 0;
		$totalH5 = 0;
		$totalH6 = 0;
		$totalHX = 0;
		
		$totalM_1 = 0;
		$totalM_2 = 0;
		$totalM_3 = 0;
		$totalM_4 = 0;
		$totalM_5 = 0;
		$totalM_6 = 0;
		
		$totalM1 = 0;
		$totalM2 = 0;
		$totalM3 = 0;
		$totalM4 = 0;
		$totalM5 = 0;
		$totalM6 = 0;
		$totalMX = 0;		
		
		$codes = $code->Enumerate();
		$arrSems = explode(',',$this->semsId);
		
		foreach($codes as $val){
						
			$titulo = $val['clave'].' '.$val['name'];
			$codeId = $val['codeId'];
						
			//Semestre 1			
			if(in_array(9,$arrSems)){
				$totalH_1 = $this->GetStudentsBaja($this->periodoId, 9, 'm', $codeId);
				$totalM_1 = $this->GetStudentsBaja($this->periodoId, 9, 'f', $codeId);
			}		
			$totalHM_1 = $totalH_1.' | '.$totalM_1;
			$totalH1 += $totalH_1;
			$totalM1 += $totalM_1;
			$totalHM1 = $totalH1.' | '.$totalM1;
			
			//Semestre 2
			if(in_array(10,$arrSems)){
				$totalH_2 = $this->GetStudentsBaja($this->periodoId, 10, 'm', $codeId);
				$totalM_2 = $this->GetStudentsBaja($this->periodoId, 10, 'f', $codeId);			
			}
			$totalHM_2 = $totalH_2.' | '.$totalM_2;
			$totalH2 += $totalH_2;
			$totalM2 += $totalM_2;
			$totalHM2 = $totalH2.' | '.$totalM2;
			
			//Semestre 3
			if(in_array(11,$arrSems)){			
				$totalH_3 = $this->GetStudentsBaja($this->periodoId, 11, 'm', $codeId);
				$totalM_3 = $this->GetStudentsBaja($this->periodoId, 11, 'f', $codeId);			
			}
			$totalHM_3 = $totalH_3.' | '.$totalM_3;
			$totalH3 += $totalH_3;
			$totalM3 += $totalM_3;
			$totalHM3 = $totalH3.' | '.$totalM3;
			
			//Semestre 4
			if(in_array(12,$arrSems)){			
				$totalH_4 = $this->GetStudentsBaja($this->periodoId, 12, 'm', $codeId);
				$totalM_4 = $this->GetStudentsBaja($this->periodoId, 12, 'f', $codeId);			
			}
			$totalHM_4 = $totalH_4.' | '.$totalM_4;
			$totalH4 += $totalH_4;
			$totalM4 += $totalM_4;
			$totalHM4 = $totalH4.' | '.$totalM4;
			
			//Semestre 5
			if(in_array(16,$arrSems)){			
				$totalH_5 = $this->GetStudentsBaja($this->periodoId, 16, 'm', $codeId);
				$totalM_5 = $this->GetStudentsBaja($this->periodoId, 16, 'f', $codeId);			
			}
			$totalHM_5 = $totalH_5.' | '.$totalM_5;
			$totalH5 += $totalH_5;
			$totalM5 += $totalM_5;
			$totalHM5 = $totalH5.' | '.$totalM5;
			
			//Semestre 6
			if(in_array(17,$arrSems)){			
				$totalH_6 = $this->GetStudentsBaja($this->periodoId, 17, 'm', $codeId);
				$totalM_6 = $this->GetStudentsBaja($this->periodoId, 17, 'f', $codeId);			
			}
			$totalHM_6 = $totalH_6.' | '.$totalM_6;
			$totalH6 += $totalH_6;
			$totalM6 += $totalM_6;
			$totalHM6 = $totalH6.' | '.$totalM6;
			
			$totalH = $totalH_1 + $totalH_2 + $totalH_3 + $totalH_4 + $totalH_5 + $totalH_6;
			$totalM = $totalM_1 + $totalM_2 + $totalM_3 + $totalM_4 + $totalM_5 + $totalM_6;
			$totalHM = $totalH.' | '.$totalM;
			
			$totalHX += $totalH;
			$totalMX += $totalM;
			$totalHMX = $totalHX.' | '.$totalMX;			
																		
			$this->pdf->Row(array(strtoupper($titulo),$totalHM_1,$totalHM_2,$totalHM_3,$totalHM_4,$totalHM_5,$totalHM_6,$totalHM));
		
		}//foreach
		
		$this->pdf->SetFont('Arial','B',10);
		
		$this->pdf->Row(array('','','','','','','',''));
		$this->pdf->Row(array('TOTALES: ',$totalHM1,$totalHM2,$totalHM3,$totalHM4,$totalHM5,$totalHM6,$totalHMX));
				
		$this->pdf->SetAligns(array('C','L','C','L','C','C','C'));
						
		$this->pdf->SetFont('Arial','B',9);
			
		//Pie de Pagina - Firmas Directivos
	
		$this->GetFooterBaja();
		
		$this->pdf->Output("report_baja.pdf","D");
		
	
	}//PrintPdfBaja
	
	function PrintPdfRegular(){
	
		global $semester;
				
		$semesters = $semester->Enumerate();
						
		$this->pdf = new PDF_MC_Table2();
						
		$this->pdf->AddPage('L');
		
		//Obtenemos la Cabecera
		$this->GetHeaderRegular();		
		
		//$this->GetStudentsRegular();
		
		$this->pdf->SetFont('Arial','B',10);
		
		$this->pdf->Ln(10);
		$this->pdf->SetAligns(array('C','C','C','C','C','C','C','C','C','C'));
		$this->pdf->SetWidths(array(22,13,13,22,32,32,32,32,32,25));
		$this->pdf->Row(
						array(
							'SEM.',
							'H',
							'M',
							'TOTAL',
							'EN 1 MATERIA',
							'EN 2 MATERIAS',
							'EN 3 MATERIAS',
							'EN 4 MATERIAS',
							'EN 5 O MAS',
							'TOTAL'
						));
		
		$this->pdf->SetAligns(array('C','C','C','C','C','C','C','C','C','C','C','C','C','C'));
		$this->pdf->SetWidths(array(22,26,22,16,16,16,16,16,16,16,16,16,16,25));
		$this->pdf->Row(array('','','','H','M','H','M','H','M','H','M','H','M',''));
		
		$this->pdf->SetFont('Arial','',10);
		
		foreach($semesters as $val){
		
			$this->pdf->Row(array($val['clave'],'','','','','','','','','','','','',''));
		
		}
		
		$this->pdf->SetFont('Arial','B',10);
		
		$this->pdf->Row(array('TOTAL','','','','','','','','','','','','',''));
						
		$this->pdf->SetFont('Arial','B',9);
			
		//Pie de Pagina - Firmas Directivos
	
		$this->GetFooterBaja();
		
		$this->pdf->Output("report_regulares.pdf","D");		
	
	}//PrintPdfRegular
	
	function PrintPdfDesercion(){
	
		global $major;
				
		$majors = $major->Enumerate();
						
		$this->pdf = new PDF_MC_Table2();
						
		$this->pdf->AddPage('L');
		
		//Obtenemos la Cabecera
		$this->GetHeaderDesercion();		
		
		//$this->GetStudentsRegular();
		
		$this->pdf->SetFont('Arial','B',10);
		
		$this->pdf->Ln(10);
		$this->pdf->SetAligns(array('C','C','C','C','C','C','C','C','C','C','C','C','C','C'));
		$this->pdf->SetWidths(array(12,30,30,22,11,11,11,11,11,20,30,20,20,25));
		$this->pdf->Row(
						array(
							'No.',
							'CARRERAS',
							'ALUMNOS QUE INICIARON',
							'NINGUNA MATERIA',
							'1M',
							'2M',
							'3M',
							'4M',
							'5M',
							'ALUMNOS REPROB.',
							'ALUMNOS TERMINARON',
							'ALUM. DESERT.',
							'% REPROB',
							'% DESERCION'
						));
		
		
		$this->pdf->SetFont('Arial','',10);
		
		$k = 1;
		foreach($majors as $val){
			
			$this->pdf->Row(
						array(
							$k,
							$val['majorId'],
							'',
							'',
							'',
							'',
							'',
							'',
							'',
							'',
							'',
							'',
							'',
							''
						));
		
			$k++;
			
		}//foreach
		
		$this->pdf->SetFont('Arial','B',10);
		
		$this->pdf->Row(array('','','','','','','','','','','','','',''));
		$this->pdf->Row(array('','','','','','','','','','','','','',''));
		$this->pdf->Row(array('','TOTAL','','','','','','','','','','','',''));
		$this->pdf->Row(array('','PLANTEL','','','','','','','','','','','',''));
						
		$this->pdf->SetFont('Arial','B',9);
			
		//Pie de Pagina - Firmas Directivos
	
		$this->GetFooterBaja();
		
		$this->pdf->Output("report_regulares.pdf","D");		
	
	}//PrintPdfDesercion
	
	function GetStudentsBaja($periodoId, $semesterId, $sexo, $codeId){
	
		global $student;
		
		$sqlFilter = ' AND cancelPeriodoId = '.$periodoId.' 
					   AND sexo = "'.$sexo.'" 
					   AND semesterId = '.$semesterId.' 
					   AND codeId = '.$codeId;
						
		$total = $student->EnumerateCount($sqlFilter);
		
		return $total;
		
	}//GetStudentsBaja
	
	function GetStudentsRegular(){
				
		/*
		$sqlQuery = 'SELECT 
						scheduletestId 
					FROM 
						schedule_test 
					 WHERE 
					 	periodoId = '.$this->periodoId.'
					AND
						typetestId = 1';
		
		$this->Util()->DB()->setQuery($sqlQuery);
		$result = $this->Util()->DB()->GetResult();
		*/
		
		$sqlQuery = 'SELECT 
						gradereportId 
					FROM 
						gradereport 
					 WHERE 
					 	periodoId = '.$this->periodoId.'
					AND
						semesterId = '.$this->semesterId;
		
		$this->Util()->DB()->setQuery($sqlQuery);
		$result = $this->Util()->DB()->GetResult();
		
		$grIds = array();
		
		foreach($result as $key => $res)
			$grIds[$key] = $res['gradereportId'];
		
		$arrGrIds = implode(',',$grIds);
		
		if($arrGrIds){
			$sqlQuery = 'SELECT 
							gu.gradReportUserId, gu.alumnoId, u.sexo 
						FROM 
							gradereport_user AS gu, user AS u
						WHERE
							gu.gradereportId IN ('.$arrGrIds.')
						AND
							gu.alumnoId = u.userId	
						GROUP BY
							gu.alumnoId';
			$this->Util()->DB()->setQuery($sqlQuery);
			$result = $this->Util()->DB()->GetResult();
			
			$h = 0;
			$m = 0;
							
			foreach($result as $res){
				
				$sqlQuery = 'SELECT 
								scheduletestId 
							FROM 
								gradereport_user
							WHERE
								gradereportId IN ('.$arrGrIds.')
							AND
								alumnoId = '.$res['alumnoId'].'
							AND
								scheduletestId = 13';
				$this->Util()->DB()->setQuery($sqlQuery);
				$scheduletestId = $this->Util()->DB()->GetSingle();
							
				if($res['sexo'] == 'm')
					$h++;
				else
					$m++;
			}
			
			echo 'Total = '.count($result);
			echo '<br>H = '.$h;
			echo '<br>M = '.$m;
			
		}else{
			echo 'Nada';
		}
		exit;
	
	}//GetStudentsRegular
		
}//Report

class PDF_MC_Table2 extends FPDF
{

	var $widths;
	var $aligns;
	
	function SetWidths($w)
	{
		//Set the array of column widths
		$this->widths=$w;
	}
	
	function SetAligns($a)
	{
		//Set the array of column alignments
		$this->aligns=$a;
	}
	
	function Row($data)
	{
		//Calculate the height of the row
		$nb=0;
		for($i=0;$i<count($data);$i++)
			$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
		$h=5*$nb;
		//Issue a page break first if needed
		$this->CheckPageBreak($h);
		//Draw the cells of the row
		for($i=0;$i<count($data);$i++)
		{
			$w=$this->widths[$i];
			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
			//Save the current position
			$x=$this->GetX();
			$y=$this->GetY();
			//Draw the border
			$this->Rect($x,$y,$w,$h);
			//Print the text
			$this->MultiCell($w,5,$data[$i],0,$a);
			//Put the position to the right of the cell
			$this->SetXY($x+$w,$y);
		}
		//Go to the next line
		$this->Ln($h);
	}
	
	function CheckPageBreak($h)
	{
		//If the height h would cause an overflow, add a new page immediately
		if($this->GetY()+$h>$this->PageBreakTrigger)
			$this->AddPage($this->CurOrientation);
	}
	
	function NbLines($w,$txt)
	{
		//Computes the number of lines a MultiCell of width w will take
		$cw=&$this->CurrentFont['cw'];
		if($w==0)
			$w=$this->w-$this->rMargin-$this->x;
		$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
		$s=str_replace("\r",'',$txt);
		$nb=strlen($s);
		if($nb>0 and $s[$nb-1]=="\n")
			$nb--;
		$sep=-1;
		$i=0;
		$j=0;
		$l=0;
		$nl=1;
		while($i<$nb)
		{
			$c=$s[$i];
			if($c=="\n")
			{
				$i++;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
				continue;
			}
			if($c==' ')
				$sep=$i;
			$l+=$cw[$c];
			if($l>$wmax)
			{
				if($sep==-1)
				{
					if($i==$j)
						$i++;
				}
				else
					$i=$sep+1;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
			}
			else
				$i++;
		}
		return $nl;
	}
}//PDF_MC_TABLE2

?>