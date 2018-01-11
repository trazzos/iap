<?php

class Personal extends Main
{
	private $personalId;
	private $rolesId;
	private $roleId;
	private $positionId;
	private $name;
	private $description;
	private $username;
	private $passwd;
	private $curp;
	private $rfc;
	private $sexo;
	private $fechaNacimiento;
	private $fechaSep;
	private $fechaDgta;
	private $clavesPresupuestales;
	private $categoria;
	private $perfil;
	private $lastnamePaterno;
	private $lastnameMaterno;
	private $stateId;
	private $foto;
	private $correo;
	private $celular;
	private $semblanza;
	private $prof;
	private $ine;
	private $calle;
	private $nInterior;
	private $nExterior;
	private $colonia;
	private $estado;
	private $ciudad;
	private $firmaConstancia;
	
	public function setFirmaConstancia($value)
	{
		$this->Util()->ValidateString($value, $max_chars=255, $minChars = 0, "Firma Constancia");
		$this->firmaConstancia = $value;
	}
	
	public function setIne($value)
	{
		$this->Util()->ValidateString($value, $max_chars=255, $minChars = 0, "INE");
		$this->ine = $value;
	}
	
	public function setCalle($value)
	{
		$this->Util()->ValidateString($value, $max_chars=255, $minChars = 0, "Calle");
		$this->calle = $value;
	}
	
	public function setNInterior($value)
	{
		$this->Util()->ValidateString($value, $max_chars=255, $minChars = 0, "N. Interior");
		$this->nInterior = $value;
	}
	
	public function setNExterior($value)
	{
		$this->Util()->ValidateString($value, $max_chars=255, $minChars = 0, "N. Exterior");
		$this->nExterior = $value;
	}
	
	public function setColonia($value)
	{
		
		$this->Util()->ValidateString($value, $max_chars=255, $minChars = 0, "Colonia");
		$this->colonia = $value;
		
	}
	
	public function setEstado($value)
	{
		$this->Util()->ValidateString($value, $max_chars=255, $minChars = 0, "Estado");
		$this->estado = $value;
	}
	
	public function setCiudad($value)
	{
		$this->Util()->ValidateString($value, $max_chars=255, $minChars = 0, "Ciudad");
		$this->ciudad = $value;
	}

	public function setFoto($value)
	{
		$this->Util()->ValidateString($value, $max_chars=60, $minChars = 0, "Foto");
		$this->foto = $value;
	}

	public function setCorreo($value)
	{
		$this->Util()->ValidateString($value, $max_chars=60, $minChars = 0, "Correo");
		$this->correo = $value;
	}

	public function setCelular($value)
	{
		$this->Util()->ValidateString($value, $max_chars=60, $minChars = 0, "Celular");
		$this->celular = $value;
	}

	public function setSemblanza($value)
	{
		$this->Util()->ValidateString($value, $max_chars=60, $minChars = 0, "Semblanza");
		$this->semblanza = $value;
	}

