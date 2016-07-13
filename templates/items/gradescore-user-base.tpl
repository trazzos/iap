{foreach from=$gradescoreEnum item=item key=key}
	<tr>
		<td align="center">{$item.gradReportUserId}</td>
		<td align="left">&nbsp;{$item.testDescrip}</td>
		<td align="center">{$item.datetest}</td>
		<td align="center">{$item.attendance}</td>
        <td align="center">{$item.gradescore}</td>
		<td align="center">            
            <img src="{$WEB_ROOT}/images/icons/16/delete.png" class="spanDelete" id="{$item.gradReportUserId}" title="Eliminar" />&nbsp;
          	<img src="{$WEB_ROOT}/images/icons/16/pencil.png" class="spanEdit" id="{$item.gradReportUserId}" title="Editar" />			
		</td>
	</tr>
{foreachelse}
	<tr>
		<td colspan="5" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
{/foreach}
