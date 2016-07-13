{foreach from=$inactiveCourses item=subject}
    <tr>
        <td align="center">{$subject.clave}</td>
        <td align="center">{$subject.majorName}</td>
        <td align="center">{$subject.name}</td>
        <td align="center">{$subject.modality}</td>
        <td align="center">{$subject.initialDate|date_format:"%d-%m-%Y"}</td>
        <td align="center">{$subject.finalDate|date_format:"%d-%m-%Y"}</td>
        <td align="center">{$subject.daysToFinish}</td>
        <td align="center">
          	<a href="{$WEB_ROOT}/invoices-student"><img src="{$WEB_ROOT}/images/icons/16/money.png" class="spanEdit" id="d-{$subject.subjectId}" name="d-{$subject.name}" title="Ir a Cobranza" /></a>
        </td>
    </tr>
{foreachelse}
	<tr>
    	<td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
{/foreach}
