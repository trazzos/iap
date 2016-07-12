<?php /* Smarty version Smarty3-b7, created on 2015-10-23 13:33:08
         compiled from "/home/iapchiap/public_html//templates/items/enum-position.tpl" */ ?>
<?php /*%%SmartyHeaderCode:144443356562a7d64f1cb03-27689870%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f888b65460a04434bdcfd7a53df714aa875974d' => 
    array (
      0 => '/home/iapchiap/public_html//templates/items/enum-position.tpl',
      1 => 1379525052,
    ),
  ),
  'nocache_hash' => '144443356562a7d64f1cb03-27689870',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('positions')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<option value="<?php echo $_smarty_tpl->getVariable('item')->value['positionId'];?>
" <?php if ($_smarty_tpl->getVariable('info')->value['positionId']==$_smarty_tpl->getVariable('item')->value['positionId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
</option>        			
<?php }} ?>
