{foreach from=$classrooms item=item key=key}
        <tr>
        <td align="center" class="id">{$item.classroomId}</td>
        <td align="center">{$item.clave}</td>       
        <td align="center">{$item.name}</td>        
        <td id="etitl1">&nbsp;{$item.wrappedDescription}</td>        
        <td align="center">                        
            <img src="images/icons/16/delete.png" class="spanDelete" id="{$item.classroomId}" title="Eliminar" />&nbsp;
          	<img src="images/icons/16/pencil.png" class="spanEdit" id="{$item.classroomId}" title="Editar" />
        </td>
    </tr>
{foreachelse}
<tr><td colspan="5" align="center">No se encontr&oacute; ning&uacute;n registro.</td></tr>				
{/foreach}
