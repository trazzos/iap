<?php /* Smarty version Smarty3-b7, created on 2017-06-05 20:27:08
         compiled from "C:/wamp/www/iap/templates/forms/new/add-topic.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5723593604ec961215-44170391%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20a29f04a2fed174404f17b2734bed8abbfa2e9a' => 
    array (
      0 => 'C:/wamp/www/iap/templates/forms/new/add-topic.tpl',
      1 => 1496712271,
    ),
  ),
  'nocache_hash' => '5723593604ec961215-44170391',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!-- TinyMCE
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/tinymce/tiny_mce.js"></script>
<!-- /TinyMCE -->

<form class="form-horizontal" id="addMajorForm" name="addMajorForm" method="post" action="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/add-topic/id/<?php echo $_smarty_tpl->getVariable('topicId')->value;?>
/cId/<?php echo $_smarty_tpl->getVariable('cId')->value;?>
">
    <input type="hidden" id="topicId" name="topicId" value="<?php echo $_smarty_tpl->getVariable('topicId')->value;?>
"/>
    <input type="hidden" id="userId" name="userId" value="<?php echo $_smarty_tpl->getVariable('userId')->value;?>
"/>
    <input type="hidden" id="type" name="type" value="saveAddMajor"/>
    <div class="form-body">
        <div class="form-group">
            <label class="col-md-3 control-label">Asunto:</label>
            <div class="col-md-8">
                <input type="text" name="subject" id="subject" value="<?php echo $_smarty_tpl->getVariable('name')->value;?>
" class="form-control" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Descripcion:</label>
            <div class="col-md-8">
                <textarea name="reply" id="reply" class="form-control"></textarea>
            </div>
        </div>

        <div class="form-actions">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
                    <input type="submit" class="btn green submitForm" id="addMajor" name="addMajor"/>
                    
                    <button type="button" class="btn default closeModal" onClick="closeModal()">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    tinyMCE.init({
        mode : "textareas",
        theme : "advanced",
        skin : "o2k7"

    });
</script>
