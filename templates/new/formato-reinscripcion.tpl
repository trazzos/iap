<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i><b>Formato de Inscripción y Reinscripción</b> {$myModule.name|truncate:65:"..."} &raquo;
        </div>
        <div class="actions">

        </div>
    </div>
    <div class="portlet-body">
	<br>
	Es necesario descargar e imprimir el formato de reinscripción y llevarlo al área de control escolar para recabar las firmas correspondientes
	<br>
	<br>
	<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
		<thead>
			<tr>
				<th width="100">Descripción</th>
				<th width="80">Cuatrimestre / Semestre</th>
				<th width="60">Descargar</th>
			</tr>
		</thead>
		<tbody>
			{foreach from=$lstSemestres item=subject}
			<tr>
				<td></td>
				<td>{$subject.semesterId}</td>
				<td>
					{if $subject.semesterId eq 1}
						<a href='{$WEB_ROOT}/files/solicitudes/{$userId}_{$courseId}.pdf' target="_blank" >Descargar</a>
					{else if $subject.tiene eq 'si'}
						<a href="javascript:void(0)" onClick='descargaFormato({$courseId},{$subject.semesterId})' >Descargar</a>
					{else}
						<a href='{$WEB_ROOT}/reinscripcion/id/x/s/{$subjectId}&c={$courseId}&sId={$subject.semesterId}' >Llenar formato reinscripción</a>
					{/if}
				</td>
			</tr>
			{/foreach}
		</tbody>
	</table>
	
	
	
    </div>
</div>