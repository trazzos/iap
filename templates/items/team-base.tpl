{foreach from=$teams item=item key=key}
        <tr id="1">
        <td align="center">{$item.teamNumber}</td>
        <td align="center">{$item.controlNumber}</td>
        <td align="left">{$item.lastNamePaterno} {$item.lastNameMaterno} {$item.names}</td>
        <td align="center">
            <a href="{$WEB_ROOT}/config-teams/id/{$id}/delete/{$item.teamNumber}" style="color:#000">Desmantelar Equipo</a>
        </td>
    </tr>
{foreachelse}
	<tr><td colspan="4" align="center">No se encontr&oacute; ning&uacute;n registro.</td></tr>
{/foreach}