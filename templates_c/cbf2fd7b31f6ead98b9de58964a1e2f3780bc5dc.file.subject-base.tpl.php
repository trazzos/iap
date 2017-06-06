<?php /* Smarty version Smarty3-b7, created on 2017-05-30 15:43:00
         compiled from "C:/wamp/www/iap/templates/items/new/subject-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18899592dd954d9dba5-85475920%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cbf2fd7b31f6ead98b9de58964a1e2f3780bc5dc' => 
    array (
      0 => 'C:/wamp/www/iap/templates/items/new/subject-base.tpl',
      1 => 1496156723,
    ),
  ),
  'nocache_hash' => '18899592dd954d9dba5-85475920',
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
/images/icons/16/document--plus.png" class="spanViewModule" id="<?php echo $_smarty_tpl->getVariable('subject')->value['subjectId'];?>
" name="<?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
" title="Ver Módulos" /></a>
        </td>
        <td align="left"><?php echo $_smarty_tpl->getVariable('subject')->value['payments'];?>
</td>
        <td align="left"><?php echo $_smarty_tpl->getVariable('subject')->value['cost'];?>
</td>
        <td align="center">
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/16/delete.png" class="spanDelete" id="<?php echo $_smarty_tpl->getVariable('subject')->value['subjectId'];?>
" name="<?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
" title="Eliminar" />&nbsp;
            <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/graybox.php?page=edit-subject&id=<?php echo $_smarty_tpl->getVariable('subject')->value['subjectId'];?>
" title="Editar Currícula" data-target="#ajax" data-toggle="modal" style="color:#000" >
                <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/16/pencil.png" class="spanEdit" id="<?php echo $_smarty_tpl->getVariable('subject')->value['subjectId'];?>
" name="<?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
" title="Editar" />
            </a>
        </td>
    </tr>
    <?php }} else { ?>
    <tr>
        <td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
    </tr>
<?php } ?>
