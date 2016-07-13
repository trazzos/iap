<form id="editFichaForm" name="editFichaForm" method="post">
<input type="hidden" id="type" name="type" value="saveEditFicha"/>
<input type="hidden" id="id" name="id" value="{$info.userId}"/>
<ul id="sort-box" class="sorts">
  <li>              
    <div class="content-in-popup">
      
      <div class="content-settings-row" align="center">
            <b>.:: Datos Personales ::.</b>
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Carrera Principal:</label>
            <select name="mainMajor" id="mainMajor" type="text">
                {foreach from=$majorList item=major1 key=key}
                    <option value="{$major1.majorId}" {if $major1.majorId == $info.mainMajor} selected="selected" {/if}>{$major1.name}</option>
                {/foreach}
            </select>                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Carrera Secundaria:</label>
            <select name="secondMajor" id="secondMajor" type="text">
                {foreach from=$majorList item=major2 key=key}
                    <option value="{$major2.majorId}" {if $major2.majorId == $info.secondMajor} selected="selected" {/if}>{$major2.name}</option>
                {/foreach}
            </select>                   
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Carrera Terciaria:</label>
            <select name="thirdMajor" id="thirdMajor" type="text">
                {foreach from=$majorList item=major3 key=key}
                    <option value="{$major3.majorId}" {if $major3.majorId == $info.thirdMajor} selected="selected" {/if}>{$major3.name}</option>
                {/foreach}
            </select>                   
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Modalidad:</label>
            	<select name="mode" id="mode">
			    	<option value="1" {if $info.mode == 1}selected{/if}>Escolarizado</option>
      				<option value="2" {if $info.mode == 2}selected{/if}>Semiescolarizado</option>
      				<option value="3" {if $info.mode == 3}selected{/if}>Otro</option>
				</select>                   
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
                <input name="year" type="text" id="year" value="{$info.yearBirthdate}"  style="width:100px" maxlength="4"  />                     
      </div>
                 
      <div class="content-settings-row" align="center">
            <b>.:: Lugar de Nacimiento ::.</b>                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Municipio:</label>
            <input type="text" name="cityBorn" id="cityBorn" value="{$info.cityBorn}" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Estado:</label>
            <input type="text" name="stateBorn" id="stateBorn" value="{$info.stateBorn}" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Pais:</label>
            <input type="text" name="countryBorn" id="countryBorn" value="{$info.countryBorn}" />                      
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
            <label for="f1">Municipio:</label>
            <input type="text" name="city" id="city" value="{$info.city}" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Estado:</label>
            <input type="text" name="state" id="state" value="{$info.state}" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1">C&oacute;digo Postal:</label>
            <input type="text" name="postalCode" id="postalCode" value="{$info.postalCode}" />                      
      </div>
            
      <div class="content-settings-row">
            <label for="f1">* Tel&eacute;fono:</label>
            <input type="text" name="phone" id="phone" value="{$info.phone}" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> CURP:</label>
            <input type="text" name="curp" id="curp" value="{$info.curp}" />                      
      </div>
      
      <div class="content-settings-row" align="center">
            <b>.:: Datos del Padre o Tutor ::.</b>                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Nombre:</label>
            <input type="text" name="tutorNames" id="tutorNames" value="{$info.tutorNames}" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Apellido Paterno:</label>
            <input type="text" name="tutorLastNamePaterno" id="tutorLastNamePaterno" value="{$info.tutorLastNamePaterno}" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Apellido Materno:</label>
            <input type="text" name="tutorLastNameMaterno" id="tutorLastNameMaterno" value="{$info.tutorLastNameMaterno}" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Direcci&oacute;n:</label>
            <input type="text" name="tutorAddress" id="tutorAddress" value="{$info.tutorAddress}" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Tel&eacute;fono:</label>
            <input type="text" name="tutorPhone" id="tutorPhone" value="{$info.tutorPhone}" />                      
      </div>
      
      <div class="content-settings-row" align="center">
            <b>Datos de Escuela de Procedencia</b>                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Nombre:</label>
            <input type="text" name="prevSchNames" id="prevSchNames" value="{$info.prevSchNames}" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Tipo:</label>
            	<select name="prevSchType" id="prevSchType">
          			{foreach from=$schTypes item=item}
                    <option value="{$item.schtypId}" {if $info.prevSchType == $item.schtypId}selected{/if}>{$item.name}</option>
					{/foreach}
				</select>                    
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Clave:</label>
            <input type="text" name="prevSchKey" id="prevSchKey" value="{$info.prevSchKey}" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Modalidad:</label>
            	<select name="prevSchMode" id="prevSchMode">
			    	<option value="1" {if $info.prevSchMode == 1}selected{/if}>Escolarizado</option>
      				<option value="2" {if $info.prevSchMode == 2}selected{/if}>Semiescolarizado</option>
      				<option value="3" {if $info.prevSchMode == 3}selected{/if}>Otro</option>
				</select>                    
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Municipio:</label>
            <input type="text" name="prevSchCity" id="prevSchCity" value="{$info.prevSchCity}" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Estado:</label>
            <input type="text" name="prevSchState" id="prevSchState" value="{$info.prevSchState}" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1">* Promedio:</label>
            <input type="text" name="prevSchAverage" id="prevSchAverage" value="{$info.prevSchAverage}" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Certificado:</label>
            	<select name="prevSchCertified" id="prevSchCertified">
                    <option value="1" {if $info.prevSchCertified == 1}selected{/if}>Si</option>
                    <option value="2" {if $info.prevSchCertified == 2}selected{/if}>No</option>
                </select>                  
      </div>
      
      
      <div style="float:left"><span class="reqField">*</span> Campo requerido</div>
      <div style="padding-right:60px">                 
      <input type="button" class="btnCancel" style="margin-left:10px;" id="btnCancel" />
      <input type="button" class="btn-70-l" id="editFicha" name="editFicha" />                  
      </div>
      
    </div>
   </li>                              
 </ul>    
</form>