<?php /* Smarty version Smarty3-b7, created on 2017-06-01 10:28:55
         compiled from "C:/wamp/www/iap/templates/forms/new/add-modules-course.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8979593032b7dbd1f1-97941473%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3513f813e5f0809f09e4ec4f5e8ed34410e54907' => 
    array (
      0 => 'C:/wamp/www/iap/templates/forms/new/add-modules-course.tpl',
      1 => 1496156723,
    ),
  ),
  'nocache_hash' => '8979593032b7dbd1f1-97941473',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form id="addMajorForm" name="addMajorForm" method="post" class="form-horizontal" action="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/add-modules-course/id/<?php echo $_smarty_tpl->getVariable('invoiceId')->value;?>
">
    <input type="hidden" id="type" name="type" value="saveAddMajor"/>
    <div class="form-body">

        <div class="form-group">
            <label class="col-md-3 control-label">Agregar un nuevo Modulo</label>
            <div class="col-md-8">
                <select id="subjectModuleId" name="subjectModuleId" class="form-control">
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('modules')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
                        <option value="<?php echo $_smarty_tpl->getVariable('item')->value['subjectModuleId'];?>
">CUAT. <?php echo $_smarty_tpl->getVariable('item')->value['semesterId'];?>
 <?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
</option>
                    <?php }} ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Fecha Inicial</label>
            <div class="col-md-8">
                <input type="text" name="initialDate" id="initialDate" size="10" class="form-control date-picker " required/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Fecha Final</label>
            <div class="col-md-8">
                <input type="text" name="finalDate" id="finalDate" size="10" class="form-control date-picker " required/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Dias para Terminar</label>
            <div class="col-md-8">
                <input type="text" name="daysToFinish" id="daysToFinish" size="10" class="form-control" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Activo</label>
            <div class="col-md-8">
                <select id="active" name="active" class="form-control">
                    <option value="si">Si</option>
                    <option value="no">no</option>
                </select>
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
" <?php if ($_smarty_tpl->getVariable('post')->value['access'][0]==$_smarty_tpl->getVariable('personal')->value['personalId']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('personal')->value['lastname_paterno'];?>
 <?php echo $_smarty_tpl->getVariable('personal')->value['lastname_materno'];?>
 <?php echo $_smarty_tpl->getVariable('personal')->value['name'];?>
</option>
                    <?php }} ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Docente Asignado:</label>
            <div class="col-md-8">
                <select name="teacherId" id="teacherId" class="form-control">
                    <option value="-1">Seleccione...</option>
                    <?php  $_smarty_tpl->tpl_vars['personal'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('empleados')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['personal']->key => $_smarty_tpl->tpl_vars['personal']->value){
?>
                        <option value="<?php echo $_smarty_tpl->getVariable('personal')->value['personalId'];?>
" <?php if ($_smarty_tpl->getVariable('post')->value['access'][0]==$_smarty_tpl->getVariable('personal')->value['personalId']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('personal')->value['lastname_paterno'];?>
 <?php echo $_smarty_tpl->getVariable('personal')->value['lastname_materno'];?>
 <?php echo $_smarty_tpl->getVariable('personal')->value['name'];?>
</option>
                    <?php }} ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Tutor Asignado:</label>
            <div class="col-md-8">
                <select name="tutorId" id="tutorId" class="form-control">
                    <option value="-1">Seleccione...</option>
                    <?php  $_smarty_tpl->tpl_vars['personal'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('empleados')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['personal']->key => $_smarty_tpl->tpl_vars['personal']->value){
?>
                        <option value="<?php echo $_smarty_tpl->getVariable('personal')->value['personalId'];?>
" <?php if ($_smarty_tpl->getVariable('post')->value['access'][0]==$_smarty_tpl->getVariable('personal')->value['personalId']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('personal')->value['lastname_paterno'];?>
 <?php echo $_smarty_tpl->getVariable('personal')->value['lastname_materno'];?>
 <?php echo $_smarty_tpl->getVariable('personal')->value['name'];?>
</option>
                    <?php }} ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Extra Asignad:</label>
            <div class="col-md-8">
                <select name="extraId" id="extraId" class="form-control">
                    <option value="-1">Seleccione...</option>
                    <?php  $_smarty_tpl->tpl_vars['personal'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('empleados')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['personal']->key => $_smarty_tpl->tpl_vars['personal']->value){
?>
                        <option value="<?php echo $_smarty_tpl->getVariable('personal')->value['personalId'];?>
" <?php if ($_smarty_tpl->getVariable('post')->value['access'][0]==$_smarty_tpl->getVariable('personal')->value['personalId']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('personal')->value['lastname_paterno'];?>
 <?php echo $_smarty_tpl->getVariable('personal')->value['lastname_materno'];?>
 <?php echo $_smarty_tpl->getVariable('personal')->value['name'];?>
</option>
                    <?php }} ?>
                </select>
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