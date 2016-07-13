{foreach from=$__institution item=item key=key}
	<tr>
		<td align="center">{$item.name}</td>
		<td align="center">{$item.name_long}</td>
		<td align="center">{$item.identifier}</td>
		<td align="center">{$item.ubication}</td>
		<td align="center">{$item.ubication_long}</td>
		<td align="center">{$item.phone}</td>
		<td align="center">{$item.fax}</td>
		<td align="center">
            <img src="images/icons/16/pencil.png" class="spanEdit" id="{$item.institutionId}" title="Editar" />
		</td>
	</tr>
{/foreach}
