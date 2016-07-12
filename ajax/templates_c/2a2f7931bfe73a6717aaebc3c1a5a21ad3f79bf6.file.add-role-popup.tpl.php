<?php /* Smarty version Smarty3-b7, created on 2016-01-12 11:35:56
         compiled from "/home/iapchiap/public_html//templates/boxes/add-role-popup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:464328885695397c11ed49-48154837%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a2f7931bfe73a6717aaebc3c1a5a21ad3f79bf6' => 
    array (
      0 => '/home/iapchiap/public_html//templates/boxes/add-role-popup.tpl',
      1 => 1379524979,
    ),
  ),
  'nocache_hash' => '464328885695397c11ed49-48154837',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="popupheader" style="z-index:70">
      
      <div class="ftitl">
        <div class="dgBox" id="draganddrop">
            <div style="float:left;"><img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/addPopup.png" /></div>
            <div class="flabel" style="float:left">&nbsp;&nbsp;Agregar Rol</div>
        </div>
            <div class="closePopup" id="closePopUpDiv">
            <a href="javascript:void(0)" title="Cerrar"><img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/new/close.png" /></a>
            </div>				
       </div>
               
     <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/forms/add-role.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
                      
         
</div>