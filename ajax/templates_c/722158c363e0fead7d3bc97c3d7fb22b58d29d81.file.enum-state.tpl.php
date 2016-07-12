<?php /* Smarty version Smarty3-b7, created on 2015-10-23 13:33:08
         compiled from "/home/iapchiap/public_html//templates/items/enum-state.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1657290216562a7d64f3f303-53443221%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '722158c363e0fead7d3bc97c3d7fb22b58d29d81' => 
    array (
      0 => '/home/iapchiap/public_html//templates/items/enum-state.tpl',
      1 => 1379525053,
    ),
  ),
  'nocache_hash' => '1657290216562a7d64f3f303-53443221',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('states')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<option value="<?php echo $_smarty_tpl->getVariable('item')->value['stateId'];?>
" <?php if ($_smarty_tpl->getVariable('info')->value['stateId']==$_smarty_tpl->getVariable('item')->value['stateId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
</option>        			
<?php }} ?>
