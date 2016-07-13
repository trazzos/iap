{foreach from=$profesions item=position}
    <tr>
        <td align="center" class="id">{$position.profesionId}</td>
        <td>&nbsp;{$position.profesionName|truncate:50:"..."}</td>
        <td align="center">
            <img src="images/icons/16/delete.png" class="spanDelete" i id="d-{$position.profesionId}" name="d-{$position.profesionName}" title="Eliminar" />&nbsp;
          	<img src="images/icons/16/pencil.png" class="spanEdit" id="e-{$position.profesionId}" name="e-{$position.profesionName}" title="Editar" />
        </td>
    </tr>
{foreachelse}
	<tr>
    	<td colspan="5" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
{/foreach}