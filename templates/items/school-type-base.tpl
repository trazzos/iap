{foreach from=$resSchoolType.items item=item key=key}
	<tr>
		<td align="center">{$item.schtypId}</td>
		<td align="center">{$item.clave}</td>
		<td align="left">&nbsp;{$item.name}</td>
		<td align="center">            
            <img src="images/icons/16/delete.png" class="spanDelete" id="{$item.schtypId}" title="Eliminar" />&nbsp;
          	<img src="images/icons/16/pencil.png" class="spanEdit" id="{$item.schtypId}" title="Editar" />
		</td>
	</tr>
{foreachelse}
<tr><td colspan="4" align="center">No se encontr&oacute; ning&uacute;n registro.</td></tr>
{/foreach}
