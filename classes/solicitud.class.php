<?php
class Solicitud extends Module
{

	private $nombre;
	private $Id;
	private $tipo;
	private $motivo;
	private $status;
	private $userId;
	private $tiposolicitudId;
	private $solicitudId;

	
	public function setId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->Id = $value;
	}
	
	public function setSolicitudId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->solicitudId = $value;
	}
	
	public function setUserId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->userId = $value;
	}
	
	public function setTipoSolicitudId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->tiposolicitudId = $value;
	}

	public function setTipo($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->tipo = $value;
	}
	
	public function setNombre($value)
	{
		$this->Util()->ValidateString($value);
		$this->nombre = $value;
	}
	
	public function setStatus($value)
	{
		$this->Util()->ValidateString($value);
		$this->status = $value;
	}
	
	public function setMotivo($value)
	{
		$this->Util()->ValidateString($value);
		$this->motivo = $value;
	}
	
	public function enumarateSolicitudes($value)
	{
		$sqlQuery = 'SELECT 
					* 
				FROM 
					solicitud 
				WHERE  userId = '.$_SESSION['User']['userId'].' and tiposolicitudId  = '.$this->tipo.'';

		$this->Util()->DB()->setQuery($sqlQuery);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	public function enumarateSolicitudesAdmin($value)
	{
		$filtro = '';
		
		if($this->userId){
			$filtro .= ' and s.userId = '.$this->userId;
		}
		
		if($this->tiposolicitudId){
			$filtro .= ' and t.tiposolicitudId = '.$this->tiposolicitudId;
		}
		
		if($this->status){
			$filtro .= ' and s.estatus = "'.$this->status.'"';
		}
		
		if($this->inicio and $this->fin){
			$filtro .= ' and s.fechaSolicitud >= "'.$this->inicio.'" and fechaSolicitud <= "'.$this->fin.'"';
		}
		
		
		
		 $sqlQuery = 'SELECT 
					*,
					t.nombre as solicitud
				FROM 
					solicitud as s 
				left join user as u on u.userId = s.userId
				left join tiposolicitud as t on t.tiposolicitudId = s.tiposolicitudId
				WHERE  1 '.$filtro.'';
// exit;
			
	
		$this->Util()->DB()->setQuery($sqlQuery);
		$result = $this->Util()->DB()->GetResult();
		// echo '<pre>'; print_r($result);
		// exit;
		return $result;
	}
	
	
	public function SaveSolicitud()
	{
		$status = "";
		
		if($this->tipo == 4){
			$status = "completado";
		}else{
			$status = "pendiente";
		}
		
		
		 $sqlQuery = 'SELECT 
					count(*)
				FROM 
					solicitud 
				WHERE  tiposolicitudId = '.$this->tipo.' and estatus <> "completado"';
		$this->Util()->DB()->setQuery($sqlQuery);
		$countS = $this->Util()->DB()->GetSingle();
		
		if($countS >= 1){
			echo 'fail[#]';
			echo '<center><font color="red">Existe una solicitud del mismo tipo en progreso</font></center>';
			exit;
		}
		
		
		 $sqlNot="insert into 
				solicitud(
				fechaSolicitud,
				tiposolicitudId,
				estatus,
				motivo,
				userId
				)
			   values(
			            '".date('Y-m-d')."', 
			            '".$this->tipo."',
			            '".$status."',
			            '".$this->motivo."',
			            '".$_SESSION['User']['userId']."'
			         )";
					 
			$this->Util()->DB()->setQuery($sqlNot);
			$Id = $this->Util()->DB()->InsertData(); 
			
			// if($this->tipo ==1 or $this->tipo ==2){ 
				// $ext = end(explode('.', basename($_FILES['comprobante']['name'])));
				// $filename  = "comprobante_".$Id.".".$ext;
				// $target_path = DOC_ROOT."/alumnos/comprobantes/comprobante_".$Id.".".$ext; 
				
				// move_uploaded_file($_FILES['comprobante']['tmp_name'], $target_path);
				
				// $sqlQuery = "UPDATE solicitud set ruta ='".$filename."'  where solicitudId = '".$Id."'"; 	
				// $this->Util()->DB()->setQuery($sqlQuery);
				// $this->Util()->DB()->ExecuteQuery();			  
			// }
		return true;
	}
	
	
	public function buscaBaja()
	{
		$sqlQuery = 'SELECT 
					* 
				FROM 
					solicitud 
				WHERE  userId = '.$_SESSION['User']['userId'].' and tiposolicitudId  = 3';

		$this->Util()->DB()->setQuery($sqlQuery);
		$result = $this->Util()->DB()->GetRow();
		
		return $result;
	}
	
	public function upSolicitudBaja()
	{
		// buscar la ultima baja y actulizarle la ruta
		$ext = end(explode('.', basename($_FILES['comprobante']['name'])));
		$filename  = "solicitud_".$Id.".".$ext;
		$target_path = DOC_ROOT."/alumnos/bajas/solicitud_".$Id.".".$ext; 
		
		move_uploaded_file($_FILES['comprobante']['tmp_name'], $target_path);
		
		$sqlQuery = "UPDATE solicitud set ruta ='".$filename."'  where solicitudId = '".$Id."'"; 	
		$this->Util()->DB()->setQuery($sqlQuery);
		$this->Util()->DB()->ExecuteQuery();
		
		return true;
	}
	
	
	
	
	public function arraySolicitudes()
	{
		$sqlQuery = 'SELECT 
					* 
				FROM 
					tiposolicitud 
				WHERE  1';

		$this->Util()->DB()->setQuery($sqlQuery);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
	}
	
	
	
	public function countReferenciaBancaria()
	{
		
		// echo '<pre>'; print_r($_SESSION);
		// exit;
		$sqlQuery = 'SELECT 
					count(*)
				FROM 
					solicitud 
				WHERE  tiposolicitudId = 5 and userId = '.$_SESSION['User']['userId'].'';

		$this->Util()->DB()->setQuery($sqlQuery);
		$result = $this->Util()->DB()->GetSingle();
		
		return $result;
	}
	
	
	public function enviarArchivo()
	{
		// buscar la ultima baja y actulizarle la ruta
		$ext = end(explode('.', basename($_FILES['comprobante']['name'])));
		$filename  = "solicitud_".$this->solicitudId.".".$ext;
		$target_path = DOC_ROOT."/alumnos/comprobantes/solicitud_".$this->solicitudId.".".$ext; 
		
		move_uploaded_file($_FILES['comprobante']['tmp_name'], $target_path);
		
		$sqlQuery = "UPDATE solicitud set ruta ='".$filename."', estatus ='en progreso'  where solicitudId = '".$this->solicitudId."'"; 	
		$this->Util()->DB()->setQuery($sqlQuery);
		$this->Util()->DB()->ExecuteQuery();
		
		return true;
	}
	
	
	public function enviarArchivoConstancia()
	{
		// buscar la ultima baja y actulizarle la ruta
		$ext = end(explode('.', basename($_FILES['comprobante']['name'])));
		$filename  = "solicitud_".$this->solicitudId.".".$ext;
		$target_path = DOC_ROOT."/alumnos/doc_adjuntos/doc_".$this->solicitudId.".".$ext; 
		
		move_uploaded_file($_FILES['comprobante']['tmp_name'], $target_path);
		
		$sqlQuery = "UPDATE solicitud set rutaAdjunto ='".$filename."', estatus ='completado'  where solicitudId = '".$this->solicitudId."'"; 	
		$this->Util()->DB()->setQuery($sqlQuery);
		$this->Util()->DB()->ExecuteQuery();
		
		return true;
	}
	
	public function cursoActivo()
	{
		 $sqlQuery = 'SELECT 
					*
				FROM 
					user_subject as u
				left join course as c on c.courseId  = u.courseId
				WHERE  c.active = "si" and u.alumnoId = '.$_SESSION['User']['userId'].'';
		$this->Util()->DB()->setQuery($sqlQuery);
		$result = $this->Util()->DB()->GetResult();
		return $result;
	}
	
	public function semestresxSubject($Id)
	{
		 $sqlQuery = 'SELECT 
					*
				FROM 
					subject_module as s
				WHERE  subjectId = '.$Id.' group by semesterId';
				// exit;
		$this->Util()->DB()->setQuery($sqlQuery);
		$result = $this->Util()->DB()->GetResult();
		
		foreach ($result  as $key=>$aux){
			 $sqlQuery = 'SELECT 
					count(*)
				FROM 
					confirma_inscripcion as c
				WHERE  subjectId = '.$Id.' and userId  = '.$_SESSION['User']['userId'].' and nivel = '.$aux['semesterId'].'';
			$this->Util()->DB()->setQuery($sqlQuery);
			$coun = $this->Util()->DB()->GetSingle();
			
			if($coun >= 1){
				$result[$key]['tiene'] = 'si';
			}
		}
		
		return $result;
	}
	
	

}	
?>