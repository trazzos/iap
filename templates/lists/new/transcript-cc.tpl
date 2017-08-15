<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
	<thead>
    	<tr>
			<th width="">Fecha de Solicitud</th>	 
			<th width="">Estatus</th>		 
	 
			<th width=""></th>		 
		</tr>
    </thead>
    <tbody>
    	{foreach from=$registros item=item}
    	<tr>
			<td align="center">{$item.fechaSolicitud}</td>
			<td align="center">{$item.estatus}</td>
			<td align="center">
				<a href="{$WEB_ROOT}/alumnos/comprobantes/{$item.ruta}" target='_blank' title='COMPROBANTE DE PAGO'>
					<i class="fa fa-file" aria-hidden="true"></i>
				</a>
				
				<a href="{$WEB_ROOT}/alumnos/constancia/{$item.ruta}" target='_blank' title='CONSTANCIA DE ESTUDIOS SIN CALIFICACIONES'>
					<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
				</a>
				
			</td>
		</tr>
	{/foreach}
		
	</tbody>
</table>