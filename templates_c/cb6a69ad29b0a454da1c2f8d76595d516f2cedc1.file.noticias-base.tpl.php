<?php /* Smarty version Smarty3-b7, created on 2017-06-01 19:13:55
         compiled from "C:/wamp/www/iap/templates/items/new/noticias-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25875930adc3d97a50-21036745%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb6a69ad29b0a454da1c2f8d76595d516f2cedc1' => 
    array (
      0 => 'C:/wamp/www/iap/templates/items/new/noticias-base.tpl',
      1 => 1496156723,
    ),
  ),
  'nocache_hash' => '25875930adc3d97a50-21036745',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'C:\wamp\www\iap\libs\plugins\modifier.date_format.php';
?><?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('announcements')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
    <tr>
        <td align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('item')->value['date'],"%d-%m-%Y %H:%M:%S");?>
 </td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('item')->value['title'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('item')->value['description'];?>
</td>
        <td align="center">
            <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/homepage/id/<?php echo $_smarty_tpl->getVariable('item')->value['announcementId'];?>
" onclick="return confirm('&iquest;Desea eliminar la noticia?')">
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/16/delete.png" class="spanDeleteNoticia" data-id="<?php echo $_smarty_tpl->getVariable('subject')->value['announcementId'];?>
" id="d-<?php echo $_smarty_tpl->getVariable('subject')->value['announcementId'];?>
" name="d-<?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
" title="Eliminar" />
            </a>
        </td>
    </tr>
    <?php }} else { ?>
    <tr>
        <td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
    </tr>
<?php } ?>