	public function setPersonalId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->personalId = $value;
	}
	
	public function setProf($value)
	{
		// $this->Util()->ValidateInteger($value);
		$this->prof = $value;
	}
	
	public function setRolesId($value)
	{
		//$this->Util()->ValidateOption($value, "Rol");			
		$this->rolesId = $value;
	}
	
	public function setRoleId($value)
	{
		$this->roleId = $value;
	}
	
	public function setPositionId($value)
	{
		$this->Util()->ValidateOption($value, "Puesto");			
		$this->positionId = $value;
	}
	
	public function setName($value)
	{
		$this->Util()->ValidateString($value, $max_chars=60, $minChars = 1, "Nombre");
		$this->name = $value;
	}
	
	public function setLastnamePaterno($value)
	{
		$this->Util()->ValidateString($value, $max_chars=60, $minChars = 1, "Apellido Paterno");
		$this->lastnamePaterno = $value;
	}
	
	public function setLastnameMaterno($value)
	{
		$this->Util()->ValidateString($value, $max_chars=60, $minChars = 1, "Apellido Materno");
		$this->lastnameMaterno = $value;
	}
	
	public function setStateId($value)
	{
		$this->Util()->ValidateOption($value, "Estado");			
		$this->stateId = $value;
	}
	
	public function setCurp($value)
	{
		$this->curp = $value;
	}
	
	public function setRfc($value)
	{
		$this->rfc = $value;
	}
	
	public function setSexo($value)
	{
		$this->Util()->ValidateOption($value, "Sexo");
		$this->sexo = $value;
	}
	
	public function setFechaNacimiento($value)
	{
		$this->fechaNacimiento = $value;
	}
	
	public function setFechaSep($value)
	{
		$this->fechaSep = $value;
	}
	
	public function setFechaDgta($value)
	{
		$this->fechaDgta = $value;
	}
	
	public function setClavesPresupuestales($value)
	{
		$this->clavesPresupuestales = $value;
	}
	
	public function setCategoria($value)
	{
		$this->categoria = $value;
	}
	
	public function setPerfil($value)
	{
		$this->perfil = $value;
	}	
	
	public function setUserName($value)
	{
		$this->Util()->ValidateString($value, $max_chars=60, $minChars = 0, "Usuario");
		$this->username = $value;
	}
	
	public function setPasswd($value)
	{
		$this->Util()->ValidateString($value, $max_chars=60, $minChars = 0, "Contrasena");
		$this->passwd = $value;
	}
	
	public function setDescription($value)
	{
		$this->Util()->ValidateString($value, $max_chars=1000000, $minChars = 0, "Descripcion");
		$this->description = $value;
	}
	
	public function getPersonalId()
	{
		return $this->personalId;
	}
	
	public function getRolesId()
	{
		return $this->rolesId;
	}
	
	public function getRoleId()
	{
		return $this->roleId;
	}
	
	public function getPositionId()
	{
		return $this->positionId;
	}
	
	public function getName($value)	
	{		
		return $this->name;
	}
	
	public function getLastnamePaterno($value)	
	{		
		return $this->lastnamePaterno;
	}
	
	public function getLastnameMaterno($value)	
	{		
		return $this->lastnameMaterno;
	}
	
	public function getStateId()
	{
		return $this->stateId;	
	}
	
	public function getUserName($value)	
	{		
		return $this->username;
	}
	
	public function getPasswd($value)	
	{		
		return $this->passwd;
	}
	
	public function getDescription($value)	
	{		
		return $this->description;
	}
	
	public function getCurp($value)
	{
		return $this->curp;
	}
	
	public function getRfc($value)
	{
		return $this->rfc;
	}
	
	public function getSexo($value)
	{
		return $this->sexo;
	}
	
	public function getFechaSep($value)
	{
		return $this->fechaSep;
	}
	
	public function getFechaDgta($value)
	{
		return $this->fechaDgta;
	}
	
	public function getClavesPresupuestales($value)
	{
		return $this->clavesPresupuestales;
	}
	
	public function getCategoria($value)
	{
		return $this->categoria;
	}
	
	public function getPerfil($value)
	{
		return $this->perfil;
	}	

	public function Enumerate($orden = 'name ASC')
	{
		global $position;
		global $role;
		
		$sql = "SELECT 
					* 
				FROM 
					personal
				WHERE
					positionId <> 1
				ORDER BY 
					".$orden;
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		foreach($result as $key => $row)
		{
			$result[$key]["wrappedDescription"] = $this->Util()->ShortString($result[$key]["description"], 50);
			$position->setPositionId($row['positionId']);
			$result[$key]['position'] = $position->GetClaveById();
			$role->setRoleId($row['roleId']);
			$result[$key]['role'] = $role->GetClaveById();
		}
		
		return $result;
	}
	
	public function EnumerateByPosition()
	{
		global $position;
		
		$sql = "SELECT 
					* 
				FROM 
					personal
				WHERE
					positionId = ".$this->positionId."
				ORDER BY 
					lastname_paterno ASC, lastname_materno ASC, name ASC";
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		foreach($result as $key => $row)
		{
			$result[$key]["wrappedDescription"] = $this->Util()->ShortString($result[$key]["description"], 50);
			$position->setPositionId($row['positionId']);
			$result[$key]['position'] = $position->GetNameById();
			$this->setPersonalId($row['personalId']);
			$result[$key]['name'] = $row['name'].' '.$row['lastname_paterno'].' '.$row['lastname_materno'];	
		}
		
		return $result;
	}
	
	public function EnumerateRoles()
	{	
		global $role;
			
		$sql = "SELECT 
					* 
				FROM 
					personal_role
				WHERE
					personalId = ".$this->personalId." 
				";
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		foreach($result as $key => $row)
		{
			$role->setRoleId($row['roleId']);
			$result[$key]['name'] = utf8_encode($role->GetRoleNameById());
		}
		
		return $result;
	}
	
	public function Info()
	{
		
		$sql = "SELECT 
					* 
				FROM 
					personal 
				WHERE 
					personalId = '".$this->personalId."'";
	
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();
		
		$row = $info;		// anexado hrsc
		if($info)			// para evitar errores cuando no hay registros que coinciden con $this->personalId
			$row = $this->Util->EncodeRow($info);
		
		return $row;
	}
	
	public function Save(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "INSERT INTO 
					personal 
					(						
						positionId, 
						name,
						lastname_materno,
						lastname_paterno,
						stateId, 
						username,
						passwd,
						description,
						curp,
						rfc,
						sexo,
						fecha_nacimiento,
						fecha_sep,
						fecha_dgta,
						claves_presupuestales,
						categoria,
						perfil,
						profesion
					)
				 VALUES 
					(						
						".$this->positionId.",
						'".$this->name."',
						'".$this->lastnamePaterno."',
						'".$this->lastnameMaterno."',
						'".$this->stateId."',
						'".$this->username."',
						'".$this->passwd."', 
						'".$this->description."',
						'".$this->curp."',
						'".$this->rfc."',
						'".$this->sexo."',
						'".$this->fechaNacimiento."',
						'".$this->fechaSep."',
						'".$this->fechaDgta."',
						'".$this->clavesPresupuestales."',
						'".$this->categoria."',
						'".$this->perfil."',
						'".$this->prof."'
					)";
								
		$this->Util()->DB()->setQuery($sql);
		$personalId = $this->Util()->DB()->InsertData();
		
		$listRoles = explode(',',$this->rolesId);
		
		if($listRoles){
		
			foreach($listRoles as $val){
				if(!empty($val)){
					$sql = "INSERT INTO 
								personal_role 
								(						
									personalId, 
									roleId
								)
							 VALUES 
								(						
									".$personalId.",
									".$val."
								)";
											
					$this->Util()->DB()->setQuery($sql);
					$this->Util()->DB()->InsertData();
				}
			}//foreach
		}
		
		$this->Util()->setError(10031, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Update(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}

		 $sql = "UPDATE
					personal SET positionId = ".$this->positionId.",
				 	name =  '".$this->name."',
					lastname_paterno = '".$this->lastnamePaterno."',
					lastname_materno = '".$this->lastnameMaterno."',
					stateId = '".$this->stateId."', 
					username =  '".$this->username."', 
					passwd =  '".$this->passwd."', 
					description = '".$this->description."',
					curp = '".$this->curp."',
					rfc = '".$this->rfc."',
					sexo = '".$this->sexo."',
					fecha_nacimiento = '".$this->fechaNacimiento."',
					fecha_sep = '".$this->fechaSep."',
					fecha_dgta = '".$this->fechaDgta."',
					claves_presupuestales = '".$this->clavesPresupuestales."',
					categoria = '".$this->categoria."',
					correo = '".$this->correo."',
					celular = '".$this->celular."',
					semblanza = '".$this->semblanza."',
					perfil = '".$this->perfil."',
					profesion = '".$this->prof."',
					firmaConstancia = '".$this->firmaConstancia."'
				WHERE 
					personalId = ".$this->personalId;
					
		
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();

		if($this->foto != "")
		{
			$sql = "UPDATE personal SET
					foto = '".$this->foto."'
				WHERE
					personalId = ".$this->personalId;
			$this->Util()->DB()->setQuery($sql);
			$this->Util()->DB()->ExecuteQuery();
		}


		$listRoles = explode(',',$this->rolesId);
		
		if($listRoles){
			
			$sql = 'DELETE FROM personal_role WHERE personalId = '.$this->personalId;
			$this->Util()->DB()->setQuery($sql);
			$this->Util()->DB()->ExecuteQuery();
			
			foreach($listRoles as $val){
				if(!empty($val)){
					$sql = "INSERT INTO 
								personal_role 
								(						
									personalId, 
									roleId
								)
							 VALUES 
								(						
									".$this->personalId.",
									".$val."
								)";
											
					$this->Util()->DB()->setQuery($sql);
					$this->Util()->DB()->InsertData();
				}
			}//foreach
		}
		

		//actualizamos imagen de firma
		$url = DOC_ROOT;
		$archivo = "firma";
		foreach($_FILES as $key=>$var)
		{
		   switch($key)
		   {
				   case $archivo:
					   if($var["name"]<>""){
							$aux = explode(".",$var["name"]);
							$extencion=end($aux);
							$temporal = $var['tmp_name'];
							$foto_name="firma_".$this->personalId.".".$extencion;		
							if(move_uploaded_file($temporal,$url."/images/docente/firmas/".$foto_name)){						
								$sql = "UPDATE personal SET
										rutaFirma = '".$foto_name."'
									WHERE
										personalId = ".$this->personalId;
								$this->Util()->DB()->setQuery($sql);
								$this->Util()->DB()->ExecuteQuery();
							}   
						}
					break;
			}
		}
		
		$this->Util()->setError(10033, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function Delete(){
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = "DELETE FROM 
					personal
				WHERE 
					personalId = ".$this->personalId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$sql = "DELETE FROM 
					personal_role
				WHERE 
					personalId = ".$this->personalId;
							
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		$this->Util()->setError(10032, "complete");
		$this->Util()->PrintErrors();
		
		return true;
				
	}
	
	public function IsRoleSelected()
	{
		
		$sql = "SELECT 
					roleId 
				FROM 
					personal_role 
				WHERE 
					personalId = ".$this->personalId."
					AND	roleId = ".$this->roleId;
	
		$this->Util()->DB()->setQuery($sql);
		$roleId = $this->Util()->DB()->GetSingle();
				
		return $roleId;
	}
	
	public function GetNameById(){
			
		$sql = 'SELECT 
					lastname_paterno, lastname_materno, name 
				FROM 
					personal 
				WHERE 
					personalId = '.$this->personalId;
		
		$this->Util()->DB()->setQuery($sql);		
		$row = $this->Util()->DB()->GetRow();
		
		$name = $row['name'].' '.$row['lastname_paterno'].' '.$row['lastname_materno'];
		
		return $name;
		
	}

	public function UpdateFoto($id)
	{
		$ext = end(explode('.', basename($_FILES['foto']['name'])));
		if(strtolower($ext) != "jpg" && strtolower($ext) != "jepg" && strtolower($ext) != "png")
		{
			return;
		}

		$target_path = DOC_ROOT."/personal_foto/".$id.".".$ext;

		if(move_uploaded_file($_FILES['foto']['tmp_name'], $target_path)) {
		}

		$path = "personal_foto/".$id.".".$ext;

		return $path;
	}
	
	
	
	public function extraeFirmaActa()
	{
		
		$sql = "SELECT 
					* 
				FROM 
					personal 
				WHERE 
					firmaConstancia = 'si'";
	
		$this->Util()->DB()->setQuery($sql);
		$info9 = $this->Util()->DB()->GetRow();
		
		$sql = "SELECT 
					* 
				FROM 
					personal 
				WHERE 
					positionId = 3";
	
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();
		
		$data['director'] = $info9['profesion'].' '.$info9['name'].' '.$info9['lastname_paterno'].' '.$info9['lastname_materno'];
		$data['controlEscolar'] = $info['profesion'].' '.$info['name'].' '.$info['lastname_paterno'].' '.$info['lastname_materno'];
				
		return $data;
	}
	
	
	public function enumerateAbreviaciones()
	{
		
		$sql = "SELECT 
					* 
				FROM 
					abreviacion 
				WHERE 
					1 order by abreviacion ASC";
	
		$this->Util()->DB()->setQuery($sql);
		$info9 = $this->Util()->DB()->GetResult();
		
		return $info9;
	}
	
	
	public function updateDocente()
	{
		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		 $sql = "UPDATE
					personal 
					SET 
				 	name =  '".$this->name."',
					lastname_paterno = '".$this->lastnamePaterno."',
					lastname_materno = '".$this->lastnameMaterno."',
					correo = '".$this->correo."',
					rfc = '".$this->rfc."',
					INE = '".$this->ine."',
					calle = '".$this->calle."',
					nInterior = '".$this->nInterior."',
					nExterior = '".$this->nExterior."',
					colonia = '".$this->colonia."',
					estado = '".$this->estado."',
					ciudad = '".$this->ciudad."',
					fecha_nacimiento = '".$this->fechaNacimiento."'
				WHERE 
					personalId = ".$this->personalId;
					
		
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->ExecuteQuery();
		
		return true;
	}
	
	
	public function compruebaFirma()
	{
	
		$sql = "SELECT 
					count(*) 
				FROM 
					personal
				WHERE
					firmaConstancia = 'si'";
		$this->Util()->DB()->setQuery($sql);
		$count = $this->Util()->DB()->GetSingle();
		
		return $count;
	}
}


?>