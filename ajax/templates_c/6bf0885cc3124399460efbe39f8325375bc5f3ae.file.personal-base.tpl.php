<?php /* Smarty version Smarty3-b7, created on 2015-11-05 13:36:54
         compiled from "/home/iapchiap/public_html//templates/items/personal-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1522898752563bafd6353b89-49046002%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6bf0885cc3124399460efbe39f8325375bc5f3ae' => 
    array (
      0 => '/home/iapchiap/public_html//templates/items/personal-base.tpl',
      1 => 1379525071,
    ),
  ),
  'nocache_hash' => '1522898752563bafd6353b89-49046002',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('personals')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
        <tr>
        <td align="center" class="id"><?php echo $_smarty_tpl->getVariable('item')->value['personalId'];?>
</td>       
        <td>&nbsp;<?php echo $_smarty_tpl->getVariable('item')->value['lastname_paterno'];?>
 <?php echo $_smarty_tpl->getVariable('item')->value['lastname_materno'];?>
 <?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('item')->value['position'];?>
</td>        
        <td>&nbsp;<?php echo $_smarty_tpl->getVariable('item')->value['wrappedDescription'];?>
</td>
        <td align="center">           
            <img src="images/icons/16/delete.png" class="spanDelete" id="<?php echo $_smarty_tpl->getVariable('item')->value['personalId'];?>
" title="Eliminar" />&nbsp;
          	<img src="images/icons/16/pencil.png" class="spanEdit" id="<?php echo $_smarty_tpl->getVariable('item')->value['personalId'];?>
" title="Editar" />
        </td>
    </tr>
<?php }} else { ?>
<tr><td colspan="5" align="center">No se encontr&oacute; ning&uacute;n registro.</td></tr>				
<?php } ?>
