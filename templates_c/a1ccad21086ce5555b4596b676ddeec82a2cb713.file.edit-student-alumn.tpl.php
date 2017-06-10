<?php /* Smarty version Smarty3-b7, created on 2017-06-01 09:21:56
         compiled from "C:/wamp/www/iap/templates/forms/edit-student-alumn.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2327859302304bb99f8-99811794%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a1ccad21086ce5555b4596b676ddeec82a2cb713' => 
    array (
      0 => 'C:/wamp/www/iap/templates/forms/edit-student-alumn.tpl',
      1 => 1496156723,
    ),
  ),
  'nocache_hash' => '2327859302304bb99f8-99811794',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i>Cambiar foto de perfil
        </div>
    </div>
    <div class="portlet-body">
        <div class="form-group">
            <label class="col-md-3 control-label"></label><?php echo $_smarty_tpl->getVariable('infoStudent')->value['foto'];?>

            <form name="<?php echo $_smarty_tpl->getVariable('item')->value['userId'];?>
" method="post" enctype="multipart/form-data">
                <input type="hidden" name="userId" id="userId" value="<?php echo $_smarty_tpl->getVariable('info')->value['userId'];?>
" />
                <input type="hidden" name="permiso" id="permiso" value="1" />
                <input type="file" name="foto" id="foto" style="float:left; width:240px" />
                <input type="submit" value="Aceptar" style="width:100px; float:left" />
            </form>
        </div>
    </div>
</div>



<form class="form-horizontal" id="editStudentForm" name="editStudentForm" method="post">
    <input type="hidden" name="cancelPeriodoId" id="cancelPeriodoId" value="<?php echo $_smarty_tpl->getVariable('info')->value['cancelPeriodoId'];?>
" />
    <input type="hidden" id="type" name="type" value="saveEditStudentAlumn"/>
    <input type="hidden" id="id" name="id" value="<?php echo $_smarty_tpl->getVariable('info')->value['userId'];?>
"/>
    <input type="hidden" id="tam" name="tam" value="1"/>
    <div class="portlet box red">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-bullhorm"></i>Información Personal
            </div>
        </div>
        <div class="portlet-body">
            <div class="form-group">
                <label class="col-md-3 control-label">Nombre:</label>
                <div class="col-md-8">
                    <input type="text" name="names" id="names" class="form-control"  value="<?php echo $_smarty_tpl->getVariable('info')->value['names'];?>
" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Apellido Paterno:</label>
                <div class="col-md-8">
                    <input type="text" name="lastNamePaterno" id="lastNamePaterno" class="form-control" value="<?php echo $_smarty_tpl->getVariable('info')->value['lastNamePaterno'];?>
" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Apellido Materno:</label>
                <div class="col-md-8">
                    <input type="text" name="lastNameMaterno" id="lastNameMaterno" class="form-control" value="<?php echo $_smarty_tpl->getVariable('info')->value['lastNameMaterno'];?>
" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Sexo:</label>
                <div class="col-md-8">
                    <select name='sexo' id="sexo" class="form-control">
                        <option value="m"  <?php if ($_smarty_tpl->getVariable('info')->value['sexo']=="m"){?>selected<?php }?>>Masculino</option>
                        <option value="f"  <?php if ($_smarty_tpl->getVariable('info')->value['sexo']=="f"){?>selected<?php }?>>Femenino</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Fecha de Nacimiento:</label>
                <div class="col-md-8">
                    <select name="day" id="day" style="width:70px" class="form-control">
                        <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['name'] = 'foo';
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'] = (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['loop'] = is_array($_loop=32) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'] = ((int)1) == 0 ? 1 : (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['total']);
?>
                            <?php echo $_smarty_tpl->getVariable('smarty')->value['section']['foo']['index'];?>

                            <option value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['foo']['index'];?>
" <?php if ($_smarty_tpl->getVariable('info')->value['dayBirthdate']==$_smarty_tpl->getVariable('smarty')->value['section']['foo']['index']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['foo']['index'];?>
</option>
                        <?php endfor; endif; ?>
                    </select>
                    <select name="month" id="month" class="form-control">
                        <option value="1" <?php if ($_smarty_tpl->getVariable('info')->value['monthBirthdate']==1){?>selected<?php }?>>Enero</option>
                        <option value="2" <?php if ($_smarty_tpl->getVariable('info')->value['monthBirthdate']==2){?>selected<?php }?>>Febrero</option>
                        <option value="3" <?php if ($_smarty_tpl->getVariable('info')->value['monthBirthdate']==3){?>selected<?php }?>>Marzo</option>
                        <option value="4" <?php if ($_smarty_tpl->getVariable('info')->value['monthBirthdate']==4){?>selected<?php }?>>Abril</option>
                        <option value="5" <?php if ($_smarty_tpl->getVariable('info')->value['monthBirthdate']==5){?>selected<?php }?>>Mayo</option>
                        <option value="6" <?php if ($_smarty_tpl->getVariable('info')->value['monthBirthdate']==6){?>selected<?php }?>>Junio</option>
                        <option value="7" <?php if ($_smarty_tpl->getVariable('info')->value['monthBirthdate']==7){?>selected<?php }?>>Julio</option>
                        <option value="8" <?php if ($_smarty_tpl->getVariable('info')->value['monthBirthdate']==8){?>selected<?php }?>>Agosto</option>
                        <option value="9" <?php if ($_smarty_tpl->getVariable('info')->value['monthBirthdate']==9){?>selected<?php }?>>Septiembre</option>
                        <option value="10" <?php if ($_smarty_tpl->getVariable('info')->value['monthBirthdate']==10){?>selected<?php }?>>Octubre</option>
                        <option value="11" <?php if ($_smarty_tpl->getVariable('info')->value['monthBirthdate']==11){?>selected<?php }?>>Noviembre</option>
                        <option value="12" <?php if ($_smarty_tpl->getVariable('info')->value['monthBirthdate']==12){?>selected<?php }?>>Diciembre</option>
                    </select>
                    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/forms/year.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('name',"year");$_template->assign('selected',$_smarty_tpl->getVariable('info')->value['yearBirthdate']); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Estado Civil:</label>
                <div class="col-md-8">
                    <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/forms/maritalStatus.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('selected',$_smarty_tpl->getVariable('info')->value['maritalStatus']); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Contraseña del Sistema (Minimo 6 caracteres):</label>
                <div class="col-md-8">
                    <input type="password" name="password" id="password" class="form-control" value="<?php echo $_smarty_tpl->getVariable('info')->value['password'];?>
" />
                </div>
            </div>
        </div>
    </div>

    <div class="portlet box red">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-bullhorm"></i>Domicilio
            </div>
        </div>
        <div class="portlet-body">


            <div class="form-group">
                <label class="col-md-3 control-label">Calle</label>
                <div class="col-md-8">
                    <input type="text" name="street" id="street" class="form-control" value="<?php echo $_smarty_tpl->getVariable('info')->value['street'];?>
" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Número</label>
                <div class="col-md-8">
                    <input type="text" name="number" id="number" class="form-control" value="<?php echo $_smarty_tpl->getVariable('info')->value['number'];?>
" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Colonia:</label>
                <div class="col-md-8">
                    <input type="text" name="colony" id="colony" class="form-control" value="<?php echo $_smarty_tpl->getVariable('info')->value['colony'];?>
" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">País</label>
                <div class="col-md-8">
                    <select id="pais" name="pais" style="width:300px" onChange="estado_dependencia();" class="form-control" >
                        <option value="0">Selecciona Tu Pa&iacute;s</option>
                        <?php  $_smarty_tpl->tpl_vars['pais'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('paises')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pais']->key => $_smarty_tpl->tpl_vars['pais']->value){
?>
                            <?php if ($_smarty_tpl->getVariable('pais')->value['paisId']==$_smarty_tpl->getVariable('info')->value['pais']){?>
                                <option selected="selected" value="<?php echo $_smarty_tpl->getVariable('pais')->value['paisId'];?>
"><?php echo $_smarty_tpl->getVariable('pais')->value['nombre'];?>
 </option>
                            <?php }else{ ?>
                                <option value="<?php echo $_smarty_tpl->getVariable('pais')->value['paisId'];?>
"><?php echo $_smarty_tpl->getVariable('pais')->value['nombre'];?>
 </option>
                            <?php }?>
                        <?php }} ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Estado:</label>
                <div class="col-md-8">
                    <div id="Stateposition">
                        <select id="estado" name="estado" style="width:300px" onChange="ciudad_dependencia();" class="form-control">
                            <option value="0">Selecciona Tu Estado</option>
                            <?php  $_smarty_tpl->tpl_vars['estado'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('estados')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['estado']->key => $_smarty_tpl->tpl_vars['estado']->value){
?>
                                <?php if ($_smarty_tpl->getVariable('estado')->value['estadoId']==$_smarty_tpl->getVariable('info')->value['estado']){?>
                                    <option selected="selected" value="<?php echo $_smarty_tpl->getVariable('estado')->value['estadoId'];?>
"><?php echo $_smarty_tpl->getVariable('estado')->value['nombre'];?>
 </option>
                                <?php }else{ ?>
                                    <option value="<?php echo $_smarty_tpl->getVariable('estado')->value['estadoId'];?>
"><?php echo $_smarty_tpl->getVariable('estado')->value['nombre'];?>
 </option>
                                <?php }?>
                            <?php }} ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Municipio</label>
                <div class="col-md-8">
                    <div id="Cityposition">
                        <select id="ciudad" name="ciudad" style="width:300px" class="form-control" >
                            <option value="0">Selecciona Tu ciudad</option>
                            <?php  $_smarty_tpl->tpl_vars['ciudad'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ciudades')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ciudad']->key => $_smarty_tpl->tpl_vars['ciudad']->value){
?>
                                <?php if ($_smarty_tpl->getVariable('ciudad')->value['municipioId']==$_smarty_tpl->getVariable('info')->value['ciudad']){?>
                                    <option selected="selected" value="<?php echo $_smarty_tpl->getVariable('ciudad')->value['municipioId'];?>
"><?php echo $_smarty_tpl->getVariable('ciudad')->value['nombre'];?>
 </option>
                                <?php }else{ ?>
                                    <option value="<?php echo $_smarty_tpl->getVariable('ciudad')->value['municipioId'];?>
"><?php echo $_smarty_tpl->getVariable('ciudad')->value['nombre'];?>
 </option>
                                <?php }?>
                            <?php }} ?>
                        </select>

                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Código Postal:</label>
                <div class="col-md-8">
                    <input type="text" name="postalCode" id="postalCode" class="form-control" value="<?php echo $_smarty_tpl->getVariable('info')->value['postalCode'];?>
" />
                </div>
            </div>

        </div>
    </div>

    <div class="portlet box red">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-bullhorm"></i>Datos de contacto
            </div>
        </div>
        <div class="portlet-body">

            <div class="form-group">
                <label class="col-md-3 control-label">Email:</label>
                <div class="col-md-8">
                    <input type="text" name="email" id="email" class="form-control" value="<?php echo $_smarty_tpl->getVariable('info')->value['email'];?>
" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Celular:</label>
                <div class="col-md-8">
                    <input type="text" name="mobile" id="mobile" class="form-control" value="<?php echo $_smarty_tpl->getVariable('info')->value['mobile'];?>
" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Teléfono local</label>
                <div class="col-md-8">
                    <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $_smarty_tpl->getVariable('info')->value['phone'];?>
" />
                </div>
            </div>

        </div>
    </div>

    <div class="portlet box red">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-bullhorm"></i>Datos laborales
            </div>
        </div>
        <div class="portlet-body">
            <div class="form-group">
                <label class="col-md-3 control-label">Ocupación</label>
                <div class="col-md-8">
                    <select name="workplaceOcupation" id="workplaceOcupation" style="width:300px" class="form-control">
                        <option value="FUNCIONARIO PUBLICO MUNICIPAL" <?php if ($_smarty_tpl->getVariable('info')->value['workplaceOcupation']=="FUNCIONARIO PUBLICO MUNICIPAL"){?> selected="selected" <?php }?>>FUNCIONARIO PUBLICO MUNICIPAL</option>
                        <option value="FUNCIONARIO PUBLICO ESTATAL" <?php if ($_smarty_tpl->getVariable('info')->value['workplaceOcupation']=="FUNCIONARIO PUBLICO ESTATAL"){?> selected="selected" <?php }?>>FUNCIONARIO PUBLICO ESTATAL</option>
                        <option value="FUNCIONARIO PUBLICO FEDERAL" <?php if ($_smarty_tpl->getVariable('info')->value['workplaceOcupation']=="FUNCIONARIO PUBLICO FEDERAL"){?> selected="selected" <?php }?>>FUNCIONARIO PUBLICO FEDERAL</option>
                        <option value="OTROS" <?php if ($_smarty_tpl->getVariable('info')->value['workplaceOcupation']=="OTROS"){?> selected="selected" <?php }?>>OTROS</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Lugar de trabajo:</label>
                <div class="col-md-8">
                    <input type="text" name="workplace" id="workplace" class="form-control" value="<?php echo $_smarty_tpl->getVariable('info')->value['workplace'];?>
" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Domicilio:</label>
                <div class="col-md-8">
                    <input type="text" name="workplaceAddress" id="workplaceAddress" class="form-control" value="<?php echo $_smarty_tpl->getVariable('info')->value['workplaceAddress'];?>
" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">País</label>
                <div class="col-md-8">
                    <select id="paist" name="paist" style="width:300px" onChange="estado_dependenciat();" class="form-control">
                        <option value="0">Selecciona Tu Pa&iacute;s</option>
                        <?php  $_smarty_tpl->tpl_vars['pais'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('paises')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pais']->key => $_smarty_tpl->tpl_vars['pais']->value){
?>
                            <?php if ($_smarty_tpl->getVariable('pais')->value['paisId']==$_smarty_tpl->getVariable('info')->value['paist']){?>
                                <option selected="selected" value="<?php echo $_smarty_tpl->getVariable('pais')->value['paisId'];?>
"><?php echo $_smarty_tpl->getVariable('pais')->value['nombre'];?>
 </option>
                            <?php }else{ ?>
                                <option value="<?php echo $_smarty_tpl->getVariable('pais')->value['paisId'];?>
"><?php echo $_smarty_tpl->getVariable('pais')->value['nombre'];?>
 </option>
                            <?php }?>
                        <?php }} ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" >Estado:</label>
                <div class="col-md-8">
                    <div id="Statepositiont">
                        <select id="estadot" name="estadot" style="width:300px" onChange="ciudad_dependenciat();" class="form-control" >
                            <option value="0">Selecciona Tu Estado</option>
                            <?php  $_smarty_tpl->tpl_vars['estado'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('estados')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['estado']->key => $_smarty_tpl->tpl_vars['estado']->value){
?>
                                <?php if ($_smarty_tpl->getVariable('estado')->value['estadoId']==$_smarty_tpl->getVariable('info')->value['estadot']){?>
                                    <option selected="selected" value="<?php echo $_smarty_tpl->getVariable('estado')->value['estadoId'];?>
"><?php echo $_smarty_tpl->getVariable('estado')->value['nombre'];?>
 </option>
                                <?php }else{ ?>
                                    <option value="<?php echo $_smarty_tpl->getVariable('estado')->value['estadoId'];?>
"><?php echo $_smarty_tpl->getVariable('estado')->value['nombre'];?>
 </option>
                                <?php }?>
                            <?php }} ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Municipio</label>
                <div class="col-md-8">
                    <div id="Citypositiont">
                        <select id="ciudadt" name="ciudadt" style="width:300px" class="form-control" >
                            <option value="0">Selecciona Tu ciudad</option>
                            <?php  $_smarty_tpl->tpl_vars['ciudad'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ciudades')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ciudad']->key => $_smarty_tpl->tpl_vars['ciudad']->value){
?>
                                <?php if ($_smarty_tpl->getVariable('ciudad')->value['municipioId']==$_smarty_tpl->getVariable('info')->value['ciudadt']){?>
                                    <option selected="selected" value="<?php echo $_smarty_tpl->getVariable('ciudad')->value['municipioId'];?>
"><?php echo $_smarty_tpl->getVariable('ciudad')->value['nombre'];?>
 </option>
                                <?php }else{ ?>
                                    <option value="<?php echo $_smarty_tpl->getVariable('ciudad')->value['municipioId'];?>
"><?php echo $_smarty_tpl->getVariable('ciudad')->value['nombre'];?>
 </option>
                                <?php }?>
                            <?php }} ?>
                        </select>

                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Area</label>
                <div class="col-md-8">
                    <input type="text" name="workplaceArea" id="workplaceArea" class="form-control" value="<?php echo $_smarty_tpl->getVariable('info')->value['workplaceArea'];?>
" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Teléfono de Oficina</label>
                <div class="col-md-8">
                    <input type="text" name="workplacePhone" id="workplacePhone" class="form-control" value="<?php echo $_smarty_tpl->getVariable('info')->value['workplacePhone'];?>
" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Correo Oficial</label>
                <div class="col-md-8">
                    <input type="text" name="workplaceEmail" id="workplaceEmail" class="form-control" value="<?php echo $_smarty_tpl->getVariable('info')->value['workplaceEmail'];?>
" />
                </div>
            </div>


        </div>
    </div>

    <div class="portlet box red">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-bullhorm"></i>Estudios
            </div>
        </div>
        <div class="portlet-body">
            <div class="form-group">
                <label class="col-md-3 control-label">Grado Académico</label>
                <div class="col-md-8">
                    <select name="academicDegree" id="academicDegree" class="form-control">
                        <option value="UNIVERSITARIO" <?php if ($_smarty_tpl->getVariable('info')->value['academicDegree']=="UNIVERSITARIO"){?> selected="selected" <?php }?>>UNIVERSITARIO</option>
                        <option value="LICENCIATURA" <?php if ($_smarty_tpl->getVariable('info')->value['academicDegree']=="LICENCIATURA"){?> selected="selected" <?php }?>>LICENCIATURA</option>
                        <option value="MAESTRIA" <?php if ($_smarty_tpl->getVariable('info')->value['academicDegree']=="MAESTRIA"){?> selected="selected" <?php }?>>MAESTRIA</option>
                        <option value="DOCTORADO" <?php if ($_smarty_tpl->getVariable('info')->value['academicDegree']=="DOCTORADO"){?> selected="selected" <?php }?>>DOCTORADO</option>
                        <option value="OTROS" <?php if ($_smarty_tpl->getVariable('info')->value['academicDegree']=="OTROS"){?> selected="selected" <?php }?>>OTROS</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Profesión</label>
                <div class="col-md-8">
                    <select name="profesion" id="profesion" style="width:300px" class="form-control">
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('prof')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
                            <option value="<?php echo $_smarty_tpl->getVariable('item')->value['profesionId'];?>
" <?php if ($_smarty_tpl->getVariable('info')->value['profesion']==$_smarty_tpl->getVariable('item')->value['profesionId']){?> selected="selected" <?php }?>><?php echo $_smarty_tpl->getVariable('item')->value['profesionName'];?>
</option>
                            item<?php }} ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Escuela o Institución  Universitaria:</label>
                <div class="col-md-8">
                    <input type="text" name="school" id="school" class="form-control" value="<?php echo $_smarty_tpl->getVariable('info')->value['school'];?>
" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Maestría en:</label>
                <div class="col-md-8">
                    <input type="text" name="masters" id="masters" class="form-control" value="<?php echo $_smarty_tpl->getVariable('info')->value['masters'];?>
" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Escuela o Institución Maestría</label>
                <div class="col-md-8">
                    <input type="text" name="mastersSchool" id="mastersSchool" class="form-control" value="<?php echo $_smarty_tpl->getVariable('info')->value['mastersSchool'];?>
" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Escuela o Institución Bachillerato</label>
                <div class="col-md-8">
                    <input type="text" name="highSchool" id="highSchool" class="form-control" value="<?php echo $_smarty_tpl->getVariable('info')->value['highSchool'];?>
" />
                </div>
            </div>


        </div>
    </div>


    <div class="form-actions">
        <div class="row">
            <div class="col-md-offset-3 col-md-9">
                <button type="button" class="btn default" data-dismiss="modal">Salir</button>
                <button type="submit" class="btn green submitForm">Guardar</button>
            </div>
        </div>
    </div>

</form>