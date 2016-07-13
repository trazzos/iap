<div align="center">
    <form name="frmKardex" id="frmKardex" action="" method="post">
    <input type="hidden" name="action" value="searchSubjects" />
    <table width="400" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #000000; font-size:12px">
    <tr>
        <td colspan="2" bgcolor="#CCCCCC" height="35" align="center"><b>Filtro de B&uacute;squeda</b></td>
    </tr>
    <tr>
        <td height="35" align="left" style="border-right:1px solid #DDDDDD; border-bottom:1px solid #DDDDDD">
        &nbsp;No. de Control
        </td>
        <td align="center" style="border-bottom:1px solid #DDDDDD">
         <input type="text" name="noControl" id="noControl" />
         <div style="display:none;position:absolute;top:-20; z-index:100" id="suggestionDiv"></div>
       </td>
      </tr>
    <tr>
        <td align="left" height="35" style="border:1px solid #DDDDDD">&nbsp;Carrera</td>
        <td align="center" style="border-bottom:1px solid #DDDDDD; border-top:1px solid #DDDDDD">
        <select name="majorId" id="majorId">
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
        <select name="semesterId" id="semesterId">
        <option value="0">Seleccione</option>
        {foreach from=$semesters item=item}
        <option value="{$item.semesterId}">{$item.clave}</option>
        {/foreach}
        </select>
        </td>      
    </tr>    
    <tr>
      <td colspan="2" align="center" height="35">
        <input type="button" name="Buscar" value="Buscar" onclick="searchSubjects()" class="btnSearch" />
      </td>
    </tr>
    </table>
   </form>
</div>