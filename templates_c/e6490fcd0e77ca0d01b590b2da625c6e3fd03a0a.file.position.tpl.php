<?php /* Smarty version Smarty3-b7, created on 2017-06-01 10:20:53
         compiled from ".\templates\lists/position.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14368593030d534ec38-94504144%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e6490fcd0e77ca0d01b590b2da625c6e3fd03a0a' => 
    array (
      0 => '.\\templates\\lists/position.tpl',
      1 => 1496156723,
    ),
  ),
  'nocache_hash' => '14368593030d534ec38-94504144',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
<thead>      
      <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/position-header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</thead>
<tbody>
   <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/position-base.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</tbody>
</table>