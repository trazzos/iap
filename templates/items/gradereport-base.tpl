{foreach from=$__gradereport item=item key=key}
	<tr>
		<td align="center" class="id">{$item.gradereportId}</td>
		<td align="center">{$item.claveGroup}</td>
        <td align="left">&nbsp;{$item.nameSubject}</td>
        <td align="center">{$item.claveSemester}</td>
        <td align="center">{$item.clavePeriodo}</td>
		<td align="center">{$item.generation}</td>
        <td align="center">{$item.stdLimit}</td>
        <td align="center">{$item.stdTotal}</td>
        <td align="center">{$item.stdComplete}</td>
        <td align="center">{if $item.p1}Si{else}No{/if}</td>
        <td align="center">{if $item.p2}Si{else}No{/if}</td>
        <td align="center">{if $item.p3}Si{else}No{/if}</td>
		<td align="center">
			<a href="{$WEB_ROOT}/gradereport-user/gradereportId/{$item.gradereportId}">
				<img src="{$WEB_ROOT}/images/icons/add.png" border="0" title="Capturar Calificaciones"/>
			</a>
		</td>
		<td align="center">
			{if $info.positionId == 1}                
                 <img src="images/icons/16/delete.png" class="spanDelete" id="{$item.gradereportId}" title="Eliminar" />&nbsp;
          		<img src="images/icons/16/pencil.png" class="spanEdit" id="{$item.gradereportId}" title="Editar" />
			{else}
				&nbsp;
			{/if}
		</td>
	</tr>
{foreachelse}
	<tr>
		<td colspan="11" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
{/foreach}