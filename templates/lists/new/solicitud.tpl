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
					
					{if $item.tiposolicitudId eq 1 or $item.tiposolicitudId eq 6 or $item.tiposolicitudId eq 2 or $item.tiposolicitudId eq 7}
						<a href="javascript:void(0)" onClick='descargarConstancias({$item.solicitudId})'  target='_blank' title='DESCARGAR CONSTANCIA'>
							<i class="material-icons md-16">cloud_download</i>
						</a>
					{/if}
					
				{/if}
				
				{if $item.tiposolicitudId eq 3}
					{if $item.estatus ne 'completado'}
					<a  href="javascript:void(0)" onClick='realizarBaja({$item.solicitudId})' title='REALIZAR BAJA'>
						<i class="material-icons md-16">thumb_down</i>
					</a>
					{/if}
				
				{/if}
				{if $item.tiposolicitudId  ne 3}
				<a href="javascript:void(0)" onClick='validarPago({$item.solicitudId})' title='VALIDAR PAGO'>
					<i class="material-icons md-16">ic_check_box</i>
				</a>
				{/if}
			</td>
		</tr>
	{/foreach}
		
	</tbody>
</table>