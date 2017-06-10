<?php /* Smarty version Smarty3-b7, created on 2016-08-26 14:50:05
         compiled from "/home/iapchiap/public_html//templates/boxes/status.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31041651757c09d6dea5f93-00969795%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '206a0b3941e03aea72eb82b8b8dc6732329a2b94' => 
    array (
      0 => '/home/iapchiap/public_html//templates/boxes/status.tpl',
      1 => 1472227497,
    ),
  ),
  'nocache_hash' => '31041651757c09d6dea5f93-00969795',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div>
	<?php if (!empty($_smarty_tpl->getVariable('errors')->value)){?>
	<?php  $_smarty_tpl->tpl_vars["error"] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('errors')->value['value']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["error"]->key => $_smarty_tpl->tpl_vars["error"]->value){
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["error"]->key;
?>
		<?php echo $_smarty_tpl->getVariable('error')->value;?>
.
		<?php if ($_smarty_tpl->getVariable('errors')->value['field'][$_smarty_tpl->getVariable('key')->value]){?>
			Campo: <u><?php echo $_smarty_tpl->getVariable('errors')->value['field'][$_smarty_tpl->getVariable('key')->value];?>
</u>
		<?php }?>
	<?php }} ?>
<?php }?>
</div>