<form id="addScheduleStudentForm" name="addScheduleStudentForm" method="post">
<input type="hidden" id="type" name="type" value="saveAddSchedule"/>
<ul id="sort-box" class="sorts">
  <li>              
    <div class="content-in-popup">
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Semestre:</label>
             	<select name="semesterId" id="semesterId" onchange="load_subjects()">
                <option value="0">Seleccione</option>
                {foreach from=$semesters item=item}
                <option value="{$item.semesterId}">{$item.clave}</option>
                {/foreach}
                </select>                       
      </div>
      
      <div class="content-settings-row" style="display:none" id="speciality">
            <label for="f1"><span class="reqField">*</span> Especialidad:</label>
            <div id="specialities">&nbsp;</div>                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Materia:</label>
            <div id="subjects">&nbsp;</div>                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Grupo:</label>
            <div id="groups">&nbsp;</div>                     
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Docente:</label>
            <div id="personal">&nbsp;</div>                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Sal&oacute;n:</label>
            <div id="group">&nbsp;</div>                      
      </div>
            
      <div class="_content-settings-row" align="center">
      	<input type="button" id="addSubject" name="addSubject" value="Agregar Materia" style="height:30px; width:150px" />                      
      </div>
            
      <div class="_content-settings-row" style="border-bottom:1px dotted #CCCCCC; border-top:1px dotted #CCCCCC; width:630px">
      Materias:
           <table width="90%" border="0" cellpadding="0" cellspacing="0">
            <tr>
            <td>
            <select class="textfield" style="width:350px" name="selSubjects" size="6">
            {foreach from=$subjects item=item key=key}
                <option value="{$item.subgpoId}">{$item.name}</option>        			
            {/foreach}           
            </select>
			</td>
            <td>
            	<input type="button" id="delSubject" name="delSubject" style="height:30px; width:150px" value="Eliminar Materia" />
            </td>
            </tr>
            </table>  
                             
      </div>
            
      <div style="float:left"><span class="reqField">*</span> Campo requerido</div>
      <div style="padding-right:60px">                 
      <input type="button" class="btnCancel" style="margin-left:10px;" id="btnCancel" />
      <input type="button" class="btn-70-l" id="saveSchedule" name="saveSchedule" />                  
      </div>
      
    </div>
   </li>                              
 </ul>    
</form>