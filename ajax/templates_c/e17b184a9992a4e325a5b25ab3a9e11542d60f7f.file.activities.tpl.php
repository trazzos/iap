<?php /* Smarty version Smarty3-b7, created on 2015-10-15 14:09:13
         compiled from "/home/iapchiap/public_html/templates/lists/activities.tpl" */ ?>
<?php /*%%SmartyHeaderCode:548985967561ff9d91ae693-11508837%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e17b184a9992a4e325a5b25ab3a9e11542d60f7f' => 
    array (
      0 => '/home/iapchiap/public_html/templates/lists/activities.tpl',
      1 => 1379525135,
    ),
  ),
  'nocache_hash' => '548985967561ff9d91ae693-11508837',
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