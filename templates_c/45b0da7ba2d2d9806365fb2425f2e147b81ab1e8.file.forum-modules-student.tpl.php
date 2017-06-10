<?php /* Smarty version Smarty3-b7, created on 2017-06-05 20:19:55
         compiled from "C:/wamp/www/iap/templates/new/forum-modules-student.tpl" */ ?>
<?php /*%%SmartyHeaderCode:159895936033b0b1d41-45187393%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45b0da7ba2d2d9806365fb2425f2e147b81ab1e8' => 
    array (
      0 => 'C:/wamp/www/iap/templates/new/forum-modules-student.tpl',
      1 => 1496711726,
    ),
  ),
  'nocache_hash' => '159895936033b0b1d41-45187393',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-comments-o"></i>Foros
        </div>

    </div>
    <div class="portlet-body">
        <div id="tblContent"><?php $_template = new Smarty_Internal_Template("lists/topics.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</div>
    </div>
</div>