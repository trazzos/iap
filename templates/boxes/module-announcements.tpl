<form id="addMajorForm" name="addMajorForm" method="post">
<input type="hidden" id="type" name="type" value="saveAddMajor"/>
<input type="hidden" id="courseModuleId" name="courseModuleId" value="{$myModule.courseModuleId}"/>
<ul id="sort-box" class="sorts">
  <li>              
    <div class="content-in">

			 <div class="content-settings-row-register" align="center">
            <b>.:: Datos del Modulo ::.</b>
      </div>      
      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span> Nombre del Modulo:</label>
            <b>{$myModule.name}</b> | <a href="{$WEB_ROOT}/edit-module/id/{$myModule.subjectModuleId}" title="Editar Modulo" style="color:#000" >Editar Detalle</a> | <a href="{$WEB_ROOT}/view-modules-course/id/{$myModule.courseId}" title="Ver Modulos de Curso" onclick="return parent.GB_show('Ver Modulos', this.href,650,700) " style="color:#000" >Ver Otros Modulos</a>
      </div>
      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span> Perteneciente al Postgrado:</label>
            <b>{$myModule.majorName} {$myModule.subjectName}</b> | <a href="{$WEB_ROOT}/history-subject" title="Ver Curricula" style="color:#000" >Ver Curricula Activa</a>
      </div>

    </div>
   </li>                              
 </ul>    
</form>