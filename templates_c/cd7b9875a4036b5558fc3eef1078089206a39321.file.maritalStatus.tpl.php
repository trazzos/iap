<?php /* Smarty version Smarty3-b7, created on 2017-06-01 09:21:59
         compiled from "C:/wamp/www/iap/templates/forms/maritalStatus.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3612593023070a2499-64126827%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd7b9875a4036b5558fc3eef1078089206a39321' => 
    array (
      0 => 'C:/wamp/www/iap/templates/forms/maritalStatus.tpl',
      1 => 1496156723,
    ),
  ),
  'nocache_hash' => '3612593023070a2499-64126827',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
  <select name='maritalStatus' id="maritalStatus" class="form-control">
                    <option value="Soltero(a)" <?php $_smarty_tpl->assign('selected','Soltero(a)',null,null);?>>Soltero(a)</option>
                    <option value="Casado(a)" <?php $_smarty_tpl->assign('selected','Casado(a)',null,null);?>>Casado(a)</option>
                    <option value="Divorciado(a)"  <?php $_smarty_tpl->assign('selected','Divorciado(a)',null,null);?>>Divorciado(a)</option>
                    <option value="Viudo(a)"  <?php $_smarty_tpl->assign('selected','Viudo(a)',null,null);?>>Viudo(a)</option>
                </select>     