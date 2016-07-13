<form id="addMajorForm" name="addMajorForm" action="{$WEB_ROOT}/edit-modules-course/id/{$id}" method="post" enctype="multipart/form-data">
<input type="hidden" id="type" name="type" value="saveAddMajor"/>
<input type="hidden" id="courseModuleId" name="courseModuleId" value="{$myModule.courseModuleId}"/>
<ul id="sort-box" class="sorts">
  <li>              


 <div class="content-settings-row-register" align="right">
            <b><a href="{$WEB_ROOT}/view-modules-student/id/{$myModule.courseModuleId}/vp/1" target="_blank" onClick="window.open(this.href, this.target, 'fullscreen,scrollbars'); return false;">.:: Vista previa del M&oacute;dulo ::.</a></b>
      </div>     

			 <div class="content-settings-row-register" align="center">
            <b>.:: Datos del M&oacute;dulo ::.</b>
      </div>     
	  
	  
		  
	  
	  
	  
      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span> Perteneciente al (a la) {$myModule.majorName}:</label>
            <b> {$myModule.subjectName}</b> 
            {if !$docente}| <a href="{$WEB_ROOT}/history-subject" title="Ver Curricula" style="color:#000" >Ver Curricula Activa</a>{/if}
      </div>
      
      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span> Nombre del M&oacute;dulo:</label>
            <b>{$myModule.name}</b> 
            || <a href="{$WEB_ROOT}/edit-module/id/{$myModule.subjectModuleId}/course/{$myModule.courseModuleId}" title="Editar Modulo" style="color:#000" >Editar Detalle</a> 
             {if !$docente}|| <a href="{$WEB_ROOT}/view-modules-course/id/{$myModule.courseId}" title="Ver Modulos de Curso" onclick="return parent.GB_show('Ver Modulos', this.href,650,700) " style="color:#000" >Ver Otros Modulos</a>
            {/if}
      </div>

      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span> Fecha Inicial:</label>
            {if $docente}
							{$myModule.initialDate}            
            {else}
	            <input type="text" name="initialDate" id="initialDate" value="{$myModule.initialDate}" style="width:150px" /><a href="javascript:NewCal('initialDate','ddmmyyyy')"><img src="{$WEB_ROOT}/images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>                      
            {/if}
      </div>

      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span> Fecha Final:</label>
            {if $docente}
							{$myModule.finalDate}            
            {else}
							<input type="text" name="finalDate" id="finalDate" value="{$myModule.finalDate}" style="width:150px" /><a href="javascript:NewCal('finalDate','ddmmyyyy')"><img src="{$WEB_ROOT}/images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>     
            {/if}
      </div>

      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span> Dias para Terminar:</label>
            {if $docente}
							{$myModule.daysToFinish}
            {else}
            <input type="text" name="daysToFinish" id="daysToFinish" value="{$myModule.daysToFinish}" style="width:150px" />
            {/if}
      </div>
      
      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span> Activo:</label>
            {if $docente}
							{$myModule.active}
            {else}
            <select id="active" name="active">
            	<option value="si" {if $myModule.active == "si"} selected="selected"{/if}>Si</option>
            	<option value="no" {if $myModule.active == "no"} selected="selected"{/if}>no</option>
            </select>                      
            {/if}
      </div>


      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span> Personal Administrativo Asignado:</label>
            {if $docente}
              {foreach from=$empleados item=personal}
                {if $myModule.access.0 == $personal.personalId} {$personal.lastname_paterno} {$personal.lastname_materno} {$personal.name}
                {/if}
              {/foreach}  
            {else}
            <select name="personalId" id="personalId" style="width:250px">
 	          <option value="-1">Seleccione...</option>
            {foreach from=$empleados item=personal}
  	          <option value="{$personal.personalId}" {if $myModule.access.0 == $personal.personalId} selected="selected"{/if}>{$personal.lastname_paterno} {$personal.lastname_materno} {$personal.name}</option>
            {/foreach}  
            </select>
            {/if}
      </div>

      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span> Docente Asignado:</label>
            {if $docente}
              {foreach from=$empleados item=personal}
                {if $myModule.access.1 == $personal.personalId} {$personal.lastname_paterno} {$personal.lastname_materno} {$personal.name}
                {/if}
              {/foreach}  
            {else}
           <select name="teacherId" id="teacherId" style="width:250px">
 	          <option value="-1">Seleccione...</option>
            {foreach from=$empleados item=personal}
  	          <option value="{$personal.personalId}" {if $myModule.access.1 == $personal.personalId} selected="selected"{/if}>{$personal.lastname_paterno} {$personal.lastname_materno} {$personal.name}</option>
            {/foreach}  
            </select>
            {/if}
            
      </div>

      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span> Tutor Asignado:</label>
            {if $docente}
              {foreach from=$empleados item=personal}
                {if $myModule.access.2 == $personal.personalId} {$personal.lastname_paterno} {$personal.lastname_materno} {$personal.name}
                {/if}
              {/foreach}  
            {else}
            <select name="tutorId" id="tutorId" style="width:250px">
 	          <option value="-1">Seleccione...</option>
            {foreach from=$empleados item=personal}
  	          <option value="{$personal.personalId}" {if $myModule.access.2 == $personal.personalId} selected="selected"{/if}>{$personal.lastname_paterno} {$personal.lastname_materno} {$personal.name}</option>
            {/foreach}  
            </select>
            {/if}
      </div>

      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span> Extra Asignado:</label>
            {if $docente}
              {foreach from=$empleados item=personal}
                {if $myModule.access.3 == $personal.personalId} {$personal.lastname_paterno} {$personal.lastname_materno} {$personal.name}
                {/if}
              {/foreach}  
            {else}
            <select name="extraId" id="extraId" style="width:250px">
 	          <option value="-1">Seleccione...</option>
            {foreach from=$empleados item=personal}
  	          <option value="{$personal.personalId}" {if $myModule.access.3 == $personal.personalId} selected="selected"{/if}>{$personal.lastname_paterno} {$personal.lastname_materno} {$personal.name}</option>
            {/foreach}  
            </select>
            {/if}
      </div>

			{if !$docente}
      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span> Archivo de Presentaci&oacute;n (.swf):</label>
            <input type="file" name="presentacion" id="presentacion" />
     {if $existepre==1}&nbsp; &nbsp;  <a target="_blank" href="{$WEB_ROOT}/flash/{$nombrePre}">{$nombrePre} </a> &nbsp; &nbsp;  <a href="{$WEB_ROOT}/edit-modules-course/id/{$moduleCourseId}/e/2" >Eliminar</a> {/if}   
   </div>

      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span> Calendario (.jpg):</label>
            <input type="file" name="calendario" id="calendario" />
			{if $existecal==1}&nbsp; &nbsp;  <a target="_blank" href="{$WEB_ROOT}/calendario/{$nombreCal}">{$nombreCal} </a> &nbsp; &nbsp;  <a href="{$WEB_ROOT}/edit-modules-course/id/{$moduleCourseId}/e/1" >Eliminar</a> {/if}
      </div>
      {/if}

      {if !$docente}
      <div style="float:left"><span class="reqField">*</span> Campo requerido</div>
      <div style="padding-right:60px">                 
      <input type="button" class="btn-70-delete" id="addMajor" name="addMajor" value="." onclick="DeleteModuleFromCourse({$myModule.courseModuleId})" />
      <input type="submit" class="btn-70-l" id="addMajor" name="addMajor" value="." />
      </div>
      {/if}
      
			 <div class="content-settings-row-register" align="center">
            <b>.:: Grupo ::.</b><br />
	        <a href="{$WEB_ROOT}/config-teams/id/{$myModule.courseModuleId}" onclick="return parent.GB_show('Configurar Equipos', this.href,650,700) " style="color:#000000">&raquo; Configurar Equipos</a>
            
          <div id="tblContent">{include file="lists/group.tpl"}</div>
            
      </div>      
      
	  	
	  
			 <div class="content-settings-row-register" align="center">
            <b>.:: Actividades ::.</b>
				<div style="text-align:left">Ponderaci&oacute;n Total del Modulo: <b>{$totalPonderation}%</b>
        {if $totalPonderation < 100}
        <span style="color:#C00"> La suma de las ponderaciones de las actividades es menor a 100%. Se recomienda que sea 100%</span>
        {/if}
        {if $totalPonderation > 100}
        <span style="color:#C00"> La suma de las ponderaciones de las actividades es mayor a 100%. Se recomienda que sea 100%</span>
        {/if}        </div>
	        <a href="{$WEB_ROOT}/add-activity/id/{$myModule.courseModuleId}" onclick="return parent.GB_show('Agregar Actividad', this.href,650,700) "><div class="btnAdd" id="btnAddSubject"></div></a>
          
          <div id="tblContent-activities">{include file="lists/activities.tpl"}</div>
      </div>      

			 <div class="content-settings-row-register" align="center">
            <b>.:: Recursos de Apoyo ::.</b>
	        <a href="{$WEB_ROOT}/add-resource/id/{$myModule.courseModuleId}" onclick="return parent.GB_show('Agregar Recurso', this.href,250,700) "><div class="btnAdd" id="btnAddSubject"></div></a>
          
          <div id="tblContentResources">{include file="lists/resources.tpl"}</div>
      </div>      


			 <div class="content-settings-row-register" align="center">
            <b>.:: Avisos ::.</b>
	        <a href="{$WEB_ROOT}/add-noticia/id/{$myModule.courseModuleId}" onclick="return parent.GB_show('Agregar Noticia', this.href,350,700) "><div class="btnAdd" id="btnAddSubject"></div></a>
          
          <div id="tblContentResources" style="text-align:left">{include file="lists/module-announcements.tpl"}</div>
      </div>      	  	  	
	  <div class="content-settings-row-register" align="center">   
	  <b>.:: Foros ::.</b>		
	  <!-- <a href="{$WEB_ROOT}/add-topic/id/{$myModule.courseId}"  onclick="return parent.GB_show('Agregar Topico', this.href,450,700) "><div class="btnAdd" id="btnAddSubject"></div></a>-->                
	  <div id="tblContent">{include file="lists/topics-admin.tpl"}</div>
	  <br />{*}	{if $coursesCount}
	  <div id="pagination" class="lnkPages"> 
	  {include file="footer-pages-links.tpl"}  
      </div>        {/if} 
	  {*}   
	  </div>   
      
   
   </li>                              
 </ul>    
</form>