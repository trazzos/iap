<?php /* Smarty version Smarty3-b7, created on 2015-10-06 12:02:12
         compiled from "/home/iapchiap/public_html/templates/boxes/edit-personal-popup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18107716285613fe94d0d276-23316312%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd115c6a7a6c9d07cdc98ad42a630a1949980aeab' => 
    array (
      0 => '/home/iapchiap/public_html/templates/boxes/edit-personal-popup.tpl',
      1 => 1379524990,
    ),
  ),
  'nocache_hash' => '18107716285613fe94d0d276-23316312',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="popupheader" style="z-index:70">
      
      <div class="ftitl">
        <div class="dgBox" id="draganddrop">
            <div style="float:left;"><img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/editPopup.png" /></div>
            <div class="flabel" style="float:left">&nbsp;&nbsp;Editar Personal</div>
        </div>
            <div class="closePopup" id="closePopUpDiv">
            <a href="javascript:void(0)" title="Cerrar"><img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/new/close.png" /></a>
            </div>				
       </div>
               
     <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/forms/edit-personal.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
                      
         
</div>