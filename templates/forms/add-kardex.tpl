<form name="frmCalificaciones" id="frmCalificaciones" action="" method="post">
<input type="hidden" name="type" id="type" value="saveCalif" />
<input type="hidden" name="semesterId" value="{$semesterId}" />
<input type="hidden" name="userId" value="{$userId}" />
<input type="hidden" name="majorId" value="{$majorId}" />
<table width="700" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #000000; font-size:12px">
<tr>
    <td colspan="4" bgcolor="#CCCCCC" height="35" align="center"><b>Captura de Calificaciones</b></td>
</tr>
<tr>
    <td align="center" height="35" style="border-right:1px solid #DDDDDD; border-bottom:1px solid #DDDDDD"><b>Materia</b></td>
    <td align="center" style="border-right:1px solid #DDDDDD; border-bottom:1px solid #DDDDDD"><b>Calif.</b></td>
    <td align="center" style="border-right:1px solid #DDDDDD; border-bottom:1px solid #DDDDDD"><b>Obs.</b></td>
    <td align="center" style="border-right:1px solid #DDDDDD; border-bottom:1px solid #DDDDDD"><b>Periodo</b></td>
</tr>
{foreach from=$subjects item=item key=key}
<tr>
    <td height="35" width="400" align="left" style="border-right:1px solid #DDDDDD; border-bottom:1px solid #DDDDDD">
    &nbsp;{$item.name}
    </td>
    <td align="center" style="border-bottom:1px solid #DDDDDD; border-right:1px solid #DDDDDD;">
     <input type="text" name="calif[{$item.subjectId}]" id="calif" size="5" maxlength="3" value="{$calif[{$item.subjectId}].calif}" />
   </td>           
    <td align="center" style="border-right:1px solid #DDDDDD; border-bottom:1px solid #DDDDDD">
    <select name="tipo[{$item.subjectId}]" id="tipo">               
    {foreach from=$typeCalifs item=itm key=key}
    <option value="{$itm.typeCalifId}" {if $calif[{$item.subjectId}].typeCalifId == $itm.typeCalifId}selected{/if}>{$itm.identifier}</option>
    {/foreach}
    </select>
    </td>
   <td align="center" style="border-right:1px solid #DDDDDD; border-bottom:1px solid #DDDDDD">
    <select name="period[{$item.subjectId}]" id="period">               
    {foreach from=$periodos item=itm key=key}
    <option value="{$itm.periodoId}" {if $calif}{if $calif[{$item.subjectId}].periodoId == $itm.periodoId}selected{/if}{else}{if $itm.periodoId == $periodoId}selected{/if}{/if}>{$itm.identifier}</option>
    {/foreach}
    </select>
    </td>
</tr>
{/foreach}            
<tr>
  <td colspan="4" align="center" height="35">
    <input type="button" name="Guardar" value="Guardar" onclick="SaveData()" class="btnSearch" />&nbsp;&nbsp;
    {if $calif}
    <input type="button" name="Eliminar" value="Eliminar" onclick="DeleteData()" class="btnSearch" />
    {/if}
  </td>
</tr>
</table>
</form>