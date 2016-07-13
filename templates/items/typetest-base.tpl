{foreach from=$__typetest item=item key=key}
	<tr>
		<td align="center" class="id">{$item.testId}</td>
		<td align="center">{$item.identifier}</td>
		<td align="center">{$item.typetest}</td>
		{if $item.regularization == "yes"}
			<td align="center">SI</td>
		{else}
			<td align="center">NO</td>
		{/if}
		<td align="center">            
            <img src="images/icons/16/delete.png" class="spanDelete" id="{$item.testId}" title="Eliminar" />&nbsp;
          	<img src="images/icons/16/pencil.png" class="spanEdit" id="{$item.testId}" title="Editar" />
		</td>
	</tr>
{foreachelse}
	<tr>
    	<td colspan="5" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
{/foreach}