{foreach from=$groups item=item key=key}
        <tr>
        <td align="center">{$item.subgpoId}</td>       
        <td align="center">{$item.clave}</td>
        <td align="center">{$item.name}</td>
        <td align="center">{$item.personal}</td>
        <td align="center">{$item.salon}</td>
        <td align="center">{if $item.assign_schedule}Si{else}No{/if}</td>
        <td align="center">            
            <img src="{$WEB_ROOT}/images/icons/16/delete.png" class="spanDelete" id="{$item.subgpoId}" title="Eliminar" />&nbsp;
          	<img src="{$WEB_ROOT}/images/icons/16/pencil.png" class="spanEdit" id="{$item.subgpoId}" title="Editar" />
        </td>
    </tr>
{foreachelse}
<tr><td colspan="7" align="center">No se encontro ningun registro.</td></tr>				
{/foreach}
