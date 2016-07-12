<?php /* Smarty version Smarty3-b7, created on 2015-10-06 15:33:32
         compiled from "/home/iapchiap/public_html/templates/forms/edit-student.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10022777625614301c711ea7-49278172%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8410f776fa4cf562e6073793fd6d377939373e69' => 
    array (
      0 => '/home/iapchiap/public_html/templates/forms/edit-student.tpl',
      1 => 1379525028,
    ),
  ),
  'nocache_hash' => '10022777625614301c711ea7-49278172',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form id="editStudentForm" name="editStudentForm" method="post">
<input type="hidden" name="cancelPeriodoId" id="cancelPeriodoId" value="<?php echo $_smarty_tpl->getVariable('info')->value['cancelPeriodoId'];?>
" />
<input type="hidden" id="type" name="type" value="saveEditStudent"/>
<input type="hidden" id="tam" name="tam" value="1"/>
<input type="hidden" id="id" name="id" value="<?php echo $_smarty_tpl->getVariable('info')->value['userId'];?>
"/>
<ul id="sort-box" class="sorts">
  <li>              
    <div class="content-in-popup">
      
      <div class="content-settings-row" align="center">
            <b>.:: Datos Personales ::.</b>
      </div>
      
       <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Nombre:</label>
            <input type="text" name="names" id="names" value="<?php echo $_smarty_tpl->getVariable('info')->value['names'];?>
" />                      
      </div>
      
       <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Apellido Paterno:</label>
            <input type="text" name="lastNamePaterno" id="lastNamePaterno" value="<?php echo $_smarty_tpl->getVariable('info')->value['lastNamePaterno'];?>
" />                      
      </div>
      
       <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Apellido Materno:</label>
            <input type="text" name="lastNameMaterno" id="lastNameMaterno" value="<?php echo $_smarty_tpl->getVariable('info')->value['lastNameMaterno'];?>
" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Sexo:</label>
            	<select name='sexo' id="sexo">
                    <option value="m"  <?php if ($_smarty_tpl->getVariable('info')->value['sexo']=="m"){?>selected<?php }?>>Masculino</option>
                    <option value="f"  <?php if ($_smarty_tpl->getVariable('info')->value['sexo']=="f"){?>selected<?php }?>>Femenino</option>
                </select>                    
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Fecha de Nacimiento:</label>
            	<select name="day" id="day" style="width:70px">                    
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
                <select name="month" id="month">
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

      <div class="content-settings-row">
            <label for="f1">Estado Civil:</label>
            <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/forms/maritalStatus.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('selected',$_smarty_tpl->getVariable('info')->value['maritalStatus']); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

      </div>
      
      <div class="content-settings-row">
            <label for="f1">Contraseña del Sistema (Minimo 6 caracteres):</label>
            <input type="password" name="password" id="password" value="<?php echo $_smarty_tpl->getVariable('info')->value['password'];?>
" />                      
      </div>

	  
      <div class="content-settings-row" align="center">
            <b>.:: Domicilio ::.</b>                     
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Calle:</label>
            <input type="text" name="street" id="street" value="<?php echo $_smarty_tpl->getVariable('info')->value['street'];?>
" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1">N&uacute;mero:</label>
            <input type="text" name="number" id="number" value="<?php echo $_smarty_tpl->getVariable('info')->value['number'];?>
" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Colonia:</label>
            <input type="text" name="colony" id="colony" value="<?php echo $_smarty_tpl->getVariable('info')->value['colony'];?>
" />                      
      </div>
      
      

    
      
      <div class="content-settings-row">
            <label for="f1">Pa&iacute;s:</label>
            
			
			<select id="pais" name="pais" style="width:300px" onChange="estado_dependencia();" >
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
	  
	    <div class="content-settings-row">
            <label for="f1">Estado:</label>
            
	 <div id="Stateposition">
	 <select id="estado" name="estado" style="width:300px" onChange="ciudad_dependencia();" >
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
      
	  
	  <div class="content-settings-row">
            <label for="f1">Municipio:</label>
           
     <div id="Cityposition"> 
	  <select id="ciudad" name="ciudad" style="width:300px"  >
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
	  
	  
	  
	  
	  
	  
	  
      <div class="content-settings-row">
            <label for="f1">C&oacute;digo Postal:</label>
            <input type="text" name="postalCode" id="postalCode" value="<?php echo $_smarty_tpl->getVariable('info')->value['postalCode'];?>
" />                      
      </div>

     <div class="content-settings-row" align="center">
            <b>.:: Datos de Contacto ::.</b>                     
      </div>
            
      <div class="content-settings-row">
            <label for="f1">Email:</label>
            <input type="text" name="email" id="email" value="<?php echo $_smarty_tpl->getVariable('info')->value['email'];?>
" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Tel&eacute;fono: Local</label>
            <input type="text" name="phone" id="phone" value="<?php echo $_smarty_tpl->getVariable('info')->value['phone'];?>
" />                      
      </div>

      <div class="content-settings-row">
            <label for="f1">Telefono de Emergencia:</label>
            <input type="text" name="fax" id="fax" value="<?php echo $_smarty_tpl->getVariable('info')->value['fax'];?>
" />                      
      </div>

      <div class="content-settings-row">
            <label for="f1">Celular:</label>
            <input type="text" name="mobile" id="mobile" value="<?php echo $_smarty_tpl->getVariable('info')->value['mobile'];?>
" />                      
      </div>
      
      <div class="content-settings-row" align="center">
            <b>.:: Datos Laborales ::.</b>                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span>Ocupacion:</label>
            <select name="workplaceOcupation" id="workplaceOcupation" style="width:300px">
            <option value="FUNCIONARIO PUBLICO MUNICIPAL" <?php if ($_smarty_tpl->getVariable('info')->value['workplaceOcupation']=="FUNCIONARIO PUBLICO MUNICIPAL"){?> selected="selected" <?php }?>>FUNCIONARIO PUBLICO MUNICIPAL</option>
            <option value="FUNCIONARIO PUBLICO ESTATAL" <?php if ($_smarty_tpl->getVariable('info')->value['workplaceOcupation']=="FUNCIONARIO PUBLICO ESTATAL"){?> selected="selected" <?php }?>>FUNCIONARIO PUBLICO ESTATAL</option>
            <option value="FUNCIONARIO PUBLICO FEDERAL" <?php if ($_smarty_tpl->getVariable('info')->value['workplaceOcupation']=="FUNCIONARIO PUBLICO FEDERAL"){?> selected="selected" <?php }?>>FUNCIONARIO PUBLICO FEDERAL</option>
            <option value="OTROS" <?php if ($_smarty_tpl->getVariable('info')->value['workplaceOcupation']=="OTROS"){?> selected="selected" <?php }?>>OTROS</option>
            </select>
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span>Lugar de Trabajo:</label>
            <input type="text" name="workplace" id="workplace" value="<?php echo $_smarty_tpl->getVariable('info')->value['workplace'];?>
" />                      
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span>Domicilio:</label>
            <input type="text" name="workplaceAddress" id="workplaceAddress" value="<?php echo $_smarty_tpl->getVariable('info')->value['workplaceAddress'];?>
" />                      
      </div>

 
 
 
 
       <div class="content-settings-row">
            <label for="f1">Pa&iacute;s:</label>
          
			
			<select id="paist" name="paist" style="width:300px" onChange="estado_dependenciat();" >
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
	  
	    <div class="content-settings-row">
            <label for="f1">Estado:</label>
            
	 <div id="Statepositiont">
	 <select id="estadot" name="estadot" style="width:300px" onChange="ciudad_dependencia();" >
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
      
	  
	  <div class="content-settings-row">
            <label for="f1">Municipio:</label>
      
     <div id="Cityposition"> 
	  <select id="ciudadt" name="ciudadt" style="width:300px"  >
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
	  
	  
	  
 
 
 

      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span>Area:</label>
            <input type="text" name="workplaceArea" id="workplaceArea" value="<?php echo $_smarty_tpl->getVariable('info')->value['workplaceArea'];?>
" />                      
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span>Puesto:</label>
            <input type="text" name="workplacePosition" id="workplacePosition" value="<?php echo $_smarty_tpl->getVariable('info')->value['workplacePosition'];?>
" />                      
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span>Telefono Oficina:</label>
            <input type="text" name="workplacePhone" id="workplacePhone" value="<?php echo $_smarty_tpl->getVariable('info')->value['workplacePhone'];?>
" />                      
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span>Correo Electronico:</label>
            <input type="text" name="workplaceEmail" id="workplaceEmail" value="<?php echo $_smarty_tpl->getVariable('info')->value['workplaceEmail'];?>
" />                      
      </div>
      
      <div class="content-settings-row" align="center">
            <b>Estudios</b>                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span>Grado Academico:</label>
            <select name="academicDegree" id="academicDegree">
            <option value="UNIVERSITARIO" <?php if ($_smarty_tpl->getVariable('info')->value['academicDegree']=="UNIVERSITARIO"){?> selected="selected" <?php }?>>UNIVERSITARIO</option>
            <option value="LICENCIATURA" <?php if ($_smarty_tpl->getVariable('info')->value['academicDegree']=="LICENCIATURA"){?> selected="selected" <?php }?>>LICENCIATURA</option>
            <option value="MAESTRIA" <?php if ($_smarty_tpl->getVariable('info')->value['academicDegree']=="MAESTRIA"){?> selected="selected" <?php }?>>MAESTRIA</option>
            <option value="DOCTORADO" <?php if ($_smarty_tpl->getVariable('info')->value['academicDegree']=="DOCTORADO"){?> selected="selected" <?php }?>>DOCTORADO</option>
            <option value="OTROS" <?php if ($_smarty_tpl->getVariable('info')->value['academicDegree']=="OTROS"){?> selected="selected" <?php }?>>OTROS</option>
            </select>
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span>Profesion:</label>
            <select name="profesion" id="profesion" style="width:300px">
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

      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span>Escuela o Institucion  Universitaria:</label>
            <input type="text" name="school" id="school" value="<?php echo $_smarty_tpl->getVariable('info')->value['school'];?>
" />                      
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span>Maestria en:</label>
            <input type="text" name="masters" id="masters" value="<?php echo $_smarty_tpl->getVariable('info')->value['masters'];?>
" />                      
      </div>
      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span>Escuela o Institucion:</label>
            <input type="text" name="mastersSchool" id="mastersSchool" value="<?php echo $_smarty_tpl->getVariable('info')->value['mastersSchool'];?>
" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span>Estudios de Bachillerato:</label>
            <input type="text" name="highSchool" id="highSchool" value="<?php echo $_smarty_tpl->getVariable('info')->value['highSchool'];?>
" />                      
      </div>
            
      
      <div style="float:left"><span class="reqField">*</span> Campo requerido</div>
      <div style="padding-right:60px">                 
      <input type="button" class="btnCancel" style="margin-left:10px;" id="btnCancel" />
      <input type="button" class="btn-70-l" id="editStudent" name="editStudent" />                  
      </div>
      
    </div>
   </li>                              
 </ul>    
</form>