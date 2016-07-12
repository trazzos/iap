<?php /* Smarty version Smarty3-b7, created on 2015-11-11 15:14:49
         compiled from "/home/iapchiap/public_html//templates/boxes/view-modules-popup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9362914345643afc93d3d47-28949336%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87577856a345277407bd7847989efab5403b4739' => 
    array (
      0 => '/home/iapchiap/public_html//templates/boxes/view-modules-popup.tpl',
      1 => 1379525000,
    ),
  ),
  'nocache_hash' => '9362914345643afc93d3d47-28949336',
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
            <div class="flabel" style="float:left">
            <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/new-module/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
" style="color:#000000">&nbsp;&nbsp;Click para agregar Modulo a Curricula</a></div>
        </div>
            <div class="closePopup" id="closePopUpDiv">
            <a href="javascript:void(0)" title="Cerrar"><img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/new/close.png" /></a>
            </div>				
       </div>
               
     <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/modules.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
                      
         
</div>