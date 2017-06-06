<?php /* Smarty version Smarty3-b7, created on 2017-06-01 10:20:58
         compiled from "C:/wamp/www/iap/templates/new/role.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22143593030dac76364-91713921%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd8958f04a70e0ecda3b5b23e4e83bb54b1955f4' => 
    array (
      0 => 'C:/wamp/www/iap/templates/new/role.tpl',
      1 => 1496156724,
    ),
  ),
  'nocache_hash' => '22143593030dac76364-91713921',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i>Tipos de Roles
        </div>
        <div class="actions">
            <a href="javascript:;" class="btn green" id="btnAddRole">
                <i class="fa fa-plus"></i> Agregar
            </a>
        </div>
    </div>
    <div class="portlet-body">
        <div id="tblContent"><?php $_template = new Smarty_Internal_Template("lists/role.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</div>
    </div>
</div>