<?php /* Smarty version Smarty3-b7, created on 2015-09-30 11:40:24
         compiled from "/home/iapchiap/public_html/templates/boxes/view-student.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1914729930560c1078684e84-27971676%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '810be8a3ba24318ce07f988d4819bdb32f55d168' => 
    array (
      0 => '/home/iapchiap/public_html/templates/boxes/view-student.tpl',
      1 => 1379525001,
    ),
  ),
  'nocache_hash' => '1914729930560c1078684e84-27971676',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!-- Esta pantalla se muestra en   Cirricula -> Historial-> Alumnos A/I --><div class="popupheader" style="z-index:70">
      
      <div class="ftitl">
        <div class="dgBox" id="draganddrop">
            
            <div class="flabel" style="float:left">
            Alumnos <?php echo ucfirst($_smarty_tpl->getVariable('status')->value);?>
 </div>
        </div>
            <div class="closePopup" id="closePopUpDiv">
            <a href="javascript:void(0)" title="Cerrar"><img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/new/close.png" /></a>
            </div>				
       </div>
               
     <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/student1.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
                      
         
</div>