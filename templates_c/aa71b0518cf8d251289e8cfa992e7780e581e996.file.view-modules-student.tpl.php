<?php /* Smarty version Smarty3-b7, created on 2017-06-01 20:29:40
         compiled from "C:/wamp/www/iap/templates/new/view-modules-student.tpl" */ ?>
<?php /*%%SmartyHeaderCode:76295930bf84948eb6-37377786%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa71b0518cf8d251289e8cfa992e7780e581e996' => 
    array (
      0 => 'C:/wamp/www/iap/templates/new/view-modules-student.tpl',
      1 => 1496366966,
    ),
  ),
  'nocache_hash' => '76295930bf84948eb6-37377786',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include 'C:\wamp\www\iap\libs\plugins\modifier.truncate.php';
?><div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i><b>Anuncios</b> <?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('myModule')->value['name'],65,"...");?>
 &raquo;
        </div>
        <div class="actions">

        </div>
    </div>
    <div class="portlet-body">
        <?php $_template = new Smarty_Internal_Template("boxes/status_no_ajax.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

        <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/new/module-announcements.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    </div>
</div>