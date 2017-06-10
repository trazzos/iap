<?php
include_once('../../init.php');
include_once('../../config.php');
include_once(DOC_ROOT.'/libraries.php');

$smarty->assign("DOC_ROOT", DOC_ROOT);
switch($_POST["type"])
{
    case 'addPosition':
        //$smarty->assign("DOC_ROOT", DOC_ROOT);
        $smarty->display(DOC_ROOT.'/templates/forms/new/add-profesion.tpl');
        break;
    case 'saveAddPosition':
        $profesion->setProfesionName(strtoupper($_POST['frmName']));
        if($profesion->Save())
        {
            echo "ok[#]";
            $smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
            echo "[#]";
            $profesions = $profesion->Enumerate();
            $profesions = $util->EncodeResult($profesions);
            $smarty->assign("profesions", $profesions);
            $smarty->assign("DOC_ROOT", DOC_ROOT);
            $smarty->display(DOC_ROOT.'/templates/lists/profesion.tpl');
        }
        else
        {
            echo "fail[#]";
            $smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
        }
        break;
    case 'editPosition':

        $smarty->assign("DOC_ROOT", DOC_ROOT);
        $profesion->setProfesionId($_POST['id']);
        $myProfesion = $profesion->Info();
        $myProfesion = $util->EncodeRow($myProfesion);

        $smarty->assign("post", $myProfesion);
        $smarty->display(DOC_ROOT.'/templates/forms/new/edit-profesion.tpl');

        break;
    case 'saveEditPosition':
        $profesion->setProfesionId($_POST['positionId']);
        $profesion->setProfesionName(strtoupper($_POST['frmName']));
        if($profesion->Update())
        {
            echo "ok[#]";
            $smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
            echo "[#]";
            $profesions = $profesion->Enumerate();
            $profesions = $util->EncodeResult($profesions);
            $smarty->assign("profesions", $profesions);
            $smarty->assign("DOC_ROOT", DOC_ROOT);
            $smarty->display(DOC_ROOT.'/templates/lists/profesion.tpl');
        }
        else
        {
            echo "fail[#]";
            $smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
        }
        break;
    case 'deletePosition':
        $profesion->setProfesionId($_POST['positionId']);
        if($profesion->Delete())
        {
            echo "ok[#]";
            $smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
            echo "[#]";
            $profesions = $profesion->Enumerate();
            $profesions = $util->EncodeResult($profesions);
            $smarty->assign("profesions", $profesions);
            $smarty->assign("DOC_ROOT", DOC_ROOT);
            $smarty->display(DOC_ROOT.'/templates/lists/profesion.tpl');
        }
        else
        {
            echo "fail[#]";
            $smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
        }
        break;
}
?>