<form id="editSubjectForm" name="editSubjectForm" method="post">
<input type="hidden" id="subjectId" name="subjectId" value="{$post.subjectId}"/>
<ul id="sort-box" class="sorts">
  <li>              
    <div class="content-in-popup">
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Selecciona Curricula:</label>
            <select name="subjectId" id="subjectId" style="width:350px">
            {foreach from=$cursos item=curso}
  	          <option value="{$curso.subjectId}">{$curso.majorName} - {$curso.name}</option>
            {/foreach}  
            </select>
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Modalidad:</label>
            <select name="modality" id="modality">
  	          <option value="Local">Local</option>
  	          <option value="Online">Online</option>
            </select>
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Fecha Inicial:</label>
            <input type="text" name="initialDate" id="initialDate" size="10" style="width:100px"/> <a href="javascript:NewCal('initialDate','ddmmyyyy')"><img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span> Fecha Final:</label>
            <input type="text" name="finalDate" id="finalDate" size="10" style="width:100px"/> <a href="javascript:NewCal('finalDate','ddmmyyyy')"><img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span> Dias para terminar:</label>
            <input type="text" name="daysToFinish" id="daysToFinish"/>                      
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Personal Administrativo Asignado:</label>
            <select name="personalId" id="personalId" style="width:250px">
 	          <option value="-1">Seleccione...</option>
            {foreach from=$empleados item=personal}
  	          <option value="{$personal.personalId}" >{$personal.lastname_paterno} {$personal.lastname_materno} {$personal.name}</option>
            {/foreach}  
            </select>
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Activo:</label>
            <select name="active" id="active" style="width:250px">
  	          <option value="Si">Si</option>
  	          <option value="No">No</option>
            </select>
      </div>

			<div class="content-settings-row">
            <label for="f1"><span class="reqField"></span> Grupo:</label>
            <input type="text" name="group" id="group" value="{$post.group}"/>                      
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span> Turno:</label>
            <input type="text" name="turn" id="turn" value="{$post.turn}"/>                      
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span> Ciclo Escolar:</label>
            <input type="text" name="scholarCicle" id="scholarCicle" value="{$post.scholarCicle}"/>                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span> Libro:</label>
            <input type="text" name="libro" id="libro" value="{$post.libro}"/>                      
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span> Folio:</label>
            <input type="text" name="folio" id="folio" value="{$post.folio}"/>                      
      </div>
      
      <div style="float:left"><span class="reqField">*</span> Campo requerido</div>
      <div style="padding-right:60px">                 
      <input type="submit" class="btn-70-l" id="saveEditSubject" name="saveEditSubject" value="." />                  
      </div>
      
    </div>
   </li>                              
 </ul>    
</form>