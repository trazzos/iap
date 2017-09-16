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
			<td align="center">{if $subject.estatus eq 'pendiente'} En espera de pago {else} {$subject.estatus} {/if}</td>
			<td align="center">{$subject.precio}</td>
			<td align="center">
			
				{if $subject.tiposolicitudId eq 4}
					<a  href="{$WEB_ROOT}/graybox.php?page=view-boleta&id=con" data-target="#ajax" data-toggle="modal" data-width="1000px" title='DESCARGAR BOLETA DE CALIFICACIONES'>
						<i class="fa fa-download" aria-hidden="true"></i>
					</a>
				{else}
					{if $subject.estatus eq 'pendiente'} 
						{if $subject.tiposolicitudId ne 3}
							<a  href="{$WEB_ROOT}/graybox.php?page=solicitud-constancia&id={$subject.solicitudId}" data-target="#ajax" data-toggle="modal" data-width="1000px" title='ENVIAR COMPROBANTE DE PAGO'>
								<i class="fa fa-money" aria-hidden="true"></i>
							</a>
						{/if}
					{/if}
				{/if}
				{if $subject.tiposolicitudId ne 3}
					<a href="{$WEB_ROOT}/graybox.php?page=referencia-bancaria" data-target="#ajax" data-toggle="modal" data-width="1000px" title='REFERENCIA BANCARIA'>
					<i class="fa fa-university" aria-hidden="true"></i>
					</a>
				{/if}
				{if $subject.tiposolicitudId eq 3}
					<a href="{$WEB_ROOT}/unsubscribe"  title='INICIAR PROCESO'>
						<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
					</a>
				{/if}
			</td>
		</tr>
		{/foreach}
	</tbody>
</table>