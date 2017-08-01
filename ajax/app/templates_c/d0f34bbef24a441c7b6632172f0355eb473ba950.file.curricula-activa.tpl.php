<?php /* Smarty version Smarty3-b7, created on 2017-07-20 22:29:45
         compiled from "C:/wamp/www/iap/templates/app/curricula-activa.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9147597175297e9c30-59360050%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd0f34bbef24a441c7b6632172f0355eb473ba950' => 
    array (
      0 => 'C:/wamp/www/iap/templates/app/curricula-activa.tpl',
      1 => 1500607657,
    ),
  ),
  'nocache_hash' => '9147597175297e9c30-59360050',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table style='color:#93a2a9; align-text:center; font-size:13px; '>
<thead>
</thead>
<tbody>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('activeCourses')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
	<tr>
		<td style='text-align:left'>
		<b>
			<a href='' style=' text-decoration:none; color: #93a2a9;'  onClick='verDetalle(<?php echo $_smarty_tpl->getVariable('item')->value['courseId'];?>
)'>
				<font><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
</font>
			</a>
		</b>
		<br><?php echo $_smarty_tpl->getVariable('item')->value['majorName'];?>

		</td>
	</tr>
<?php }} ?>
</table>
