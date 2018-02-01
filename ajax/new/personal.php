<?php
// echo "<pre>"; print_r($_POST);
// exit;
include_once('../../init.php');
include_once('../../config.php');
include_once(DOC_ROOT.'/libraries.php');
session_start();

switch($_POST["type"])
{
    case "addPersonal":

        $states = $util->EnumerateStates();
        $listPositions = $position->Enumerate();
        $positions = $util->EncodeResult($listPositions);
        $listRoles = $role->Enumerate();
        $roles = $util->EncodeResult($listRoles);
		
        $lstPd = $personal->enumerateAbreviaciones();
		
		// echo '<pre>'; print_r($lstPd);
		// exit;

        $smarty->assign('lstPd', $lstPd);
        $smarty->assign('states', $states);
        $smarty->assign("roles",$roles);
        $smarty->assign("positions",$positions);
        $smarty->assign("DOC_ROOT", DOC_ROOT);
        $smarty->display(DOC_ROOT.'/templates/forms/new/add-personal.tpl');

        break;

    case "editPersonal":

        $states = $util->EnumerateStates();
        $personal->setPersonalId($_POST['id']);
        $info = $personal->Info();
        $listPositions = $position->Enumerate();
        $positions = $util->EncodeResult($listPositions);
        $listRoles = $role->Enumerate();
        $roles = $util->EncodeResult($listRoles);
		$lstPd = $personal->enumerateAbreviaciones();

        foreach($roles as $key => $val){

            $personal->setRoleId($val['roleId']);

            $roles[$key]["selected"] = false;
            if($personal->IsRoleSelected())
            {
                $roles[$key]["selected"] = true;
            }

/*            if(!$personal->IsRoleSelected())
            {
                $roles2[$key] = $val;
            }*/
        }

		// echo '<pre>'; print_r($info);
		// exit;
        $usrRoles = $personal->EnumerateRoles();

        $smarty->assign('lstPd', $lstPd);
        $smarty->assign('states', $states);
        $smarty->assign("usrRoles",$usrRoles);
        $smarty->assign("roles",$roles);
        $smarty->assign("positions",$positions);
        $smarty->assign("info", $info);
        $smarty->assign("DOC_ROOT", DOC_ROOT);
        $smarty->display(DOC_ROOT.'/templates/forms/new/edit-personal.tpl');

        break;

    case "saveAddPersonal":

	// echo '<pre>'; print_r($_POST);
	// exit;
        $personal->setPositionId($_POST['positionId']);
        $personal->setName($_POST['name']);
        $personal->setLastnamePaterno($_POST['lastname_paterno']);
        $personal->setLastnameMaterno($_POST['lastname_materno']);
        $personal->setStateId($_POST['stateId']);
        $personal->setUserName($_POST['username']);
        $personal->setPasswd($_POST['passwd']);
        $personal->setDescription($_POST['description']);
        $_POST['list_roles'] = implode(',', $_POST['role_from']);

        $personal->setRolesId($_POST['list_roles']);

        $personal->setCurp($_POST['curp']);
        $personal->setRfc($_POST['rfc']);
        $personal->setSexo($_POST['sexo']);
        $personal->setFechaNacimiento($_POST['fecha_nacimiento']);
        $personal->setFechaSep($_POST['fecha_sep']);
        $personal->setFechaDgta($_POST['fecha_dgta']);
        $personal->setClavesPresupuestales($_POST['claves_presupuestales']);
        $personal->setCategoria($_POST['categoria']);
        $personal->setPerfil($_POST['perfil']);
        $personal->setProf($_POST['prof']);

        if(!$personal->Save())
        {
            echo "fail[#]";
            $smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
        }
        else
        {
            echo "ok[#]";
            $smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
            echo "[#]";
            $result = $personal->Enumerate();
            $personals = $util->EncodeResult($result);
            $smarty->assign("personals", $personals);
            $smarty->assign("DOC_ROOT", DOC_ROOT);
            $smarty->display(DOC_ROOT.'/templates/lists/personal.tpl');
        }

        break;

    case "saveEditPersonal":

	// echo '<pre>'; print_r($_POST['id']);
	// exit;
        $personal->setPositionId($_POST['positionId']);
        $personal->setPersonalId($_POST['id']);
        $personal->setName($_POST['name']);
        $personal->setLastnamePaterno($_POST['lastname_paterno']);
        $personal->setLastnameMaterno($_POST['lastname_materno']);
        $personal->setStateId($_POST['stateId']);
        $personal->setUserName($_POST['username']);
        $personal->setPasswd($_POST['passwd']);
        $personal->setDescription($_POST['description']);
        $personal->setRolesId($_POST['list_roles']);

        $personal->setCurp($_POST['curp']);
        $personal->setRfc($_POST['rfc']);
        $personal->setSexo($_POST['sexo']);
        $personal->setFechaNacimiento($_POST['fecha_nacimiento']);
        $personal->setFechaSep($_POST['fecha_sep']);
        $personal->setFechaDgta($_POST['fecha_dgta']);
        $personal->setClavesPresupuestales($_POST['claves_presupuestales']);
        $personal->setCategoria($_POST['categoria']);
        $personal->setPerfil($_POST['perfil']);
		$personal->setProf($_POST['prof']);

        if(!$personal->Update())
        {
            echo "fail[#]";
            $smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
        }
        else
        {
            echo "ok[#]";
            $smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
            echo "[#]";
            $result = $personal->Enumerate();
            $personals = $util->EncodeResult($result);
            $smarty->assign("personals", $personals);
            $smarty->assign("DOC_ROOT", DOC_ROOT);
            $smarty->display(DOC_ROOT.'/templates/lists/personal.tpl');
        }

        break;

    case 'deletePersonal':

        $personal->setPersonalId($_POST['id']);

        if(!$personal->Delete())
        {
            echo "fail[#]";
            $smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
        }
        else
        {
            echo "ok[#]";
            $smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
            echo "[#]";
            $result = $personal->Enumerate();
            $personals = $util->EncodeResult($result);
            $smarty->assign("personals", $personals);
            $smarty->assign("DOC_ROOT", DOC_ROOT);
            $smarty->display(DOC_ROOT.'/templates/lists/personal.tpl');
        }

        break;

    case 'getCurp':

        $name = $_POST['name'];
        $paterno = $_POST['paterno'];
        $materno = $_POST['materno'];
        $stateId = $_POST['stateId'];
        $sexo = $_POST['sexo'];
        $fecha = $_POST['fecha'];

        $f = explode('-',$fecha);

        if($stateId)
            $stateClave = $util->GetClaveState($stateId);

        $Curp->SetDatos($name, $paterno, $materno, $sexo, $f[0], $f[1], $f[2], $stateClave);

        if($Curp->CURP != ''){
            echo 'ok[#]';
            echo $Curp->CURP;
        }

        break;

    case 'doLogin':
        $username = strip_tags(trim($_POST['username']));
        $passwd = strip_tags(trim($_POST['passwd']));

        if($username == '' || $passwd == ''){
            echo 'fail[#]';
            echo 'empty';
            exit;
        }

        $user->setUsername($username);
        $user->setPassword($passwd);
        //exit();
        if($user->do_login()){
            echo "ok[#]";
        }else{
            echo "fail[#]";
            echo 'data';
        }

    break;
	
	case 'compruebaFirma':
	
		$count = $personal->compruebaFirma();
		if($count >= 1){
			echo 'fail[#]';
			echo '<font color="red">Ya existe una persona con la opcion de firmar, por favor desactive todos y vuelva a intentar</font>';
		}

	break;
	
	case 'adjuntarDocDocente':
	
		// echo '<pre>'; print_r($_FILES);
		// echo '<pre>'; print_r($_POST);
		// exit;
		$personal->setDocumentoId($_POST['catId']);
		$personal->setPersonalId($_SESSION["User"]["userId"]);
		if($personal->adjuntarDocDocente()){
				echo "ok[#]";
				echo '<div class="alert alert-info alert-dismissable">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>El mensaje se adjunto correctamente</strong>
				</div>';
				echo '[#]';
				$personal->setPersonalId($_SESSION['User']['userId']);
				$registros = $personal->enumerateCatProductos();
				$smarty->assign("registros", $registros);
				$smarty->assign("DOC_ROOT", DOC_ROOT);
				$smarty->display(DOC_ROOT.'/templates/lists/new/doc-docente.tpl');
				
			}else{
				echo "fail[#]";
				//$util->ShowErrors();
			}
	
	break;
	
	
}

?>
