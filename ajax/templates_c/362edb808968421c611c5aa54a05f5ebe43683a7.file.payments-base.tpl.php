<?php /* Smarty version Smarty3-b7, created on 2015-09-30 16:11:11
         compiled from "/home/iapchiap/public_html/templates/items/payments-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2127269272560c4fef85ce45-70094022%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '362edb808968421c611c5aa54a05f5ebe43683a7' => 
    array (
      0 => '/home/iapchiap/public_html/templates/items/payments-base.tpl',
      1 => 1379525070,
    ),
  ),
  'nocache_hash' => '2127269272560c4fef85ce45-70094022',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['subject'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('payments')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['subject']->key => $_smarty_tpl->tpl_vars['subject']->value){
?>
    <tr>
        <td align="center" class="id"><?php echo $_smarty_tpl->getVariable('subject')->value['paymentId'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['date'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['invoiceId'];?>
</td>
        <td align="left"><?php echo $_smarty_tpl->getVariable('subject')->value['amount'];?>
</td>
        <td align="left"><?php echo $_smarty_tpl->getVariable('subject')->value['amountApplied'];?>
</td>
        <td align="left"><?php echo $_smarty_tpl->getVariable('subject')->value['credit'];?>
</td>
        <td align="left"><?php echo $_smarty_tpl->getVariable('subject')->value['anticipo'];?>
</td>
        <td align="left"><?php echo $_smarty_tpl->getVariable('subject')->value['paymentMethod'];?>
</td>
        <td align="left"><?php echo $_smarty_tpl->getVariable('subject')->value['comments'];?>
</td>
        <td align="center">
        <?php if ($_smarty_tpl->getVariable('User')->value['type']!="student"){?>
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/16/delete.png" class="spanDelete" id="d-<?php echo $_smarty_tpl->getVariable('subject')->value['paymentId'];?>
" name="d-<?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
" title="Eliminar" />&nbsp;
            <?php if ($_smarty_tpl->getVariable('subject')->value['status']=="activo"){?>
          	<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/16/cancel.png" class="spanCancel" id="d-<?php echo $_smarty_tpl->getVariable('subject')->value['paymentId'];?>
" name="d-<?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
" title="Cancelar" />
            <?php }else{ ?>
          	<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/16/activate.png" class="spanCancel" id="d-<?php echo $_smarty_tpl->getVariable('subject')->value['paymentId'];?>
" name="d-<?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
" title="Cancelar" />
            <?php }?>
        <?php }?>    
        </td>
    </tr>
<?php }} else { ?>
	<tr>
    	<td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
<?php } ?>
