<form name="frmReport" id="frmReport" action="" method="post">
    <input type="hidden" name="accion" value="imprimir_reporte" />
	<table width="350" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #000000; font-size:12px" align="center">
    <tr>
    	<td colspan="2" bgcolor="#CCCCCC" height="35" align="center"><b>Opciones</b></td>
    </tr>
    <tr>
    	<td align="left" height="35" style="border:1px solid #DDDDDD">&nbsp;Carrera</td>
        <td align="center" style="border-top:1px solid #DDDDDD">
        <select name="majorId" id="majorId" class="frmSelect" style="width:200px">
        <option value="0">Seleccione</option>
        {foreach from=$majors item=item}
        <option value="{$item.majorId}">{$item.name}</option>
        {/foreach}
        </select>
        </td>      
    </tr>
    <tr>
    	<td align="left" height="35" style="border:1px solid #DDDDDD">&nbsp;Semestre</td>
        <td align="center" style="border-bottom:1px solid #DDDDDD; border-top:1px solid #DDDDDD">
        <select name="semesterId" id="semesterId" class="frmSelect" style="width:100px">
        <option value="0">Seleccione</option>
        {foreach from=$semesters item=item}
        <option value="{$item.semesterId}">{$item.clave}</option>
        {/foreach}
        </select>
        </td>      
    </tr>
    <tr>
    	<td height="35" align="left" style="border-right:1px solid #DDDDDD; border-bottom:1px solid #DDDDDD">
        &nbsp;Grupo
        </td>
        <td align="center" style="border-bottom:1px solid #DDDDDD">        
        <select name="groupId" id="groupId" class="frmSelect" style="width:100px">
        <option value="0">Seleccione</option>
        {foreach from=$groups item=item}
        <option value="{$item.groupId}">{$item.name}</option>
        {/foreach}
        </select>
       </td>
      </tr>
    <tr>
      <td colspan="2" align="center" height="35">
      	<input type="button" name="imprimir" value="Imprimir" onclick="imprimir_reporte()" class="btnSearch" />
      </td>
    </tr>
    <tr>
      <td colspan="2" align="center" height="35">
      	<input type="button" name="exportar" value="Exportar a Excel" onclick="exportar_excel()" class="btnSearch" />
      </td>
    </tr>
    </table>
   </form>
  
