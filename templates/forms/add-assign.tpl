<div id="divForm">
	<form id="addAssignForm" name="addAssignForm" method="post">
    <fieldset>
      <div class="formLine" style="width:100%; text-align:left">
        <br />
        <div style="width:30%;float:left">* Docente:</div>
        <select name="personalId" id="personalId">
         <option value="">Seleccione</option>
        {include file="{$DOC_ROOT}/templates/lists/enum-personal.tpl"}
        </select>
        <hr />
        <div style="width:30%;float:left">* Semestre:</div>
        <select name="semesterId" id="semesterId">
         <option value="">Seleccione</option>
        {include file="{$DOC_ROOT}/templates/lists/enum-semester.tpl"}
        </select>
        <hr />
        <div style="width:30%;float:left">* Especialidad:</div>
        <div id="specialities">       
        {include file="{$DOC_ROOT}/templates/lists/list-speciality.tpl"}
        </div>
        <hr />
        <div style="width:30%;float:left">* Materia:</div>
        <div id="subjects">       
        {include file="{$DOC_ROOT}/templates/lists/list-subject.tpl"}
        </div>
        <hr />
         <div style="width:30%;float:left">* Grupos:</div>
        <div id="groups">       
        {include file="{$DOC_ROOT}/templates/lists/opt-group.tpl"}
        </div>
        <hr />
      </div>
      
       <div class="formLine">          		
          <div style="width:30%;float:left">* Horas:</div> 
          <input name="hours" id="hours" type="text" size="50"/><br />
			</div>
      <div style="clear:both"></div>
			<hr />
        <div class="formLine">* Campos requeridos</div>
     	<div class="formLine" style="text-align:center">
      	<input type="button" id="addAssign" name="addAssign" class="buttonForm" value="Agregar" />
     	</div>
        <input type="hidden" id="type" name="type" value="saveAddAssign"/>
  	</fieldset>
	</form>
</div>
