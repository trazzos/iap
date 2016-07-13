{foreach from=$semesters item=semester}
    <tr>
        <td align="center" class="id">{$semester.semesterId}</td>
        <td align="center">&nbsp;&nbsp;{$semester.clave}</td>
        <td>&nbsp;{$semester.name}</td>
        <td align="center">            
          	<img src="images/icons/16/pencil.png" class="spanEdit" id="e-{$semester.semesterId}" name="e-{$semester.semesterId}" title="Editar" />
        </td>
    </tr>
{foreachelse}
	<tr>
    	<td colspan="5" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
{/foreach}