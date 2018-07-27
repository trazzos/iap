{foreach from=$noTeam item=item key=key}
        <tr id="1">
        <td align="center">{$item.controlNumber}</td>
        <td align="left">{$item.lastNamePaterno} {$item.lastNameMaterno} {$item.names}</td>
        <td align="center">
            <input type="checkbox" name="inTeam[]" name="inTeam[]" value="{$item.alumnoId}" />
        </td>
    </tr>
{foreachelse}
	<tr><td colspan="4" align="center">No se encontr&oacute; ning&uacute;n registro.</td></tr>
{/foreach}

        <tr>
        <td colspan="4" align="center">
            <input type="submit" name="Enviar" name="Enviar" value="Crear Equipo con Alumnos Seleccionados" />
        </td>
    </tr>
