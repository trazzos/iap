<?php /* Smarty version Smarty3-b7, created on 2017-06-01 22:38:33
         compiled from "C:/wamp/www/iap/templates/items/new/resources-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:313155930ddb92dd4e8-54805340%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d73cf4ea7848602707ec9ca4887d33a5dd290c3' => 
    array (
      0 => 'C:/wamp/www/iap/templates/items/new/resources-base.tpl',
      1 => 1496374594,
    ),
  ),
  'nocache_hash' => '313155930ddb92dd4e8-54805340',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['subject'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('resources')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['subject']->key => $_smarty_tpl->tpl_vars['subject']->value){
?>
    <tr>
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['description'];?>
</td>
        <td align="center"><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/download.php?file=resources/<?php echo $_smarty_tpl->getVariable('subject')->value['path'];?>
"><i class="fa fa-download"></i></a></td>
        <td align="center">
            <?php if ($_smarty_tpl->getVariable('page')->value!="resources-modules-student"){?>
                <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/16/delete.png" class="spanDeleteResource" id="d-<?php echo $_smarty_tpl->getVariable('subject')->value['resourceId'];?>
" name="d-<?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
" title="Eliminar" />&nbsp;
                <a style="color:#000000" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/edit-resource/id/<?php echo $_smarty_tpl->getVariable('subject')->value['resourceId'];?>
" onclick="return parent.GB_show('Editar Recurso de Apoyo', this.href,650,700) "><img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/16/pencil.png" class="spanEdit" id="d-<?php echo $_smarty_tpl->getVariable('subject')->value['subjectId'];?>
" name="d-<?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
" title="Editar" /></a>
            <?php }?>
        </td>
    </tr>
    <?php }} else { ?>
    <tr>
        <td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
    </tr>
<?php } ?>
