{foreach from=$__periodo item=item key=key}
	<tr>
		<td align="center" class="id">{$item.periodoId}</td>
		<td align="center">{$item.identifier}</td>
		<td align="center">{$item.name}</td>
		<td align="center">{$item.starts}</td>
		<td align="center">{$item.ends}</td>
		<td align="center">{$item.fichasStarts}</td>
		<td align="center">{$item.fichasEnds}</td>
        {if $item.active == "yes"}
			<td align="center">SI</td>
        {else}
			<td align="center">NO</td>
        {/if}
		<td align="center">            
            <img src="images/icons/16/delete.png" class="spanDelete" id="{$item.periodoId}" title="Eliminar" />&nbsp;
          	<img src="images/icons/16/pencil.png" class="spanEdit" id="{$item.periodoId}" title="Editar" />
		</td>
	</tr>
{foreachelse}
    <tr>
    	<td colspan="9" align="center">Ning&uacute;n registro encontrado.</td>
    </tr>
{/foreach}