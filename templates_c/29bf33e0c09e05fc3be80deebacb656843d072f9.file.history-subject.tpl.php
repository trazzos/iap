<?php /* Smarty version Smarty3-b7, created on 2017-06-01 10:19:06
         compiled from "C:/wamp/www/iap/templates/new/history-subject.tpl" */ ?>
<?php /*%%SmartyHeaderCode:276245930306aa70ac7-53581818%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29bf33e0c09e05fc3be80deebacb656843d072f9' => 
    array (
      0 => 'C:/wamp/www/iap/templates/new/history-subject.tpl',
      1 => 1496156724,
    ),
  ),
  'nocache_hash' => '276245930306aa70ac7-53581818',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i>Instancias de Curricula
        </div>
        <div class="actions">
            <?php if ($_smarty_tpl->getVariable('docente')->value!=1){?>
            <a class=" btn green" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/graybox.php?page=open-subject" data-target="#ajax" data-toggle="modal">
                <i class="fa fa-plus"></i>Agregar
            </a>
            <?php }?>
        </div>
    </div>
    <div class="portlet-body">
        <div id="tblContent"><?php $_template = new Smarty_Internal_Template("lists/new/courses.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</div>
        <br />
        <?php if ($_smarty_tpl->getVariable('coursesCount')->value){?>
            <div id="pagination" class="lnkPages">
                <?php $_template = new Smarty_Internal_Template("footer-pages-links.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

            </div>
        <?php }?>
    </div>
</div>

<input type="hidden" id="viewPage" name="viewPage" value="<?php echo $_smarty_tpl->getVariable('arrPage')->value['currentPage'];?>
" />
