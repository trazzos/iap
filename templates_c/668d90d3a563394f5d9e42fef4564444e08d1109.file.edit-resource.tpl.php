<?php /* Smarty version Smarty3-b7, created on 2017-06-01 22:33:54
         compiled from "C:/wamp/www/iap/templates/forms/new/edit-resource.tpl" */ ?>
<?php /*%%SmartyHeaderCode:292755930dca245e708-47910044%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '668d90d3a563394f5d9e42fef4564444e08d1109' => 
    array (
      0 => 'C:/wamp/www/iap/templates/forms/new/edit-resource.tpl',
      1 => 1496156723,
    ),
  ),
  'nocache_hash' => '292755930dca245e708-47910044',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!-- TinyMCE -->
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/tinymce/tiny_mce.js"></script>
<script type="text/javascript">
    tinyMCE.init({
        mode : "textareas",
        theme : "advanced",
        skin : "o2k7"

    });
</script>
<!-- /TinyMCE -->
<form class="form-horizontal" id="addMajorForm" name="addMajorForm" method="post" action="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/edit-resource/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
">
    <input type="hidden" id="type" name="type" value="saveAddMajor"/>
    <div class="form-body">
        <div class="form-group">
            <label class="col-md-3 control-label">Nombre:</label>
            <div class="col-md-8">
                <input type="text" name="name" id="name" value="<?php echo $_smarty_tpl->getVariable('resource')->value['name'];?>
" class="form-control" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Descripcion:</label>
            <div class="col-md-8">
                <input type="text" name="description" id="description" value="<?php echo $_smarty_tpl->getVariable('resource')->value['description'];?>
" class="form-control" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Archivo:</label>
            <div class="col-md-8">
                <input type="file" name="path" id="path" value="" maxlength="30" class="form-control"/>
            </div>
        </div>

        <div class="form-actions">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
                    <input type="submit" class="btn green submitForm" id="addMajor" name="addMajor"/>
                    
                    <button type="button" class="btn default closeModal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</form>