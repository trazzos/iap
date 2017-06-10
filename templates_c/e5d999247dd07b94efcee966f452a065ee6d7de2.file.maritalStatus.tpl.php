<?php /* Smarty version Smarty3-b7, created on 2017-06-01 09:24:00
         compiled from ".\templates\forms/maritalStatus.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2868059302380ee34c7-56547379%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5d999247dd07b94efcee966f452a065ee6d7de2' => 
    array (
      0 => '.\\templates\\forms/maritalStatus.tpl',
      1 => 1496156723,
    ),
  ),
  'nocache_hash' => '2868059302380ee34c7-56547379',
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