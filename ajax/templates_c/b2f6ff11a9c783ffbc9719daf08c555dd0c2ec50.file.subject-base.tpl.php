<?php /* Smarty version Smarty3-b7, created on 2015-12-16 14:05:59
         compiled from "/home/iapchiap/public_html//templates/items/subject-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10825068105671c4276cde60-96925323%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2f6ff11a9c783ffbc9719daf08c555dd0c2ec50' => 
    array (
      0 => '/home/iapchiap/public_html//templates/items/subject-base.tpl',
      1 => 1379525114,
    ),
  ),
  'nocache_hash' => '10825068105671c4276cde60-96925323',
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
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['majorName'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['clave'];?>
</td>
        <td align="left"><?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
</td>
        <td align="left"><?php echo $_smarty_tpl->getVariable('subject')->value['modules'];?>

        	<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/16/document--plus.png" class="spanViewModule" id="d-<?php echo $_smarty_tpl->getVariable('subject')->value['subjectId'];?>
" name="d-<?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
" title="Ver Modulos" /></a>
</td>
        <td align="left"><?php echo $_smarty_tpl->getVariable('subject')->value['payments'];?>
</td>
        <td align="left"><?php echo $_smarty_tpl->getVariable('subject')->value['cost'];?>
</td>
        <td align="center">
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/16/delete.png" class="spanDelete" id="d-<?php echo $_smarty_tpl->getVariable('subject')->value['subjectId'];?>
" name="d-<?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
" title="Eliminar" />&nbsp;
          	<a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/edit-subject/id/<?php echo $_smarty_tpl->getVariable('subject')->value['subjectId'];?>
" onclick="return parent.GB_show('Editar Curricula', this.href,650,700)"><img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/16/pencil.png" class="spanEdit" id="d-<?php echo $_smarty_tpl->getVariable('subject')->value['subjectId'];?>
" name="d-<?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
" title="Editar" /></a>
        </td>
    </tr>
<?php }} else { ?>
	<tr>
    	<td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
<?php } ?>
