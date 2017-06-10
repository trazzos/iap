<?php
include_once('../../init.php');
include_once('../../config.php');
include_once(DOC_ROOT.'/libraries.php');

$smarty->assign("DOC_ROOT", DOC_ROOT);
switch($_POST["type"])
{
    case 'addRecording':
        //$smarty->assign("DOC_ROOT", DOC_ROOT);
        $smarty->display(DOC_ROOT.'/templates/forms/new/add-recording.tpl');
        break;
    case 'saveAddRecording':
        $recording->setTitle($_POST['title']);
        $recording->setEmbed($_POST['embed']);
        if($recording->Save())
        {
            echo "ok[#]";
            $smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
            echo "[#]";
            $recordings = $recording->Enumerate();
            $recordings = $util->EncodeResult($recordings);
            $smarty->assign("recordings", $recordings);
            $smarty->assign("DOC_ROOT", DOC_ROOT);
            $smarty->display(DOC_ROOT.'/templates/lists/recordings.tpl');
        }
        else
        {
            echo "fail[#]";
            $smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
        }
        break;
    case 'editRecording':

        $smarty->assign("DOC_ROOT", DOC_ROOT);
        $myRecording = $recording->Info($_POST['recordingId']);
        $myRecording = $util->EncodeRow($myRecording);

        $smarty->assign("post", $myRecording);
        $smarty->display(DOC_ROOT.'/templates/forms/new/edit-recording.tpl');

        break;
    case 'saveEditRecording':
        $recording->setTitle($_POST['title']);
        $recording->setEmbed($_POST['embed']);
        if($recording->Update($_POST['recordingId']))
        {
            echo "ok[#]";
            $smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
            echo "[#]";
            $recordings = $recording->Enumerate();
            $recordings = $util->EncodeResult($recordings);
            $smarty->assign("recordings", $recordings);
            $smarty->assign("DOC_ROOT", DOC_ROOT);
            $smarty->display(DOC_ROOT.'/templates/lists/recordings.tpl');
        }
        else
        {
            echo "fail[#]";
            $smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
        }
        break;
    case 'deleteRecording':

        if($recording->Delete($_POST['recordingId']))
        {
            echo "ok[#]";
            $smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
            echo "[#]";
            $recordings = $recording->Enumerate();
            $recordings = $util->EncodeResult($recordings);
            $smarty->assign("recordings", $recordings);
            $smarty->assign("DOC_ROOT", DOC_ROOT);
            $smarty->display(DOC_ROOT.'/templates/lists/recordings.tpl');
        }
        else
        {
            echo "fail[#]";
            $smarty->display(DOC_ROOT.'/templates/boxes/status_on_popup.tpl');
        }
        break;
}
?>