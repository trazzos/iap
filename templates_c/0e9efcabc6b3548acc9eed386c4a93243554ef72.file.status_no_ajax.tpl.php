<?php /* Smarty version Smarty3-b7, created on 2017-05-30 15:40:57
         compiled from ".\templates\boxes/status_no_ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7350592dd8d9343a10-20827510%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e9efcabc6b3548acc9eed386c4a93243554ef72' => 
    array (
      0 => '.\\templates\\boxes/status_no_ajax.tpl',
      1 => 1496156722,
    ),
  ),
  'nocache_hash' => '7350592dd8d9343a10-20827510',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
			 
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
			 
