<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
	<thead>
    	<tr>
			<th width="">Alumno</th>	 
			<th width="">Fecha de Solicitud</th>	 
			<th width="">Tipo</th>		 
			<th width="">Estatus</th>		 
			<th width="">Acciones</th>		 
	 
		 
		</tr>
    </thead>
    <tbody>
    	{foreach from=$registros item=item}
    	<tr>
			<td align="center">{$item.names} {$item.lastNamePaterno} {$item.lastNameMaterno}</td>
			<td align="center">{$item.fechaSolicitud}</td>
			<td align="center">{$item.solicitud}</td>
			<td align="center">{$item.estatus}</td>
			<td align="center">
				{if $item.estatus eq 'en progreso'}
					{if $item.tiposolicitudId ne 3}
					<a href="{$WEB_ROOT}/alumnos/comprobantes/{$item.ruta}" target='_blank' title='COMPROBANTE DE PAGO'>
						<i class="material-icons md-16">description</i>
					</a>
					{/if}
				{/if}
				{if $item.estatus eq 'completado'}
					{if $item.tiposolicitudId ne 3}
						<a href="{$WEB_ROOT}/alumnos/doc_adjuntos/{$item.rutaAdjunto}" target='_blank' title='CONSTANCIA DE ESTUDIOS'>
							<i class="material-icons md-16">remove_red_eye</i> 
						</a>
					{/if}
					
				{/if}
				
				{if $item.tiposolicitudId eq 3}
					{if $item.estatus ne 'completado'}
					<a  href="javascript:void(0)" onClick='realizarBaja({$item.solicitudId})' title='REALIZAR BAJA'>
						<i class="material-icons md-16">thumb_down</i>
					</a>
					{/if}
				{else}
					<a  href="{$WEB_ROOT}/graybox.php?page=add-documento&id={$item.solicitudId}" data-target="#ajax" data-toggle="modal" data-width="1000px" title='ADJUNTAR DOCUMENTO'>
						<i class="material-icons md-16">cloud_upload</i>
					</a>
				{/if}
				
			</td>
		</tr>
	{/foreach}
		
	</tbody>
</table>