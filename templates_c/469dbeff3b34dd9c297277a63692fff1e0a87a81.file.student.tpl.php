<?php /* Smarty version Smarty3-b7, created on 2017-05-30 15:40:57
         compiled from ".\templates\lists/student.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22820592dd8d957a118-60270874%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '469dbeff3b34dd9c297277a63692fff1e0a87a81' => 
    array (
      0 => '.\\templates\\lists/student.tpl',
      1 => 1496156724,
    ),
  ),
  'nocache_hash' => '22820592dd8d957a118-60270874',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
<thead>      
      <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/student-header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</thead>
<tbody>
   <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/student-base.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</tbody>
</table>