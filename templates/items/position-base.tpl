{foreach from=$positions item=position}
    <tr>
        <td align="center" class="id">{$position.positionId}</td>
        <td align="center">{$position.clave}</td>
        <td>&nbsp;{$position.name|truncate:20:"..."}</td>
        <td align="center" id="etitl1">{$position.description|truncate:35:"..."}</td>
        <td align="center">
            <img src="images/icons/16/delete.png" class="spanDelete" i id="{$position.positionId}" name="{$position.name}" title="Eliminar" />&nbsp;
          	<img src="images/icons/16/pencil.png" class="spanEdit" id="{$position.positionId}" name="{$position.name}" title="Editar" />
        </td>
    </tr>
{foreachelse}
	<tr>
    	<td colspan="5" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
{/foreach}