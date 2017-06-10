<?php /* Smarty version Smarty3-b7, created on 2017-05-30 15:40:43
         compiled from "C:/wamp/www/iap/templates/new/personal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18389592dd8cb4f66b5-08991046%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '13bbccba894c866fb97f71b46c8071ac6649ef02' => 
    array (
      0 => 'C:/wamp/www/iap/templates/new/personal.tpl',
      1 => 1496156724,
    ),
  ),
  'nocache_hash' => '18389592dd8cb4f66b5-08991046',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i>Personal
        </div>
        <div class="actions">
            <a href="javascript:;" class="btn green" id="btnAddPersonal">
                <i class="fa fa-plus"></i> Agregar
            </a>
        </div>
    </div>
    <div class="portlet-body">
        <div id="tblContent"><?php $_template = new Smarty_Internal_Template("lists/personal.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</div>
    </div>
</div>