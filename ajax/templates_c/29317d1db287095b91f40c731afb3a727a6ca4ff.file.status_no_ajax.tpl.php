<?php /* Smarty version Smarty3-b7, created on 2015-11-19 15:33:12
         compiled from "/home/iapchiap/public_html//templates/boxes/status_no_ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:478110793564e40181e13e5-69511620%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29317d1db287095b91f40c731afb3a727a6ca4ff' => 
    array (
      0 => '/home/iapchiap/public_html//templates/boxes/status_no_ajax.tpl',
      1 => 1379524999,
    ),
  ),
  'nocache_hash' => '478110793564e40181e13e5-69511620',
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
			 
