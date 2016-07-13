<div id="divForm">
	<form id="addScheduleForm" name="addScheduleForm" method="post">
    <fieldset>
      <div class="formLine" style="width:100%; text-align:left">
        <div style="width:30%;float:left">* Nombre:</div><input name="name" id="name" type="text" size="50"/>
        <hr />
       
      </div>
       <div class="formLine">          		
          <div style="width:30%;float:left">Descripcion:</div> 
          <textarea name="description" id="description" cols="50" rows="6"></textarea><br />
			</div>
      <div style="clear:both"></div>
			<hr />
        <div class="formLine">* Campos requeridos</div>
     	<div class="formLine" style="text-align:center">
      	<input type="button" id="addSchedule" name="addSchedule" class="buttonForm" value="Agregar" />
     	</div>
        <input type="hidden" id="type" name="type" value="saveAddSchedule"/>
  	</fieldset>
	</form>
</div>
