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
				<a href="{$WEB_ROOT}/alumnos/comprobantes/{$item.ruta}" target='_blank' title='COMPROBANTE DE PAGO'>
					<i class="fa fa-file" aria-hidden="true"></i>
				</a>
				{/if}
				<a  href="{$WEB_ROOT}/graybox.php?page=add-documento&id={$item.solicitudId}" data-target="#ajax" data-toggle="modal" data-width="1000px" title='ADJUNTAR DOCUMENTO'>
					<i class="fa fa-cloud-upload" aria-hidden="true"></i>
				</a>

			</td>
		</tr>
	{/foreach}
		
	</tbody>
</table>