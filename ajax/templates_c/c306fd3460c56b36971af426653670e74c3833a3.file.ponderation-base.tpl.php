<?php /* Smarty version Smarty3-b7, created on 2017-06-01 19:04:15
         compiled from "C:/wamp/www/iap/templates/items/ponderation-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:206795930ab7f3172c9-43630532%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c306fd3460c56b36971af426653670e74c3833a3' => 
    array (
      0 => 'C:/wamp/www/iap/templates/items/ponderation-base.tpl',
      1 => 1496156723,
    ),
  ),
  'nocache_hash' => '206795930ab7f3172c9-43630532',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['home'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('tareas')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['home']->key => $_smarty_tpl->tpl_vars['home']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['home']->key;
?>
    <tr>
        <td><?php echo $_smarty_tpl->getVariable('home')->value['resumen'];?>
 </td>
        <td><?php echo $_smarty_tpl->getVariable('home')->value['ponderation'];?>
</td>
        <td><?php echo $_smarty_tpl->getVariable('home')->value['retro'];?>
</td>
		  
    </tr>
<?php }} else { ?>
	<tr>
    	<td colspan="11" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
    </tr>				
<?php } ?>
