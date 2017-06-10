<?php /* Smarty version Smarty3-b7, created on 2017-06-01 17:02:21
         compiled from "C:/wamp/www/iap/templates/items/student-curricula-activa-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1464059308eed06ca83-12639862%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e0a38ee3d1aaa3dcc77da0d15f58ee331622124' => 
    array (
      0 => 'C:/wamp/www/iap/templates/items/student-curricula-activa-base.tpl',
      1 => 1496354075,
    ),
  ),
  'nocache_hash' => '1464059308eed06ca83-12639862',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'C:\wamp\www\iap\libs\plugins\modifier.date_format.php';
?><?php  $_smarty_tpl->tpl_vars['subject'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('activeCourses')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['subject']->key => $_smarty_tpl->tpl_vars['subject']->value){
?>
    <tr>
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['clave'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['majorName'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['modality'];?>
</td>
        <td align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('subject')->value['initialDate'],"%d-%m-%Y");?>
</td>
        <td align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('subject')->value['finalDate'],"%d-%m-%Y");?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['courseModule'];?>

        </td>
        <td align="center">
            <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/graybox.php?page=view-modules-course-student&id=<?php echo $_smarty_tpl->getVariable('subject')->value['courseId'];?>
" title="Ver Módulos" data-target="#ajax" data-toggle="modal" style="color:#000" ><img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/arrow.png" title="Ver Módulos" /></a>
        </td>
    </tr>
<?php }} else { ?>
	<tr>
    	<td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
<?php } ?>
