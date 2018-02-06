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
			
			
			<td align="center" style='width:253px'>
					
					<a href="{$WEB_ROOT}/graybox.php?page=info-docente&id={$subject.personalId}&cId=si" data-target="#ajax" data-toggle="modal" data-width="1000px" title='INFORMACION'>
						<i class="material-icons md-16">info</i>
					</a>
					<a href="{$WEB_ROOT}/graybox.php?page=info-docente&id={$subject.personalId}&cId=no" data-target="#ajax" data-toggle="modal" data-width="1000px" title='EDITAR INFORMACION'>
						<i class="material-icons md-16">create</i>
					</a>

					<a href="{$WEB_ROOT}/graybox.php?page=doc-docente&id={$subject.personalId}&cId=admin" data-target="#ajax" data-toggle="modal" data-width="1000px" title='DOCUMENTOS'>
						<i class="material-icons md-16">folder</i>
					</a>
					<a href="{$WEB_ROOT}/alumnos/solicitud/solicitud_{$subject.solicitudId}.pdf"   target='_blank' title='MATERIAS'>
						<i class="material-icons md-16">business_center</i>
					</a>
					<a  href="javascript:void(0)" onClick='descargarAutoPdf("{$subject.personalId}")' target='_blank' title='AUTOMOVIL'>
						<i class="material-icons md-16">local_taxi</i>
					</a>		
					<a  href="javascript:void(0)" onClick='onDelete("{$subject.personalId}")'  title='ELIMINAR'>
					<i class="material-icons md-16">delete_forever</i>
					</a>
					
			</td>
		</tr>
		{/foreach}
	</tbody>
</table>