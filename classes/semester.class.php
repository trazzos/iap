<?php
	class Semester extends Main
	{
		private $id;
		private $clave;
		private $name;
		
		public function setSemesterId($value)
		{
			$this->id = $value;	
		}
		
		public function setClave($value)
		{
			$this->Util()->ValidateString($value, 60, 1, 'Clave');
			$this->clave = $value;
		}
		
		public function setName($value)
		{
			$this->Util()->ValidateString($value, 60, 1, 'Nombre');
			$this->name = $value;
		}
		
		public function getSemesterId()
		{
			return $this->id;
		}
		
		public function getClave()
		{
			return $this->clave;
		}
		
		public function getName()
		{
			return $this->name;
		}
		
		public function Enumerate()
		{
			
			$this->Util()->DB()->setQuery('SELECT * FROM semester ORDER BY name');
			
			return $this->Util()->DB()->GetResult();
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
						semester
						( 	
						 	clave,
							name
						)
					VALUES ('" .
							$this->clave . "', '" .
							$this->name .
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
				$this->Util()->setError(80000, 'complete');
			}
			else
			{
				//si el resultado es cero, no se pudo insertar el nuevo registro...se regresara false
				$result = false;
				$this->Util()->setError(80010, 'error');
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
						semester
					SET
						clave='" 	. $this->clave . "', 
						name='" 	. $this->name . "'
						WHERE semesterId='" . $this->id . "'";
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
				$this->Util()->setError(80002,'complete');
			}
			else
			{
				//si el resultado es cero, no se pudo modificar el registro...se regresa false
				$result = false;
				$this->Util()->setError(80011,'error');
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
						semester 
					WHERE 
						semesterId='" . $this->id . "'";
			//configuramos la consulta con la cadena de eliminacion
			$this->Util()->DB()->setQuery($sql);
			//ejecutamos la consulta y regresamos el resultado, que sera el numero de columnas afectadas
			$result = $this->Util()->DB()->DeleteData();
			if($result > 0)
			{
				//si el resultado es mayor a cero, se actualizo el registro con exito
				$result = true;
				$this->Util()->setError(80001,'complete');
			}
			else
			{
				//si el resultado es cero, no se pudo modificar el registro...se regresa false
				$result = false;
				$this->Util()->setError(80012,'error');
			}
			$this->Util()->PrintErrors();
			return $result;
		}
		
		public function GetNameById(){
			
			$this->Util()->DB()->setQuery('SELECT clave FROM semester WHERE semesterId = '.$this->id);
			
			return $this->Util()->DB()->GetSingle();
					
		}

		public function Info()
		{
			//creamos la cadena de seleccion
			$sql = "SELECT 
						* 
					FROM
						semester
					WHERE
						semesterId='" . $this->id . "'";
			//configuramos la consulta con la cadena de actualizacion
			$this->Util()->DB()->setQuery($sql);
			//ejecutamos la consulta y obtenemos el resultado
			$result = $this->Util()->DB()->GetRow();
			//guardamos en los demas miembros de la clase los datos obtenidos por si los necesitamos individualmente
			//***el valor de positionId fue establecido antes de ejecutarse la consulta 
			//***al obtener el valor desde $_POST, por lo que no es necesario recuperarlo
			$this->clave =$result->clave;
			$this->name = $result->name;
			//regresamos el resultado obtenido por si fuera necesario usar todos los datos en otra variable
			return $result;
		}
		
	}
?>