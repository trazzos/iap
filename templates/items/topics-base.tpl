{foreach from=$forum item=topic}
    <tr>
        <td align="center" class="id">{$topic.subject|truncate:30:"..."}</td>
        <td align="left">{$topic.descripcion}</td>
      <!--  <td align="center" id="etitl1">{$topic.names} {$topic.lastNamePaterno} {$topic.lastNameMaterno}</td>-->
      <!--  <td align="center" id="etitl1">{*$topic.answers*}</td>-->
        <td align="center">
          {if $vistaPrevia==0}  	
		  <a href="{$WEB_ROOT}/forumsub-modules-student/id/{$id}/topicId/{$topic.topicId}">
		<!--  <img src="{$WEB_ROOT}/images/arrow.png" class="spanEdit" id="e-{$position.positionId}" name="e-{$position.name}" title="Entrar al Foro" />
		-->
		 <i class="fa fa-sign-in fa-2x" aria-hidden="true" style='color:black'></i>
		  
		  </a>
		  {else}
			 <i class="fa fa-sign-in fa-2x" aria-hidden="true" style='color:black'></i>
		{/if}
		  
        </td>
    </tr>
{foreachelse}
	<tr>
    	<td colspan="5" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
{/foreach}