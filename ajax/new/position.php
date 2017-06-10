<?php
include_once('../../init.php');
include_once('../../config.php');
include_once(DOC_ROOT.'/libraries.php');

$smarty->assign("DOC_ROOT", DOC_ROOT);
switch($_POST["type"])
{
    case 'addPosition':
        //$smarty->assign("DOC_ROOT", DOC_ROOT);
        $smarty->display(DOC_ROOT.'/templates/forms/new/add-position.tpl');
        break;
    case 'saveAddPosition':
        $position->setClave(strtoupper($_POST['frmClave']));
        $position->setName(strtoupper($_POST['frmName']));
        $position->setDescription(strtoupper($_POST['frmDescription']));
        if($position->Save())
        {
            echo "ok[#]";
            $smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
            echo "[#]";
            $positions = $position->Enumerate();
            $positions = $util->EncodeResult($positions);
            $smarty->assign("positions", $positions);
            $smarty->assign("DOC_ROOT", DOC_ROOT);
            $smarty->display(DOC_ROOT.'/templates/lists/position.tpl');
        }
        else
        {
            echo "fail[#]";
            $smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
        }
        break;
    case 'editPosition':

        $smarty->assign("DOC_ROOT", DOC_ROOT);
        $position->setPositionId($_POST['id']);
        $myPosition = $position->Info();
        $myPosition = $util->EncodeRow($myPosition);

        $smarty->assign("post", $myPosition);
        $smarty->display(DOC_ROOT.'/templates/forms/new/edit-position.tpl');

        break;
    case 'saveEditPosition':
        $position->setPositionId($_POST['positionId']);
        $position->setClave(strtoupper($_POST['frmClave']));
        $position->setName(strtoupper($_POST['frmName']));
        $position->setDescription(strtoupper($_POST['frmDescription']));
        if($position->Update())
        {
            echo "ok[#]";
            $smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
            echo "[#]";
            $positions = $position->Enumerate();
            $positions = $util->EncodeResult($positions);
            $smarty->assign("positions", $positions);
            $smarty->assign("DOC_ROOT", DOC_ROOT);
            $smarty->display(DOC_ROOT.'/templates/lists/position.tpl');
        }
        else
        {
            echo "fail[#]";
            $smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
        }
        break;
    case 'deletePosition':
        $position->setPositionId($_POST['positionId']);
        if($position->Delete())
        {
            echo "ok[#]";
            $smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
            echo "[#]";
            $positions = $position->Enumerate();
            $positions = $util->EncodeResult($positions);
            $smarty->assign("positions", $positions);
            $smarty->assign("DOC_ROOT", DOC_ROOT);
            $smarty->display(DOC_ROOT.'/templates/lists/position.tpl');
        }
        else
        {
            echo "fail[#]";
            $smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
        }
        break;
}
?>