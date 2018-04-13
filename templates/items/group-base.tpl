{foreach from=$theGroup item=item key=key}
        <tr id="1">
        <td align="center">{$item.alumnoId}</td>
        <td align="center">{$item.controlNumber}</td>
		
		  {if $cursos=="ESPECIALIDAD" || $cursos=="MAESTRIA"} <td align="center">{$item.matricula} </td>{/if}
        <td align="center">{$item.lastNamePaterno|upper} {$item.lastNameMaterno|upper} {$item.names|upper}</td>
        <td align="center">
        	{if !$item.equipo}
        		N/A
					{else}
           	{$item.equipo}
          {/if}
        </td>
        {section name=foo loop=$totalActividades} 
			<td align="center">
			{if $item.score.{$smarty.section.foo.iteration - 1} > 0}
			{$item.score.{$smarty.section.foo.iteration - 1}}/{$item.realScore.{$smarty.section.foo.iteration - 1}}%
			{else}
			No. Cal 
			{/if}
			</td> 
		{/section}
        <td align="center">{$item.addepUp}%</td>
{*}        <td align="center">
            <img src="images/icons/16/delete.png" class="spanDelete" id="{$item.groupId}" title="Eliminar" />&nbsp;
          	<img src="images/icons/16/pencil.png" class="spanEdit" id="{$item.groupId}" title="Editar" />
        </td>{*}
    </tr>
{foreachelse}
	<tr><td colspan="4" align="center">No se encontr&oacute; ning&uacute;n registro.</td></tr>
{/foreach}