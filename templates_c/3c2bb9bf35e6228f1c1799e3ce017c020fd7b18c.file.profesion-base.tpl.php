<?php /* Smarty version Smarty3-b7, created on 2017-06-01 10:28:06
         compiled from "C:/wamp/www/iap/templates/items/profesion-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25421593032861b8740-00078309%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c2bb9bf35e6228f1c1799e3ce017c020fd7b18c' => 
    array (
      0 => 'C:/wamp/www/iap/templates/items/profesion-base.tpl',
      1 => 1496156723,
    ),
  ),
  'nocache_hash' => '25421593032861b8740-00078309',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include 'C:\wamp\www\iap\libs\plugins\modifier.truncate.php';
?><?php  $_smarty_tpl->tpl_vars['position'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('profesions')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['position']->key => $_smarty_tpl->tpl_vars['position']->value){
?>
    <tr>
        <td align="center" class="id"><?php echo $_smarty_tpl->getVariable('position')->value['profesionId'];?>
</td>
        <td>&nbsp;<?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('position')->value['profesionName'],50,"...");?>
</td>
        <td align="center">
            <img src="images/icons/16/delete.png" class="spanDelete" i id="<?php echo $_smarty_tpl->getVariable('position')->value['profesionId'];?>
" name="<?php echo $_smarty_tpl->getVariable('position')->value['profesionName'];?>
" title="Eliminar" />&nbsp;
          	<img src="images/icons/16/pencil.png" class="spanEdit" id="<?php echo $_smarty_tpl->getVariable('position')->value['profesionId'];?>
" name="<?php echo $_smarty_tpl->getVariable('position')->value['profesionName'];?>
" title="Editar" />
        </td>
    </tr>
<?php }} else { ?>
	<tr>
    	<td colspan="5" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
<?php } ?>