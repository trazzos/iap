<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i>Carta Descriptiva
        </div>
        <div class="actions">
			<a class="btn red" href="#" title="IMPRIMIR" onClick="onImprimirCarta('{$info.courseModuleId}')">
			Imprimir
			</a>
        </div>
    </div>
	
    <div class="portlet-body" style='text-align:justify'>
			
	<form id="frmGral" >
			<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
				<tr>
					<td style="width:280px">Nombre del Curso</td>
					<td>{$info.name}</td>
				</tr>
				<tr>
					<td>Institución</td>
					<td>Instituto de Administración Pública del estado de Chiapas A.C.</td>
				</tr>
				<tr>
					<td>Nombre del Instructor</td>
					<td></td>
				</tr>
			</table>
			<br>
			<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
				<tr>
					<td style="width:280px">Perfil del Participante</td>
					<td>
					<textarea name="perfilParticipante" class="form-control"></textarea>
					</td>
				</tr>
				<tr>
					<td>Duracion</td>
					<td><input type="text" name="duracion" class="form-control"></td>
				</tr>
				<tr>
					<td>Num. Participantes</td>
					<td><input type="text" name="numParticipante" class="form-control"></td>
				</tr>
				<tr>
					<td>Horario</td>
					<td><input type="text" name="horario" class="form-control"></td>
				</tr>
			</table>
			<br>
			<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
				<tr>
					<td style="width:280px">Objetivo General</td>
					<td></td>
				</tr>
				<tr>
					<td>Objetivos Particulares</td>
					<td><textarea name="objetivoParticular" class="form-control"></textarea></td>
				</tr>
				<tr>
					<td>estructura Tematica</td>
					<td><textarea name="tematica" class="form-control"></textarea></td>
				</tr>
				<tr>
					<td>Criterios de Evaluación</td>
					<td><textarea name="criterioEvaluacion" class="form-control"></textarea></td>
				</tr>
				<tr>
					<td>Tecnicas Instruccionales</td>
					<td><textarea name="tecnicasInstruccionales" class="form-control"></textarea></td>
				</tr>
			</table>
			<br>
			<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
				<tr>
					<td colspan="2">Elaboracion de trabajos que evidencien sus avances en el proyecto</td>
				</tr>
				<tr>
					<td colspan="2">Requerimientos</td>
				</tr>
				<tr>
					<td style="width:280px">Lugar</td>
					<td><input type="text" name="lugar" class="form-control"></td>
				</tr>
				<tr>
					<td>Del equipo</td>
					<td><input type="text" name="delEquipo" class="form-control"></td>
				</tr>
				<tr>
					<td>Material Didactico</td>
					<td><input type="text" name="materialDidactico" class="form-control"></td>
				</tr>
			</table>
			<br>
			<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
				<tr>
					<td colspan="2">Bibliografia<br>
					<textarea name="bibliografia" class="form-control"></textarea>
					</td>
				</tr>
			</table>
	</form>
		<center>
			<button class="btn green" type="button" onClick="onSaveCarta()">Guardar</button>
		</center>
    </div>
</div>
