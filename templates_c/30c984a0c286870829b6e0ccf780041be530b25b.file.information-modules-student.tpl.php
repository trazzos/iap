<?php /* Smarty version Smarty3-b7, created on 2017-06-01 20:39:03
         compiled from "C:/wamp/www/iap/templates/new/information-modules-student.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2545930c1b75f21f4-16053062%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '30c984a0c286870829b6e0ccf780041be530b25b' => 
    array (
      0 => 'C:/wamp/www/iap/templates/new/information-modules-student.tpl',
      1 => 1496156724,
    ),
  ),
  'nocache_hash' => '2545930c1b75f21f4-16053062',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include 'C:\wamp\www\iap\libs\plugins\modifier.truncate.php';
?><div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i><b>Información</b> <?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('myModule')->value['name'],65,"...");?>
 &raquo;
        </div>
        <div class="actions">

        </div>
    </div>
    <div class="portlet-body">
        <?php $_template = new Smarty_Internal_Template("boxes/status_no_ajax.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

        <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/boxes/new/module-information.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    </div>
</div>