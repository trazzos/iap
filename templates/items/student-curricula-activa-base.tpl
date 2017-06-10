{foreach from=$activeCourses item=subject}
    <tr>
        <td align="center">{$subject.clave}</td>
        <td align="center">{$subject.majorName}</td>
        <td align="center">{$subject.name}</td>
        <td align="center">{$subject.modality}</td>
        <td align="center">{$subject.initialDate|date_format:"%d-%m-%Y"}</td>
        <td align="center">{$subject.finalDate|date_format:"%d-%m-%Y"}</td>
        <td align="center">{$subject.courseModule}
        </td>
        <td align="center">
            <a href="{$WEB_ROOT}/graybox.php?page=view-modules-course-student&id={$subject.courseId}" title="Ver Módulos" data-target="#ajax" data-toggle="modal" style="color:#000" ><img src="{$WEB_ROOT}/images/arrow.png" title="Ver Módulos" /></a>
        </td>
    </tr>
{foreachelse}
	<tr>
    	<td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
{/foreach}
