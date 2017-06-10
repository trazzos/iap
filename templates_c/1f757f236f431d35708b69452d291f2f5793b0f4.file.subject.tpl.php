<?php /* Smarty version Smarty3-b7, created on 2017-05-30 15:43:00
         compiled from "C:/wamp/www/iap/templates/new/subject.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1700592dd954b63627-33560187%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f757f236f431d35708b69452d291f2f5793b0f4' => 
    array (
      0 => 'C:/wamp/www/iap/templates/new/subject.tpl',
      1 => 1496156724,
    ),
  ),
  'nocache_hash' => '1700592dd954b63627-33560187',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i>Currícula
        </div>
        <div class="actions">
            <a class=" btn green" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/graybox.php?page=new-subject" data-target="#ajax" data-toggle="modal">
                <i class="fa fa-plus"></i>Agregar
            </a>
        </div>
    </div>
    <div class="portlet-body">
        <div id="tblContent"><?php $_template = new Smarty_Internal_Template("lists/new/subject.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</div>
    </div>
</div>

