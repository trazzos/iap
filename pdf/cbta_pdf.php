<?php
	include_once('mc_table.php');
	
	class CBTA_PDF_CALIF extends PDF_MC_Table{

		protected $professorFullName;
		protected $regularization;
		protected $semesterClave;
		protected $groupClave;
		protected $subjectName;
		protected $generation;
		protected $periodoName;
		protected $printR1;
	
		//cabecera de pagina
		function Header()
		{
			
			if($this->printR1)
				$titActa = 'ACTA DE CALIFICACIONES R1';
			else
				$titActa = 'ACTA DE CALIFICACIONES';
			
			
			$this->SetFont('ARIAL', '', 8);
			$this->Cell(0, 0, 'SECRETARÍA DE EDUCACION PUBLICA', 0, 0, 'C');
			$this->Ln(4);
			$this->Cell(0, 0, 'SUBSECRETARÍA DE EDUCACIÓN MEDIA SUPERIOR', 0, 0, 'C');
			$this->Ln(4);
			$this->Cell(0, 0, 'DIRECCIÓN GENERAL DE EDUCACIÓN TECNOLÓGICA AGROPECUARIA', 0, 0, 'C');
			$this->Ln(5);
			$this->SetFont('ARIAL', 'B', 8);
			$this->Cell(0, 0, 'CENTRO DE BACHILLERATO TECNOLÓGICO AGROPECUARIO No. '.NO_CBTA, 0, 0, 'C');
			$this->Ln(5);
			$this->SetFont('ARIAL', 'B', 10);
			$this->Cell(0, 0, $titActa, 0, 0, 'C');
			$this->Ln(5);
			
			$this->SetFont('ARIAL', 'B', 8);
			$this->Cell(22, 4, 'SEMESTRE : ', 0, 0, 'L');
			$this->SetFont('ARIAL', '', 8);
			$this->Cell(8, 4, $this->semesterClave, 0, 0, 'L');
			$this->SetFont('ARIAL', 'B', 8);
			$this->Cell(17, 4, 'GRUPO : ', 0, 0, 'L');
			$this->SetFont('ARIAL', '', 8);
			$this->Cell(63, 4, $this->groupClave, 0, 0, 'L');
			$this->SetFont('ARIAL', 'B', 8);
			$this->Cell(30, 4, 'CLAVE C.T. :', 0, 0, 'L');
			$this->SetFont('ARIAL', '', 8);
			$this->Cell(50, 4, '07DTA0024M', 0, 1, 'L');
			$this->Ln(0);
			
			$this->SetFont('ARIAL', 'B', 8);
			$this->Cell(20, 4, 'PERIODO : ', 0, 0, 'L');
			$this->SetFont('ARIAL', '', 8);
			$this->Cell(90, 4, $this->periodoName, 0, 0, 'L');
			$this->SetFont('ARIAL', 'B', 8);
			$this->Cell(30, 4, 'GENERACION : ', 0, 0, 'L');
			$this->SetFont('ARIAL', '', 8);
			$this->Cell(50, 4, $this->generation, 0, 1, 'L');
			$this->Ln(0);
			
			$this->SetFont('ARIAL', 'B', 8);			
			$this->Cell(20, 4, 'MATERIA : ', 0, 0, 'L');
			$this->SetFont('ARIAL', '', 8);
			$this->Cell(180, 4, $this->subjectName, 0, 1, 'L');
			$this->Ln(1);
			
			if(!$this->printR1){			
				$altoEncCeldas = 4;
				$this->Cell(105);			
				$this->Cell(101, $altoEncCeldas, 'CALIFICACION', 1, 1, 'C');
				$this->Ln(0);
			}else
				$this->Ln(5);
			
			
			$this->Cell(105);
			if( $this->regularization == 'N' )
			{
				if(!$this->printR1){
					// calificaicones parciales/globales/
					$this->Cell(30, $altoEncCeldas, 'INASISTENCIAS', 1, 0, 'C');
					$this->Cell(30, $altoEncCeldas, 'PARCIAL', 1, 0, 'C');
					$this->Cell(30, $altoEncCeldas, 'GLOBAL', 1, 0, 'C');
				}
			}
			else
			{
				// calificacion Intersemestral --- vacio
				$this->Cell(98, $altoEncCeldas, ' ', 1, 0, 'C');
			}
			if(!$this->printR1)
				$this->Cell(11, $altoEncCeldas, ' ', 1, 1, 'C');
				
			$this->Ln(0);
			
			$altoEncCeldas = 5;
			
			$this->Cell(8, $altoEncCeldas, 'No', 1, 0, 'C');
			$this->Cell(72, $altoEncCeldas, 'PATERNO MATERNO NOMBRE', 1, 0, 'C');
			$this->Cell(25, $altoEncCeldas, 'NO. CONTROL', 1, 0, 'C');
			if( $this->regularization == 'N' )
			{
				if($this->printR1){
					
					$this->Cell(90, $altoEncCeldas, '', 1, 0, 'C');
					
				}else{
					//Inasistencias
					$this->Cell(10, $altoEncCeldas, 'I', 1, 0, 'C');
					$this->Cell(10, $altoEncCeldas, 'II', 1, 0, 'C');
					$this->Cell(10, $altoEncCeldas, 'III', 1, 0, 'C');
					
					//Calificaciones Parciales/Globales/R1				
					$this->Cell(10, $altoEncCeldas, 'I', 1, 0, 'C');
					$this->Cell(10, $altoEncCeldas, 'II', 1, 0, 'C');
					$this->Cell(10, $altoEncCeldas, 'III', 1, 0, 'C');
					$this->Cell(10, $altoEncCeldas, 'I', 1, 0, 'C');
					$this->Cell(10, $altoEncCeldas, 'II', 1, 0, 'C');
					$this->Cell(10, $altoEncCeldas, 'III', 1, 0, 'C');					
				}
			}
			else
			{			
				$this->Cell(98, $altoEncCeldas, 'INTERSEMESTRAL', 1, 0, 'C');
			}
			$this->Cell(11, $altoEncCeldas, 'FINAL', 1, 1, 'C');
			$this->Ln(0);
			
		}
		
		//pie de pagina
		function Footer()
		{
			$this->setY(-15);
			$this->Cell(0, 0, $this->professorFullName , 0, 1, 'L');
			$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'R');
		}
		
		public function setProfessorFullName($value)
		{
			if(!is_string($value) || empty($value))
				$value = '*****';
			$this->professorFullName = $value;
		}
		
		public function setRegularization($value)
		{
			if(!is_string($value) || empty($value))
				$value = 'N';
			$this->regularization = $value;
		}
		
		public function setSemesterClave($value)
		{
			if(!is_string($value) || empty($value))
				$value = '*****';
			$this->semesterClave = $value;
		}
		
		public function setGroupClave($value)
		{
			if(!is_string($value) || empty($value))
				$value = '*****';
			$this->groupClave = $value;
		}
		
		public function setSubjectName($value)
		{
			if(!is_string($value) || empty($value))
				$value = '*****';
			$this->subjectName = $value;
		}
		
		public function setGeneration($value)
		{
			if(!is_string($value) || empty($value))
				$value = '*****';
			$this->generation = $value;
		}
		
		public function setPeriodoName($value)
		{
			if(!is_string($value) || empty($value))
				$value = '*****';
			$this->periodoName = $value;
		}
		
		public function setPrintR1($value){
			$this->printR1 = $value;
		}
		
	}
	
	class CBTA_PDF_LISTADO extends CBTA_PDF_CALIF{
		
		//cabecera de pagina
		function Header()
		{
			$this->SetFont('ARIAL', '', 8);
			$this->Cell(0, 0, 'SECRETARÍA DE EDUCACION PUBLICA', 0, 0, 'C');
			$this->Ln(4);
			$this->Cell(0, 0, 'SUBSECRETARÍA DE EDUCACIÓN MEDIA SUPERIOR', 0, 0, 'C');
			$this->Ln(4);
			$this->Cell(0, 0, 'DIRECCIÓN GENERAL DE EDUCACIÓN TECNOLÓGICA AGROPECUARIA', 0, 0, 'C');
			$this->Ln(4);
			$this->SetFont('ARIAL', 'B', 8);
			$this->Cell(0, 0, 'CENTRO DE BACHILLERATO TECNOLÓGICO AGROPECUARIO No. '.NO_CBTA, 0, 0, 'C');
			$this->Ln(5);
			$this->SetFont('ARIAL', 'B', 10);
			$this->Cell(0, 0, 'SEGUIMIENTO DE GRUPO', 0, 0, 'C');
			$this->Ln(5);
			
			$this->SetFont('ARIAL', 'B', 8);
			$this->Cell(22, 4, 'SEMESTRE : ', 0, 0, 'L');
			$this->SetFont('ARIAL', '', 8);
			$this->Cell(8, 4, $this->semesterClave, 0, 0, 'L');
			$this->SetFont('ARIAL', 'B', 8);
			$this->Cell(17, 4, '', 0, 0, 'L');
			$this->SetFont('ARIAL', '', 8);
			$this->Cell(63, 4, '', 0, 0, 'L');
			$this->SetFont('ARIAL', 'B', 8);
			$this->Cell(30, 4, 'CLAVE C.T. :', 0, 0, 'L');
			$this->SetFont('ARIAL', '', 8);
			$this->Cell(50, 4, '07DTA0024M', 0, 1, 'L');
			$this->Ln(0);
			
			$this->SetFont('ARIAL', 'B', 8);
			$this->Cell(20, 4, 'GRUPO : ', 0, 0, 'L');
			$this->SetFont('ARIAL', '', 8);
			$this->Cell(90, 4, $this->groupClave, 0, 0, 'L');
			$this->SetFont('ARIAL', 'B', 8);
			$this->Cell(30, 4, 'PERIODO : ', 0, 0, 'L');
			$this->SetFont('ARIAL', '', 8);
			$this->Cell(50, 4, $this->periodoName, 0, 1, 'L');
			$this->Ln(0);
			
			$this->SetFont('ARIAL', 'B', 8);
			$this->Cell(20, 4, 'MATERIA : ', 0, 0, 'L');
			$this->SetFont('ARIAL', '', 8);
			$this->Cell(90, 4, $this->subjectName, 0, 0, 'L');
			$this->Ln(1);
			
			$altoEncCeldas = 5;
						
			$this->Cell(11, 5, ' ', 0, 1, 'C');
			$this->Ln(0);
			
			$this->SetFont('ARIAL', 'B', 7);
			
			$this->Cell(8, $altoEncCeldas, 'No', 1, 0, 'C');
			$this->Cell(64, $altoEncCeldas, 'NOMBRE DEL ESTUDIANTE', 1, 0, 'C');
			$this->Cell(21, $altoEncCeldas, 'NO. CONTROL', 1, 0, 'C');			
			$this->Cell(48, $altoEncCeldas, 'INASISTENCIAS', 1, 0, 'C');			
			$this->Cell(8, $altoEncCeldas, 'TOT.', 1, 0, 'C');
			$this->Cell(8, $altoEncCeldas, 'DES.', 1, 0, 'C');
			$this->Cell(10, $altoEncCeldas, 'PROD.', 1, 0, 'C');
			$this->Cell(11, $altoEncCeldas, 'EXAM.', 1, 0, 'C');
			$this->Cell(15, $altoEncCeldas, 'CAL. FINAL', 1, 0, 'C');
			$this->Cell(10, $altoEncCeldas, 'OBS.', 1, 1, 'C');
			
			$this->Ln(0);
			

		}
		
		//pie de pagina
		function Footer()
		{
			$this->setY(-20);
			$this->Cell(0, 0, $this->professorFullName, 0, 1, 'L');
			
			$this->SetFont('ARIAL', 'B', 8);
			$this->setY(-15);
			$this->Cell(0, 0, 'Simbología  control de Inasistencia', 0, 1, 'L');			
			
			$this->SetFont('ARIAL', '', 8);
			$this->setY(-12);
			$this->Cell(0, 0, 'INASISTENCIA: Fecha      RETARDO: Fecha con diagonal     PERMISO: Fecha encerrado en un círculo  INDISCIPLINA: Asterisco', 0, 1, 'L');
			$this->Cell(0,10,'Pag. '.$this->PageNo().'/{nb}',0,0,'R');
		}
		
	}
	
?>