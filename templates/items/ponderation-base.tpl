{foreach from=$tareas item=home key=key}
    <tr>
        <td>{$home.resumen} </td>
        <td>{$home.ponderation}</td>
        <td>{$home.retro}</td>
		  
    </tr>
{foreachelse}
	<tr>
    	<td colspan="11" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
    </tr>				
{/foreach}
