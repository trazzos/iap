<?php /* Smarty version Smarty3-b7, created on 2015-11-19 15:33:01
         compiled from "/home/iapchiap/public_html//templates/items/invoices-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:396379018564e400d60dad2-91328263%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3f832eb5f4e20e6698f0ea4796db25ab7bd1f37' => 
    array (
      0 => '/home/iapchiap/public_html//templates/items/invoices-base.tpl',
      1 => 1379525061,
    ),
  ),
  'nocache_hash' => '396379018564e400d60dad2-91328263',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['subject'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('invoices')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['subject']->key => $_smarty_tpl->tpl_vars['subject']->value){
?>
    <tr>
        <td align="center" class="id"><?php echo $_smarty_tpl->getVariable('subject')->value['invoiceId'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['lastNamePaterno'];?>
 <?php echo $_smarty_tpl->getVariable('subject')->value['lastNameMaterno'];?>
 <?php echo $_smarty_tpl->getVariable('subject')->value['names'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['dueDate'];?>
</td>
        <td align="center">$<?php echo $_smarty_tpl->getVariable('subject')->value['amount'];?>
</td>
        <td align="center">$<?php echo $_smarty_tpl->getVariable('subject')->value['payment'];?>
 <?php if ($_smarty_tpl->getVariable('subject')->value['payment']>0){?> <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/view-payments/id/<?php echo $_smarty_tpl->getVariable('subject')->value['invoiceId'];?>
" title="Ver Pagos" onclick="return parent.GB_show('Ver Pagos', this.href,250,700) " style="color:#000" >(Ver)</a></td><?php }?>
        <td align="center"><?php if ($_smarty_tpl->getVariable('subject')->value['debt']>0){?>$<?php echo $_smarty_tpl->getVariable('subject')->value['debt'];?>
<?php }else{ ?>N/A<?php }?></td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['status'];?>
</td>
        <td align="center">
        <?php if ($_smarty_tpl->getVariable('User')->value['type']!="student"){?>
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/16/delete.png" class="spanDelete" id="d-<?php echo $_smarty_tpl->getVariable('subject')->value['invoiceId'];?>
" name="d-<?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
" title="Eliminar" />&nbsp;
		
  
   <?php if ($_smarty_tpl->getVariable('subject')->value['debt']>0){?>
     <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/new-payment/id/<?php echo $_smarty_tpl->getVariable('subject')->value['invoiceId'];?>
" title="Agregar Nuevo Pago" onclick="return parent.GB_show('Agregar Pago', this.href,540,700) " > <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/16/money.png" class="spanPay" id="d-<?php echo $_smarty_tpl->getVariable('subject')->value['invoiceId'];?>
" name="d-<?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
" title="Nuevo Pago" /></a>        
  <?php }?>
  
  
  
  
                        <?php if ($_smarty_tpl->getVariable('subject')->value['payment']>0){?> <a href="http://www.iapchiapasenlinea.mx/invoicesrep.php?invoiceId=<?php echo $_smarty_tpl->getVariable('subject')->value['invoiceId'];?>
" target="_blank" title="Imprimir pagos" > <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/16/pdf.gif" class="spanPay" id="d-<?php echo $_smarty_tpl->getVariable('subject')->value['invoiceId'];?>
" name="d-<?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
"  /></a>        <?php }?>
        <?php }else{ ?>
	        <?php if ($_smarty_tpl->getVariable('subject')->value['debt']>0){?>    
            <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=dlopez@trazzos.com&item_name=Colegiatura&item_number=<?php echo $_smarty_tpl->getVariable('subject')->value['invoiceId'];?>
&amount=<?php echo $_smarty_tpl->getVariable('subject')->value['amount'];?>
&no_shipping=1&no_note=1&lc=AU&bn=PP-BuyNowBF&currency_code=USD&quantity=1&option_name1=<?php echo $_smarty_tpl->getVariable('User')->value['userId'];?>
&on1=<?php echo $_smarty_tpl->getVariable('User')->value['userId'];?>
&option_name2=<?php echo $_smarty_tpl->getVariable('User')->value['numControl'];?>
&return=<?php echo $_smarty_tpl->getVariable('return')->value;?>
&notify_url=<?php echo $_smarty_tpl->getVariable('notify_url')->value;?>
" title="Agregar Nuevo Pago"> <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/16/money.png" class="spanPay" id="d-<?php echo $_smarty_tpl->getVariable('subject')->value['invoiceId'];?>
" name="d-<?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
" title="Nuevo Pago" /></a>
           <?php }?> 
        <?php }?>    

        </td>
    </tr>
<?php }} else { ?>
	<tr>
    	<td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
<?php } ?>
