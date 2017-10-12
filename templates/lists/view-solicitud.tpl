<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
	<thead>
    	<tr>
			
			<th width="">Tipo </th>
			<th width="">Posgrado </th>
			<th width="">Fecha de Solicitud </th>
			<th width="">Estatus </th>
			<th width="">Costo </th>
			<th width="">Acciones</th>		 
		</tr>
    </thead>
    <tbody>
		{foreach from=$registros item=subject}
    	<tr>
			
			<td align="center">{$subject.solicitud}</td>
			<td align="center">{$subject.name}</td>
			<td align="center">{$subject.fechaSolicitud}</td>
			<td align="center">
			
				{if $subject.tiposolicitudId eq 3}
					{if $subject.estatus eq 'pendiente'} en progreso {else} {$subject.estatus} {/if}
				{else}
					{if $subject.estatus eq 'pendiente'} En espera de pago {else} {$subject.estatus} {/if}
				{/if}
				
			</td>
			<td align="center">$ {$subject.precio}</td>
			<td align="center">
			
				{if $subject.tiposolicitudId eq 4}
					<a  href="{$WEB_ROOT}/graybox.php?page=view-boleta&id=con" data-target="#ajax" data-toggle="modal" data-width="1000px" title='DESCARGAR BOLETA DE CALIFICACIONES'>
						<i class="material-icons md-16">cloud_download</i>
					</a>
					<a href="{$WEB_ROOT}/graybox.php?page=info&id=1" data-target="#ajax" data-toggle="modal" data-width="1000px" title='INFORMACION'>
					<i class="material-icons md-16">info</i>
					</a>
				{else}
					{if $subject.estatus eq 'pendiente'} 
						{if $subject.tiposolicitudId ne 3}
							<a  href="{$WEB_ROOT}/graybox.php?page=solicitud-constancia&id={$subject.solicitudId}" data-target="#ajax" data-toggle="modal" data-width="1000px" title='ENVIAR COMPROBANTE DE PAGO'>
								
								<i class="material-icons md-16">monetization_on</i>
							</a>
						{/if}
					{/if}
					
				{/if}
				{if $subject.tiposolicitudId ne 3}
					{if $subject.estatus eq 'pendiente'}
					<a href="{$WEB_ROOT}/graybox.php?page=referencia-bancaria" data-target="#ajax" data-toggle="modal" data-width="1000px" title='REFERENCIA BANCARIA'>
					<i class="material-icons md-16">account_balance</i>
					</a>
					<a href="{$WEB_ROOT}/graybox.php?page=info&id=2" data-target="#ajax" data-toggle="modal" data-width="1000px" title='INFORMACION'>
					<i class="material-icons md-16">info</i>
					</a>
					{/if}
				{/if}
				{if $subject.tiposolicitudId eq 3}
					<a href="{$WEB_ROOT}/unsubscribe"  title='INICIAR PROCESO'>
						<i class="material-icons md-16">play_circle_filled</i>
					</a>
				{/if}
				{if $subject.estatus eq 'completado'}
					{if $subject.tiposolicitudId ne 4}
						<a href="{$WEB_ROOT}/alumnos/doc_adjuntos/{$subject.rutaAdjunto}" target='_blank' title='DESCARGAR CONSTANCIA DE ESTUDIOS'>
							<i class="material-icons md-16">cloud_download</i>
						</a>
					{/if}
				{/if}
				
				{if $subject.estatus eq 'en progreso'}
					{if $subject.tiposolicitudId eq 3}
						<a href="javascript:void(0)" onClick='descargarSolicitud({$subject.solicitudId})'  target='_blank' title='FORMATO DE REINSCRIPION'>
							<i class="material-icons md-16">cloud_download</i>
						</a>
					{else}
						<a href="{$WEB_ROOT}/alumnos/comprobantes/{$subject.ruta}" target='_blank' title='COMPROBANTE DE PAGO'>
							<i class="material-icons md-16">description</i>
						</a>
					{/if}
					
					
				{/if}
				
					<a href="{$WEB_ROOT}/graybox.php?page=cancelar-solicitud&id={$subject.solicitudId}" data-target="#ajax" data-toggle="modal" data-width="1000px" title='CANCELAR SOLICITUD'>
						<i class="material-icons md-16">delete_forever</i>
					</a>
					
					<a href="javascript:void(0)" onClick='descargarConstancias({$subject.solicitudId})'  target='_blank' title='DESCARGAR CONSTANCIA'>
							<i class="material-icons md-16">cloud_download</i>
					</a>
			</td>
		</tr>
		{/foreach}
	</tbody>
</table>