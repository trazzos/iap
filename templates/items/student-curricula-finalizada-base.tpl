{foreach from=$finishedCourses item=subject}
    <tr>
        <td align="center">{$subject.clave}</td>
        <td align="center">{$subject.majorName}</td>
        <td align="center">{$subject.name}</td>
        <td align="center">{$subject.modality}</td>
        <td align="center">{$subject.initialDate}</td>
        <td align="center">{$subject.finalDate}</td>
        <td align="center">{$subject.daysToFinish}</td>
        <td align="center">
           {$subject.mark}
        </td>
    </tr>
{foreachelse}
	<tr>
    	<td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
{/foreach}
