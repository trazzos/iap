<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
    <thead>
    <tr>

		<th width="100" style="text-align:center">Clave</th>
		<th width="100" style="text-align:center">Cuatrimestre</th>
		<th width="200" style="text-align:center">Nombre materia</th>
		<th width="80" style="text-align:center">Docente</th>
		<th width="80" style="text-align:center">Vigencia</th>
		<th width="80" style="text-align:center">Plan de Estudios</th>
		<th width="80" style="text-align:center">Carta Descriptiva</th>
		<th width="80" style="text-align:center">Encuadre</th>
		<th width="80" style="text-align:center">Rubrica</th>
		<th width="80" style="text-align:center">Acta de Calificaciones</th>

	
	</tr>
    </thead>
    <tbody>
		<input type="hidden" value="0" id="recarga" name="recarga">
		{foreach from=$result item=subject}
			<tr>
				<td align="center">{$subject.clave}</td>
				<td align="center">{$subject.semesterId}</td>
				<td align="center">{$subject.name}</td>
				<td align="center">{if $subject.nombrePersonal eq ''} Sin Asignar {else} {$subject.nombrePersonal} {/if}</td>
				<td align="center">{$subject.initialDate} - {$subject.finalDate}</td>

				<td align="center">
				
					{if $subject.rutaPlan eq ''}
						<a href="{$WEB_ROOT}/graybox.php?page=up-plan&id={$subject.courseId}&cmId={$subject.courseModuleId}" data-target="#ajax" data-toggle="modal" data-width="1000px" title='SUBIR'>
							<i class="material-icons md-16">cloud_upload</i>
						</a>
					{/if}
					{if $subject.rutaPlan  ne ''}
					<a href="{$WEB_ROOT}/materia/{$subject.rutaPlan}" target='_blank'  title='VER PLAN DE ESTUDIOS'>
						<i class="material-icons md-16">visibility</i>
					</a>
					
					<a href="javascript:void(0)" onClick="onDelete('{$subject.courseModuleId}','{$subject.courseId}')"  title='ELIMINAR PLAN DE ESTUDIOS'>
						<i class="material-icons md-16">delete_forever</i>
					</a>
					{/if}
				</td>
				<td align="center">
				
					{if $subject.rutaCarta  ne ''}
					<a href="{$WEB_ROOT}/docentes/carta/{$subject.rutaCarta}" target='_blank'  title='CARTA DESCRIPTIVA'>
						<i class="material-icons md-16">chrome_reader_mode</i>
					</a>
					<a href="javascript:void(0)" onClick="onDeleteCarta('{$subject.courseModuleId}','{$subject.courseId}')"  title='ELIMINAR CARTA DESCRIPTIVA'>
						<i class="material-icons md-16">delete_forever</i>
					</a>
					{else}
					<font color="red">S/I</font>
					{/if}
					
				</td>
				<td align="center">
				
					{if $subject.rutaEncuadre  ne ''}
					<a href="{$WEB_ROOT}/docentes/encuadre/{$subject.rutaEncuadre}" target='_blank'  title='ENCUADRE'>
						<i class="material-icons md-16">chrome_reader_mode</i>
					</a>
					<a href="javascript:void(0)" onClick="onDeleteEncuadre('{$subject.courseModuleId}','{$subject.courseId}')"  title='ELIMINAR CARTA DESCRIPTIVA'>
						<i class="material-icons md-16">delete_forever</i>
					</a>
					{else}
					<font color="red">S/I</font>
					{/if}
					
				</td>
				<td align="center">
				
					{if $subject.rutaRubrica  ne ''}
					<a href="{$WEB_ROOT}/docentes/rubrica/{$subject.rutaRubrica}" target='_blank'  title='RUBRICA'>
						<i class="material-icons md-16">chrome_reader_mode</i>
					</a>
					<a href="javascript:void(0)" onClick="onDeleteRubrica('{$subject.courseModuleId}','{$subject.courseId}')"  title='ELIMINAR CARTA DESCRIPTIVA'>
						<i class="material-icons md-16">delete_forever</i>
					</a>
					{else}
					<font color="red">S/I</font>
					{/if}
					
				</td>
				<td>
					{if $subject.rutaActa ne ''}
					<a href="{$WEB_ROOT}/docentes/calificaciones/{$subject.rutaActa}" target='_blank'  title='VER ACTA DE CALIFICACIONES'>
						<i class="material-icons md-16">description</i>
					</a>
					{else}
					<a href="{$WEB_ROOT}/graybox.php?page=up-acta&id={$subject.courseId}&cmId={$subject.courseModuleId}" data-target="#ajax" data-toggle="modal" data-width="1000px" title='SUBIR'>
						<i class="material-icons md-16">cloud_upload</i>
					</a>
					<font color="red">S/I</font>
					{/if}
				</td>
				

			</tr>
			{foreachelse}
			<tr>
				<td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
			</tr>
		{/foreach}

    </tbody>
</table>