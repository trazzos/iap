{foreach from=$subjects item=subject}
    <tr>
        <td align="center" class="id">{$subject.subjectId}</td>
        <td align="center">{$subject.majorName}</td>
        <td align="center">{$subject.clave}</td>
        <td align="left">{$subject.name}</td>
        <td align="left">{$subject.modules}
        	<img src="{$WEB_ROOT}/images/icons/16/document--plus.png" class="spanViewModule" id="d-{$subject.subjectId}" name="d-{$subject.name}" title="Ver Modulos" /></a>
</td>
        <td align="center">
            <img src="{$WEB_ROOT}/images/icons/16/delete.png" class="spanDelete" id="d-{$subject.subjectId}" name="d-{$subject.name}" title="Eliminar" />&nbsp;
          	<a href="{$WEB_ROOT}/edit-subject/id/{$subject.subjectId}" onclick="return parent.GB_show('Editar Curricula', this.href,650,700)"><img src="{$WEB_ROOT}/images/icons/16/pencil.png" class="spanEdit" id="d-{$subject.subjectId}" name="d-{$subject.name}" title="Editar" /></a>
        </td>
    </tr>
{foreachelse}
	<tr>
    	<td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
{/foreach}
