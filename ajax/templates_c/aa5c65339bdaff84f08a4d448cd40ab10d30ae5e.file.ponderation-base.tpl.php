<?php /* Smarty version Smarty3-b7, created on 2015-10-22 18:16:37
         compiled from "/home/iapchiap/public_html//templates/items/ponderation-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:200318579956296e55b4b719-50557295%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa5c65339bdaff84f08a4d448cd40ab10d30ae5e' => 
    array (
      0 => '/home/iapchiap/public_html//templates/items/ponderation-base.tpl',
      1 => 1379525071,
    ),
  ),
  'nocache_hash' => '200318579956296e55b4b719-50557295',
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
