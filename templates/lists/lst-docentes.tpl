<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
	<thead>
    	<tr>
			
			<th width="">Nombre </th>
			<th width="">Correo </th>
			<th width="">Celular </th>
			<th width="">Acciones</th>		 
		</tr>
    </thead>
    <tbody>
		{foreach from=$personals item=subject}
    	<tr>
			
			<td align="center">{$subject.name} {$subject.lastname_paterno} {$subject.lastname_materno}</td>
			<td align="center">{$subject.correo}</td>
			<td align="center">{$subject.celular}</td>
			
			
			<td align="center">
			
				
					<a href="{$WEB_ROOT}/alumnos/solicitud/solicitud_{$subject.solicitudId}.pdf"   target='_blank' title='DESCARGAR CONSTANCIA'>
							<i class="material-icons md-16">cloud_download</i>
					</a>
					
				
			</td>
		</tr>
		{/foreach}
	</tbody>
</table>