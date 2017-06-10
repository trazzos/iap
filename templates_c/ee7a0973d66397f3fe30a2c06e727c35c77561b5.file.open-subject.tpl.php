<?php /* Smarty version Smarty3-b7, created on 2017-06-01 12:37:28
         compiled from ".\templates\forms/new/open-subject.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26441593050d8c23fa4-44125354%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ee7a0973d66397f3fe30a2c06e727c35c77561b5' => 
    array (
      0 => '.\\templates\\forms/new/open-subject.tpl',
      1 => 1496156723,
    ),
  ),
  'nocache_hash' => '26441593050d8c23fa4-44125354',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form id="editSubjectForm" name="editSubjectForm" method="post" class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/open-subject">
    <input type="hidden" id="subjectId" name="subjectId" value="<?php echo $_smarty_tpl->getVariable('post')->value['subjectId'];?>
"/>
    <div class="form-body">
        <div class="form-group">
            <label class="col-md-3 control-label">Selecciona Curricula:</label>
            <div class="col-md-8">
                <select name="subjectId" id="subjectId" style="width:350px" class="form-control">
                    <?php  $_smarty_tpl->tpl_vars['curso'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cursos')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['curso']->key => $_smarty_tpl->tpl_vars['curso']->value){
?>
                        <option value="<?php echo $_smarty_tpl->getVariable('curso')->value['subjectId'];?>
"><?php echo $_smarty_tpl->getVariable('curso')->value['majorName'];?>
 - <?php echo $_smarty_tpl->getVariable('curso')->value['name'];?>
</option>
                    <?php }} ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Modalidad:</label>
            <div class="col-md-8">
                <select name="modality" id="modality" class="form-control">
                    <option value="Local">Local</option>
                    <option value="Online">Online</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Fecha Inicial:</label>
            <div class="col-md-8">
                <input type="text" name="initialDate" id="initialDate" size="10" class="form-control date-picker " required/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label"> Fecha Final:</label>
            <div class="col-md-8">
                <input type="text" name="finalDate" id="finalDate" size="10"  class="form-control date-picker"/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label"> Dias para terminar:</label>
            <div class="col-md-8">
                <input type="text" name="daysToFinish" id="daysToFinish" class="form-control"/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Personal Administrativo Asignado:</label>
            <div class="col-md-8">
                <select name="personalId" id="personalId" class="form-control">
                <option value="-1">Seleccione...</option>
                <?php  $_smarty_tpl->tpl_vars['personal'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('empleados')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['personal']->key => $_smarty_tpl->tpl_vars['personal']->value){
?>
                    <option value="<?php echo $_smarty_tpl->getVariable('personal')->value['personalId'];?>
" ><?php echo $_smarty_tpl->getVariable('personal')->value['lastname_paterno'];?>
 <?php echo $_smarty_tpl->getVariable('personal')->value['lastname_materno'];?>
 <?php echo $_smarty_tpl->getVariable('personal')->value['name'];?>
</option>
                <?php }} ?>
            </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Activo:</label>
            <div class="col-md-8">
                <select name="active" id="active" class="form-control">
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label"> Grupo:</label>
            <div class="col-md-8">
                <input type="text" name="group" id="group" value="<?php echo $_smarty_tpl->getVariable('post')->value['group'];?>
"  class="form-control"/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label"> Turno:</label>
            <div class="col-md-8">
                <input type="text" name="turn" id="turn" value="<?php echo $_smarty_tpl->getVariable('post')->value['turn'];?>
"  class="form-control"/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label"> Ciclo Escolar:</label>
            <div class="col-md-8">
                <input type="text" name="scholarCicle" id="scholarCicle" value="<?php echo $_smarty_tpl->getVariable('post')->value['scholarCicle'];?>
"  class="form-control"/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label"> Libro:</label>
            <div class="col-md-8">
                <input type="text" name="libro" id="libro" value="<?php echo $_smarty_tpl->getVariable('post')->value['libro'];?>
"  class="form-control"/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label"> Folio:</label>
            <div class="col-md-8">
                <input type="text" name="folio" id="folio" value="<?php echo $_smarty_tpl->getVariable('post')->value['folio'];?>
"  class="form-control"/>
            </div>
        </div>
    </div>
    <div class="form-actions">
        <div class="row">
            <div class="col-md-offset-3 col-md-9">
                <button type="button" class="btn default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn green submitForm">Guardar</button>
            </div>
        </div>
    </div>
</form>