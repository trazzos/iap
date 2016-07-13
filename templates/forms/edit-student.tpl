<form id="editStudentForm" name="editStudentForm" method="post">
<input type="hidden" name="cancelPeriodoId" id="cancelPeriodoId" value="{$info.cancelPeriodoId}" />
<input type="hidden" id="type" name="type" value="saveEditStudent"/>
<input type="hidden" id="tam" name="tam" value="1"/>
<input type="hidden" id="id" name="id" value="{$info.userId}"/>
<ul id="sort-box" class="sorts">
  <li>              
    <div class="content-in-popup">
      
      <div class="content-settings-row" align="center">
            <b>.:: Datos Personales ::.</b>
      </div>
      
       <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Nombre:</label>
            <input type="text" name="names" id="names" value="{$info.names}" />                      
      </div>
      
       <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Apellido Paterno:</label>
            <input type="text" name="lastNamePaterno" id="lastNamePaterno" value="{$info.lastNamePaterno}" />                      
      </div>
      
       <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Apellido Materno:</label>
            <input type="text" name="lastNameMaterno" id="lastNameMaterno" value="{$info.lastNameMaterno}" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Sexo:</label>
            	<select name='sexo' id="sexo">
                    <option value="m"  {if $info.sexo == "m"}selected{/if}>Masculino</option>
                    <option value="f"  {if $info.sexo == "f"}selected{/if}>Femenino</option>
                </select>                    
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Fecha de Nacimiento:</label>
            	<select name="day" id="day" style="width:70px">                    
                    {section name=foo start=1 loop=32 step=1}
                      {$smarty.section.foo.index}
                      <option value="{$smarty.section.foo.index}" {if $info.dayBirthdate == $smarty.section.foo.index}selected{/if}>{$smarty.section.foo.index}</option>
                    {/section}    
                </select>
                <select name="month" id="month">
                    <option value="1" {if $info.monthBirthdate == 1}selected{/if}>Enero</option>
                    <option value="2" {if $info.monthBirthdate == 2}selected{/if}>Febrero</option>
                    <option value="3" {if $info.monthBirthdate == 3}selected{/if}>Marzo</option>
                    <option value="4" {if $info.monthBirthdate == 4}selected{/if}>Abril</option>
                    <option value="5" {if $info.monthBirthdate == 5}selected{/if}>Mayo</option>
                    <option value="6" {if $info.monthBirthdate == 6}selected{/if}>Junio</option>
                    <option value="7" {if $info.monthBirthdate == 7}selected{/if}>Julio</option>
                    <option value="8" {if $info.monthBirthdate == 8}selected{/if}>Agosto</option>
                    <option value="9" {if $info.monthBirthdate == 9}selected{/if}>Septiembre</option>
                    <option value="10" {if $info.monthBirthdate == 10}selected{/if}>Octubre</option>
                    <option value="11" {if $info.monthBirthdate == 11}selected{/if}>Noviembre</option>
                    <option value="12" {if $info.monthBirthdate == 12}selected{/if}>Diciembre</option>
                </select>
                 {include file="{$DOC_ROOT}/templates/forms/year.tpl" name="year" selected=$info.yearBirthdate}
      </div>

      <div class="content-settings-row">
            <label for="f1">Estado Civil:</label>
            {include file="{$DOC_ROOT}/templates/forms/maritalStatus.tpl" selected=$info.maritalStatus}
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Contraseña del Sistema (Minimo 6 caracteres):</label>
            <input type="password" name="password" id="password" value="{$info.password}" />                      
      </div>

	  
      <div class="content-settings-row" align="center">
            <b>.:: Domicilio ::.</b>                     
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Calle:</label>
            <input type="text" name="street" id="street" value="{$info.street}" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1">N&uacute;mero:</label>
            <input type="text" name="number" id="number" value="{$info.number}" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Colonia:</label>
            <input type="text" name="colony" id="colony" value="{$info.colony}" />                      
      </div>
      
      

    
      
      <div class="content-settings-row">
            <label for="f1">Pa&iacute;s:</label>
            {*}<input type="text" name="country" id="country" value="{$info.country}" /> {*}
			
			<select id="pais" name="pais" style="width:300px" onChange="estado_dependencia();" >
             <option value="0">Selecciona Tu Pa&iacute;s</option>
			     {foreach from=$paises item=pais}
                      			      {if $pais.paisId == $info.pais}
				           <option selected="selected" value="{$pais.paisId}">{$pais.nombre} </option>
						   {else}
						   <option value="{$pais.paisId}">{$pais.nombre} </option>
						   {/if}
				 {/foreach}
            </select>   
      </div>
	  
	    <div class="content-settings-row">
            <label for="f1">Estado:</label>
            {*}<input type="text" name="state" id="state" value="{$info.state}" />{*}
	 <div id="Stateposition">
	 <select id="estado" name="estado" style="width:300px" onChange="ciudad_dependencia();" >
             <option value="0">Selecciona Tu Estado</option>
			     {foreach from=$estados item=estado}
                      			      {if $estado.estadoId == $info.estado}
				           <option selected="selected" value="{$estado.estadoId}">{$estado.nombre} </option>
						   {else}
						   <option value="{$estado.estadoId}">{$estado.nombre} </option>
						   {/if}
				 {/foreach}
            </select>
      </div> 			
      </div>
      
	  
	  <div class="content-settings-row">
            <label for="f1">Municipio:</label>
           {*} <input type="text" name="city" id="city" value="{$info.city}" /> {*}
     <div id="Cityposition"> 
	  <select id="ciudad" name="ciudad" style="width:300px"  >
             <option value="0">Selecciona Tu ciudad</option>
			     {foreach from=$ciudades item=ciudad}
                      			      {if $ciudad.municipioId == $info.ciudad}
				           <option selected="selected" value="{$ciudad.municipioId}">{$ciudad.nombre} </option>
						   {else}
						   <option value="{$ciudad.municipioId}">{$ciudad.nombre} </option>
						   {/if}
				 {/foreach}
            </select> 
	  
