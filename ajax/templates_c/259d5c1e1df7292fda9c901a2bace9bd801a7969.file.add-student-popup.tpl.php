<?php /* Smarty version Smarty3-b7, created on 2015-11-06 23:23:10
         compiled from "/home/iapchiap/public_html//templates/boxes/add-student-popup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:397156558563d8abe0a9b32-94181899%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '259d5c1e1df7292fda9c901a2bace9bd801a7969' => 
    array (
      0 => '/home/iapchiap/public_html//templates/boxes/add-student-popup.tpl',
      1 => 1379524981,
    ),
  ),
  'nocache_hash' => '397156558563d8abe0a9b32-94181899',
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
            <div class="flabel" style="float:left">&nbsp;&nbsp;Agregar Alumno</div>
        </div>
            <div class="closePopup" id="closePopUpDiv">
            <a href="javascript:void(0)" title="Cerrar"><img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/new/close.png" /></a>
            </div>				
       </div>
               
     <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/forms/add-student.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
                      
         
</div>