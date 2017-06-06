<?php /* Smarty version Smarty3-b7, created on 2017-05-30 16:19:37
         compiled from "C:/wamp/www/iap/templates/items/modules-course-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12335592de1e901e675-69202730%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f16e34ca793aae3e333e2138b3a1fce0a7237fad' => 
    array (
      0 => 'C:/wamp/www/iap/templates/items/modules-course-header.tpl',
      1 => 1496156723,
    ),
  ),
  'nocache_hash' => '12335592de1e901e675-69202730',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<tr>
    <th width="100">Cuat.</th>
    <th width="700">Nombre</th>
    <th width="400">Fecha Inicio</th>
    <th width="400">Fecha Fin</th>
    <?php if ($_smarty_tpl->getVariable('User')->value['type']=="student"){?>
	    <th width="80">Cal.</th>
    <?php }?>
  	<th width="60">Ingresar</th>
</tr>