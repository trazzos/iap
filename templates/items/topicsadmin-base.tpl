{foreach from=$forum item=topic}
    <tr>
        <td align="center" class="id">{$topic.subject|truncate:30:"..."}</td>
        <td align="left">{$topic.descripcion}</td>
        <td align="center">
		     <a href="{$WEB_ROOT}/forumsub-modules-student/id/{$id}/topicId/{$topic.topicId}"><img src="{$WEB_ROOT}/images/arrow.png" class="spanEdit" id="e-{$position.positionId}" name="e-{$position.name}" title="Entrar al Foro" /></a>

            {if !$docente}
            <a href="javascript:void(0)"  onClick="deleteTopic('{$topic.topicId}')">
                <img src="{$WEB_ROOT}/images/icons/16/delete.png"  title="Eliminar" />&nbsp;
            </a>
            {/if}

        </td>
    </tr>
{foreachelse}
	<tr>
    	<td colspan="5" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
{/foreach}