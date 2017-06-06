<?php /* Smarty version Smarty3-b7, created on 2017-05-30 15:43:00
         compiled from ".\templates\lists/new/subject.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31757592dd954c7ca61-97792934%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85187358fd8ae429b47a7bceeea83841177dd9e9' => 
    array (
      0 => '.\\templates\\lists/new/subject.tpl',
      1 => 1496156723,
    ),
  ),
  'nocache_hash' => '31757592dd954c7ca61-97792934',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
    <thead>
        <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/new/subject-header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    </thead>
    <tbody>
        <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/new/subject-base.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    </tbody>
</table>