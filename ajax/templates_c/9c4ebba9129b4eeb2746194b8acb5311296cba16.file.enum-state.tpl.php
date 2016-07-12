<?php /* Smarty version Smarty3-b7, created on 2015-10-06 12:02:12
         compiled from "/home/iapchiap/public_html/templates/items/enum-state.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6743300975613fe94e23024-62107958%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c4ebba9129b4eeb2746194b8acb5311296cba16' => 
    array (
      0 => '/home/iapchiap/public_html/templates/items/enum-state.tpl',
      1 => 1379525053,
    ),
  ),
  'nocache_hash' => '6743300975613fe94e23024-62107958',
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
