<?php /* Smarty version Smarty3-b7, created on 2017-06-01 20:38:54
         compiled from "C:/wamp/www/iap/templates/items/topics-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:134975930c1ae37c748-82659196%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc594b897553bf53fad646709c4ec7bdd23ba0dc' => 
    array (
      0 => 'C:/wamp/www/iap/templates/items/topics-base.tpl',
      1 => 1496156723,
    ),
  ),
  'nocache_hash' => '134975930c1ae37c748-82659196',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include 'C:\wamp\www\iap\libs\plugins\modifier.truncate.php';
?><?php  $_smarty_tpl->tpl_vars['topic'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('forum')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['topic']->key => $_smarty_tpl->tpl_vars['topic']->value){
?>
    <tr>
        <td align="center" class="id"><?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('topic')->value['subject'],30,"...");?>
</td>
        <td align="left"><?php echo $_smarty_tpl->getVariable('topic')->value['descripcion'];?>
</td>
      <!--  <td align="center" id="etitl1"><?php echo $_smarty_tpl->getVariable('topic')->value['names'];?>
 <?php echo $_smarty_tpl->getVariable('topic')->value['lastNamePaterno'];?>
 <?php echo $_smarty_tpl->getVariable('topic')->value['lastNameMaterno'];?>
</td>-->
      <!--  <td align="center" id="etitl1"></td>-->
        <td align="center">
          <?php if ($_smarty_tpl->getVariable('vistaPrevia')->value==0){?>  	<a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/forumsub-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
/topicId/<?php echo $_smarty_tpl->getVariable('topic')->value['topicId'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/arrow.png" class="spanEdit" id="e-<?php echo $_smarty_tpl->getVariable('position')->value['positionId'];?>
" name="e-<?php echo $_smarty_tpl->getVariable('position')->value['name'];?>
" title="Entrar al Foro" /></a><?php }else{ ?>
		  <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/arrow.png" class="spanEdit" id="e-<?php echo $_smarty_tpl->getVariable('position')->value['positionId'];?>
" name="e-<?php echo $_smarty_tpl->getVariable('position')->value['name'];?>
" title="Entrar al Foro" />
		  <?php }?>
		  
        </td>
    </tr>
<?php }} else { ?>
	<tr>
    	<td colspan="5" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
<?php } ?>