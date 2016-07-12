<?php /* Smarty version Smarty3-b7, created on 2015-12-08 11:00:22
         compiled from "/home/iapchiap/public_html//templates/items/activities-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:195124134256670ca67cc891-91306715%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff10035238bd17b5bed71169fa6cb0f6fef77683' => 
    array (
      0 => '/home/iapchiap/public_html//templates/items/activities-base.tpl',
      1 => 1379525044,
    ),
  ),
  'nocache_hash' => '195124134256670ca67cc891-91306715',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/home/iapchiap/public_html/libs/plugins/modifier.date_format.php';
?><?php  $_smarty_tpl->tpl_vars['subject'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('actividades')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['subject']->key => $_smarty_tpl->tpl_vars['subject']->value){
?>
    <tr>
        <td align="center" class="id"><?php echo $_smarty_tpl->getVariable('subject')->value['activityId'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['activityType'];?>
</td>
        <td align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('subject')->value['initialDate'],"%d-%m-%Y %H:%M:%S");?>
</td>
        <td align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('subject')->value['finalDate'],"%d-%m-%Y %H:%M:%S");?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['modality'];?>
</td>
        <td align="center">
        <?php if ($_smarty_tpl->getVariable('subject')->value['requiredActivity']!=0){?>
        	Id: <?php echo $_smarty_tpl->getVariable('subject')->value['requiredActivity'];?>
 Resumen: <?php echo $_smarty_tpl->getVariable('subject')->value['requerida']['resumen'];?>

        <?php }else{ ?>
        	N/A  
        <?php }?>  </td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['score'];?>
%</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['resumen'];?>
</td>
        <td align="center">
        <?php if ($_smarty_tpl->getVariable('subject')->value['activityType']=="Examen"){?>
        	<?php if ($_smarty_tpl->getVariable('majorModality')->value=="Online"){?>
        	<a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/configuracion-examen/id/<?php echo $_smarty_tpl->getVariable('subject')->value['activityId'];?>
" style="color:#000000">Configurar</a>
          <?php }else{ ?>	
          	Aplicar Localmente
          <?php }?>
        <?php }else{ ?>
        	N/A
        <?php }?></td>
        <td align="center">
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/16/delete.png" class="spanDelete" id="d-<?php echo $_smarty_tpl->getVariable('subject')->value['activityId'];?>
" name="d-<?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
" title="Eliminar" />&nbsp;
					 <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/edit-activity/id/<?php echo $_smarty_tpl->getVariable('subject')->value['activityId'];?>
" onclick="return parent.GB_show('Editar Actividad', this.href,650,700) "><img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/16/pencil.png" class="spanEdit" id="d-<?php echo $_smarty_tpl->getVariable('subject')->value['subjectId'];?>
" name="d-<?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
" title="Editar" /></a>
           <?php if ($_smarty_tpl->getVariable('subject')->value['score']>0){?>            
           <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/score-activity/id/<?php echo $_smarty_tpl->getVariable('subject')->value['activityId'];?>
" onclick="return parent.GB_show('Calificar Actividad', this.href,650,700) "><img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/16/score.gif" class="spanEdit" id="d-<?php echo $_smarty_tpl->getVariable('subject')->value['subjectId'];?>
" name="d-<?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
" title="Calificar" /></a>
           <?php }?>            
        </td>
    </tr>
<?php }} else { ?>
	<tr>
    	<td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
<?php } ?>
