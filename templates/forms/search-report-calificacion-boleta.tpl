<form name="frmReport" id="frmReport" action="" method="post">
    <input type="hidden" name="accion" value="imprimir_reporte" />
    {if $User.type == "student"}
    <input type="hidden" name="noControl" id="noControl" value="{$User.numControl}" />
    {/if}
    <table width="300" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #000000; font-size:12px">
    <tr>
        <td colspan="2" bgcolor="#CCCCCC" height="35" align="center"><b>Boleta de Calificaciones</b></td>
    </tr>
    {if $User.type != "student"}
    <tr>
        <td height="35" align="left" style="border-right:1px solid #DDDDDD; border-bottom:1px solid #DDDDDD">
        &nbsp;No. de Control
        </td>
        <td align="center" style="border-bottom:1px solid #DDDDDD">
         <input type="text" name="noControl" id="noControl" />
         <div style="display:none;position:absolute;top:-20; z-index:100" id="suggestionDiv"></div>
       </td>
      </tr>            
    {/if}
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
        <input type="button" name="imprimir" value="Imprimir" class="btnSearch" onclick="imprimir_reporte()" />
      </td>
    </tr>
    </table>
   </form>  