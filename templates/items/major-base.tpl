{foreach from=$majors item=item key=key}    
    <tr>
      <td>&nbsp;&nbsp;{$item.name}</td>
      <td align="center">
          <img src="images/icons/16/delete.png" class="spanDelete" id="{$item.majorId}" title="Eliminar" />&nbsp;
          <img src="images/icons/16/pencil.png" class="spanEdit" id="{$item.majorId}" title="Editar" /> 
         
      </td>                        
   </tr>
{foreachelse}
    <tr>
    	<td colspan="5" align="center">Ning&uacute;n registro encontrado.</td>
    </tr>
{/foreach}
