<?php /* Smarty version Smarty3-b7, created on 2015-10-22 18:16:37
         compiled from "/home/iapchiap/public_html//templates/items/ponderation-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:125225734156296e55b396f7-91292582%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7049db862e5a9844610b38727bf5fd699eacacff' => 
    array (
      0 => '/home/iapchiap/public_html//templates/items/ponderation-header.tpl',
      1 => 1379525072,
    ),
  ),
  'nocache_hash' => '125225734156296e55b396f7-91292582',
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