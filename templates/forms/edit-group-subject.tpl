<div id="divForm">
	<form id="editGroupForm" name="editGroupForm" method="post">
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
      	<input type="button" id="editGroup" name="editGroup" class="buttonForm" value="Actualizar" />
     	</div>
        <input type="hidden" id="type" name="type" value="saveEditGroup"/>
        <input type="hidden" id="id" name="id" value="{$info.gposubId}" />
  	</fieldset>
	</form>
</div>
