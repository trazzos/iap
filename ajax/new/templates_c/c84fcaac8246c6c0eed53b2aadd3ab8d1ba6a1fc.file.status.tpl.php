<?php /* Smarty version Smarty3-b7, created on 2017-06-01 10:26:26
         compiled from "C:/wamp/www/iap/templates/boxes/status.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2345159303222c43957-12367377%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c84fcaac8246c6c0eed53b2aadd3ab8d1ba6a1fc' => 
    array (
      0 => 'C:/wamp/www/iap/templates/boxes/status.tpl',
      1 => 1496156722,
    ),
  ),
  'nocache_hash' => '2345159303222c43957-12367377',
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