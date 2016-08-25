{foreach from=$subjects item=subject}
    <tr>
        <td align="center">{$subject.semesterId}</td>
        <td align="left">{$subject.name}</td>
        <td align="left">{$subject.initialDate|date_format:"%d-%m-%Y"}</td>
        <td align="left">{$subject.finalDate|date_format:"%d-%m-%Y"}</td>
        {if $User.type == "student"}
			    <td>{$subject.totalScore} <br/>
				<a href="#" onclick="CalificacionesAct({$subject.courseModuleId});"> Actividades</a>
                <br/>
                 <a href="#" onclick="CalificacionesExa({$subject.courseModuleId});"> Examenes</a></td>			
			{/if}
				
        <td align="center">
        {if $User.type == "student"}
	        {if  $timestamp < $subject.initialDateStamp}
          	No Iniciado
          {else}
          	{if $subject.finalDateStamp > 0 AND $timestamp > $subject.finalDateStamp}  
            	Finalizado
            {elseif $subject.active == "no"}  
            	Finalizado
          	{elseif $subject.finalDateStamp <= 0 AND $initialDateStamp < $subject.daysToFinishStamp AND $timestamp > $subject.daysToFinishStamp}  
            	Finalizado
	        	{else}
							<a href="{$WEB_ROOT}/view-modules-student&id={$subject.courseModuleId}" title="Ingresar"  style="color:#000" target="_top" ><img src="{$WEB_ROOT}/images/arrow.png" title="Ingresar" /></a>
          	{/if}		
          {/if}
        {else}
        <a href="{$WEB_ROOT}/graybox.php?page=edit-modules-course&id={$subject.courseModuleId}" title="Ingresar"  style="color:#000" target="_top" ><img src="{$WEB_ROOT}/images/arrow.png" title="Configurar Módulo" /></a>
        {/if}
        </td>
		
   
		
    </tr>
{foreachelse}
	<tr>
    	<td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
{/foreach}
