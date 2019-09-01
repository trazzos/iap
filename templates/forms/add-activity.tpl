<!-- TinyMCE -->
<script type="text/javascript" src="{$WEB_ROOT}/tinymce/tiny_mce.js"></script>
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
            	<option value="Tarea">Tarea</option>
            	<option value="Examen">Examen</option>
            	<option value="Otro">Otro</option>
            </select>                      
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Fecha Inicial:</label>
            <input type="text" name="initialDate" id="initialDate" value="{$date}" style="width:150px" /><a href="javascript:NewCal('initialDate','ddmmyyyy')"><img src="{$WEB_ROOT}/images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>                      
      </div>

      <div class="content-settings-row">
            <label for="f1">Fecha Final:</label>
            <input type="text" name="finalDate" id="finalDate" value="{$date}" style="width:150px" /><a href="javascript:NewCal('finalDate','ddmmyyyy')"><img src="{$WEB_ROOT}/images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>                      
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Modalidad</label>
            <select id="modality" name="modality">
            	<option value="Individual">Individual</option>
            	<option value="Por Equipo">Por Equipo</option>
            </select>                      
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Titulo:</label>
            <input type="text" name="resumen" id="resumen" value="" maxlength="30"/>
      </div>

      <div class="content-settings-row">
            <label for="f1" style="width:250px"><span class="reqField">*</span> Descripcion:</label>
            <textarea name="description" id="description"></textarea>
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Ponderacion:</label>
            <input type="number" name="ponderation" id="ponderation" value="" maxlength="3"/>
      </div>

      
      <div style="float:left"><span class="reqField">*</span> Campo requerido</div>
      <div style="padding-right:60px">                 
      <input type="submit" class="btn-70-l" id="addMajor" name="addMajor" value="." />                  
      </div>
      
    </div>
   </li>                              
 </ul>    
</form>