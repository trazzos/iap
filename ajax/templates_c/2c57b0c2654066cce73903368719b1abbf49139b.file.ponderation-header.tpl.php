<?php /* Smarty version Smarty3-b7, created on 2015-09-29 15:04:40
         compiled from "/home/iapchiap/public_html/templates/items/ponderation-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:695959141560aeed851e049-14270880%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c57b0c2654066cce73903368719b1abbf49139b' => 
    array (
      0 => '/home/iapchiap/public_html/templates/items/ponderation-header.tpl',
      1 => 1379525072,
    ),
  ),
  'nocache_hash' => '695959141560aeed851e049-14270880',
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