<?php /* Smarty version Smarty3-b7, created on 2017-06-05 20:20:14
         compiled from "C:/wamp/www/iap/templates/new/forumsub-modules-student.tpl" */ ?>
<?php /*%%SmartyHeaderCode:281705936034eb46441-96546052%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cfed90903d9f0375050ffcc949a3538d5a1ebca2' => 
    array (
      0 => 'C:/wamp/www/iap/templates/new/forumsub-modules-student.tpl',
      1 => 1496712009,
    ),
  ),
  'nocache_hash' => '281705936034eb46441-96546052',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="portlet box " style="background-colo:white;  border-radius: 2px;   border: 1px solid #73AD21 " >
    <div class="portlet-title" style="background-colo:white; color: #73b760; " >
        <div class="caption">
            <i class="fa fa-bullhorm"></i>Foro <?php echo $_smarty_tpl->getVariable('asunto')->value;?>

        </div>
        <div class="actions">
            <?php if ($_smarty_tpl->getVariable('positionId')->value!=0){?>
                <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/edit-modules-course/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
" class="btn btn-default btn-sm" style="background:#73AD21; color:white">Regresar</a>
            <?php }else{ ?>
                <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/forum-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
"  class="btn btn-default btn-sm" style="background:#73AD21; color:white">Regresar</a>
            <?php }?>
            <?php if (($_smarty_tpl->getVariable('asunto')->value=="Foro de Discusion")&&($_smarty_tpl->getVariable('User')->value['type']=="student")){?>
            <?php }else{ ?> |
                <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/graybox.php?page=add-topic&id=<?php echo $_smarty_tpl->getVariable('topicId')->value;?>
&cId=<?php echo $_smarty_tpl->getVariable('id')->value;?>
" data-target="#ajax" data-toggle="modal" class="btn btn-default btn-sm" style="background:#73AD21; color:white">
                    <span class="btnAdd" id="btnAddSubject">Agregar</span>
                </a>
            <?php }?>

        </div>
    </div>
    <div class="portlet-body">
        <div id="tblContent" class="content-in">
            <?php $_template = new Smarty_Internal_Template("boxes/status_no_ajax.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

            <div id="tblContent"><?php $_template = new Smarty_Internal_Template("lists/topicsub.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
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
</div>
<input type="hidden" id="viewPage" name="viewPage" value="<?php echo $_smarty_tpl->getVariable('arrPage')->value['currentPage'];?>
" />


