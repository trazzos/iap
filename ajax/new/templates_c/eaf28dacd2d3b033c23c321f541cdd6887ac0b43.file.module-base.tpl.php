<?php /* Smarty version Smarty3-b7, created on 2017-05-30 15:44:07
         compiled from "C:/wamp/www/iap/templates/items/new/module-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:647592dd9979c5847-55747052%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eaf28dacd2d3b033c23c321f541cdd6887ac0b43' => 
    array (
      0 => 'C:/wamp/www/iap/templates/items/new/module-base.tpl',
      1 => 1496156723,
    ),
  ),
  'nocache_hash' => '647592dd9979c5847-55747052',
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
        <td align="center" class="id"><?php echo $_smarty_tpl->getVariable('subject')->value['subjectModuleId'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['clave'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['semesterId'];?>
</td>
        <td align="left"><?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
</td>
        <td align="center">
            <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/index_new.php?page=subject&delete=<?php echo $_smarty_tpl->getVariable('subject')->value['subjectModuleId'];?>
"><img src="images/icons/16/delete.png" class="spanModuleDelete" id="<?php echo $_smarty_tpl->getVariable('subject')->value['subjectId'];?>
" name="<?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
" title="Eliminar" /></a>
            <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/index_new.php?page=edit-module&id=<?php echo $_smarty_tpl->getVariable('subject')->value['subjectModuleId'];?>
"><img src="images/icons/16/pencil.png" class="spanEdit" id="<?php echo $_smarty_tpl->getVariable('subject')->value['subjectId'];?>
" name="<?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
" title="Editar" /></a>
        </td>
    </tr>
    <?php }} else { ?>
    <tr>
        <td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
    </tr>
<?php } ?>
