<?php /* Smarty version Smarty3-b7, created on 2015-11-06 23:23:10
         compiled from "/home/iapchiap/public_html//templates/forms/add-student.tpl" */ ?>
<?php /*%%SmartyHeaderCode:834332093563d8abe156457-85974343%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9ec69f2a3ad771cbaff2128ea3d75128a7d918e' => 
    array (
      0 => '/home/iapchiap/public_html//templates/forms/add-student.tpl',
      1 => 1410206522,
    ),
  ),
  'nocache_hash' => '834332093563d8abe156457-85974343',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script language="JavaScript">
var nav4 = window.Event ? true : false;

function habilitando() {
alert("hola");
       if(addStudentForm.tipo_beca.value=="Ninguno")
    addStudentForm.por_beca.disabled = true;
	else
	addStudentForm.por_beca.disabled = false;
}

function Numero(evt){
// Backspace = 8, Enter = 13, ’0′ = 48, ’9′ = 57, ‘.’ = 46
var key = nav4 ? evt.which : evt.keyCode;
return (key <= 13 || (key >= 48 && key <= 57) || key == 46);
}
</script>

<form id="addStudentForm" name="addStudentForm" method="post">
<input type="hidden" id="type" name="type" value="saveAddStudent"/>
<input type="hidden" id="tam" name="tam" value="1"/>
<input type="hidden" id="RegisterAdmin" name="RegisterAdmin" value="1"/>
<input type="hidden" id="permiso" name="permiso" value="1"/>
<ul id="sort-box" class="sorts">
  <li>              
    <div class="content-in-popup">
      
      <div class="content-settings-row" align="center">
            <b>.:: Datos Personales ::.</b>
      </div>
      
      
       <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Nombre:</label>
            <input type="text" name="names" id="names" value="" />                      
      </div>
      
       <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Apellido Paterno:</label>
            <input type="text" name="lastNamePaterno" id="lastNamePaterno" value="" />                      
      </div>
      
       <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Apellido Materno:</label>
            <input type="text" name="lastNameMaterno" id="lastNameMaterno" value="" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Sexo:</label>
            	<select name='sexo' id="sexo">
                    <option value="m">Masculino</option>
                    <option value="f">Femenino</option>
                </select>                    
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Fecha de Nacimiento:</label>
            	<select name="day" id="day" style="width:70px">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>         
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>      
                </select>
                <select name="month" id="month">
                    <option value="1">Enero</option>
                    <option value="2">Febrero</option>
                    <option value="3">Marzo</option>
                    <option value="4">Abril</option>
                    <option value="5">Mayo</option>
                    <option value="6">Junio</option>
                    <option value="7">Julio</option>
                    <option value="8">Agosto</option>
                    <option value="9">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
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
            <label for="f1">Contraseña del Sistema:</label>
            <input type="password" name="password" id="password" value="" />                      
      </div>
      
      <div class="content-settings-row" align="center">
            <b>.:: Domicilio ::.</b>                     
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Calle:</label>
            <input type="text" name="street" id="street" value="" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1">N&uacute;mero:</label>
            <input type="text" name="number" id="number" value="" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Colonia:</label>
            <input type="text" name="colony" id="colony" value="" />                      
      </div>
      
         <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span>Pa&iacute;s:</label>
           
			<select id="pais" name="pais" style="width:300px" onChange="estado_dependencia();" >
             <option value="0">Selecciona Tu Pa&iacute;s</option>
			     <?php  $_smarty_tpl->tpl_vars['pais'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('paises')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pais']->key => $_smarty_tpl->tpl_vars['pais']->value){
?>
				 <option value="<?php echo $_smarty_tpl->getVariable('pais')->value['paisId'];?>
"><?php echo $_smarty_tpl->getVariable('pais')->value['nombre'];?>
 </option>
				 <?php }} ?>
            </select>                     
      </div>
	     
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span>Estado:</label>
            <div id="Stateposition">
			 <select id="estado" name="estado" onChange='ciudad_dependencia();' style="width:300px">
            <option value="0">Selecciona tu Estado</option>
        </select>                    
            </div>
	  
	  </div>
      
	  <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span>Municipio:</label>
          <div id="Cityposition">  
			<select id="ciudad" name="ciudad" style="width:300px">
            <option value="0">Selecciona tu Ciudad</option>
             </select>
	      </div>
	  </div>

      
      <div class="content-settings-row">
            <label for="f1">C&oacute;digo Postal:</label>
            <input type="text" name="postalCode" id="postalCode" value="" />                      
      </div>

      <div class="content-settings-row" align="center">
            <b>.:: Datos de Contacto ::.</b>                     
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Correo Electr&oacute;nico:</label>
            <input type="text" name="email" id="email" value="" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Tel&eacute;fono Local:</label>
            <input type="text" name="phone" id="phone" value="" />                      
      </div>

      <div class="content-settings-row">
            <label for="f1">Telefono de Emergencia:</label>
            <input type="text" name="fax" id="fax" value="" />                      
      </div>

      <div class="content-settings-row">
            <label for="f1">Celular:</label>
            <input type="text" name="mobile" id="mobile" value="" />                      
      </div>
      
      <div class="content-settings-row" align="center">
            <b>Datos Laborales</b>                      
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
            <input type="text" name="workplace" id="workplace" value="" />                      
      </div>

    
	
	
	
	      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span>Pa&iacute;s:</label>
           
			<select id="paist" name="paist" style="width:300px" onChange="estado_dependenciat();" >
             <option value="0">Selecciona Tu Pa&iacute;s</option>
			     <?php  $_smarty_tpl->tpl_vars['pais'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('paises')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pais']->key => $_smarty_tpl->tpl_vars['pais']->value){
?>
				 <option value="<?php echo $_smarty_tpl->getVariable('pais')->value['paisId'];?>
"><?php echo $_smarty_tpl->getVariable('pais')->value['nombre'];?>
 </option>
				 <?php }} ?>
            </select>                     
      
	     </div>
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span>Estado:</label>
            <div id="Statepositiont">
			 <select id="estadot" name="estadot" onChange='ciudad_dependenciat();' style="width:300px">
            <option value="0">Selecciona tu Estado</option>
        </select>                    
            </div>
	  
	  </div>
      
	  <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span>Municipio:</label>
          <div id="Citypositiont">  
			<select id="ciudadt" name="ciudadt" style="width:300px">
            <option value="0">Selecciona tu Ciudad</option>
             </select>
	      </div>
	  </div>
	  
	  
	  
	
	
	
	

      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span>Domicilio:</label>
            <input type="text" name="workplaceAddress" id="workplaceAddress" value="" />                      
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span>Area:</label>
            <input type="text" name="workplaceArea" id="workplaceArea" value="" />                      
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span>Puesto:</label>
            <input type="text" name="workplacePosition" id="workplacePosition" value="" />                      
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span>Telefono Oficina:</label>
            <input type="text" name="workplacePhone" id="workplacePhone" value="" />                      
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span>Correo Electr&oacute;nico Laboral:</label>
            <input type="text" name="workplaceEmail" id="workplaceEmail" value="" />                      
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
            <label for="f1"><span class="reqField"></span>Escuela o Institucion Universitaria:</label>
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
      
      <div class="content-settings-row" align="center">
            <b>Seleccionar Curricula</b>                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Selecciona tu programa académico:</label>
            	<select name='curricula' id="curricula" style="width:300px">
            <?php  $_smarty_tpl->tpl_vars['course'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('activeCourses')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['course']->key => $_smarty_tpl->tpl_vars['course']->value){
?>
                    <option value="<?php echo $_smarty_tpl->getVariable('course')->value['courseId'];?>
"><?php echo $_smarty_tpl->getVariable('course')->value['majorName'];?>
 - <?php echo $_smarty_tpl->getVariable('course')->value['name'];?>
 - <?php echo $_smarty_tpl->getVariable('course')->value['group'];?>
</option>
             <?php }} ?>       
                </select>                    
      </div>   

		<div class="content-settings-row">
            <label for="f1">Tipo de beca:</label>
            	<select name='tipo_beca' id="tipo_beca" style="width:300px"  onChange='habilitando();'>
                    <option value="Ninguno">Ninguno</option>
                    <option value="Particular">Particular</option>
                    <option value="Escolar">Escolar</option>
					<option value="Prodim">PRODIM</option>
					
                </select>                    
      </div>
	  
	  <div class="content-settings-row">
       <label for="f1">Porcentaje de beca :</label>
      <input type="text" name="por_beca" id="por_beca" value="0"   onkeypress="return Numero(event);" style="width:250px"/>% 
	  
      </div>	

	  
      
      <div style="float:left"><span class="reqField">*</span> Campo requerido</div>
      <div style="padding-right:60px">                 
      <input type="button" class="btnCancel" style="margin-left:10px;" id="btnCancel" />
      <input type="button" class="btn-70-l" id="addStudent" name="addStudent" />                  
      </div>
      
    </div>
   </li>                              
 </ul>    
</form>