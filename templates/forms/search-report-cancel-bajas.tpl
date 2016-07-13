<form name="frmReportBaja" id="frmReportBaja" action="" method="post">
  <input type="hidden" name="accion" value="imprimir_baja" />
  <input type="hidden" name="semesters" id="semesters" value="" />
  <table width="250" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #000000; font-size:12px">
  <tr>
      <td bgcolor="#CCCCCC" height="35" align="center"><b>Seleccione el Semestre</b></td>
  </tr>
  <tr>
      <td align="center" style="border-bottom:1px solid #DDDDDD; border-top:1px solid #DDDDDD">
      <select class="textfield" style="width:160px" name="semesterId" id="semesterId" size="6" multiple >
      {foreach from=$semesters item=item key=key}
          <option value="{$item.semesterId}">{$item.clave}</option>        			
      {/foreach}
      </select>
      </td>      
  </tr>    
  <tr>
    <td align="center" height="35">
      <input type="button" name="imprimir" value="Imprimir" class="btnSearch" onclick="chkReportBaja(this.form)" />
    </td>
  </tr>
  </table>
 </form>