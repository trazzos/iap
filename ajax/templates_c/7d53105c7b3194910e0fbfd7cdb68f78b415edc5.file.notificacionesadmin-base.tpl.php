<?php /* Smarty version Smarty3-b7, created on 2015-11-01 12:38:30
         compiled from "/home/iapchiap/public_html//templates/items/notificacionesadmin-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:111796967256365c26d29710-05829319%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d53105c7b3194910e0fbfd7cdb68f78b415edc5' => 
    array (
      0 => '/home/iapchiap/public_html//templates/items/notificacionesadmin-base.tpl',
      1 => 1445541738,
    ),
  ),
  'nocache_hash' => '111796967256365c26d29710-05829319',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/home/iapchiap/public_html/libs/plugins/modifier.date_format.php';
?><?php  $_smarty_tpl->tpl_vars['reply'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('notificaciones')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['reply']->key => $_smarty_tpl->tpl_vars['reply']->value){
?>
   
   <?php if ($_smarty_tpl->getVariable('reply')->value['vistaPermiso']==1){?>
			<tr>
				<td align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('reply')->value['fecha_aplicacion'],"%d-%m-%Y %H:%M:%S");?>
</td>
				<td align="left"><?php echo $_smarty_tpl->getVariable('reply')->value['actividad'];?>
</td>
				<td alin="center"><?php echo $_smarty_tpl->getVariable('reply')->value['nombre'];?>
</td>

				<?php if ($_smarty_tpl->getVariable('reply')->value['enlace']!="NO"){?>
					<td align="center">
					<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/cancel.png"  title="Eliminar Notificaci&oacute;n"  onclick="borrarNot(<?php echo $_smarty_tpl->getVariable('reply')->value['notificacionId'];?>
)"/>
					<a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
<?php echo $_smarty_tpl->getVariable('reply')->value['enlace'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/arrow.png" class="spanEdit" id="d-<?php echo $_smarty_tpl->getVariable('subject')->value['subjectId'];?>
" name="d-<?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
" title="Ver" /></a>
					</td>
				<?php }else{ ?>
					<td align="center">
					<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/cancel.png"  title="Eliminar Notificaci&oacute;n"  onclick="borrarNot(<?php echo $_smarty_tpl->getVariable('reply')->value['notificacionId'];?>
)"/>
					</td>
   
				<?php }?>   
	
	
	
			</tr>
	<?php }?>
	
<?php }} else { ?>
	<tr>
    	<td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
<?php } ?>
