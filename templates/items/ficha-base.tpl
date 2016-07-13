{foreach from=$fichas item=item key=key}
        <tr>
        <td align="center" class="id">{$item.noFolio}</td>       
        <td align="center">{$item.lastNamePaterno}</td>
        <td align="center">{$item.lastNameMaterno}</td>
         <td align="center">{$item.names}</td>        
        <td align="center">{$item.birthdate}</td>             
        <td align="center">{$item.prevSchAverage}</td>       
         <td align="center">
        <select name="usrStatus_{$item.userId}" id="usrStatus_{$item.userId}" onchange="ChangeStatus({$item.userId})">
        <option value="autorizada" {if $item.status == "autorizada"}selected{/if}>Autorizada</option>
        <option value="baja" {if $item.status == "baja"}selected{/if}>Baja</option>        			
		<option value="cancelada" {if $item.status == "cancelada"}selected{/if}>Cancelada</option>
        <option value="pendiente" {if $item.status == "pendiente"}selected{/if}>Pendiente</option>       			
        </select>
        </td>
         <td align="center"><input type="checkbox" name="accepted_{$item.userId}" id="accepted_{$item.userId}" onclick="DoAccepted({$item.userId})" {if $item.type == "student"}checked{/if} /></td>
        <td align="center">
            <img src="images/icons/16/delete.png" class="spanDelete" id="{$item.userId}" title="Eliminar" />
            &nbsp;
            <img src="{$WEB_ROOT}/images/icons/16/pencil.png" class="spanEdit" id="{$item.userId}" title="Editar" />
        </td>
    </tr>
{foreachelse}
	<tr>
    	<td colspan="9" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
    </tr>				
{/foreach}
