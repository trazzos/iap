<?php /* Smarty version Smarty3-b7, created on 2017-06-01 22:49:42
         compiled from "C:/wamp/www/iap/templates/forms/new/add-comment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:293405930e056201570-49672413%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73047aa7ac49fa744e07b470ac101dd17fa33e91' => 
    array (
      0 => 'C:/wamp/www/iap/templates/forms/new/add-comment.tpl',
      1 => 1496156723,
    ),
  ),
  'nocache_hash' => '293405930e056201570-49672413',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!-- TinyMCE -->
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/tinymce/tiny_mce.js"></script>


<form class="form-horizontal" id="addNoticia" name="addNoticia" method="post" action="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/add-comment/id/<?php echo $_smarty_tpl->getVariable('reply')->value['replyId'];?>
" enctype="multipart/form-data">
    <input type="hidden" id="type" name="type" value="saveAddMajor"/>
    <input type="hidden" id="replyId" name="replyId" value="<?php echo $_smarty_tpl->getVariable('reply')->value['replyId'];?>
"/>
    <input type="hidden" id="moduleId" name="moduleId" value="<?php echo $_smarty_tpl->getVariable('moduleId')->value;?>
"/>
    <input type="hidden" id="topicsubId" name="topicsubId" value="<?php echo $_smarty_tpl->getVariable('topicsubId')->value;?>
"/>

    <div class="form-body">
        <div class="form-group">
            <label class="col-md-3 control-label">Comentario:</label>
            <div class="col-md-8">
                <textarea name="reply" id="reply" class="form-control"></textarea>
            </div>
        </div>

        <!--
   <?php if ($_smarty_tpl->getVariable('anexoforo')->value){?>
    file="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/anexoforo/<?php echo $_smarty_tpl->getVariable('anexoforo')->value['path'];?>
&mime=<?php echo $_smarty_tpl->getVariable('anexoforo')->value['mime'];?>
"
  <?php }?>
  -->

        <div class="form-group">
            <label class="col-md-3 control-label">Subir imagen (solo formato jpg):</label>
            <div class="col-md-8">
                <input type="file" name="path" id="path" class="form-control" />
            </div>
        </div>

        <div class="form-actions">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
                    <input type="submit" class="btn green submitForm" id="addMajor" name="addMajor"/>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    tinyMCE.init({
        mode : "textareas",
        theme : "advanced",
        skin : "o2k7",
        plugins : "paste",
        theme_advanced_buttons3_add : "pastetext,pasteword,selectall",
        paste_auto_cleanup_on_paste : true,
        paste_preprocess : function(pl, o) {
            // Content string containing the HTML from the clipboard
            o.content = "-: CLEANED :-\n" + o.content;
        },
        paste_postprocess : function(pl, o) {
            // Content DOM node containing the DOM structure of the clipboard
            o.node.innerHTML = o.node.innerHTML + "\n-: CLEANED :-";
        }


    });
</script>