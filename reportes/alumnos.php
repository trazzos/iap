<?php
	
//	session_start();
	//header('Content-Encoding: UTF-8');
	
	include_once('../init.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');
	
	//Obtenemos las materias
    
	$titulos .= "Numero de Control\tNombre\tApellido Paterno\tApellido Materno\tFecha de Nacimiento\tCorreo Electronico\tTelefono\tCalle\tNumero\tColonia\tPais\tEstado\tCiudad\tCodigo Postal\tSexo\tCURP\tEstado Civil\tTelefono de Emergencia\tCelular\tLugar de Trabajo\tOcupacion\tDireccion del Trabajo\tArea del trabajo\tPosicion de trabajo\tCiudad del Trabajo\tTelefono del trabajo\tEmail del trabajo\tGrado academico\tEscuela\tPreparatoria\tMaestria\tEscuela de maestria\t";
			
			
	//echo $titulos;	
	//echo "\n";
$alumnos=$student->EnumerateTotal();
$paises=$student->EnumeratePaises();
	
	
		$x = "
	<table>
		<th colspan=\"32\" style=\"text-align:center\">IAP EN LINEA</th>
	</table>
	<br><br>
	";
	
	$x .= "<table border=\"1\">
	<thead>		
		<tr>
			<th style=\"background:#E0E5E7;text-align:center\"><b>Numero de Control</b></th>
			<th style=\"background:#E0E5E7;text-align:center\"><b>Nombres</b></th>
			<th style=\"background:#E0E5E7;text-align:center\"><b>Apellido Paterno  </b></th>
			<th style=\"background:#E0E5E7;text-align:center\"><b>Apellido Materno</b></th>
			<th style=\"background:#E0E5E7;text-align:center\"><b>Feche de Nacimiento </b></th>
			<th style=\"background:#E0E5E7;text-align:center\"><b>Correo Electr&oacute;nico</b></th>
			<th style=\"background:#E0E5E7;text-align:center\"><b>Telefono</b></th>
			<th style=\"background:#E0E5E7;text-align:center\"><b>Calle</b></th>
			<th style=\"background:#E0E5E7;text-align:center\"><b>Numero</b></th>
			<th style=\"background:#E0E5E7;text-align:center\"><b>Colonia</b></th>
			<th style=\"background:#E0E5E7;text-align:center\"><b>Pais</b></th>
			<th style=\"background:#E0E5E7;text-align:center\"><b>Estado</b></th>
			<th style=\"background:#E0E5E7;text-align:center\"><b>Ciudad</b></th>
			<th style=\"background:#E0E5E7;text-align:center\"><b>Codigo Postal</b></th>
			<th style=\"background:#E0E5E7;text-align:center\"><b>Sexo</b></th>
			<th style=\"background:#E0E5E7;text-align:center\"><b>Curp </b></th>
			<th style=\"background:#E0E5E7;text-align:center\"><b> Estado Civil</b></th>
			<th style=\"background:#E0E5E7;text-align:center\"><b>Telefono de Emergencia </b></th>
			<th style=\"background:#E0E5E7;text-align:center\"><b> Celular</b></th>
			<th style=\"background:#E0E5E7;text-align:center\"><b>Lugar de Trabajo</b></th>
			<th style=\"background:#E0E5E7;text-align:center\"><b>Ocupaci&aocute;n </b></th>
			<th style=\"background:#E0E5E7;text-align:center\"><b> Direcci&oacute;n de Trabajo</b></th>
			<th style=\"background:#E0E5E7;text-align:center\"><b>Area de Trabajo</b></th>
			<th style=\"background:#E0E5E7;text-align:center\"><b>Posici&oacute;n de trabajo</b></th>
			<th style=\"background:#E0E5E7;text-align:center\"><b>Ciudad de Trabajo</b></th>
			<th style=\"background:#E0E5E7;text-align:center\"><b>Telefono de Trabajo</b></th>
			<th style=\"background:#E0E5E7;text-align:center\"><b>Email de Trabajo</b></th>
			<th style=\"background:#E0E5E7;text-align:center\"><b>Grado Academico</b></th>
			<th style=\"background:#E0E5E7;text-align:center\"><b>Escuela</b></th>
			<th style=\"background:#E0E5E7;text-align:center\"><b> Preparatoria</b></th>
			<th style=\"background:#E0E5E7;text-align:center\"><b>Maestria</b></th>
			<th style=\"background:#E0E5E7;text-align:center\"><b>Escuela de Maestria</b></th>
			
		
		</tr>
	</thead>
	<tbody>";
	
	
	
		foreach($alumnos as $res)
		{
	    $pa=0;	
	    $edo=0;
	    $city=0;
	
			    foreach($paises as $pais){
			     if($pais['paisId']==$res["pais"]){
				    $paisName=$pais['nombre'];
				    $pa=1;
				     $paisId=$pais["paisId"];
				 }}
				if($pa==0) 
				 $paisName="Pais no identificado";
			
			  if(isset($paisId)){
			  $student->setCountry($paisId);
              $estados=$student->EnumerateEstados();
                          
  			 if(count($estados)>0){
			     foreach($estados as $estado){
				     if($estado['estadoId']==$res["estado"]){
					 $estadoName=$estado['nombre'];
					  $edo=1;
					  $estadoId=$estado["estadoId"];
					 }}		 
			 }}
			 if($edo==0)	 
			 $estadoName="Estado no identificado";
				 
				 
				   if(isset($estadoId)){
			  $student->setState($estadoId);
              $ciudades=$student->EnumerateCiudades();
                        
  			 if(count($ciudades)>0){
			     foreach($ciudades as $ciudad){
				     if($ciudad['municipioId']==$res["ciudad"]){
					 $ciudadName=$ciudad['nombre'];
					  $city=1;
			      }}		 
			 }}
			 if($edo==0)	 
			$ciudadName="Ciudad no identificada"; 
			
			
		
		$x .= "
		<tr>
			<td style=\"text-align:left;\">".$res['controlNumber']."</td>
			<td style=\"text-align:left;\">".htmlentities($res['names'], ENT_QUOTES,'UTF-8')."</td>
			<td style=\"text-align:center;\">".htmlentities($res['lastNamePaterno'], ENT_QUOTES,'UTF-8')."</td>
			<td style=\"text-align:left;\">".htmlentities($res['lastNameMaterno'], ENT_QUOTES,'UTF-8')."</td>
			<td style=\"text-align:center;\">".$res['birthdate']."</td>
			<td style=\"text-align:center;\">".$res['email']."</td>
			<td style=\"text-align:center;\">".$res['phone']."</td>
			<td style=\"text-align:center;\">".htmlentities($res['street'], ENT_QUOTES,'UTF-8')."</td>
			<td style=\"text-align:center;\">".$res['number']."</td>
			<td style=\"text-align:center;\">".htmlentities($res['colony'], ENT_QUOTES,'UTF-8')."</td>
			<td style=\"text-align:center;\">".$paisName."</td>
			<td style=\"text-align:center;\">".$estadoName."</td>
			<td style=\"text-align:center;\">".htmlentities($ciudadName, ENT_QUOTES,'UTF-8')."</td>
			<td style=\"text-align:center;\">".$res['postalCode']."</td>
			<td style=\"text-align:center;\">".$res['sexo']."</td>
			<td style=\"text-align:center;\">".$res['curp']."</td>
			<td style=\"text-align:center;\">".$res['maritalStatus']."</td>
			<td style=\"text-align:center;\">".$res['fax']."</td>
			<td style=\"text-align:center;\">".$res['mobile']."</td>
			<td style=\"text-align:center;\">".htmlentities($res['workplace'], ENT_QUOTES,'UTF-8')."</td>
			<td style=\"text-align:center;\">".htmlentities($res['workplaceOcupation'],ENT_QUOTES,'UTF-8')."</td>
			<td style=\"text-align:center;\">".htmlentities($res['workplaceAddress'], ENT_QUOTES,'UTF-8')."</td>
			<td style=\"text-align:center;\">".htmlentities($res['workplaceArea'], ENT_QUOTES,'UTF-8')."</td>
			<td style=\"text-align:center;\">".htmlentities($res['workplacePosition'], ENT_QUOTES,'UTF-8')."</td>
			<td style=\"text-align:center;\">".htmlentities($res['workplaceCity'], ENT_QUOTES,'UTF-8')."</td>
			<td style=\"text-align:center;\">".$res['workplacePhone']."</td>
			<td style=\"text-align:center;\">".$res['workplaceEmail']."</td>
			<td style=\"text-align:center;\">".htmlentities($res['academicDegree'], ENT_QUOTES,'UTF-8')."</td>
			<td style=\"text-align:center;\">".htmlentities($res['school'], ENT_QUOTES,'UTF-8')."</td>
			<td style=\"text-align:center;\">".htmlentities($res['highSchool'], ENT_QUOTES,'UTF-8')."</td>
			<td style=\"text-align:center;\">".htmlentities($res['masters'], ENT_QUOTES,'UTF-8')."</td>
			<td style=\"text-align:center;\">".htmlentities($res['mastersSchool'], ENT_QUOTES,'UTF-8')."</td>
		</tr>";
		
	}//foreach
	

	
	$x .= "
		
		</tbody>
	</table>";
	
			

		 
	
	  
	
	$name="Lista_Alumnos_".date('d_m_Y');
	
//	echo "\xEF\xBB\xBF";
	header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
	header("Content-type:   application/x-msexcel; charset=utf-8");
	header("Content-Disposition: attachment; filename=".$name.".xls");
	header("Pragma: no-cache");
	header("Expires: 0");

	
echo $x;
?>