</div>	  
</div>
	  
	  
	  
	  
	  
	  
	  
      <div class="content-settings-row">
            <label for="f1">C&oacute;digo Postal:</label>
            <input type="text" name="postalCode" id="postalCode" value="{$info.postalCode}" />                      
      </div>

     <div class="content-settings-row" align="center">
            <b>.:: Datos de Contacto ::.</b>                     
      </div>
            
      <div class="content-settings-row">
            <label for="f1">Email:</label>
            <input type="text" name="email" id="email" value="{$info.email}" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Tel&eacute;fono: Local</label>
            <input type="text" name="phone" id="phone" value="{$info.phone}" />                      
      </div>

      <div class="content-settings-row">
            <label for="f1">Telefono de Emergencia:</label>
            <input type="text" name="fax" id="fax" value="{$info.fax}" />                      
      </div>

      <div class="content-settings-row">
            <label for="f1">Celular:</label>
            <input type="text" name="mobile" id="mobile" value="{$info.mobile}" />                      
      </div>
      
      <div class="content-settings-row" align="center">
            <b>.:: Datos Laborales ::.</b>                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span>Ocupacion:</label>
            <select name="workplaceOcupation" id="workplaceOcupation" style="width:300px">
            <option value="FUNCIONARIO PUBLICO MUNICIPAL" {if $info.workplaceOcupation == "FUNCIONARIO PUBLICO MUNICIPAL"} selected="selected" {/if}>FUNCIONARIO PUBLICO MUNICIPAL</option>
            <option value="FUNCIONARIO PUBLICO ESTATAL" {if $info.workplaceOcupation == "FUNCIONARIO PUBLICO ESTATAL"} selected="selected" {/if}>FUNCIONARIO PUBLICO ESTATAL</option>
            <option value="FUNCIONARIO PUBLICO FEDERAL" {if $info.workplaceOcupation == "FUNCIONARIO PUBLICO FEDERAL"} selected="selected" {/if}>FUNCIONARIO PUBLICO FEDERAL</option>
            <option value="OTROS" {if $info.workplaceOcupation == "OTROS"} selected="selected" {/if}>OTROS</option>
            </select>
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span>Lugar de Trabajo:</label>
            <input type="text" name="workplace" id="workplace" value="{$info.workplace}" />                      
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span>Domicilio:</label>
            <input type="text" name="workplaceAddress" id="workplaceAddress" value="{$info.workplaceAddress}" />                      
      </div>

 
 
 
 
       <div class="content-settings-row">
            <label for="f1">Pa&iacute;s:</label>
          
			
			<select id="paist" name="paist" style="width:300px" onChange="estado_dependenciat();" >
             <option value="0">Selecciona Tu Pa&iacute;s</option>
			     {foreach from=$paises item=pais}
                      			      {if $pais.paisId == $info.paist}
				           <option selected="selected" value="{$pais.paisId}">{$pais.nombre} </option>
						   {else}
						   <option value="{$pais.paisId}">{$pais.nombre} </option>
						   {/if}
				 {/foreach}
            </select>   
      </div>
	  
	    <div class="content-settings-row">
            <label for="f1">Estado:</label>
            
	 <div id="Statepositiont">
	 <select id="estadot" name="estadot" style="width:300px" onChange="ciudad_dependencia();" >
             <option value="0">Selecciona Tu Estado</option>
			     {foreach from=$estados item=estado}
                      			      {if $estado.estadoId == $info.estadot}
				           <option selected="selected" value="{$estado.estadoId}">{$estado.nombre} </option>
						   {else}
						   <option value="{$estado.estadoId}">{$estado.nombre} </option>
						   {/if}
				 {/foreach}
            </select>
      </div> 			
      </div>
      
	  
	  <div class="content-settings-row">
            <label for="f1">Municipio:</label>
      
     <div id="Cityposition"> 
	  <select id="ciudadt" name="ciudadt" style="width:300px"  >
             <option value="0">Selecciona Tu ciudad</option>
			     {foreach from=$ciudades item=ciudad}
                      			      {if $ciudad.municipioId == $info.ciudadt}
				           <option selected="selected" value="{$ciudad.municipioId}">{$ciudad.nombre} </option>
						   {else}
						   <option value="{$ciudad.municipioId}">{$ciudad.nombre} </option>
						   {/if}
				 {/foreach}
            </select> 
	  
