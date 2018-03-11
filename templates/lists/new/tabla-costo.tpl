<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
    <thead>
    <tr>
		<th width="30" height="28">ID</th>
		<th width="100" style="text-align:center">Clave</th>
		<th width="100" style="text-align:center">Tipo</th>
		<th width="200" style="text-align:center">Nombre</th>
		<th width="80" style="text-align:center">Modalidad</th>
		<th width="80" style="text-align:center">Tarifa</th>
		<th width="80" style="text-align:center">Horas Materia</th>
		<th width="100">Acciones</th>
	</tr>
    </thead>
    <tbody>
		<input type="hidden" value="0" id="recarga" name="recarga">
		{foreach from=$subjects item=subject}
			<tr>
				<td align="center" class="id">{$subject.courseId}</td>
				<td align="center">{$subject.clave}</td>
				<td align="center">{$subject.majorName}</td>
				<td align="center">{$subject.name}</td>
				<td align="center">{if $subject.modality eq 'Local'}Presencial{else}{$subject.modality}{/if}</td>
				<td align="center">{$subject.tarifa}</td>
				<td align="center">{$subject.hora}</td>
				<td align="center">
				
					<a href="{$WEB_ROOT}/graybox.php?page=edit-costo&id={$subject.courseId}&cId=no" data-target="#ajax" data-toggle="modal" data-width="1000px" title='EDITAR INFORMACION'>
						<i class="material-icons md-16">create</i>
					</a>
				</td>
				

			</tr>
			{foreachelse}
			<tr>
				<td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
			</tr>
		{/foreach}

    </tbody>
</table>