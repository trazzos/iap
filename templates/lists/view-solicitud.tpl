<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
	<thead>
    	<tr>
			
			<th width="">Folio </th>
			<th width="">Tipo </th>
			<th width="">Posgrado </th>
			<th width="">Fecha de Solicitud </th>
			<th width="">Estatus </th>
			<th width="">Costo </th>
			<th width="">Acciones</th>		 
		</tr>
    </thead>
    <tbody>
		{foreach from=$registros.result item=subject}
    	<tr>
			
			<td align="center">{$subject.folio}</td>
			<td align="center">{$subject.solicitud}</td>
			<td align="center">{$subject.name}</td>
			<td align="center">{$subject.fechaSolicitud}</td>
			<td align="center">
			
				{if $subject.tiposolicitudId eq 3}
					 {$subject.estatus}
				{else}
					{if $subject.estatus eq 'pendiente'} En espera de pago {else} {$subject.estatus} {/if}
				{/if}
				
			</td>
			<td align="center">$ {$subject.costo}</td>
			<td align="center">
			
				{if $subject.tiposolicitudId eq 4}
					<!--<a  href="{$WEB_ROOT}/graybox.php?page=view-boleta&id=con" data-target="#ajax" data-toggle="modal" data-width="1000px" title='DESCARGAR BOLETA DE CALIFICACIONES'>
						<i class="material-icons md-16">cloud_download</i>
					</a>-->
					{if $subject.existeArchivo eq 'si' and $subject.rutaAdjunto ne ''}
						<a href="{$WEB_ROOT}/alumnos/solicitud/solicitud_{$subject.solicitudId}.pdf"   target='_blank' title='DESCARGAR CONSTANCIA'>
								<i class="material-icons md-16">cloud_download</i>
						</a>
					{else}
						 {if $subject.rutaAdjunto ne ''}
							<a  href="{$WEB_ROOT}/alumnos/solicitud/{$subject.rutaAdjunto}" target="_blank" title='VER BOLETA'>
								<i class="material-icons md-16">cloud_download</i>
							</a>
						 {else}
							 <a class="open" href="{$WEB_ROOT}/graybox.php?page=view-cuatri&id={$subject.tiposolicitudId}&soljId={$subject.solicitudId}" data-target="#ajax" data-toggle="modal" data-width="1000px" title='SELECCIONA CUATRIMESTRE'>
								<i class="material-icons md-16">view_list</i>
							</a>
						 {/if}
						
					{/if}
					
					
					<!--<a href="{$WEB_ROOT}/alumnos/solicitud/solicitud_{$subject.solicitudId}.pdf"   target='_blank' title='DESCARGAR CONSTANCIA'>
							<i class="material-icons md-16">cloud_download</i>
					</a>-->
					<!--<a href="{$WEB_ROOT}/graybox.php?page=info&id=1" data-target="#ajax" data-toggle="modal" data-width="1000px" title='INFORMACION'>
					<i class="material-icons md-16">info</i>
					</a>-->
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
						<a href="{$WEB_ROOT}/graybox.php?page=referencia-bancaria&id={$subject.courseId}" data-target="#ajax" data-toggle="modal" data-width="1000px" title='REFERENCIA BANCARIA'>
						<i class="material-icons md-16">account_balance</i>
						</a>
					{/if}
					{if $subject.tiposolicitudId ne 4}
						{if $subject.estatus ne 'cancelado'}
							<a href="{$WEB_ROOT}/graybox.php?page=info&id={$subject.solicitudId}" data-target="#ajax" data-toggle="modal" data-width="1000px" title='INFORMACION'>
							<i class="material-icons md-16">info</i>
							</a>
						{/if}
					{/if}
				{/if}
				{if $subject.tiposolicitudId eq 3}
					{if $subject.estatus eq 'pendiente'}	
						<!--<a href="{$WEB_ROOT}/unsubscribe/sId/{$subject.solicitudId}"  title='INICIAR PROCESO'>-->
						<a href="{$WEB_ROOT}/graybox.php?page=confirma-baja&id={$subject.solicitudId}" data-target="#ajax" data-toggle="modal" data-width="1000px" title='INICIAR PROCESO'>
							<i class="material-icons md-16">play_circle_filled</i>
						</a>
					{else if $subject.estatus eq 'en progreso'}
						<a href="javascript:void(0)" onClick='descargarSolicitud("{$subject.courseId}","{$subject.userId}","{$subject.solicitudId}")'  target='_blank' title='DESCARGAR SOLICITUD'>
							<i class="material-icons md-16">cloud_download</i>
						</a>
					{/if}
					
				{/if}
				{if $subject.estatus eq 'completado'}
					{if $subject.tiposolicitudId ne 4}
						<!--<a href="{$WEB_ROOT}/alumnos/doc_adjuntos/{$subject.rutaAdjunto}" target='_blank' title='DESCARGAR CONSTANCIA DE ESTUDIOS'>
							<i class="material-icons md-16">cloud_download</i>
						</a>-->
					{/if}
				{/if}
				
				{if $subject.estatus eq 'en progreso'}	
						{if $subject.tiposolicitudId ne 3}
						<a href="{$WEB_ROOT}/alumnos/comprobantes/{$subject.ruta}" target='_blank' title='COMPROBANTE DE PAGO'>
							<i class="material-icons md-16">description</i>
						</a>		
						{/if}
				{/if}
				{if $subject.estatus ne 'cancelado'}
					{if $subject.estatus ne 'completado'}	
					<a href="{$WEB_ROOT}/graybox.php?page=cancelar-solicitud&id={$subject.solicitudId}" data-target="#ajax" data-toggle="modal" data-width="1000px" title='CANCELAR SOLICITUD'>
						<i class="material-icons md-16">delete_forever</i>
					</a>
					{/if}
				{/if}
				{if $subject.estatus eq 'completado'}
					{if $subject.tiposolicitudId eq 1 or $subject.tiposolicitudId eq 6 or $subject.tiposolicitudId eq 2 or $subject.tiposolicitudId eq 7}
					<a href="{$WEB_ROOT}/alumnos/solicitud/solicitud_{$subject.solicitudId}.pdf"   target='_blank' title='DESCARGAR CONSTANCIA'>
							<i class="material-icons md-16">cloud_download</i>
					</a>
					{/if}
				{/if}
			</td>
		</tr>
		{/foreach}
	</tbody>
</table>

{include file="{$DOC_ROOT}/templates/lists/pages_ok.tpl" pages=$registros.pages info=$registros.info}