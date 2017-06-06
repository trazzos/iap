<?php /* Smarty version Smarty3-b7, created on 2017-05-30 15:40:43
         compiled from ".\templates\lists/personal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11242592dd8cb5c18e0-45558126%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '530468f9e4c108e89890761ebb04a01ac8685e74' => 
    array (
      0 => '.\\templates\\lists/personal.tpl',
      1 => 1496156723,
    ),
  ),
  'nocache_hash' => '11242592dd8cb5c18e0-45558126',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
<thead>      
      <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/personal-header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</thead>
<tbody>
   <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/personal-base.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</tbody>
</table>