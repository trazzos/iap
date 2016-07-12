<?php /* Smarty version Smarty3-b7, created on 2015-12-08 11:00:22
         compiled from "/home/iapchiap/public_html//templates/lists/activities.tpl" */ ?>
<?php /*%%SmartyHeaderCode:112552266956670ca6737486-78501821%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b8291e19f8cc3b7d3fe87a4471cb186cbde0e633' => 
    array (
      0 => '/home/iapchiap/public_html//templates/lists/activities.tpl',
      1 => 1379525135,
    ),
  ),
  'nocache_hash' => '112552266956670ca6737486-78501821',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table width="100%" class="tblGral">
	<thead>
    	<?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/activities-header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    </thead>
    <tbody>
    	<?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/activities-base.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

	</tbody>
</table>