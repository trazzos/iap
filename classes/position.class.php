<?php
	class Position extends Main
	{
		private $positionId;			//identificador del puesto dentro de la base de datos
		private $clave;			//clave del puesto segun el control de la institucion
		private $name;			//nombre del puesto
		private $description;	//descripcion del puesto
		
		public function setEmptyAll()
		{
			$this->positionId = 0;
			$this->clave = '';
			$this->name = '';
			$this->description = '';
		}
		
		public function setPositionId($value)
		{
			$this->Util()->ValidateInteger($value);
			$this->positionId = (int)$value;
		}
		
		public function setClave($value)
		{
			$this->Util()->ValidateString($value, 10, 1, "Clave");
			$this->clave = $value;
		}
		
		public function setName($value)
		{
			$this->Util()->ValidateString($value, 60, 1, "Nombre");
			$this->name = $value;
		}
		
		public function setDescription($value)
		{
			$this->Util()->ValidateString($value, 255, 0, "Descripcion");
			$this->description = $value;
		}
		
		public function getPositionId()
		{
			return $this->positionId;
		}

		public function getClave()
		{
			return $this->clave;
		}

		public function getName()
		{
			return $this->name;
		}
		
		public function getDescription()
		{
			return $this->description;
		}
		
		public function Enumerate()
		{
			//configaramos la consulta de seleccion
			$this->Util()->DB()->setQuery('SELECT * FROM position WHERE positionId <> 1 ORDER BY positionId');
			//ejecutamos la consulta y regresamos el resultado
			return $this->Util()->DB()->GetResult();
		}

		public function FindClave()
		{
			//creamos la cadena de seleccion
			$sql = "SELECT
						*
					FROM
						position
					WHERE
						clave ='" . $this->clave . "'";
			//configuramos la consulta con la cadena de seleccion
			$this->Util()->DB()->setQuery($sql);
			//ejecutamos la consulta y regresamos el resultado
			return $this->Util()->DB()->GetRow();
		}

		public function Save()
		{
			if($this->Util()->PrintErrors())
			{
				// si hay errores regresa false
				return false;
			}
			//si no hay errores
			//creamos la cadena de insercion
			$sql = "INSERT INTO
						position
						( 	
						 	clave,
							name,
							description 
						)
					VALUES ('" .
							$this->clave . "', '" .
							$this->name . "', '" .
							$this->description .
							"')";
			//echo $sql;		// <---para propositos de duparacion
			//configuramos la consulta con la cadena de insercion
			$this->Util()->DB()->setQuery($sql);
			//ejecutamos la consulta y guardamos el resultado, que sera el ultimo positionId generado
			$result = $this->Util()->DB()->InsertData();
			if($result > 0)
			{
				//si el resultado es mayor a cero, se inserto el nuevo registro con exito...se regresara true
				$result = true;
				$this->Util()->setError(60000, 'complete');
			}
			else
			{
				//si el resultado es cero, no se pudo insertar el nuevo registro...se regresara false
				$result = false;
				$this->Util()->setError(60010, 'error');
			}
			$this->Util()->PrintErrors();
			return $result;
		}
		
		public function Update()
		{
			if($this->Util()->PrintErrors())
			{
				// si hay errores regresa false
				return false;
			}
			//si no hay errores
			//creamos la cadena de actualizacion
			$sql = "UPDATE 
						position 
					SET
						clave='".$this->clave."', 
						name='".$this->name. "', 
						description='" 	. $this->description. "'
						WHERE positionId='" . $this->positionId . "'";
			//echo $sql;		// <---para propositos de duparacion
			//configuramos la consulta con la cadena de actualizacion
			$this->Util()->DB()->setQuery($sql);
			//ejecutamos la consulta y guardamos el resultado, que sera el numero de columnas afectadas
			$this->Util()->DB()->UpdateData();
			$result = 1;
			if($result > 0)
			{
				//si el resultado es mayor a cero, se actualizo el registro con exito
				$result = true;
				$this->Util()->setError(60002,'complete');
			}
			else
			{
				//si el resultado es cero, no se pudo modificar el registro...se regresa false
				$result = false;
				$this->Util()->setError(60011,'error');
			}
			$this->Util()->PrintErrors();
			return $result;
		}
		
		public function Delete()
		{
			if($this->Util()->PrintErrors())
			{
				// si hay errores regresa false
				return false;
			}
			//si no hay errores
			//creamos la cadena de eliminacion
			$sql = "DELETE FROM 
						position 
					WHERE 
						positionId='" . $this->positionId . "'";
			//configuramos la consulta con la cadena de eliminacion
			$this->Util()->DB()->setQuery($sql);
			//ejecutamos la consulta y regresamos el resultado, que sera el numero de columnas afectadas
			$result = $this->Util()->DB()->DeleteData();
			if($result > 0)
			{
				//si el resultado es mayor a cero, se actualizo el registro con exito
				$result = true;
				$this->Util()->setError(60001,'complete');
			}
			else
			{
				//si el resultado es cero, no se pudo modificar el registro...se regresa false
				$result = false;
				$this->Util()->setError(60012,'error');
			}
			$this->Util()->PrintErrors();
			return $result;
		}
		
		public function GetNameById(){
			
			$this->Util()->DB()->setQuery('SELECT name FROM position WHERE positionId = '.$this->positionId);
			
			return $this->Util()->DB()->GetSingle();
			
		}
		
		public function Info()
		{
			//creamos la cadena de seleccion
			$sql = "SELECT 
						* 
					FROM
						position
					WHERE
						positionId='" . $this->positionId . "'";
			//configuramos la consulta con la cadena de actualizacion
			$this->Util()->DB()->setQuery($sql);
			//ejecutamos la consulta y obtenemos el resultado
			$result = $this->Util->EncodeRow($this->Util()->DB()->GetRow());
			//guardamos en los demas miembros de la clase los datos obtenidos por si los necesitamos individualmente
			//***el valor de positionId fue establecido antes de ejecutarse la consulta 
			//***al obtener el valor desde $_POST, por lo que no es necesario recuperarlo
			$this->clave =$result->clave;
			$this->name = $result->name;
			$this->description = $result->description;
			//regresamos el resultado obtenido por si fuera necesario usar todos los datos en otra variable
			return $result;
		}
		
		public function GetClaveById(){
			
			$sql = 'SELECT 
						clave
					FROM 
						position 
					WHERE 
						positionId = '.$this->positionId;
			
			$this->Util()->DB()->setQuery($sql);
			
			return $this->Util()->DB()->GetSingle();
			
		}
		
				
	}
?>