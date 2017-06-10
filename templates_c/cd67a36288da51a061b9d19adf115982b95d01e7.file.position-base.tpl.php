<?php /* Smarty version Smarty3-b7, created on 2017-06-01 10:20:53
         compiled from "C:/wamp/www/iap/templates/items/position-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23454593030d53fe8d6-22010139%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd67a36288da51a061b9d19adf115982b95d01e7' => 
    array (
      0 => 'C:/wamp/www/iap/templates/items/position-base.tpl',
      1 => 1496156723,
    ),
  ),
  'nocache_hash' => '23454593030d53fe8d6-22010139',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include 'C:\wamp\www\iap\libs\plugins\modifier.truncate.php';
?><?php  $_smarty_tpl->tpl_vars['position'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('positions')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['position']->key => $_smarty_tpl->tpl_vars['position']->value){
?>
    <tr>
        <td align="center" class="id"><?php echo $_smarty_tpl->getVariable('position')->value['positionId'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('position')->value['clave'];?>
</td>
        <td>&nbsp;<?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('position')->value['name'],20,"...");?>
</td>
        <td align="center" id="etitl1"><?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('position')->value['description'],35,"...");?>
</td>
        <td align="center">
            <img src="images/icons/16/delete.png" class="spanDelete" i id="<?php echo $_smarty_tpl->getVariable('position')->value['positionId'];?>
" name="<?php echo $_smarty_tpl->getVariable('position')->value['name'];?>
" title="Eliminar" />&nbsp;
          	<img src="images/icons/16/pencil.png" class="spanEdit" id="<?php echo $_smarty_tpl->getVariable('position')->value['positionId'];?>
" name="<?php echo $_smarty_tpl->getVariable('position')->value['name'];?>
" title="Editar" />
        </td>
    </tr>
<?php }} else { ?>
	<tr>
    	<td colspan="5" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
<?php } ?>