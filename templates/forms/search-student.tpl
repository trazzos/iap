<div style="font-size:12px" align="center">
<table width="70%" cellpadding="0" cellspacing="0" border="0">
<tr>
	<td bgcolor="#246e0f" align="center" colspan="6"><b>Filtros de B&uacute;squeda</b></td>
</tr>
<tr>
	<td align="center">Ap. Paterno</td>
	<td align="center">Ap. Materno</td>
	<td align="center">Nombre</td>
	<td align="center">No. Control</td>
	<td align="center">Estatus</td>
	
</tr>
<tr>
	<td align="center"><input type="text" name="apPaterno" id="apPaterno" /></td>
    <td align="center"><input type="text" name="apMaterno" id="apMaterno" /></td>
    <td align="center"><input type="text" name="nombre" id="nombre" /></td>
    <td align="center"><input type="text" name="noControl" id="noControl" /></td>
    <td> 
		<select id="vista" name="vista" style="width:100px">
						<option value="2">Todos </option>
						<option value="1">Alta </option>
						<option value="0">Baja </option>
		</select>
	
	
	</td>
	</tr>
<tr>
	<td align="center" colspan="6"><input type="submit" name="submit" value="Buscar" onclick="DoSearch()" class="btnSearch" /></td>
</tr>
</table>
</div>




{*}
<table>
<tr> 
<td>
<input type="text" id="buscando"  > 
</td><td>
<input type="submit" name="submit" value="Buscar" onclick="buscar()" class="btnSearch" />
</td>
</tr>
</table>{*}