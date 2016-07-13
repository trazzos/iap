<div id="divForm">
	<form id="addScheduleGroupForm" name="addScheduleGroupForm" method="post">
		<fieldset>
			<div class="formLine" style="width:100%; text-align:left">
				<div style="width:30%;float:left">Semestre:</div>
                <select name="semesterId" id="semesterId" onchange="load_subjects()">
                <option value="0">Seleccione</option>
                {foreach from=$semesters item=item}
                <option value="{$item.semesterId}">{$item.clave}</option>
                {/foreach}
                </select>               
			</div>
            <hr />
			<div class="formLine" style="width:100%; text-align:left; display:none" id="speciality">
				<div style="width:30%;float:left">Especialidad:</div>                
                <div id="specialities">&nbsp;</div>
                 <hr />               
			</div>
            <div class="formLine" style="width:100%; text-align:left">
				<div style="width:30%;float:left">Materia:</div>                
                <div id="subjects">&nbsp;</div>                
			</div>
            <hr />
            <div class="formLine" style="width:100%; text-align:left">
				<div style="width:30%;float:left">Grupo:</div>
                 <div id="groups">&nbsp;</div>
			</div>
            <hr />
            <div class="formLine" style="width:100%; text-align:left">
				<div style="width:30%;float:left">Docente:</div>
                 <div id="personal">&nbsp;</div>
			</div>
            <hr />            
            <div class="formLine" style="width:100%; text-align:left">
				<div style="width:30%;float:left">Salon:</div>
                 <div id="group">&nbsp;</div>
			</div>
            <hr />          
			<div class="formLine" style="text-align:center">
				<input type="button" id="addSubject" name="addSubject" class="buttonForm" value="Agregar Materia" />
			</div>
            <hr />
              <div class="formLine" style="width:100%; text-align:left">
				<div style="width:30%;float:left">Materias:</div>
                 <div id="personal">&nbsp;</div>
			</div>
            <hr />
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
            <td>
            <select class="textfield" style="width:450px" name="selSubjects" size="6">
            {foreach from=$subjects item=item key=key}
                <option value="{$item.subgpoId}">{$item.name}</option>        			
            {/foreach}           
            </select>
			</td>
            <td>
            	<input type="button" id="delSubject" name="delSubject" class="buttonForm" value="Eliminar Materia" />
            </td>
            </tr>
            </table>
            <div style="clear:both"></div>
			<hr />
			<div class="formLine" style="text-align:center">
				<input type="button" id="saveSchedule" name="saveSchedule" class="buttonForm" value="Guardar Horario" />
			</div>
			<input type="hidden" id="type" name="type" value="saveAddSchedule"/>
		</fieldset>
	</form>
</div>
