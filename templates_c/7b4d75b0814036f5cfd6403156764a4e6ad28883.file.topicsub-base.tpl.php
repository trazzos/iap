<?php /* Smarty version Smarty3-b7, created on 2017-06-01 22:43:48
         compiled from "C:/wamp/www/iap/templates/items/topicsub-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:228395930def4479bb8-48498926%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b4d75b0814036f5cfd6403156764a4e6ad28883' => 
    array (
      0 => 'C:/wamp/www/iap/templates/items/topicsub-base.tpl',
      1 => 1496156723,
    ),
  ),
  'nocache_hash' => '228395930def4479bb8-48498926',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include 'C:\wamp\www\iap\libs\plugins\modifier.truncate.php';
?><?php  $_smarty_tpl->tpl_vars['topicsub'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('forum')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['topicsub']->key => $_smarty_tpl->tpl_vars['topicsub']->value){
?>
    <tr>
        <td align="center" class="id"><?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('topicsub')->value['nombre'],50,"...");?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('topicsub')->value['topicsubDate'];?>
</td>
        <td align="center" id="etitl1">
            <?php if ($_smarty_tpl->getVariable('topicsub')->value['names']){?><?php echo $_smarty_tpl->getVariable('topicsub')->value['names'];?>
 <?php echo $_smarty_tpl->getVariable('topicsub')->value['lastNamePaterno'];?>
 <?php echo $_smarty_tpl->getVariable('topicsub')->value['lastNameMaterno'];?>
<?php }else{ ?>Profesor<?php }?>
        </td>
        <td align="center" id="etitl1"><?php echo $_smarty_tpl->getVariable('topicsub')->value['answers'];?>
</td>
        <td align="center">
          	<a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/add-reply/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
/topicsubId/<?php echo $_smarty_tpl->getVariable('topicsub')->value['topicsubId'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/arrow.png" class="spanEdit" id="e-<?php echo $_smarty_tpl->getVariable('position')->value['positionId'];?>
" name="e-<?php echo $_smarty_tpl->getVariable('position')->value['name'];?>
" title="Ver respuestas" /></a>
        </td>
    </tr>
<?php }} else { ?>
	<tr>
    	<td colspan="5" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
<?php } ?>