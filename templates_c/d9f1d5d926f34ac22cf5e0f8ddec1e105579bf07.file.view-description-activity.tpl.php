<?php /* Smarty version Smarty3-b7, created on 2017-06-01 20:39:25
         compiled from "C:/wamp/www/iap/templates/new/view-description-activity.tpl" */ ?>
<?php /*%%SmartyHeaderCode:172755930c1cdc946c2-63093128%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9f1d5d926f34ac22cf5e0f8ddec1e105579bf07' => 
    array (
      0 => 'C:/wamp/www/iap/templates/new/view-description-activity.tpl',
      1 => 1496156724,
    ),
  ),
  'nocache_hash' => '172755930c1cdc946c2-63093128',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i><?php echo $_smarty_tpl->getVariable('actividad')->value['resumen'];?>

        </div>
    </div>
    <div class="portlet-body">
        <div id="tblContent">
            <?php echo $_smarty_tpl->getVariable('actividad')->value['description'];?>

        </div>
    </div>
</div>

