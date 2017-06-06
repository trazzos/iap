<?php /* Smarty version Smarty3-b7, created on 2017-06-01 19:04:15
         compiled from "C:/wamp/www/iap/templates/items/ponderation-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:128065930ab7f2a1fc8-89196839%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8148321cb19ecf2f0f8d6dffebf8a9a3a2bf0c99' => 
    array (
      0 => 'C:/wamp/www/iap/templates/items/ponderation-header.tpl',
      1 => 1496156723,
    ),
  ),
  'nocache_hash' => '128065930ab7f2a1fc8-89196839',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<tr>
    <?php if ($_smarty_tpl->getVariable('tipo')->value==1){?><th width="">Actividad</th><?php }else{ ?>
	<th width="">Ex&aacute;men</th>
	<?php }?>
	
    <th width="">Calificaci&oacute;n</th>
    <th width="">Retroalimentaci&oacute;n</th>
    
 
</tr>