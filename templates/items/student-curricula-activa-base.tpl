{foreach from=$activeCourses item=subject}
    <tr>
        <td align="center">{$subject.clave}</td>
        <td align="center">{$subject.majorName}</td>
        <td align="center">{$subject.name}</td>
        <td align="center">{$subject.modality}</td>
        <td align="center">{$subject.initialDate|date_format:"%d-%m-%Y"}</td>
        <td align="center">{$subject.finalDate|date_format:"%d-%m-%Y"}</td>
        <td align="center">{$subject.daysToFinish}</td>
        <td align="center">{$subject.payments}</td>
        <td align="center">{$subject.courseModule}
        </td>
        <td align="center">
        	<a href="{$WEB_ROOT}/view-modules-course-student/id/{$subject.courseId}" title="Ver Modulos de Curso" onclick="return parent.GB_show('Ver Modulos', this.href,650,700) " style="color:#000" ><img src="{$WEB_ROOT}/images/arrow.png" title="Ver Modulos del Curso" /></a>
        </td>
    </tr>
{foreachelse}
	<tr>
    	<td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
{/foreach}
