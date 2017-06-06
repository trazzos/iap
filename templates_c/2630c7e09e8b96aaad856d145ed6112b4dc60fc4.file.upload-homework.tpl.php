<?php /* Smarty version Smarty3-b7, created on 2017-06-01 21:59:34
         compiled from "C:/wamp/www/iap/templates/forms/new/upload-homework.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27795930d496d7a478-61611549%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2630c7e09e8b96aaad856d145ed6112b4dc60fc4' => 
    array (
      0 => 'C:/wamp/www/iap/templates/forms/new/upload-homework.tpl',
      1 => 1496372372,
    ),
  ),
  'nocache_hash' => '27795930d496d7a478-61611549',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form class="form-horizontal" id="addMajorForm" name="addMajorForm" method="post" enctype="multipart/form-data" action="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/upload-homework/id/<?php echo $_smarty_tpl->getVariable('actividad')->value['activityId'];?>
">
    <input type="hidden" name="modality" id="modality" value="<?php echo $_smarty_tpl->getVariable('actividad')->value['modality'];?>
"/>
    <input type="hidden" name="courseId" id="courseId" value="<?php echo $_smarty_tpl->getVariable('actividad')->value['courseModuleId'];?>
"/>
    <input type="hidden" id="type" name="type" value="saveAddMajor"/>

    <div class="form-body">
        <div class="form-group">
            <?php if ($_smarty_tpl->getVariable('homework')->value){?>
            <label class="col-md-3 control-label">Ya has subido esta Tarea.</label>
            <div class="col-md-8">
                <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/download.php?file=homework/<?php echo $_smarty_tpl->getVariable('homework')->value['path'];?>
&mime=<?php echo $_smarty_tpl->getVariable('homework')->value['mime'];?>
">Ver Tarea</a>
            </div>
            <?php }?>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Actividad:</label>
            <div class="col-md-8">
                <?php echo $_smarty_tpl->getVariable('actividad')->value['modality'];?>

            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Fecha Limite:</label>
            <div class="col-md-8">
                <?php echo $_smarty_tpl->getVariable('actividad')->value['finalDateNoFormat'];?>

            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Título:</label>
            <div class="col-md-8">
                <input type="text" name="nombre" id="nombre" value="" maxlength="100" class="form-control"/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Tarea:</label>
            <div class="col-md-8">
                <input type="file" name="path" id="path" size="34"/>
            </div>
        </div>
    </div>
    <div class="form-actions">
        <div class="row">
            <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn green submitForm">Guardar</button>
                </div>
        </div>
    </div>

</form>