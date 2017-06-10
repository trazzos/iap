<?php /* Smarty version Smarty3-b7, created on 2017-06-01 20:39:40
         compiled from "C:/wamp/www/iap/templates/new/examen-modules-student.tpl" */ ?>
<?php /*%%SmartyHeaderCode:168815930c1dc2f0942-04917102%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b31e3515b1e54225f78b9ebc64e06fd9da1fd8b' => 
    array (
      0 => 'C:/wamp/www/iap/templates/new/examen-modules-student.tpl',
      1 => 1496156724,
    ),
  ),
  'nocache_hash' => '168815930c1dc2f0942-04917102',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i><b>Calificación acumulada:</b> <?php echo $_smarty_tpl->getVariable('totalScore')->value;?>
% &raquo;
        </div>
    </div>
    <input type="hidden" value="0" id="recarga" name="recarga">
    <div class="portlet-body">
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('actividades')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
        <?php if ($_smarty_tpl->getVariable('timestamp')->value>$_smarty_tpl->getVariable('item')->value['initialDateTimestamp']&&$_smarty_tpl->getVariable('timestamp')->value<$_smarty_tpl->getVariable('item')->value['finalDateTimestamp']){?>
        <div class="portlet box red">
            <?php }?>
            <?php if ($_smarty_tpl->getVariable('timestamp')->value>$_smarty_tpl->getVariable('item')->value['finalDateTimestamp']){?>
            <div class="portlet box red-mint">
                <?php }?>
                <?php if ($_smarty_tpl->getVariable('timestamp')->value<$_smarty_tpl->getVariable('item')->value['initialDateTimestamp']){?>
                <div class="portlet box red-mint">
                    <?php }?>
                     <div class="portlet-title">
                        <!-- TODO Poner al centro el título-->
                        <div class="caption" >
                            <!-- TODO Ver Descripción ponerlo en blanco y subrayado-->
                            <b>Examen  <?php echo $_smarty_tpl->getVariable('item')->value['count'];?>
 </b>
                        </div>
                        <div class="actions">
                            <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/graybox.php?page=view-description-activity&id=<?php echo $_smarty_tpl->getVariable('item')->value['activityId'];?>
" class="btn btn-default btn-sm" data-target="#ajax" data-toggle="modal" >

                                <i class="fa fa-plus"></i> Ver Descripción </a>


                        </div>
                    </div>
                    <div class="portlet-body">
                        <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/new/module-calendar.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

                    </div>
                </div>
                <?php }} ?>
            </div>
        </div>

