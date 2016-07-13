<form id="addMajorForm" name="addMajorForm" method="post">
<input type="hidden" id="type" name="type" value="saveAddMajor"/>
<ul id="sort-box" class="sorts">
  <li>              
    <div class="content-in-small">
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Agregar un nuevo Modulo</label>
            <select id="subjectModuleId" name="subjectModuleId" style="width:350px">
            {foreach from=$modules item=item}
            	<option value="{$item.subjectModuleId}">CUAT. {$item.semesterId} {$item.name}</option>
            {/foreach}
            </select>                      
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Fecha Inicial:</label>
            <input type="text" name="initialDate" id="initialDate" value="{$date}" style="width:150px" /><a href="javascript:NewCal('initialDate','ddmmyyyy')"><img src="{$WEB_ROOT}/images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>                      
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span> Fecha Final:</label>
            <input type="text" name="finalDate" id="finalDate" value="{$date}" style="width:150px" /><a href="javascript:NewCal('finalDate','ddmmyyyy')"><img src="{$WEB_ROOT}/images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>                      
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span> Dias para Terminar:</label>
            <input type="text" name="daysToFinish" id="daysToFinish" value="" style="width:150px" />
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Activo:</label>
            <select id="active" name="active">
            	<option value="si">Si</option>
            	<option value="no">no</option>
            </select>                      
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Personal Administrativo Asignado:</label>
            <select name="personalId" id="personalId" style="width:250px">
 	          <option value="-1">Seleccione...</option>
            {foreach from=$empleados item=personal}
  	          <option value="{$personal.personalId}" {if $post.access.0 == $personal.personalId} selected="selected"{/if}>{$personal.lastname_paterno} {$personal.lastname_materno} {$personal.name}</option>
            {/foreach}  
            </select>
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Docente Asignado:</label>
            <select name="teacherId" id="teacherId" style="width:250px">
 	          <option value="-1">Seleccione...</option>
            {foreach from=$empleados item=personal}
  	          <option value="{$personal.personalId}" {if $post.access.0 == $personal.personalId} selected="selected"{/if}>{$personal.lastname_paterno} {$personal.lastname_materno} {$personal.name}</option>
            {/foreach}  
            </select>
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span> Tutor Asignado:</label>
            <select name="tutorId" id="tutorId" style="width:250px">
 	          <option value="-1">Seleccione...</option>
            {foreach from=$empleados item=personal}
  	          <option value="{$personal.personalId}" {if $post.access.0 == $personal.personalId} selected="selected"{/if}>{$personal.lastname_paterno} {$personal.lastname_materno} {$personal.name}</option>
            {/foreach}  
            </select>
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span> Extra Asignado:</label>
            <select name="extraId" id="extraId" style="width:250px">
 	          <option value="-1">Seleccione...</option>
            {foreach from=$empleados item=personal}
  	          <option value="{$personal.personalId}" {if $post.access.0 == $personal.personalId} selected="selected"{/if}>{$personal.lastname_paterno} {$personal.lastname_materno} {$personal.name}</option>
            {/foreach}  
            </select>
      </div>

      
      <div style="float:left"><span class="reqField">*</span> Campo requerido</div>
      <div style="padding-right:60px">                 
      <input type="submit" class="btn-70-l" id="addMajor" name="addMajor" value="." />                  
      </div>
      
    </div>
   </li>                              
 </ul>    
</form>