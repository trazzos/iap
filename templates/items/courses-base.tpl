<input type="hidden" value="0" id="recarga" name="recarga">
{foreach from=$subjects item=subject}
    <tr>
        <td align="center" class="id">{$subject.courseId}</td>
        <td align="center">{$subject.clave}</td>
        <td align="center">{$subject.majorName}</td>
        <td align="center">{$subject.name}-{$subject.group}</td>
        <td align="center">{$subject.modality}</td>
        <td align="center">{if $subject.initialDate != "0000-00-00"} {$subject.initialDate|date_format:"%d-%m-%Y"}{else} S/F {/if}</td>
        <td align="center">{if $subject.finalDate != "0000-00-00"}  {$subject.finalDate|date_format:"%d-%m-%Y"}  {else} S/F  {/if}   </td>
        <td align="center">{$subject.daysToFinish}</td>  
        <td align="center">
        	{if $docente == 1}
          	{$subject.courseModuleActive}
          {else}
          	{$subject.courseModule}
          {/if}  
          /{$subject.modules} 
          
        {*} Flecha verde {*}{if ($docente == 1 AND $subject.courseModuleActive > 0) || !$docente}
        	<a href="{$WEB_ROOT}/view-modules-course/id/{$subject.courseId}" title="Ver Modulos de Curso" onclick="return parent.GB_show('Ver Modulos', this.href,650,700) " style="color:#000" ><img src="{$WEB_ROOT}/images/arrow.png" title="Ver Modulos del Curso" /></a>
        	{*}<a href="{$WEB_ROOT}/view-modules-course/id/{$subject.courseId}" title="Ver Modulos de Curso" onclick="return GB_myShow('xxx', this.href, 300,300, [COLOR='Red'][B]false[/B][/COLOR])"  style="color:#000" ><img src="{$WEB_ROOT}/images/arrow.png" title="Ver Modulos del Curso" /></a>{*}
          {/if}
          
        	{if !$docente}
          <a href="{$WEB_ROOT}/add-modules-course/id/{$subject.courseId}" title="Ver Modulos de Curso" onclick="return parent.GB_show('Agregar Modulo', this.href,490,785) " style="color:#000" ><img src="{$WEB_ROOT}/images/icons/add.png" title="Agregar Modulo a Curso" /></a>
          {/if}
        </td>
        <td align="center"><span style="cursor:pointer" class="spanActive" onclick="VerGrupo({$subject.courseId});" title="Alumnos" id="{$subject.courseId}">{$subject.alumnActive}</span> / <span style="cursor:pointer" class="spanInactive" onclick="VerGrupoInactivo({$subject.courseId});"  id="{$subject.courseId}">{$subject.alumnInactive}</span></td>
        <td align="center">{$subject.active}</td>
        {if !$docente}
        <td align="center">
            <img src="{$WEB_ROOT}/images/icons/16/delete.png" class="spanDelete" id="d-{$subject.courseId}" name="d-{$subject.name}" title="Eliminar" />&nbsp;
			{if $subject.majorName=="ESPECIALIDAD" || $subject.majorName=="MAESTRIA"}<img src="{$WEB_ROOT}/images/icons/16/matricula.gif" onclick="generar({$subject.courseId},'{$subject.majorName}');" title="Generar Matriculas" width="16px" height="16px" />&nbsp;{/if}
          	<a href="{$WEB_ROOT}/edit-course/id/{$subject.courseId}" onclick="return parent.GB_show('Editar Instancia', this.href,450,700) "><img src="{$WEB_ROOT}/images/icons/16/pencil.png" class="spanEdit" id="d-{$subject.subjectId}" name="d-{$subject.name}" title="Editar" /></a>
          	<a href="{$WEB_ROOT}/ver-sabana-course/id/{$subject.courseId}" onclick="return parent.GB_show('Sabana de Calificaciones', this.href,450,700) "><img src="{$WEB_ROOT}/images/icons/16/score.gif" class="spanEdit" id="d-{$subject.subjectId}" name="d-{$subject.name}" title="Sabana de Calificaciones" /></a>
            
            {*if $subject.majorId == 5 || $subject.majorId == 3 || $subject.majorId == 2*}
          	<a href="{$WEB_ROOT}/diplomas.php?id={$subject.courseId}" target="_blank" ><img src="{$WEB_ROOT}/images/icons/16/diploma.jpg" class="spanEdit" id="d-{$subject.subjectId}" name="d-{$subject.name}" title="Impresion de Diplomas" /></a>
            {*/if*}
            
          	<a href="{$WEB_ROOT}/reporte.php?id={$subject.courseId}" target="_blank" ><img src="{$WEB_ROOT}/images/chart.png" class="spanEdit" id="d-{$subject.subjectId}" name="d-{$subject.name}" title="Reporte General" /></a>

        </td>
         {/if}   
    </tr>
{foreachelse}
	<tr>
    	<td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
{/foreach}
