{foreach from=$schedule_time item=item key=key}
	<tr>
		<td align="center" class="id">{$item.schtimeId}</td>
		<td align="center">{$item.hrStart}</td>
		<td align="center">{$item.hrEnd}</td>
        <td align="center">{if $item.free_time}Si{else}No{/if}</td>
        <td>&nbsp;{$item.description}</td>
		<td>&nbsp;</td>
        <td align="center">            
            <img src="images/icons/16/delete.png" class="spanDelete" id="{$item.schtimeId}" title="Eliminar" />&nbsp;
          	<img src="images/icons/16/pencil.png" class="spanEdit" id="{$item.schtimeId}" title="Editar" />
		</td>
	</tr>
{foreachelse}
<tr><td colspan="7" align="center">No se encontraron registros</td></tr>
{/foreach}
