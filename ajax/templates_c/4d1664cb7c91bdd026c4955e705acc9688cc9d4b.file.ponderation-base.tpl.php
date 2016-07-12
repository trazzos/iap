<?php /* Smarty version Smarty3-b7, created on 2015-09-29 15:04:40
         compiled from "/home/iapchiap/public_html/templates/items/ponderation-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1648841008560aeed8530a41-61607687%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d1664cb7c91bdd026c4955e705acc9688cc9d4b' => 
    array (
      0 => '/home/iapchiap/public_html/templates/items/ponderation-base.tpl',
      1 => 1379525071,
    ),
  ),
  'nocache_hash' => '1648841008560aeed8530a41-61607687',
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
