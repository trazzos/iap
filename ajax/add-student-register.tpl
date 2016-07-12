<form id="addStudentForm" name="addStudentForm" method="post">
<input type="hidden" id="type" name="type" value="saveAddStudentRegister"/>
<input type="hidden" id="permiso" name="permiso" value="0"/>
<ul id="sort-box" class="sorts">
  <li>              
    <div class="content-in-popup">
      
      <div class="content-settings-row-register" align="center">
            <b>.:: Datos Personales ::.</b>
      </div>
      
      
       <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span> Nombre:</label>
            <input type="text" name="names" id="names" value="" />                      
      </div>
      
       <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span> Apellido Paterno:</label>
            <input type="text" name="lastNamePaterno" id="lastNamePaterno" value="" />                      
      </div>
      
       <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span> Apellido Materno:</label>
            <input type="text" name="lastNameMaterno" id="lastNameMaterno" value="" />                      
      </div>
      
      <div class="content-settings-row-register">
            <label for="f1">Sexo:</label>
            	<select name='sexo' id="sexo">
                    <option value="m">Masculino</option>
                    <option value="f">Femenino</option>
                </select>                    
      </div>
      
      <div class="content-settings-row-register">
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
                {include file="forms/year.tpl" name="year"}
                     
      </div>

      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span>Estado Civil:</label>
            {include file="forms/maritalStatus.tpl" selected=$info.maritalStatus}
      </div>
      
      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span>Contraseña del Sistema (Minimo 6 caracteres):</label>
            <input type="password" name="password" id="password" value="" />                      
      </div>
      
      <div class="content-settings-row-register" align="center">
            <b>.:: Domicilio ::.</b>                     
      </div>
      
      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span>Calle:</label>
            <input type="text" name="street" id="street" value="" />                      
      </div>
      
      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span>N&uacute;mero:</label>
            <input type="text" name="number" id="number" value="" />                      
      </div>
      
      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span>Colonia:</label>
            <input type="text" name="colony" id="colony" value="" />                      
      </div>
      
	       <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span>Pa&iacute;s:</label>
            <input type="text" name="country" id="country" value="" />                      
      </div>
      
	  
      
      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span>Estado:</label>
            <input type="text" name="state" id="state" value="" />                      
      </div>
      
	  <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span>Municipio:</label>
            <input type="text" name="city" id="city" value="" />                      
      </div>

 
      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span>C&oacute;digo Postal:</label>
            <input type="text" name="postalCode" id="postalCode" value="" />                      
      </div>

      <div class="content-settings-row-register" align="center">
            <b>.:: Datos de Contacto ::.</b>                     
      </div>
      
      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span>Email:</label>
            <input type="text" name="email" id="email" value="" />                      
      </div>
      
      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span>Tel&eacute;fono Local:</label>
            <input type="text" name="phone" id="phone" value="" />                      
      </div>

      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span>Telefono de Emergencia:</label>
            <input type="text" name="fax" id="fax" value="" />                      
      </div>

      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span>Celular:</label>
            <input type="text" name="mobile" id="mobile" value="" />                      
      </div>
      
      <div class="content-settings-row-register" align="center">
            <b>Datos Laborales</b>                      
      </div>

<div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span>Ocupacion:</label>
            <select name="workplaceOcupation" id="workplaceOcupation" style="width:300px">
            <option value="FUNCIONARIO PUBLICO MUNICIPAL" {if $info.workplaceOcupation == "FUNCIONARIO PUBLICO MUNICIPAL"} selected="selected" {/if}>FUNCIONARIO PUBLICO MUNICIPAL</option>
            <option value="FUNCIONARIO PUBLICO ESTATAL" {if $info.workplaceOcupation == "FUNCIONARIO PUBLICO ESTATAL"} selected="selected" {/if}>FUNCIONARIO PUBLICO ESTATAL</option>
            <option value="FUNCIONARIO PUBLICO FEDERAL" {if $info.workplaceOcupation == "FUNCIONARIO PUBLICO FEDERAL"} selected="selected" {/if}>FUNCIONARIO PUBLICO FEDERAL</option>
            <option value="OTROS" {if $info.workplaceOcupation == "OTROS"} selected="selected" {/if}>OTROS</option>
            </select>
      </div>      
      
      
      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span>Lugar de Trabajo:</label>
            <input type="text" name="workplace" id="workplace" value="" />                      
      </div>

      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span>Domicilio:</label>
            <input type="text" name="workplaceAddress" id="workplaceAddress" value="" />                      
      </div>

      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span>Municipio:</label>
            <input type="text" name="workplaceCity" id="workplaceCity" value="" />                      
      </div>

      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span>Area:</label>
            <input type="text" name="workplaceArea" id="workplaceArea" value="" />                      
      </div>

      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span>Puesto:</label>
            <input type="text" name="workplacePosition" id="workplacePosition" value="" />                      
      </div>

      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span>Telefono Oficina:</label>
            <input type="text" name="workplacePhone" id="workplacePhone" value="" />                      
      </div>

      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span>Correo Electronico:</label>
            <input type="text" name="workplaceEmail" id="workplaceEmail" value="" />                      
      </div>

      <div class="content-settings-row-register" align="center">
            <b>Estudios</b>                      
      </div>
      
      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span>Grado Academico:</label>
            <select name="academicDegree" id="academicDegree">
            <option value="UNIVERSITARIO" {if $info.academicDegree == "UNIVERSITARIO"} selected="selected" {/if}>UNIVERSITARIO</option>
            <option value="LICENCIATURA" {if $info.academicDegree == "LICENCIATURA"} selected="selected" {/if}>LICENCIATURA</option>
            <option value="MAESTRIA" {if $info.academicDegree == "MAESTRIA"} selected="selected" {/if}>MAESTRIA</option>
            <option value="DOCTORADO" {if $info.academicDegree == "DOCTORADO"} selected="selected" {/if}>DOCTORADO</option>
            <option value="OTROS" {if $info.academicDegree == "OTROS"} selected="selected" {/if}>OTROS</option>
            </select>
      </div>

 <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span>Profesion:</label>
            <select name="profesion" id="profesion" style="width:300px">
            {foreach from=$prof item=item}
            <option value="{$item.profesionId}" {if $info.profesion == $item.profesionId} selected="selected" {/if}>{$item.profesionName}</option>
item{/foreach}
            </select>
      </div>      
      
      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField"></span>Escuela o Institucion Universitaria:</label>
            <input type="text" name="school" id="school" value="{$info.school}" />                      
      </div>

      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField"></span>Maestria en:</label>
            <input type="text" name="masters" id="masters" value="{$info.masters}" />                      
      </div>
      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField"></span>Escuela o Institucion:</label>
            <input type="text" name="mastersSchool" id="mastersSchool" value="{$info.mastersSchool}" />                      
      </div>
      
      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField"></span>Estudios de Bachillerato:</label>
            <input type="text" name="highSchool" id="highSchool" value="{$info.highSchool}" />                      
      </div>      
      <div class="content-settings-row-register" align="center">
            <b>Seleccionar Curricula</b>                      
      </div>
      
      <div class="content-settings-row-register">
            <label for="f1">Selecciona tu programa académico:</label>
            	<select name='curricula' id="curricula" style="width:400px">
            {foreach from=$activeCourses item=course}
                    <option value="{$course.courseId}">{$course.majorName} - {$course.name}</option>
             {/foreach}       
                </select>                    
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