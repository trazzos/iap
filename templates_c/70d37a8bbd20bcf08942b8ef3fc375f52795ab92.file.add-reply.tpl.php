<?php /* Smarty version Smarty3-b7, created on 2017-06-05 19:14:21
         compiled from "C:/wamp/www/iap/templates/new/add-reply.tpl" */ ?>
<?php /*%%SmartyHeaderCode:290525935f3dd8fa3f7-65336032%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70d37a8bbd20bcf08942b8ef3fc375f52795ab92' => 
    array (
      0 => 'C:/wamp/www/iap/templates/new/add-reply.tpl',
      1 => 1496708059,
    ),
  ),
  'nocache_hash' => '290525935f3dd8fa3f7-65336032',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="portlet box " style="border-radius: 2px;
    border: 2px solid #73AD21 ">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i><font color="#73b760">Topico <?php echo $_smarty_tpl->getVariable('topic')->value['nombre'];?>
</font>
        </div>
        <div class="actions">
            <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/forumsub-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
/topicId/<?php echo $_smarty_tpl->getVariable('topic')->value['topicId'];?>
" class="btn btn-default btn-sm" style="background:#73AD21; color:white">Regresar</a>
        </div>
    </div>
    <div class="portlet-body">
        <div id="tblContent" class="content-in">
            <?php $_template = new Smarty_Internal_Template("boxes/status_no_ajax.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

            <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/new/topic-replies.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

			<br>
			<br>
            <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/forms/new/add-reply.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

        </div>
    </div>
</div>
<input type="hidden" id="viewPage" name="viewPage" value="<?php echo $_smarty_tpl->getVariable('arrPage')->value['currentPage'];?>
" />


