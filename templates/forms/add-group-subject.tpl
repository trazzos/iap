<div id="divForm">
	<form id="addGroupForm" name="addGroupForm" method="post">
    <fieldset>
      <div class="formLine" style="width:100%; text-align:left">
      <br />
        <div style="width:30%;float:left">* Materia:</div>
        <select name="subjectId" id="subjectId">
         <option value="">Seleccione</option>
        {include file="{$DOC_ROOT}/templates/lists/enum-subject.tpl"}
        </select>
        <hr />       
      </div>
      
      <div style="clear:both"></div>
		
        <div class="formLine">* Campos requeridos</div>
     	<div class="formLine" style="text-align:center">
      	<input type="button" id="addGroup" name="addGroup" class="buttonForm" value="Asignar" />
     	</div>
        <input type="hidden" id="groupId" name="groupId" value="{$groupId}" />
        <input type="hidden" id="type" name="type" value="saveAddGroup"/>
  	</fieldset>
	</form>
</div>
