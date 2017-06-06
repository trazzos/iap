<?php /* Smarty version Smarty3-b7, created on 2017-06-01 22:23:30
         compiled from "C:/wamp/www/iap/templates/lists/new/module-calendar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3195930da323f62c5-38400134%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7bbe54e0636eb5b720ae9eb22490a87fe7513b40' => 
    array (
      0 => 'C:/wamp/www/iap/templates/lists/new/module-calendar.tpl',
      1 => 1496373808,
    ),
  ),
  'nocache_hash' => '3195930da323f62c5-38400134',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'C:\wamp\www\iap\libs\plugins\modifier.date_format.php';
?><div class="portlet-body">
	<?php if ($_smarty_tpl->getVariable('exito')->value=="si"){?>
		
		<div class="alert alert-warning alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  <strong></strong> El Documento se guardo exitosamente
		</div>
	<?php }?>
	<!--
   <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/graybox.php?page=upload-homework&id=<?php echo $_smarty_tpl->getVariable('item')->value['activityId'];?>
" title="Subir Tarea" data-target="#ajax" data-toggle="modal" style="color:#000" class="btn btn-xs green-jungle"> Subir Actividad al Sistema de Tareas <i class="fa fa-upload "></i></a>
-->
	<?php if ($_smarty_tpl->getVariable('timestamp')->value>$_smarty_tpl->getVariable('item')->value['initialDateTimestamp']&&$_smarty_tpl->getVariable('timestamp')->value<$_smarty_tpl->getVariable('item')->value['finalDateTimestamp']){?>
        <span style="color:#0C0">Esta actividad se encuentra disponible</span>
    <?php }?>
    <?php if ($_smarty_tpl->getVariable('timestamp')->value>$_smarty_tpl->getVariable('item')->value['finalDateTimestamp']){?>
        <span style="color:#C00">El tiempo de esta actividad ha terminado</span>
    <?php }?>
    <?php if ($_smarty_tpl->getVariable('timestamp')->value<$_smarty_tpl->getVariable('item')->value['initialDateTimestamp']){?>
        <span style="color:#C00">Esta actividad aun no ha iniciado</span>
    <?php }?>
    <br />

    <br />
    <b>Fecha Inicial:</b> <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('item')->value['initialDate'],"%d-%m-%Y");?>

    <br />
    <b>Fecha Final:  </b> <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('item')->value['finalDate'],"%d-%m-%Y %H:%M:%S");?>

    <br /><br />
    <b>Modalidad: </b><?php echo $_smarty_tpl->getVariable('item')->value['modality'];?>


    <br />
    <?php if ($_smarty_tpl->getVariable('item')->value['requerida']['activityId']){?>
        <?php if ($_smarty_tpl->getVariable('item')->value['activityType']=="Tarea"){?>
            <b> Tarea Requerida:</b> Para realizar esta Actividad necesitas terminar la Actividad <?php echo $_smarty_tpl->getVariable('item')->value['numreq'];?>

        <?php }?>
        <?php if ($_smarty_tpl->getVariable('item')->value['activityType']=="Examen"){?>
            <b>Tarea Requerida:</b> Para realizar este Examen necesitas terminar la Actividad <?php echo $_smarty_tpl->getVariable('item')->value['numreq'];?>

        <?php }?>

        <br />
    <?php }?>

    <?php if ($_smarty_tpl->getVariable('timestamp')->value>$_smarty_tpl->getVariable('item')->value['initialDateTimestamp']&&$_smarty_tpl->getVariable('timestamp')->value<$_smarty_tpl->getVariable('item')->value['finalDateTimestamp']&&$_smarty_tpl->getVariable('item')->value['available']){?>
        <b>Entregable: </b>
        <?php if ($_smarty_tpl->getVariable('item')->value['activityType']=="Lectura"){?>
            Ninguno.
        <?php }?>
        <?php if ($_smarty_tpl->getVariable('item')->value['activityType']=="Tarea"){?>
            <?php if ($_smarty_tpl->getVariable('vistaPrevia')->value==0){?>
        <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/graybox.php?page=upload-homework&id=<?php echo $_smarty_tpl->getVariable('item')->value['activityId'];?>
" title="Subir Tarea" data-target="#ajax" data-toggle="modal" style="color:#000" class="btn btn-xs green-jungle"> Subir Actividad al Sistema de Tareas <i class="fa fa-upload "></i></a>
            <?php }else{ ?> Subir Tarea al Sistema de Tareas.
            <?php }?>
        <?php }?>
        <?php if ($_smarty_tpl->getVariable('item')->value['activityType']=="Examen"){?>

            <?php if ($_smarty_tpl->getVariable('majorModality')->value=="Local"){?>
                El Docente lo presentara localmente
            <?php }else{ ?>
                <?php if ($_smarty_tpl->getVariable('vistaPrevia')->value==0){?>
                <a id="presentarExamen" style="display: none" class=" btn yellow btn-outline sbold" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/graybox.php?page=make-test&id=<?php echo $_smarty_tpl->getVariable('item')->value['activityId'];?>
" data-target="#ajax" data-toggle="modal"> Presentar examen </a>
                <a style="cursor:pointer; color:#000" onclick="DoTest(<?php echo $_smarty_tpl->getVariable('item')->value['activityId'];?>
)">Presentar Ex&aacute;men.</a>
                <?php }else{ ?>  Presentar Ex&aacute;men.
                <?php }?>


            <?php }?>
        <?php }?>
        <?php if ($_smarty_tpl->getVariable('item')->value['activityType']=="Foro"){?>
            Participación en foro.
        <?php }?>
        <?php if ($_smarty_tpl->getVariable('item')->value['activityType']=="Otro"){?>
            Ninguno.
        <?php }?>

    <?php }?>
    <?php if ($_smarty_tpl->getVariable('item')->value['homework']){?>
        <br />
        <b>Tarea entregada</b><!--
		<a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/download.php?file=homework/<?php echo $_smarty_tpl->getVariable('item')->value['homework']['path'];?>
&mime=<?php echo $_smarty_tpl->getVariable('item')->value['homework']['mime'];?>
" style="color:#000">Ver Tarea</a>-->
		<button class="btn blue" onclick="window.location.href='<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/download.php?file=homework/<?php echo $_smarty_tpl->getVariable('item')->value['homework']['path'];?>
&mime=<?php echo $_smarty_tpl->getVariable('item')->value['homework']['mime'];?>
'" class="bb" style="width:150px">VER TAREA</button>
    <?php }?>
    <?php if ($_smarty_tpl->getVariable('item')->value['ponderation']){?>
        <br />
        <b>Calificación:</b> <?php echo $_smarty_tpl->getVariable('item')->value['ponderation'];?>

        <b>Porcentaje obtenido: </b><?php echo $_smarty_tpl->getVariable('item')->value['realScore'];?>
%
    <?php }?>

    <?php if ($_smarty_tpl->getVariable('item')->value['retro']){?>
        <br />
        <b>Retroalimentación:</b> <?php echo $_smarty_tpl->getVariable('item')->value['retro'];?>

    <?php }?>
    
</div>
