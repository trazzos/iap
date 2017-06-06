<?php /* Smarty version Smarty3-b7, created on 2017-05-30 15:40:28
         compiled from "C:/wamp/www/iap/templates/new/major.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3306592dd8bcd23181-86185721%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08c1d2512cf4089119fcf1c5c27eaf59660e7769' => 
    array (
      0 => 'C:/wamp/www/iap/templates/new/major.tpl',
      1 => 1496156724,
    ),
  ),
  'nocache_hash' => '3306592dd8bcd23181-86185721',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i>Tipos de Postgrado
        </div>
        <div class="actions">
            <a href="javascript:;" class="btn green" id="btnAddMajor">
                <i class="fa fa-plus"></i> Agregar
            </a>
        </div>
    </div>
    <div class="portlet-body">
        <div id="tblContent"><?php $_template = new Smarty_Internal_Template("lists/major.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</div>
    </div>
</div>