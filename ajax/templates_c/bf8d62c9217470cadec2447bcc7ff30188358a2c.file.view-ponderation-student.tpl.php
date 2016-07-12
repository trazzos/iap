<?php /* Smarty version Smarty3-b7, created on 2015-10-22 18:16:37
         compiled from "/home/iapchiap/public_html//templates/boxes/view-ponderation-student.tpl" */ ?>
<?php /*%%SmartyHeaderCode:166162827056296e55a7cba9-80093056%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf8d62c9217470cadec2447bcc7ff30188358a2c' => 
    array (
      0 => '/home/iapchiap/public_html//templates/boxes/view-ponderation-student.tpl',
      1 => 1379525001,
    ),
  ),
  'nocache_hash' => '166162827056296e55a7cba9-80093056',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>



<div class="popupheader" style="z-index:70">
      
      <div class="ftitl">
        <div class="dgBox" id="draganddrop">
      
            <div class="flabel" style="float:left">
            Calificaciones </div>
        </div>
            <div class="closePopup" id="closePopUpDiv">
            <a href="javascript:void(0)" title="Cerrar"><img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/new/close.png" /></a>
            </div>				
       </div>
               
     <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/ponderation.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
                      
         
</div>