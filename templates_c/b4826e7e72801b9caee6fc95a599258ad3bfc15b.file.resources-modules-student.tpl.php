<?php /* Smarty version Smarty3-b7, created on 2017-06-01 22:32:21
         compiled from "C:/wamp/www/iap/templates/new/resources-modules-student.tpl" */ ?>
<?php /*%%SmartyHeaderCode:271485930dc457eb662-86954924%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b4826e7e72801b9caee6fc95a599258ad3bfc15b' => 
    array (
      0 => 'C:/wamp/www/iap/templates/new/resources-modules-student.tpl',
      1 => 1496374288,
    ),
  ),
  'nocache_hash' => '271485930dc457eb662-86954924',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include 'C:\wamp\www\iap\libs\plugins\modifier.truncate.php';
?><div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i>Recursos de apoyo <?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('myModule')->value['name'],65,"...");?>

        </div>

    </div>
    <div class="portlet-body">
        <div id="tblContent">
            <?php $_template = new Smarty_Internal_Template("boxes/status_no_ajax.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

            <?php $_template = new Smarty_Internal_Template("lists/new/resources.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

        </div>
    </div>
</div>