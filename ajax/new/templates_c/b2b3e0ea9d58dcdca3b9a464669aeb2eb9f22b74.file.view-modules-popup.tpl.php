<?php /* Smarty version Smarty3-b7, created on 2017-05-30 15:44:07
         compiled from "C:/wamp/www/iap/templates/boxes/new/view-modules-popup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16648592dd9977de038-17086625%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2b3e0ea9d58dcdca3b9a464669aeb2eb9f22b74' => 
    array (
      0 => 'C:/wamp/www/iap/templates/boxes/new/view-modules-popup.tpl',
      1 => 1496156722,
    ),
  ),
  'nocache_hash' => '16648592dd9977de038-17086625',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="popupheader" style="z-index:70">

    <div class="portlet-title">
        <div class="dgBox" id="draganddrop">
            <div style="float:left;"><img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/addPopup.png" /></div>
            <div class="actions" style="float:left">
                <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/index_new.php?page=new-module&id=<?php echo $_smarty_tpl->getVariable('id')->value;?>
" style="color:#000000">&nbsp;&nbsp;Click para agregar módulos a Currícula</a></div>
        </div>
    </div>
    <div class="portlet-body">
        <div id="tblContent"><?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/new/modules.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</div>
    </div>

</div>