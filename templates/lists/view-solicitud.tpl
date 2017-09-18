<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
	<thead>
    	<tr>
			<th width="">Tipo </th>
			<th width="">Fecha de Solicitud </th>
			<th width="">Estatus </th>
			<th width="">Costo </th>
			<th width=""></th>		 
		</tr>
    </thead>
    <tbody>
		{foreach from=$registros item=subject}
    	<tr>
			<td align="center">{$subject.solicitud}</td>
			<td align="center">{$subject.fechaSolicitud}</td>
			<td align="center">
				{if $subject.tiposolicitudId eq 3}
					{if $subject.estatus eq 'pendiente'} en progreso {else} {$subject.estatus} {/if}
				{else}
					{if $subject.estatus eq 'pendiente'} En espera de pago {else} {$subject.estatus} {/if}
				{/if}
				
			</td>
			<td align="center">{$subject.precio}</td>
			<td align="center">
			
				{if $subject.tiposolicitudId eq 4}
					<a  href="{$WEB_ROOT}/graybox.php?page=view-boleta&id=con" data-target="#ajax" data-toggle="modal" data-width="1000px" title='DESCARGAR BOLETA DE CALIFICACIONES'>
						<i class="material-icons md-16">cloud_download</i>
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
					{/if}
				{/if}
				{if $subject.tiposolicitudId eq 3}
					<a href="{$WEB_ROOT}/unsubscribe"  title='INICIAR PROCESO'>
						<i class="material-icons md-16">play_circle_filled</i>
					</a>
				{/if}
				{if $subject.estatus eq 'completado'}
					{if $subject.tiposolicitudId ne 4}
					<a href="{$WEB_ROOT}/alumnos/doc_adjuntos/{$subject.rutaAdjunto}" target='_blank' title='CONSTANCIA DE ESTUDIOS'>
						<i class="material-icons md-16">description</i>
					</a>
					{/if}
				{/if}
			</td>
		</tr>
		{/foreach}
	</tbody>
</table>