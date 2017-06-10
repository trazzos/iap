<?php /* Smarty version Smarty3-b7, created on 2017-05-30 15:40:28
         compiled from "C:/wamp/www/iap/templates/items/major-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8529592dd8bcec12e7-22961383%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7b9931e5fed49129271b0e1fc4c28c6ea21ac50' => 
    array (
      0 => 'C:/wamp/www/iap/templates/items/major-base.tpl',
      1 => 1496156723,
    ),
  ),
  'nocache_hash' => '8529592dd8bcec12e7-22961383',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('majors')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>    
    <tr>
      <td align="center" height="28"><?php echo $_smarty_tpl->getVariable('item')->value['majorId'];?>
</td>
      <td>&nbsp;&nbsp;<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
</td>
      <td align="center">
          <img src="images/icons/16/delete.png" class="spanDelete" id="<?php echo $_smarty_tpl->getVariable('item')->value['majorId'];?>
" title="Eliminar" />&nbsp;
          <img src="images/icons/16/pencil.png" class="spanEdit" id="<?php echo $_smarty_tpl->getVariable('item')->value['majorId'];?>
" title="Editar" /> 
         
      </td>                        
   </tr>
<?php }} else { ?>
    <tr>
    	<td colspan="5" align="center">Ning&uacute;n registro encontrado.</td>
    </tr>
<?php } ?>
