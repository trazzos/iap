<?php

class Encuesta extends Main
{
	private $sucursalId;
	private $identificador;

	public function setSucursalId($value)
	{
		$this->Util()->ValidateInteger($value);
		$this->sucursalId = $value;
	}

	public function getSucursalId()
	{
		return $this->sucursalId;
	}

	public function setIdentificador($value, $checkIfExists = 0)
	{
		$this->Util()->ValidateString($value, $max_chars=300, $minChars = 1, "Identificador");
		$this->identificador = $value;
	}

	public function getIdentificador()
	{
		return $this->identificador;
	}

	function extraeCuestionario()
	{
		$this->Util()->DB()->setQuery("
		SELECT * FROM categoria_pregunta where encuestaId = 1");
		$result = $this->Util()->DB()->GetResult();
		$incr = 0;
		foreach($result as $key=>$aux){

			$sql = "SELECT * FROM pregunta where categoriapreguntaId = ".$aux['categoriapreguntaId']."";
			$this->Util()->DB()->setQuery($sql);
			$resultPreguntas = $this->Util()->DB()->GetResult();
			foreach($resultPreguntas as $keyp => $auxp){
				if($auxp["tiporespuesta"]=="opcional"){
					unset($opciones);
					$op = explode("_",$auxp["opcional"]);
					for($i=0;$i<=5;$i++){
						if($op[$i]<>""){
							$opciones[] = $op[$i];
						}
					}
					$resultPreguntas[$keyp]["opciones"] = $opciones;

				}
				$resultPreguntas[$keyp]["incr"] = $incr;
				$incr++;
			}

			$result[$key]['preguntas'] = $resultPreguntas;
		}


		return $result;
	}

	function promedioXRubro($cModuleId,$courseId)
	{
		$this->Util()->DB()->setQuery("
		SELECT * FROM categoria_pregunta where encuestaId = 1");
		$result = $this->Util()->DB()->GetResult();

		// falta pasar el coursemodule

		 $sql = "
				SELECT 
					count(*)
				FROM 
					resultado as r
				left join pregunta as p on p.preguntaId = r.preguntaId
				where 
					courseModuleId = ".$cModuleId." group by usuarioId ";
			// exit;
		$this->Util()->DB()->setQuery($sql);
		$ta = $this->Util()->DB()->GetResult();

		 $totalAlumnos  = count($ta);

		  $sql = "
				SELECT 
					count(*)
				FROM 
					user_subject
				where 
					courseId = ".$courseId."";

		$this->Util()->DB()->setQuery($sql);
		$totalGrupo = $this->Util()->DB()->GetSingle();

		// comentarios

		  $sql = "
				SELECT 
					*
				FROM 
					eval_alumno_docente
				where 
					courseModuleId = ".$cModuleId."";

		$this->Util()->DB()->setQuery($sql);
		$lstComentarios = $this->Util()->DB()->GetResult();


		foreach($result as $key=>$aux){

			 $sql = "
				SELECT 
					sum(respuesta)
				FROM 
					resultado as r
				left join pregunta as p on p.preguntaId = r.preguntaId
				where 
					p.categoriapreguntaId = ".$aux['categoriapreguntaId']." and courseModuleId = ".$cModuleId." ";

			$this->Util()->DB()->setQuery($sql);
			$sumR = $this->Util()->DB()->GetSingle();

			 $sql = "
				SELECT 
					count(respuesta)
				FROM 
					resultado as r
				left join pregunta as p on p.preguntaId = r.preguntaId
				where 
					p.categoriapreguntaId = ".$aux['categoriapreguntaId']." and courseModuleId = ".$cModuleId."";

			$this->Util()->DB()->setQuery($sql);
			$countR = $this->Util()->DB()->GetSingle();


			 $sql = "
				SELECT 
					*
				FROM 
					resultado as r
				left join pregunta as p on p.preguntaId = r.preguntaId
				where 
					p.categoriapreguntaId = ".$aux['categoriapreguntaId']." and courseModuleId = ".$cModuleId." group by p.preguntaId";
			// exit;
			$this->Util()->DB()->setQuery($sql);
			$lstPreguntas = $this->Util()->DB()->GetResult();

			foreach($lstPreguntas as $keyp=>$auxp){

				$sql = "
				SELECT 
					sum(respuesta)
				FROM 
					resultado as r
				left join pregunta as p on p.preguntaId = r.preguntaId
				where 
					p.preguntaId = ".$auxp['preguntaId']." and courseModuleId = ".$cModuleId."";

				$this->Util()->DB()->setQuery($sql);
				$totalPp = $this->Util()->DB()->GetSingle();

				$sql = "
				SELECT 
					count(respuesta)
				FROM 
					resultado as r
				left join pregunta as p on p.preguntaId = r.preguntaId
				where 
					p.preguntaId = ".$auxp['preguntaId']." and courseModuleId = ".$cModuleId."";

				$this->Util()->DB()->setQuery($sql);
				$countPj = $this->Util()->DB()->GetSingle();


				$lstPreguntas[$keyp]['totalPp'] = round( $totalPp/$countPj);
			}



			$result[$key]['lstPreguntas'] = $lstPreguntas;
			$result[$key]['sumR'] = $sumR;
			@$result[$key]['promedio'] = round($sumR/$countR) ;
		}

		$data['result']	= $result;
		$data['totalAlumnos']	= $totalAlumnos;
		$data['totalGrupo']	= $totalGrupo;
		$data['lstComentarios']	= $lstComentarios;

		return $data;
	}



	function promedioXRubroAdmin($personalId)
	{
		$this->Util()->DB()->setQuery("
		SELECT * FROM categoria_pregunta where encuestaId = 1");
		$categorias = $this->Util()->DB()->GetResult();

		// buscar los courses modules asigandos al profesor
		$sqlAssignedModules = "
				SELECT 
					c.courseModuleId
				FROM 
					course_module_personal as c
				left join course_module as cm on cm.courseModuleId = c.courseModuleId
				left join course as ce on ce.courseId = cm.courseId
				where 
					personalId = ".$personalId;

        $sqlCourseId = "
				SELECT 
					ce.courseId
				FROM 
					course_module_personal as c
				left join course_module as cm on cm.courseModuleId = c.courseModuleId
				left join course as ce on ce.courseId = cm.courseId
				where 
					personalId = ".$personalId;


        $this->Util()->DB()->setQuery($sqlAssignedModules);
		$ta = $this->Util()->DB()->GetResult();

        $sql = "
				SELECT 
					count(*)
				FROM 
					resultado as r
				left join pregunta as p on p.preguntaId = r.preguntaId
				where 
					courseModuleId in  (".$sqlAssignedModules.") group by usuarioId,courseModuleId ";

        $this->Util()->DB()->setQuery($sql);
        $ta = $this->Util()->DB()->GetResult();
	    $totalAlumnos  = count($ta);


		// total de alumnos
        $sql = "
				SELECT 
					count(*)
				FROM 
					user_subject
				where 
					courseId in (".$sqlCourseId.")";

		$this->Util()->DB()->setQuery($sql);
		$totalGrupo = $this->Util()->DB()->GetSingle();

		// comentarios
		  $sql = "
				SELECT 
					*
				FROM 
					eval_alumno_docente
				where 
					courseModuleId in (".$sqlAssignedModules.")";

		$this->Util()->DB()->setQuery($sql);
		$lstComentarios = $this->Util()->DB()->GetResult();

		foreach($categorias as $key=>$aux){
			 $sql = "
				SELECT 
					sum(respuesta) as total, count(respuesta) as respuestas
				FROM 
					resultado as r
				left join pregunta as p on p.preguntaId = r.preguntaId
				where 
					p.categoriapreguntaId = ".$aux['categoriapreguntaId']." and courseModuleId in (".$sqlAssignedModules.")";

			$this->Util()->DB()->setQuery($sql);
			$sumR = $this->Util()->DB()->GetRow();

            $sql = "
				SELECT 
					*, sum(respuesta) as total, count(respuesta) as countPj
				FROM 
					resultado as r
				left join pregunta as p on p.preguntaId = r.preguntaId
				where 
					p.categoriapreguntaId = ".$aux['categoriapreguntaId']." and courseModuleId IN (".$sqlAssignedModules.")
                group by p.preguntaId";
            $this->Util()->DB()->setQuery($sql);
            $lstPreguntas = $this->Util()->DB()->GetResult();

			foreach($lstPreguntas as $keyp=>$auxp){
				$lstPreguntas[$keyp]['totalPp'] = round( $auxp['total']/$auxp['countPj'] ?? 1, 2);
			}

            $categorias[$key]['lstPreguntas'] = $lstPreguntas;
            $categorias[$key]['sumR'] = $sumR['total'];
			@$categorias[$key]['promedio'] = round($sumR['total']/$sumR['respuestas'] ?? 1, 2) ;
		}

		$data['result']	= $categorias;
		$data['totalAlumnos']	= $totalAlumnos;
		$data['totalGrupo']	= $totalGrupo;
		$data['lstComentarios']	= $lstComentarios;

		return $data;
	}

}
