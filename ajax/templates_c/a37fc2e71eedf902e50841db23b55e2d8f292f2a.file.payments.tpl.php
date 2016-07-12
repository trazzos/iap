<?php /* Smarty version Smarty3-b7, created on 2015-11-19 15:33:12
         compiled from "/home/iapchiap/public_html//templates/lists/payments.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1575282439564e401829d0d7-13050763%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a37fc2e71eedf902e50841db23b55e2d8f292f2a' => 
    array (
      0 => '/home/iapchiap/public_html//templates/lists/payments.tpl',
      1 => 1379525161,
    ),
  ),
  'nocache_hash' => '1575282439564e401829d0d7-13050763',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table width="100%" class="tblGral">
	<thead>
    	<?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/payments-header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    </thead>
    <tbody>
    	<?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/payments-base.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

	</tbody>
</table>