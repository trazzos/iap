{foreach from=$notificaciones item=reply}
   
   {if $reply.vistaPermiso==1}
			<tr>
				<td align="center">{$reply.fecha_aplicacion|date_format:"%d-%m-%Y %H:%M:%S"}</td>
				<td align="left">{$reply.actividad}</td>
				<td alin="center">{$reply.nombre}</td>

				{if $reply.enlace != "NO"}
					<td align="center">
					<img src="{$WEB_ROOT}/images/cancel.png"  title="Eliminar Notificaci&oacute;n"  onclick="borrarNot({$reply.notificacionId})"/>
					<a href="{$WEB_ROOT}{$reply.enlace}"><img src="{$WEB_ROOT}/images/arrow.png" class="spanEdit" id="d-{$subject.subjectId}" name="d-{$subject.name}" title="Ver" /></a>
					</td>
				{else}
					<td align="center">
					<img src="{$WEB_ROOT}/images/cancel.png"  title="Eliminar Notificaci&oacute;n"  onclick="borrarNot({$reply.notificacionId})"/>
					</td>
   
				{/if}   
	
	
	
			</tr>
	{/if}
	
{foreachelse}
	<tr>
    	<td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
{/foreach}
