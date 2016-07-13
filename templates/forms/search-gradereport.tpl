<div style="font-size:12px" align="center">
<table width="30%" cellpadding="0" cellspacing="0" border="0">
<tr>
	<td bgcolor="#CCCCCC" align="center" colspan="6"><b>Filtros de B&uacute;squeda</b></td>
</tr>
<tr>
	<td align="center">Parcial</td>
	<td align="center">Status</td>
    <td align="center">|</td>
    <td align="center">Semestre</td>
</tr>
<tr>
    <td align="center">
    <select name="parcial" id="parcial">
    <option value="">Seleccione</option>
    <option value="1">I</option>
    <option value="2">II</option>
    <option value="3">III</option> 
    </select>
    </td>
    <td align="center">
    <select name="status" id="status">
    <option value="">Seleccione</option>
    <option value="1">Si</option>
    <option value="0">No</option>
    </select>
    </td>
    <td align="center">|</td>
    <td align="center">
    <select name="semesterId" id="semesterId">
    <option value="">Seleccione</option>
    {include file="{$DOC_ROOT}/templates/lists/enum-semester.tpl"}
    </select>
    </td>
</tr>
<tr>
	<td align="center" colspan="6" height="50"><input type="submit" name="submit" value="Buscar" onclick="DoSearch()" class="btnSearch" /></td>
</tr>
</table>
</div>