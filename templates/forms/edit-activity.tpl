<!-- TinyMCE -->
<script type="text/javascript">
	tinyMCE.init({
      mode : "textareas",
      theme : "silver",
      skin : "oxide",
      menubar:false,
	});
</script>
<!-- /TinyMCE -->
<form id="addMajorForm" name="addMajorForm" method="post">
<input type="hidden" id="type" name="type" value="saveAddMajor"/>
<ul id="sort-box" class="sorts">
  <li>              
    <div class="content-in-small">
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Tipo de Actividad</label>
            <select id="activityType" name="activityType">
            	<option value="Tarea" {if $actividad.activityType == "Tarea"} selected="selected"{/if}>Tarea</option>
            	<option value="Examen" {if $actividad.activityType == "Examen"} selected="selected"{/if}>Examen</option>
            	<option value="Otro" {if $actividad.activityType == "Otro"} selected="selected"{/if}>Otro</option>
            </select>                      
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Fecha Inicial:</label>
            <input type="text" name="initialDate" id="initialDate" value="{$actividad.initialDate}" style="width:150px" /><a href="javascript:NewCal('initialDate','ddmmyyyy')"><img src="{$WEB_ROOT}/images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>                      
      </div>

      <div class="content-settings-row">
            <label for="f1">Fecha Final:</label>
            <input type="text" name="finalDate" id="finalDate" value="{$actividad.finalDate}" style="width:150px" /><a href="javascript:NewCal('finalDate','ddmmyyyy')"><img src="{$WEB_ROOT}/images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>                      
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Modalidad</label>
            <select id="modality" name="modality">
            	<option value="Individual" {if $actividad.modality == "Individual"} selected="selected"{/if}>Individual</option>
            	<option value="Por Equipo" {if $actividad.modality == "Por Equipo"} selected="selected"{/if}>Por Equipo</option>
            </select>                      
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Titulo:</label>
            <input type="text" name="resumen" id="resumen" value="{$actividad.resumen}" maxlength="30"/>
      </div>

      <div class="content-settings-row">
            <label for="f1" style="width:250px"><span class="reqField">*</span> Descripcion:</label>
            <textarea name="description" id="description" style="width:150px">{$actividad.description}</textarea>
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Actividad Requerida:</label>
            <select id="requiredActivity" name="requiredActivity">
            	<option value="0">Ninguna</option>
            {foreach from=$actividades item=item}
            	<option value="{$item.activityId}" {if $actividad.requiredActivity == $item.activityId} selected="selected"{/if}>{$item.resumen}</option>
            {/foreach}
            </select>                      
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Ponderacion:</label>
            <input type="number" name="ponderation" id="ponderation" value="{$actividad.ponderation}" maxlength="3"/>
      </div>


      
      <div style="float:left"><span class="reqField">*</span> Campo requerido</div>
      <div style="padding-right:60px">                 
      <input type="submit" class="btn-70-l" id="addMajor" name="addMajor" value="." />                  
      </div>
      
    </div>
   </li>                              
 </ul>    
</form>