<?php /* Smarty version Smarty3-b7, created on 2017-06-01 20:38:54
         compiled from ".\templates\lists/topics.tpl" */ ?>
<?php /*%%SmartyHeaderCode:304675930c1ae2bd095-12333994%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08c7cf2c2d370bb780a51d955e7f54b97ea1dbc4' => 
    array (
      0 => '.\\templates\\lists/topics.tpl',
      1 => 1496156724,
    ),
  ),
  'nocache_hash' => '304675930c1ae2bd095-12333994',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
<thead>      
      <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/topics-header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</thead>
<tbody>
   <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/items/topics-base.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</tbody>
</table>