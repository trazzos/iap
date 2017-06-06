<?php /* Smarty version Smarty3-b7, created on 2017-06-01 17:02:21
         compiled from "C:/wamp/www/iap/templates/items/student-curricula-inactiva-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2222359308eed300da6-31522470%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '57fd2f883677e218f293b4e9ca0b55740a9fe2ae' => 
    array (
      0 => 'C:/wamp/www/iap/templates/items/student-curricula-inactiva-base.tpl',
      1 => 1496156723,
    ),
  ),
  'nocache_hash' => '2222359308eed300da6-31522470',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'C:\wamp\www\iap\libs\plugins\modifier.date_format.php';
?><?php  $_smarty_tpl->tpl_vars['subject'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('inactiveCourses')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['daysToFinish'];?>
</td>
        <td align="center">
          	<a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/invoices-student"><img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/16/money.png" class="spanEdit" id="d-<?php echo $_smarty_tpl->getVariable('subject')->value['subjectId'];?>
" name="d-<?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
" title="Ir a Cobranza" /></a>
        </td>
    </tr>
<?php }} else { ?>
	<tr>
    	<td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
<?php } ?>
