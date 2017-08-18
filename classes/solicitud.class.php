<?php
class Solicitud extends Module
{

	private $nombre;
	private $Id;
	private $tipo;
	private $motivo;

	
	public function setId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->Id = $value;
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
			$filtro .= $this->userId;
		}
		
		if($this->tiposolicitudId){
			$filtro .= $_SESSION['User']['userId'];
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
			            'pendiente',
			            '".$this->motivo."',
			            '".$_SESSION['User']['userId']."'
			         )";
					 
			$this->Util()->DB()->setQuery($sqlNot);
			$Id = $this->Util()->DB()->InsertData(); 
			
			if($this->tipo ==1 or $this->tipo ==2){ 
				$ext = end(explode('.', basename($_FILES['comprobante']['name'])));
				$filename  = "comprobante_".$Id.".".$ext;
				$target_path = DOC_ROOT."/alumnos/comprobantes/comprobante_".$Id.".".$ext; 
				
				move_uploaded_file($_FILES['comprobante']['tmp_name'], $target_path);
				
				$sqlQuery = "UPDATE solicitud set ruta ='".$filename."'  where solicitudId = '".$Id."'"; 	
				$this->Util()->DB()->setQuery($sqlQuery);
				$this->Util()->DB()->ExecuteQuery();			  
			}
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
	
	
	


}	
?>