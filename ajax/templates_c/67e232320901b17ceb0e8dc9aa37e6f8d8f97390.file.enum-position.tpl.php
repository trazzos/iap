<?php /* Smarty version Smarty3-b7, created on 2015-10-06 12:02:12
         compiled from "/home/iapchiap/public_html/templates/items/enum-position.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12380227195613fe94e04258-44686822%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67e232320901b17ceb0e8dc9aa37e6f8d8f97390' => 
    array (
      0 => '/home/iapchiap/public_html/templates/items/enum-position.tpl',
      1 => 1379525052,
    ),
  ),
  'nocache_hash' => '12380227195613fe94e04258-44686822',
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
