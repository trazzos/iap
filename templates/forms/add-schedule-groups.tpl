<div id="divForm">
	<form id="addGroupForm" name="addGroupForm" method="post">
    <fieldset>
      <div class="formLine" style="width:100%; text-align:left">
        <br />
        <div style="width:30%;float:left">* Carrera:</div>
        <select name="majorId" id="majorId">
         <option value="">Seleccione</option>
        {include file="{$DOC_ROOT}/templates/lists/enum-major.tpl"}
        </select>
        <hr />
        <div style="width:30%;float:left">* Semestre:</div>
        <select name="semesterId" id="semesterId">
         <option value="">Seleccione</option>
        {include file="{$DOC_ROOT}/templates/lists/enum-semester.tpl"}
        </select>
        <hr />
        <div style="width:30%;float:left">* Grupo:</div>
        	<div id="grupos">
            <select name="groupId" id="groupId">
             <option value="" selected="selected">Seleccione</option>
            {foreach from=$_groups item=item key=key}
                <option value="{$item.groupId}">{$item.name}</option>        			
            {/foreach}
            </select>
            </div>
             
      </div>
  

      <div style="clear:both"></div>
			<hr />
        <div class="formLine">* Campos requeridos</div>
     	<div class="formLine" style="text-align:center">
      	<input type="button" id="addGroup" name="addGroup" class="buttonForm" value="Agregar" />
     	</div>
        <input type="hidden" id="type" name="type" value="saveAddGroup"/>
  	</fieldset>
	</form>
</div>