</div>	  
</div>
	  
	  
	  
 
 
 

      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span>Area:</label>
            <input type="text" name="workplaceArea" id="workplaceArea" value="{$info.workplaceArea}" />                      
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span>Puesto:</label>
            <input type="text" name="workplacePosition" id="workplacePosition" value="{$info.workplacePosition}" />                      
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span>Telefono Oficina:</label>
            <input type="text" name="workplacePhone" id="workplacePhone" value="{$info.workplacePhone}" />                      
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span>Correo Electronico:</label>
            <input type="text" name="workplaceEmail" id="workplaceEmail" value="{$info.workplaceEmail}" />                      
      </div>
      
      <div class="content-settings-row" align="center">
            <b>Estudios</b>                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span>Grado Academico:</label>
            <select name="academicDegree" id="academicDegree">
            <option value="UNIVERSITARIO" {if $info.academicDegree == "UNIVERSITARIO"} selected="selected" {/if}>UNIVERSITARIO</option>
            <option value="LICENCIATURA" {if $info.academicDegree == "LICENCIATURA"} selected="selected" {/if}>LICENCIATURA</option>
            <option value="MAESTRIA" {if $info.academicDegree == "MAESTRIA"} selected="selected" {/if}>MAESTRIA</option>
            <option value="DOCTORADO" {if $info.academicDegree == "DOCTORADO"} selected="selected" {/if}>DOCTORADO</option>
            <option value="OTROS" {if $info.academicDegree == "OTROS"} selected="selected" {/if}>OTROS</option>
            </select>
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span>Profesion:</label>
            <select name="profesion" id="profesion" style="width:300px">
            {foreach from=$prof item=item}
            <option value="{$item.profesionId}" {if $info.profesion == $item.profesionId} selected="selected" {/if}>{$item.profesionName}</option>
item{/foreach}
            </select>
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span>Escuela o Institucion  Universitaria:</label>
            <input type="text" name="school" id="school" value="{$info.school}" />                      
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span>Maestria en:</label>
            <input type="text" name="masters" id="masters" value="{$info.masters}" />                      
      </div>
      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span>Escuela o Institucion:</label>
            <input type="text" name="mastersSchool" id="mastersSchool" value="{$info.mastersSchool}" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span>Estudios de Bachillerato:</label>
            <input type="text" name="highSchool" id="highSchool" value="{$info.highSchool}" />                      
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