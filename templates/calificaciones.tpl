<div>
	<h3>Actas de Calificaciones</h3>
    <hr />
    <form id="frmCalificaciones" name="frmCalificciones" method="post">
		Periodo
		<select id="selPeriodo" name="selPeriodo">
			{html_options values=$optPeriodosIds output=$optPeriodosOut selected=$optPeriodosSel}
		</select>
		- Semestre
		<select id="selSemestre" name="selSemestre">
			{html_options values=$optSemestersIds output=$optSemestersOut selected=$optSemestersSel}
		</select>
		- Grupo
		<select id="selGrupo" name="selGrupo">
			{html_options values=$optGruposIds output=$optGruposOut selected=$optGruposSel}
		</select>
		<input type="button" id="btnVerificarActa" name="btnActaCalificaciones" value="Verificar" />
		<input type="button" id="btnGenerarNvActa" name="btnActaCalificaciones" value="Generar" />
		<hr />
	</form>
</div>