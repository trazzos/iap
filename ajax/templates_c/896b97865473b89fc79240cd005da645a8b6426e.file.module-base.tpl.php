<?php /* Smarty version Smarty3-b7, created on 2015-11-11 15:14:49
         compiled from "/home/iapchiap/public_html//templates/items/module-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16371214945643afc94a74c5-44427699%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '896b97865473b89fc79240cd005da645a8b6426e' => 
    array (
      0 => '/home/iapchiap/public_html//templates/items/module-base.tpl',
      1 => 1379525066,
    ),
  ),
  'nocache_hash' => '16371214945643afc94a74c5-44427699',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['subject'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('subjects')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['subject']->key => $_smarty_tpl->tpl_vars['subject']->value){
?>
    <tr>
        <td align="center" class="id"><?php echo $_smarty_tpl->getVariable('subject')->value['subjectId'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['clave'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['semesterId'];?>
</td>
        <td align="left"><?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
</td>
        <td align="center">
            <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/subject/delete/<?php echo $_smarty_tpl->getVariable('subject')->value['subjectModuleId'];?>
"><img src="images/icons/16/delete.png" class="spanModuleDelete" id="d-<?php echo $_smarty_tpl->getVariable('subject')->value['subjectId'];?>
" name="d-<?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
" title="Eliminar" /></a> 
          	<a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/edit-module/id/<?php echo $_smarty_tpl->getVariable('subject')->value['subjectModuleId'];?>
"><img src="images/icons/16/pencil.png" class="spanEdit" id="d-<?php echo $_smarty_tpl->getVariable('subject')->value['subjectId'];?>
" name="d-<?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
" title="Editar" /></a>
        </td>
    </tr>
<?php }} else { ?>
	<tr>
    	<td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
<?php } ?>
