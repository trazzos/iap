<?php /* Smarty version Smarty3-b7, created on 2017-05-30 15:40:03
         compiled from "C:/wamp/www/iap/templates/lists/module-announcements.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31687592dd8a3440f36-27407993%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '25007aebca7008b46a13c31725a7261442ed17be' => 
    array (
      0 => 'C:/wamp/www/iap/templates/lists/module-announcements.tpl',
      1 => 1496156723,
    ),
  ),
  'nocache_hash' => '31687592dd8a3440f36-27407993',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'C:\wamp\www\iap\libs\plugins\modifier.date_format.php';
?><ul id="sort-box" class="sorts">
  <li>
    <div>
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('announcements')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
		 	<div class="content-settings-row-register" align="center">
            <b>.:: <?php echo $_smarty_tpl->getVariable('item')->value['title'];?>
 - Fecha: <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('item')->value['date'],"%d-%m-%Y %H:%M:%S");?>
 ::. <?php if ($_smarty_tpl->getVariable('User')->value['positionId']=="1"&&$_smarty_tpl->getVariable('vp')->value==1){?> | &raquo; <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/homepage/id/<?php echo $_smarty_tpl->getVariable('item')->value['announcementId'];?>
" onclick="return confirm('&iquest;Desea eliminar la noticia?')"> Eliminar Noticia </a> <?php }?></b>

      </div>
      <div class="content-settings-row-register">
            <?php echo $_smarty_tpl->getVariable('item')->value['description'];?>

      </div>
			<?php }} ?>
    </div>
   </li>
 </ul>
 