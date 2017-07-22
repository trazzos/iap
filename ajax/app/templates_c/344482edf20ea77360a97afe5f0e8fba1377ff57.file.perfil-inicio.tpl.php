<?php /* Smarty version Smarty3-b7, created on 2017-07-20 22:06:49
         compiled from "C:/wamp/www/iap/templates/app/perfil-inicio.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2371159716fc93d01b5-44833115%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '344482edf20ea77360a97afe5f0e8fba1377ff57' => 
    array (
      0 => 'C:/wamp/www/iap/templates/app/perfil-inicio.tpl',
      1 => 1500606214,
    ),
  ),
  'nocache_hash' => '2371159716fc93d01b5-44833115',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<center><?php echo $_smarty_tpl->getVariable('urlFoto')->value;?>
</center>
<center><p class='tituloperfil'><b><?php echo $_smarty_tpl->getVariable('info')->value['name'];?>
 <?php echo $_smarty_tpl->getVariable('info')->value['lastNamePaterno'];?>
 <?php echo $_smarty_tpl->getVariable('info')->value['lastNameMaterno'];?>
</b><br>Alumno</p></center>
<div class='h3' style='border-bottom: 1px solid #f0f4f7;  padding: 10px 15px'><img src='<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/app/user-white.png' ><?php echo $_smarty_tpl->getVariable('info')->value['controlNumber'];?>
</div>
<div class='h3' style='border-bottom: 1px solid #f0f4f7;  padding: 10px 15px'><img src='<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/app/mail-white.png' ><?php echo $_smarty_tpl->getVariable('info')->value['email'];?>
</div><br>
