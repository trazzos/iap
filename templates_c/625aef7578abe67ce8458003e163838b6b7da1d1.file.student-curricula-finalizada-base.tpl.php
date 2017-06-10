<?php /* Smarty version Smarty3-b7, created on 2017-06-01 17:02:21
         compiled from "C:/wamp/www/iap/templates/items/student-curricula-finalizada-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:313059308eed56a130-05185583%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '625aef7578abe67ce8458003e163838b6b7da1d1' => 
    array (
      0 => 'C:/wamp/www/iap/templates/items/student-curricula-finalizada-base.tpl',
      1 => 1496156723,
    ),
  ),
  'nocache_hash' => '313059308eed56a130-05185583',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['subject'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('finishedCourses')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['initialDate'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['finalDate'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['daysToFinish'];?>
</td>
        <td align="center">
           <?php echo $_smarty_tpl->getVariable('subject')->value['mark'];?>

        </td>
    </tr>
<?php }} else { ?>
	<tr>
    	<td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
<?php } ?>
