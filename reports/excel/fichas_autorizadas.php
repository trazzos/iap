<?php
header("Content-Type:application/vnd.ms-excel");header("content-disposition: attachment; filename=fichasAutorizadas".date('d_m_Y').".xls");header("Pragma: no-cache");header("Expires: 0");

include_once('../../init.php');
include_once('../../config.php');
include_once(DOC_ROOT.'/libraries.php');


$titulos = "Folio Ficha\tApellido Paterno\tApellido Materno\tNombre\tCURP\tFecha_Nac\tEstado_Nac\tMunicipio_Nac\tSexo\tDomicilio\tColonia\tCP\tTelefono\tClave_Plantel\tCarrera 1\tCarrera 2\tCarrera 3\tModalidad 3\tClave_Sec 3\tRegimen_Sec\tModalidad\tComunidad\tEstado_Sec\tMunicipio_Sec\tPromedio\tCertificado\n";

echo $titulos;
	
	$result = $ficha->Enumerate('', ' AND status = "autorizada"');
	
	if($result){	
		
		foreach($result as $ficha)
		{ 
       echo $ficha["folioFicha"]."\t";
       echo $ficha["lastNamePaterno"]."\t";
       echo $ficha["lastNameMaterno"]."\t";
       echo $ficha["names"]."\t";
       echo $ficha["curp"]."\t";
       echo $ficha["birthdate"]."\t";
       echo $ficha["state"]."\t";
       echo $ficha["city"]."\t";
       echo $util->SexoString($ficha["sexo"])."\t";
       echo $ficha["street"]." ".$ficha["number"]."\t";
       echo $ficha["colony"]."\t";
       echo $ficha["postalCode"]."\t";
       echo $ficha["phone"]."\t";
       echo $property["config"]["clavePlantel"]."\t";
       echo $ficha["major"]."\t";
       echo $ficha["major2"]."\t";
       echo $ficha["major3"]."\t";
       echo $util->GetMode($ficha["mode"])."\t";
       echo $ficha["prevSchKey"]."\t";
       echo $ficha["prevSchType"]."\t";
       echo $util->GetMode($ficha["prevSchMode"])."\t";
       echo $ficha["prevSchCity"]."\t";
       echo $ficha["prevSchState"]."\t";
       echo $ficha["prevSchCity"]."\t";
       echo $ficha["prevSchAverage"]."\t";
       echo $ficha["prevSchCertified"]."\n"; 
	  }
	}
?>