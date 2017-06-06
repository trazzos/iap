<?php /* Smarty version Smarty3-b7, created on 2017-06-01 20:39:15
         compiled from "C:/wamp/www/iap/templates/new/calendar-image-modules-student.tpl" */ ?>
<?php /*%%SmartyHeaderCode:209565930c1c3ace6b4-81457427%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e463484c5cd4538cfc82d025e91bd564620edf51' => 
    array (
      0 => 'C:/wamp/www/iap/templates/new/calendar-image-modules-student.tpl',
      1 => 1496156724,
    ),
  ),
  'nocache_hash' => '209565930c1c3ace6b4-81457427',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include 'C:\wamp\www\iap\libs\plugins\modifier.truncate.php';
?><div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i><b>Calendario de actividades</b> <?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('myModule')->value['name'],65,"...");?>
 &raquo;
        </div>
        <div class="actions">

        </div>
    </div>
    <div class="portlet-body">
        <?php $_template = new Smarty_Internal_Template("boxes/status_no_ajax.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

        <div style="text-align:center">
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/calendario/calendario_<?php echo $_smarty_tpl->getVariable('id')->value;?>
.jpg" width="900" height="600" />
        </div>
    </div>
</div>