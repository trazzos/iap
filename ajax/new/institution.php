<?php

include_once('../../init.php');
include_once('../../config.php');
include_once(DOC_ROOT.'/libraries.php');

switch($_POST["type"])
{


    case "editInstitution":

        $smarty->assign("DOC_ROOT", DOC_ROOT);
        $institution->setInstitutionId($_POST['institutionId']);
        $myInstitution = $institution->Info();
        $smarty->assign("post", $myInstitution);
        $smarty->display(DOC_ROOT.'/templates/forms/new/edit-institution.tpl');

        break;

    case "saveEditInstitution":

        $institution->setInstitutionId($_POST['institutionId']);
        $institution->setName(strtoupper($_POST['name']));
        $institution->setName_long(strtoupper($_POST['name_long']));
        $institution->setIdentifier(strtoupper($_POST['identifier']));
        $institution->setUbication(strtoupper($_POST['ubication']));
        $institution->setUbication_long(strtoupper($_POST['ubication_long']));
        $institution->setPhone($_POST['phone']);
        $institution->setFax($_POST['fax']);
        $institution->setJefeOficina($_POST['jefeOficina']);
        $institution->setPresidente($_POST['presidente']);
        $institution->setRespServiciosEscolares($_POST['respServiciosEscolares']);
        $institution->setDirectorAcademico($_POST['directorAcademico']);
        $institution->setJefeServiciosEscolares($_POST['jefeServiciosEscolares']);

        if(!$institution->Edit())
        {
            echo "fail[#]";
            $smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
        }
        else
        {
            echo "ok[#]";
            $smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
            echo "[#]";
            $__institution = $institution->Enumerate();
            $__institution = $util->EncodeResult($__institution);
            $smarty->assign("__institution", $__institution);
            $smarty->assign("DOC_ROOT", DOC_ROOT);
            $smarty->display(DOC_ROOT.'/templates/lists/institution.tpl');
        }

        break;

}

?>
