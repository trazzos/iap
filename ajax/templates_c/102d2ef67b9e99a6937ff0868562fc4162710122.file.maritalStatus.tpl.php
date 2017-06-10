<?php /* Smarty version Smarty3-b7, created on 2016-08-26 14:46:42
         compiled from "/home/iapchiap/public_html//templates/forms/maritalStatus.tpl" */ ?>
<?php /*%%SmartyHeaderCode:197075245957c09ca215d182-49458629%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '102d2ef67b9e99a6937ff0868562fc4162710122' => 
    array (
      0 => '/home/iapchiap/public_html//templates/forms/maritalStatus.tpl',
      1 => 1472183240,
    ),
  ),
  'nocache_hash' => '197075245957c09ca215d182-49458629',
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