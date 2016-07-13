<ul id="sort-box" class="sorts">
 <li>
    <div class="content-header">
        <div class="content-header-left">
          <img src="images/new/catalogos.png" alt="" />
            <h2>Kardex de Calificaciones</h2>
        </div>                  
    </div>
    <div class="content-in" id="tab">
                                             
       	{if $modo != "capturar"}
			{include file="forms/search-kardex.tpl"}
		{else}
            <div align="left">
            <b>Alumno:</b> {$nombre} <br />
            <b>Semestre:</b> {$semestre} <br />
            <b>Carrera:</b> {$carrera}
            </div>
            <br />&nbsp;
            <div align="center">
                       {if $msg}
                        <span style="font-size:12px; color:#FF0000"><b>{$msg}</b></span>
                       {else}
                            {include file="forms/add-kardex.tpl"}
                        {/if}
            </div>
    
            <br /><br />
            <div align="center" class="lnkGral">
                <a href="{$WEB_ROOT}/kardex-calificacion">Regresar</a>
            </a>
            </div>
        {/if}
                         
       <br />              
           
    </div> 
   </li>                                                              
 </ul>   

<!--
<div align="left">Kardex de Calificaciones</div>
<br />
{if $modo != "capturar"}
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
                <input type="button" name="Buscar" value="Buscar" onclick="searchSubjects()" />
              </td>
            </tr>
            </table>
           </form>
</div>
{else}
<div align="left">
<b>Alumno:</b> {$nombre} <br />
<b>Semestre:</b> {$semestre} <br />
<b>Carrera:</b> {$carrera}
</div>
<br />&nbsp;
<div align="center">
           {if $msg}
           	<span style="font-size:12px; color:#FF0000"><b>{$msg}</b></span>
           {else}
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
                <input type="button" name="Guardar" value="Guardar" onclick="SaveData()" />&nbsp;&nbsp;
                {if $calif}
                <input type="button" name="Eliminar" value="Eliminar" onclick="DeleteData()" />
              	{/if}
              </td>
            </tr>
            </table>
           </form>
 			{/if}
</div>

<br /><br />
<div align="center" class="lnkRegresar">
	<a href="{$WEB_ROOT}/kardex-calificacion"><< Regresar</a>
</a>
</div>
{/if}
-->