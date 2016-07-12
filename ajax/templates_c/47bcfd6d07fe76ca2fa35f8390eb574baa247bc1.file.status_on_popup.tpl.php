<?php /* Smarty version Smarty3-b7, created on 2015-10-25 13:38:51
         compiled from "/home/iapchiap/public_html//templates/boxes/status_on_popup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1881767068562d2fcbafa5c3-88753121%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47bcfd6d07fe76ca2fa35f8390eb574baa247bc1' => 
    array (
      0 => '/home/iapchiap/public_html//templates/boxes/status_on_popup.tpl',
      1 => 1379524999,
    ),
  ),
  'nocache_hash' => '1881767068562d2fcbafa5c3-88753121',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
			<?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/boxes/status_open_on_popup.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
 
			<?php if (!empty($_smarty_tpl->getVariable('errors')->value)){?>
      	<h3>
    			<?php if ($_smarty_tpl->getVariable('errors')->value['complete']){?>
			    	<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/ok.png" style="cursor:pointer" />
    			<?php }else{ ?>
	       		<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/error.png" style="cursor:pointer" />
    			<?php }?>  
       	</h3>
        <div style="position:relative;top:-20px;left:50px; font-size:14px">
        <?php  $_smarty_tpl->tpl_vars["error"] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('errors')->value['value']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["error"]->key => $_smarty_tpl->tpl_vars["error"]->value){
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["error"]->key;
?>
    			<b><?php echo $_smarty_tpl->getVariable('error')->value;?>
.
    			<?php if ($_smarty_tpl->getVariable('errors')->value['field'][$_smarty_tpl->getVariable('key')->value]){?>
       			Campo: <u><?php echo $_smarty_tpl->getVariable('errors')->value['field'][$_smarty_tpl->getVariable('key')->value];?>
</u>
    			<?php }?>
                </b>
     			<br />
  			<?php }} ?>

        </div>
      <?php }?>  
			<?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/boxes/status_close.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
 
