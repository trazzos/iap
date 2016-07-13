<form name="frmReport" id="frmReport" action="" method="post">
    <input type="hidden" name="accion" value="export" />
	<table width="250" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #000000; font-size:12px">
    <tr>
    	<td colspan="2" bgcolor="#CCCCCC" height="35" align="center"><b>Opciones</b></td>
    </tr>
    <tr>
    	<td height="30" align="left">&nbsp;Semestre:</td>
        <td align="left">
        	<select id="semesterId" name="semesterId" class="frmSelect" style="width:100px">            
            {include file="lists/enum-semester.tpl"}
            </select>
        </td>
    </tr>
     <tr>
    	<td height="30" align="left">&nbsp;Parcial:</td>
        <td align="left">
        	<select id="parcial" name="parcial" class="frmSelect" style="width:100px">            
            <option value="1">1er. Parcial</option>
            <option value="2">2o. Parcial</option>
            <option value="3">3er. Parcial</option>
            <option value="final">Final</option>
            </select>
        </td>
    </tr>
    <tr>
      <td colspan="2" align="center" height="35">
      	<input type="submit" name="imprimir" value="Exportar" class="btnSearch" />
      </td>
    </tr>
    </table>
</form>