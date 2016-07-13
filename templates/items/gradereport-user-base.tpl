{foreach from=$userlist item=item key=key}
	{if $gradeReportInfo.regularization == 'N'}
		<tr>
			<td align="center">{$item.listNumber}</td>
			<td class="id">{$item.studentFullName}</td>
			<td align="center">{$item.controlNumber}</td>
            
            {* Imprimimos las Asistencias *}            
            {foreach from=$parcialTests key=index item=parcial}
				<td align="center">
                	{if $item.attendance.$parcial != 0}
                    	{$item.attendance.$parcial}
                    {/if}
                </td>
			{foreachelse}
				<td align="center"></td>
                <td align="center"></td>
                <td align="center"></td>
			{/foreach}
            
       	
			{* Por cada examen PARCIAL en el programa de examenes, poner la informacion de la calificacion del alumno *}
            
            {assign var="parcRep" value=0}            
			{foreach from=$parcialTests key=index item=parcial}          	
            	{if $item.$parcial >= 0 && $item.$parcial <=5}
                	{assign var="parcRep" value=$parcRep+1}
                {/if}
				<td align="center">{$item.$parcial}</td>
			{foreachelse}
				<td colspan="3" align="center">
                	No hay Informacion de Parciales en -Tipos de examen, o en -Calendario de examenes
                </td>
			{/foreach}
			
			{* Por cada examen GLOBAL en el programa de examenes, poner la informacion de la calificacion del alumno si existe *}
			{foreach from=$globalTests key=index item=global}
            
            	{if $parcRep == 3}
            	
                	<td align="center">---</td>
                
                {else}
                    
                    {if $item.$global}
                        <td align="center">{$item.$global}</td>
                    {else}
                        <td align="center">---</td>
                    {/if}
                    
                {/if}
			{foreachelse}
				<td colspan="3" align="center">N
                	No hay Informacion de Globales en -Tipos de examen, o en -Calendario de examenes.
                </td>
			{/foreach}
			
			{if $item.$r1Test}
				<td align="center">{$item.$r1Test}</td>
			{else}
				<td align="center">---</td>
			{/if}
			
		   <td align="center">{$item.averageScore}</td>
			<td class="act" align="center">			
				{if !$viewMode}
				<a href="{$WEB_ROOT}/gradescore-user/gradReportUserId/{$item.gradReportUserId}">
					<img src="{$WEB_ROOT}/images/icons/16/pencil.png" border="0" title="Capturar Calificaciones"/>
				</a>
                {/if}				
			</td>
		</tr>
	{else}
		<tr id="1">
			<td align="center">{$item.listNumber}</td>
			<td class="id">{$item.studentFullName}</td>
			<td align="center">{$item.studentGroupClave}</td>
			<td align="center">INTERSEMESTRAL</td>
			<td align="center">{$item.$interTest}</td>
			<td align="center">{$item.averageScore}</td>
			<td class="act">
				<img src="{$WEB_ROOT}/images/b_edit.png" class="spanEditIntersem" id="{$item.gradReportUserId}" border="0" title="Capturar Calificaciones" style="cursor:pointer;"/>
			</td>
		</tr>	
	{/if}
{foreachelse}
	<tr>
		<td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
{/foreach}