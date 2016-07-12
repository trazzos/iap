<?php /* Smarty version Smarty3-b7, created on 2015-12-16 14:05:59
         compiled from "/home/iapchiap/public_html//templates/lists/subject.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20320547635671c42763d0a6-95060797%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '915d0eed86a5cd068ab03af6b635b5160be4e0c9' => 
    array (
      0 => '/home/iapchiap/public_html//templates/lists/subject.tpl',
      1 => 1379525184,
    ),
  ),
  'nocache_hash' => '20320547635671c42763d0a6-95060797',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table width="100%" class="tblGral">
	<thead>
    	<?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/subject-header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    </thead>
    <tbody>
    	<?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/subject-base.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

	</tbody>
</table>