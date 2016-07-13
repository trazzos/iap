{foreach from=$students item=item key=key}
        <tr id="1">
        <td align="center" class="id">{$item.userId}</td>       
        <td align="center">{$item.lastNamePaterno}</td>
        <td align="center">{$item.lastNameMaterno}</td>
         <td align="center">{$item.names}</td>
        <td align="center">{$item.controlNumber}</td>
        <td align="center">{$item.semester}</td>             
        <td align="center">{$item.group}</td>
        <td align="center">
        <a href="{$WEB_ROOT}/report-calificacion/std/{$item.userId}">
        	<img src="{$WEB_ROOT}/images/icons/view.png" border="0" />
        </a>
        </td>        
    </tr>
{foreachelse}
	<tr><td colspan="8" align="center">Ningun registro encontrado.</td>				
{/foreach}
