<?php /* Smarty version Smarty3-b7, created on 2017-06-01 10:20:53
         compiled from "C:/wamp/www/iap/templates/new/position.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11043593030d5287889-32003567%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63b26f9e19f65805765e942363590c8e73df2d4b' => 
    array (
      0 => 'C:/wamp/www/iap/templates/new/position.tpl',
      1 => 1496156724,
    ),
  ),
  'nocache_hash' => '11043593030d5287889-32003567',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i>Puestos
        </div>
        <div class="actions">
            <a href="javascript:;" class="btn green" id="btnAddPosition">
                <i class="fa fa-plus"></i> Agregar
            </a>
        </div>
    </div>
    <div class="portlet-body">
        <div id="tblContent"><?php $_template = new Smarty_Internal_Template("lists/position.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</div>
    </div>
</div>