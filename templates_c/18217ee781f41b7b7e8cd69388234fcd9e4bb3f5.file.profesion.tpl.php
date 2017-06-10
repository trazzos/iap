<?php /* Smarty version Smarty3-b7, created on 2017-06-01 10:28:06
         compiled from "C:/wamp/www/iap/templates/new/profesion.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1650259303286029fe7-63000237%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18217ee781f41b7b7e8cd69388234fcd9e4bb3f5' => 
    array (
      0 => 'C:/wamp/www/iap/templates/new/profesion.tpl',
      1 => 1496156724,
    ),
  ),
  'nocache_hash' => '1650259303286029fe7-63000237',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i>Tipos de Profesiones
        </div>
        <div class="actions">
            <a href="javascript:;" class="btn green" id="btnAddProfesion">
                <i class="fa fa-plus"></i> Agregar
            </a>
        </div>
    </div>
    <div class="portlet-body">
        <div id="tblContent"><?php $_template = new Smarty_Internal_Template("lists/profesion.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</div>
    </div>
</div>