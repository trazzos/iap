{foreach from=$personals item=item key=key}
        <tr>
        <td align="center" class="id">{$item.personalId}</td>       
        <td>&nbsp;{$item.lastname_paterno} {$item.lastname_materno} {$item.name}</td>
        <td align="center">{$item.position}</td>        
        <td>&nbsp;{$item.wrappedDescription}</td>
        <td align="center">           
            <img src="images/icons/16/delete.png" class="spanDelete" id="{$item.personalId}" title="Eliminar" />&nbsp;
          	<img src="images/icons/16/pencil.png" class="spanEdit" id="{$item.personalId}" title="Editar" />
        </td>
    </tr>
{foreachelse}
<tr><td colspan="5" align="center">No se encontr&oacute; ning&uacute;n registro.</td></tr>				
{/foreach}
