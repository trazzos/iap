{foreach from=$subjects item=subject}
    <tr>
        <td align="center" class="id">{$subject.subjectId}</td>
        <td align="center">{$subject.clave}</td>
        <td align="center">{$subject.semesterId}</td>
        <td align="left">{$subject.name}</td>
        <td align="center">
            <a href="{$WEB_ROOT}/subject/delete/{$subject.subjectModuleId}"><img src="images/icons/16/delete.png" class="spanModuleDelete" id="d-{$subject.subjectId}" name="d-{$subject.name}" title="Eliminar" /></a> 
          	<a href="{$WEB_ROOT}/edit-module/id/{$subject.subjectModuleId}"><img src="images/icons/16/pencil.png" class="spanEdit" id="d-{$subject.subjectId}" name="d-{$subject.name}" title="Editar" /></a>
        </td>
    </tr>
{foreachelse}
	<tr>
    	<td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
{/foreach}
