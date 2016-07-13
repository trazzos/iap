<form name="frmReportConst" id="frmReportConst" action="" method="post">
    <input type="hidden" name="accion" value="imprimir_reporte_const" />
    {if $User.type == "student"}
    <input type="hidden" name="noControl3" id="noControl3" value="{$User.numControl}" />
    {/if}
    <table width="300" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #000000; font-size:12px">
    <tr>
        <td colspan="2" bgcolor="#CCCCCC" height="35" align="center"><b>Constancia de Calificaciones</b></td>
    </tr>
    {if $User.type != "student"}
    <tr>
        <td height="35" align="left" style="border-right:1px solid #DDDDDD; border-bottom:1px solid #DDDDDD">
        &nbsp;No. de Control
        </td>
        <td align="center" style="border-bottom:1px solid #DDDDDD">
         <input type="text" name="noControl3" id="noControl3" />
         <div style="display:none;position:absolute;top:-20; z-index:100" id="suggestionDiv3"></div>
       </td>
      </tr>
    {/if}   
    <tr>
      <td colspan="2" align="center" height="35">
        <input type="button" name="imprimir" value="Imprimir" class="btnSearch" onclick="imprimir_reporte_const()" />
      </td>
    </tr>
    </table>
   </form>