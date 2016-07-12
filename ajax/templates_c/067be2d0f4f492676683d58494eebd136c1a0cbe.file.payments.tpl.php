<?php /* Smarty version Smarty3-b7, created on 2015-09-30 16:11:11
         compiled from "/home/iapchiap/public_html/templates/lists/payments.tpl" */ ?>
<?php /*%%SmartyHeaderCode:488392378560c4fef83c435-13306350%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '067be2d0f4f492676683d58494eebd136c1a0cbe' => 
    array (
      0 => '/home/iapchiap/public_html/templates/lists/payments.tpl',
      1 => 1379525161,
    ),
  ),
  'nocache_hash' => '488392378560c4fef83c435-13306350',
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