<div id="divForm">
	<form id="editGroupForm" name="editGroupForm" method="post">
    <fieldset>
    <div class="formLine" style="width:100%; text-align:left">
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
                <option value="{$item.groupId}" {if $info.groupId == $item.groupId}selected{/if}>{$item.clave}</option>        			
            {/foreach}
            </select>
            </div>
        
      </div>
     
	     <div style="clear:both"></div>
			<hr />
        <div class="formLine">* Campos requeridos</div>
     	<div class="formLine" style="text-align:center">
      	<input type="button" id="editGroup" name="editGroup" class="buttonForm" value="Actualizar" />
     	</div>
        <input type="hidden" id="type" name="type" value="saveEditGroup"/>
        <input type="hidden" id="id" name="id" value="{$info.scheduleGroupId}" />
  	</fieldset>
	</form>
</div>
