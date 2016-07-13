<div id="divForm">
	<form id="editScheduleForm" name="editScheduleForm" method="post">
    <fieldset>
      <div class="formLine" style="width:100%; text-align:left">
        <div style="width:30%;float:left">* Nombre:</div><input name="name" id="name" type="text" size="50" value="{$info.name}"/>
        <hr />
       
      </div>
       <div class="formLine">          		
          <div style="width:30%;float:left">Descripcion:</div> 
          <textarea name="description" id="description" cols="50" rows="6">{$info.description}</textarea><br />
			</div>
      <div style="clear:both"></div>
			<hr />
        <div class="formLine">* Campos requeridos</div>
     	<div class="formLine" style="text-align:center">
      	<input type="button" id="editSchedule" name="editSchedule" class="buttonForm" value="Actualizar" />
     	</div>
        <input type="hidden" id="type" name="type" value="saveEditSchedule"/>
        <input type="hidden" id="id" name="id" value="{$info.scheduleId}" />
  	</fieldset>
	</form>
</div>
