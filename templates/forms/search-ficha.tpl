<div align="center">
<table width="50%" cellpadding="0" cellspacing="0" border="0">
<tr>
	<td bgcolor="#CCCCCC" align="center" colspan="5" align="center"><b>Filtros de B&uacute;squeda</b></td>
</tr>
<tr>
	<td align="center">Ap. Paterno</td>
	<td align="center">Ap. Materno</td>
    <td align="center">Nombre</td>
	<td align="center">Folio</td>
    <td align="center">Status</td>
</tr>
<tr>
	<td align="center"><input type="text" name="apPaterno" id="apPaterno" /></td>
    <td align="center"><input type="text" name="apMaterno" id="apMaterno" /></td>
    <td align="center"><input type="text" name="name" id="name" /></td>
    <td align="center"><input type="text" name="folio" id="folio" /></td>
    <td align="center">
    <select name="status" id="status">
        <option value="">Todos</option>
        <option value="autorizada">Autorizada</option>
        <option value="baja">Baja</option>        			
		<option value="cancelada">Cancelada</option>
        <option value="pendiente">Pendiente</option>       			
    </select>
    </td>
</tr>
<tr>
	<td align="center" colspan="5"><input type="submit" name="submit" value="Buscar" onclick="DoSearch()" class="btnSearch" /></td>
</tr>
</table>
</div>