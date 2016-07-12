<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

include_once("../config.php");
include_once(DOC_ROOT."/properties/config.php");
include_once(DOC_ROOT."/classes/db.class.php");	

$postData = file_get_contents('php://input');

$postDataArray = array();
$datos = array();

$postDataArray = explode('&',$postData);


foreach($postDataArray as $key => $dato)
{
	$dat = explode('=',$dato);
	$datos[$dat[0]] = urldecode($dat[1]);
}

$db = new DB;

switch($datos['tipoTransaccion'])
{
	case 'getData':
		$query = "SELECT * FROM user WHERE userId = '".$datos['userId']."'";
		$db->setQuery($query);		
		$result = $db->getResult();
		echo json_encode($result);
	break;
	case 'updateData':
		$return = array();
		$fechaNac = explode('-',$datos['fecha_nac']);
		$datos['fecha_nac'] = date("d-m-Y", strtotime($datos['fecha_nac']));;
		
		$query = "UPDATE user SET names = '".$datos['nombre']."', lastNamePaterno = '".$datos['ape_pat']."', lastNameMaterno = '".$datos['ape_mat']."', birthdate = '".$datos['fecha_nac']."', email = '".$datos['email']."', phone = '".$datos['telefonoLocal']."', password = '".$datos['pw']."', street = '".$datos['calle']."', number = '".$datos['numero']."', colony = '".$datos['colonia']."', postalCode = '".$datos['codigoPostal']."', sexo = '".$datos['sexo']."', maritalStatus = '".$datos['edo_civil']."', fax = '".$datos['fax']."', mobile = '".$datos['celular']."', workplace = '".$datos['lugarTrabajo']."', workplaceAddress = '".$datos['domicilio']."', workplaceArea = '".$datos['area']."', workplacePosition = '".$datos['puesto']."', workplacePhone = '".$datos['telOficina']."', workplaceEmail = '".$datos['emailTrabajo']."', academicDegree = '".$datos['academicDegree']."', profesion = '".$datos['profesion']."', school = '".$datos['universidad']."' WHERE userId = ".$datos['userId'];
		
		$db->setQuery($query);		
		$result = $db->updateData();
		if($result > 0)
		{
			$return = array("result"=>"yes");
		}else
		{
			$return = array("result"=>"fail");
		}
		echo json_encode($return);
	break;
}

?>