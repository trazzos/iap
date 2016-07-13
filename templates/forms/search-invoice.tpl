<div style="font-size:12px" align="center">
<table width="90%" cellpadding="0" cellspacing="0" border="0">
<tr>
	<td bgcolor="#CCCCCC" align="center" colspan="6"><b>Filtros de B&uacute;squeda</b></td>
</tr>
<tr>
	<td align="center">Curricula</td>
  <td align="center">Nombre</td>
	<td align="center">No. Control</td>
  <td align="center">Desde</td>
  <td align="center">Hasta</td>
  <td align="center">Estatus</td>
</tr>
<tr>
	<td align="center">
    <select name="courseId" id="courseId" style="width:200px">
     <option value="">Seleccione</option>
    {include file="{$DOC_ROOT}/templates/lists/enum-course.tpl"}
    </select>
</td>
    <td align="center"><input type="text" name="nombre" id="nombre" /></td>
    <td align="center"><input type="text" name="noControl" id="noControl" /></td>
    <td align="center">
		<input type="text" name="desde" id="desde"  size="10" value="{$desde}" />  <a href="javascript:NewCal('desde','ddmmyyyy')"><img src="{$WEB_ROOT}/images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>  
    </td>
    <td align="center">
		<input type="text" name="hasta" id="hasta" size="10" value="{$hasta}" />   <a href="javascript:NewCal('hasta','ddmmyyyy')"><img src="{$WEB_ROOT}/images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> 
    </td>
    <td align="center">
    <select name="status" id="status">
     <option value="">Todas</option>
     <option value="Pagadas">Pagadas</option>
     <option value="Sin Pagar">Sin Pagar</option>
    </select>
    </td>
</tr>
<tr>
	<td align="center" colspan="6"><input type="submit" name="submit" value="Buscar" onclick="DoSearch()" class="btnSearch" /></td>
</tr>
</table>
</div>