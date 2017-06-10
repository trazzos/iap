<?php /* Smarty version Smarty3-b7, created on 2017-05-30 16:19:36
         compiled from "C:/wamp/www/iap/templates/new/view-modules-course-student.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19465592de1e8ea9d70-31181044%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47f6c89ee7f4b48e30c09962270fbafcc76f7940' => 
    array (
      0 => 'C:/wamp/www/iap/templates/new/view-modules-course-student.tpl',
      1 => 1496156724,
    ),
  ),
  'nocache_hash' => '19465592de1e8ea9d70-31181044',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorn"></i>Modulos
        </div>
        <div class="actions">

        </div>
    </div>
    <div class="portlet-body">
        <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/modules-course.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    </div>
</div>