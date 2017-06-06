<?php /* Smarty version Smarty3-b7, created on 2017-06-01 10:20:58
         compiled from "C:/wamp/www/iap/templates/items/role-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5034593030dae04ac7-77461105%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f4af08287e8ae63d991dfb49cf97a9cc2a6073a7' => 
    array (
      0 => 'C:/wamp/www/iap/templates/items/role-base.tpl',
      1 => 1496156723,
    ),
  ),
  'nocache_hash' => '5034593030dae04ac7-77461105',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('roles')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
        <tr>
        <td align="center" class="id"><?php echo $_smarty_tpl->getVariable('item')->value['roleId'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('item')->value['clave'];?>
</td>       
        <td align="center"><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
</td>        
        <td id="etitl1">&nbsp;<?php echo $_smarty_tpl->getVariable('item')->value['wrappedDescription'];?>
</td>        
        <td align="center">                        
            <img src="images/icons/16/delete.png" class="spanDelete" id="<?php echo $_smarty_tpl->getVariable('item')->value['roleId'];?>
" title="Eliminar" />&nbsp;
          	<img src="images/icons/16/pencil.png" class="spanEdit" id="<?php echo $_smarty_tpl->getVariable('item')->value['roleId'];?>
" title="Editar" />
        </td>
    </tr>
<?php }} else { ?>
<tr><td colspan="5" align="center">No se encontró ningún registro.</td></tr>				
<?php } ?>
