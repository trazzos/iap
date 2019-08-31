<?php
include_once('../../init.php');
include_once('../../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();


switch($_POST["type"])
{
    case 'genera_maestrias':
        $group->setCourseId($_POST["courseId"]);

        if(!$group->matricula_maestrias())
        {
            echo "fail[#]";
            $smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
        }else{
            echo "ok[#]";
            $smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
        }

        break;

    case 'genera_especialidad':

        $group->setCourseId($_POST["courseId"]);


        if(!$group->matricula_especialidad())
        {
            echo "fail[#]";
            $smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
        }else{
            echo "ok[#]";
            $smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
        }



        break;


}

?>
