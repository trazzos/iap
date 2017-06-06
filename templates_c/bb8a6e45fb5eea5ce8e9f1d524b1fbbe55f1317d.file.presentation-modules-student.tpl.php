<?php /* Smarty version Smarty3-b7, created on 2017-06-01 20:39:31
         compiled from "C:/wamp/www/iap/templates/new/presentation-modules-student.tpl" */ ?>
<?php /*%%SmartyHeaderCode:260085930c1d3b06460-49927068%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb8a6e45fb5eea5ce8e9f1d524b1fbbe55f1317d' => 
    array (
      0 => 'C:/wamp/www/iap/templates/new/presentation-modules-student.tpl',
      1 => 1496156724,
    ),
  ),
  'nocache_hash' => '260085930c1d3b06460-49927068',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i>Presentación <?php echo $_smarty_tpl->getVariable('myModule')->value['name'];?>
  <?php if ($_smarty_tpl->getVariable('vistaPrevia')->value==1){?>   <a class="btn green" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/flash/flash_<?php echo $_smarty_tpl->getVariable('id')->value;?>
.swf" target="_blank" data-target="#ajax" data-toggle="modal">Ver en Pantalla Completa</a>   <?php }?>
        </div>
    </div>
    <div class="portlet-body">
        <div id="tblContent">
            <OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" WIDTH="1050" HEIGHT="600" id="Presentacion" ALIGN="">
                <PARAM NAME=movie VALUE="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/flash/flash_<?php echo $_smarty_tpl->getVariable('id')->value;?>
.swf">
                <PARAM NAME=quality VALUE=high> <PARAM NAME=bgcolor VALUE=#333399>
                <EMBED src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/flash/flash_<?php echo $_smarty_tpl->getVariable('id')->value;?>
.swf" quality=high bgcolor=#333399 WIDTH="1050" HEIGHT="600" NAME="Yourfilename" ALIGN="" TYPsE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer">
                </EMBED>
            </OBJECT>
        </div>
    </div>
</div>

