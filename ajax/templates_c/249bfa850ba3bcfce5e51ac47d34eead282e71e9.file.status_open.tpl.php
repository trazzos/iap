<?php /* Smarty version Smarty3-b7, created on 2016-07-16 18:02:38
         compiled from "/home/iapchiap/public_html//templates/boxes/status_open.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1829391830578abd0eb0c891-88567952%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '249bfa850ba3bcfce5e51ac47d34eead282e71e9' => 
    array (
      0 => '/home/iapchiap/public_html//templates/boxes/status_open.tpl',
      1 => 1468708560,
    ),
  ),
  'nocache_hash' => '1829391830578abd0eb0c891-88567952',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
    <div id="centeredDiv" class="errorStatusBox" style="margin:auto; position:fixed; top:50%; left:50%; margin-top:-150px;margin-left:-275px;z-index:3000; display:none">
			<div style="width:548px;  border:solid; border-color:#999;border-width:1px; background-color:#ccc; padding-left:5px; padding-top:5px; padding-bottom:5px">
	<div style="width:500px;  border:solid; border-color:#999;border-width:1px; background-color:#FFF; padding:20px" class="successStatusBox">
       	<div id="close_icon" class="imageStatusBox" style="position:absolute;top: 10px; left: 500px;">
			<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/close.png" onclick="ToogleStatusDiv()" style="cursor:pointer"/>
		</div>
 