<?php /* Smarty version Smarty3-b7, created on 2017-06-01 19:04:15
         compiled from "C:/wamp/www/iap/templates/boxes/view-ponderation-student.tpl" */ ?>
<?php /*%%SmartyHeaderCode:323285930ab7f1697c5-08536987%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8eb3e44744c97a1b35c2c91166b49a8056c5f38b' => 
    array (
      0 => 'C:/wamp/www/iap/templates/boxes/view-ponderation-student.tpl',
      1 => 1496156722,
    ),
  ),
  'nocache_hash' => '323285930ab7f1697c5-08536987',
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