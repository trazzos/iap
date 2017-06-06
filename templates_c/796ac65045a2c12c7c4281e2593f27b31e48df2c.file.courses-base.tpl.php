<?php /* Smarty version Smarty3-b7, created on 2017-06-01 10:19:06
         compiled from "C:/wamp/www/iap/templates/items/new/courses-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:212235930306ad7df79-07928045%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '796ac65045a2c12c7c4281e2593f27b31e48df2c' => 
    array (
      0 => 'C:/wamp/www/iap/templates/items/new/courses-base.tpl',
      1 => 1496156723,
    ),
  ),
  'nocache_hash' => '212235930306ad7df79-07928045',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'C:\wamp\www\iap\libs\plugins\modifier.date_format.php';
?><input type="hidden" value="0" id="recarga" name="recarga">
<?php  $_smarty_tpl->tpl_vars['subject'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('subjects')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['subject']->key => $_smarty_tpl->tpl_vars['subject']->value){
?>
    <tr>
        <td align="center" class="id"><?php echo $_smarty_tpl->getVariable('subject')->value['courseId'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['clave'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['majorName'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
-<?php echo $_smarty_tpl->getVariable('subject')->value['group'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['modality'];?>
</td>
        <td align="center"><?php if ($_smarty_tpl->getVariable('subject')->value['initialDate']!="0000-00-00"){?> <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('subject')->value['initialDate'],"%d-%m-%Y");?>
<?php }else{ ?> S/F <?php }?></td>
        <td align="center"><?php if ($_smarty_tpl->getVariable('subject')->value['finalDate']!="0000-00-00"){?>  <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('subject')->value['finalDate'],"%d-%m-%Y");?>
  <?php }else{ ?> S/F  <?php }?>   </td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['daysToFinish'];?>
</td>
        <td align="center">
            <?php if ($_smarty_tpl->getVariable('docente')->value==1){?>
                <?php echo $_smarty_tpl->getVariable('subject')->value['courseModuleActive'];?>

            <?php }else{ ?>
                <?php echo $_smarty_tpl->getVariable('subject')->value['courseModule'];?>

            <?php }?>
            /<?php echo $_smarty_tpl->getVariable('subject')->value['modules'];?>


            
            <?php if (($_smarty_tpl->getVariable('docente')->value==1&&$_smarty_tpl->getVariable('subject')->value['courseModuleActive']>0)||!$_smarty_tpl->getVariable('docente')->value){?>
                <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/graybox.php?page=view-modules-course&id=<?php echo $_smarty_tpl->getVariable('subject')->value['courseId'];?>
" title="Ver Modulos de Curso" data-target="#ajax" data-toggle="modal" style="color:#000" ><img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/arrow.png" title="Ver Modulos del Curso" /></a>
            <?php }?>

            <?php if (!$_smarty_tpl->getVariable('docente')->value){?>
                <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/graybox.php?page=add-modules-course&id=<?php echo $_smarty_tpl->getVariable('subject')->value['courseId'];?>
" title="Agregar Modulo a Curso" data-target="#ajax" data-toggle="modal" style="color:#000" ><img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/add.png" title="Agregar Modulo a Curso" /></a>
            <?php }?>
        </td>
        <td align="center">
            <span style="cursor:pointer" class="spanActive" onclick="VerGrupo(<?php echo $_smarty_tpl->getVariable('subject')->value['courseId'];?>
);" title="Alumnos" id="<?php echo $_smarty_tpl->getVariable('subject')->value['courseId'];?>
"><?php echo $_smarty_tpl->getVariable('subject')->value['alumnActive'];?>
</span>             /
            <span style="cursor:pointer" class="spanInactive" onclick="VerGrupoInactivo(<?php echo $_smarty_tpl->getVariable('subject')->value['courseId'];?>
);"  id="<?php echo $_smarty_tpl->getVariable('subject')->value['courseId'];?>
"><?php echo $_smarty_tpl->getVariable('subject')->value['alumnInactive'];?>
</span>
        </td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['active'];?>
</td>
        <?php if (!$_smarty_tpl->getVariable('docente')->value){?>
            <td align="center">

                

                <?php if ($_smarty_tpl->getVariable('subject')->value['majorName']=="ESPECIALIDAD"||$_smarty_tpl->getVariable('subject')->value['majorName']=="MAESTRIA"){?>
                    <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/16/matricula.gif" onclick="generar(<?php echo $_smarty_tpl->getVariable('subject')->value['courseId'];?>
,'<?php echo $_smarty_tpl->getVariable('subject')->value['majorName'];?>
');" title="Generar Matriculas" width="16px" height="16px" />&nbsp;
                <?php }?>

                <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/graybox.php?page=edit-course&id=<?php echo $_smarty_tpl->getVariable('subject')->value['courseId'];?>
" data-target="#ajax" data-toggle="modal">
                    <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/16/pencil.png" class="spanEdit" id="d-<?php echo $_smarty_tpl->getVariable('subject')->value['subjectId'];?>
" name="d-<?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
" title="Editar" />
                </a>

                
                
                <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/graybox.php?page=ver-sabana-course&id=<?php echo $_smarty_tpl->getVariable('subject')->value['courseId'];?>
" data-target="#ajax" data-toggle="modal">
                    <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/16/score.gif" class="spanEdit" id="d-<?php echo $_smarty_tpl->getVariable('subject')->value['subjectId'];?>
" name="d-<?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
" title="Sabana de Calificaciones" />
                </a>

                <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/diplomas.php?id=<?php echo $_smarty_tpl->getVariable('subject')->value['courseId'];?>
" target="_blank" >
                    <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/16/diploma.jpg" class="spanEdit" id="d-<?php echo $_smarty_tpl->getVariable('subject')->value['subjectId'];?>
" name="d-<?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
" title="Impresion de Diplomas" />
                </a>

                <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/reporte.php?id=<?php echo $_smarty_tpl->getVariable('subject')->value['courseId'];?>
" target="_blank" >
                    <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/chart.png" class="spanEdit" id="d-<?php echo $_smarty_tpl->getVariable('subject')->value['subjectId'];?>
" name="d-<?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
" title="Reporte General" />
                </a>
            </td>
        <?php }?>
    </tr>
    <?php }} else { ?>
    <tr>
        <td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
    </tr>
<?php } ?>
