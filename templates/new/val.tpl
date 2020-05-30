<div class="portlet box {$PORTLET_COLOR}">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i>Valoración
        </div>
        <div class="actions">
			<a class="btn red" href="#" title="IMPRIMIR" onClick="onImprimirVal('{$mId}','{$type}')">
			Imprimir
			</a>
        </div>
    </div>

    <div class="portlet-body" style='text-align:justify'>

		<center><h1>Avance {$lstPreguntas.totalAlumnos} / {$lstPreguntas.totalGrupo}  </h1>


			<table width="80% !important" class="tblGral table table-bordered table-striped table-condensed flip-content">
				<tr><td><b>(7)</b> Totalmente en desacuerdo</td></tr>
				<tr><td><b>(8)</b> En desacuerdo</td></tr>
				<tr><td><b>(9)</b> De acuerdo</td></tr>
				<tr><td><b>(10)</b> Totalmente de acuerdo</td></tr>
			</table>

		</center>

        <div id="tblContentActa">

			<div class="tabbable portlet-tabs">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#portlet_tabp_1" data-toggle="tab">Resultados</a>
					</li>
					<li >
						<a href="#portlet_tabp_2" data-toggle="tab">Comentarios</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="portlet_tabp_1">
						<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
							<thead>
								<tr>

									<th style="text-align:center"><b></b></th>
									<th style="text-align:center"><b>Rubro</b></th>
									<!--<th align="center">Total de Puntos </th>-->
									<th style="text-align:center"><b>Promedio </b></th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$lstPreguntas.result item=subject}
								<tr>

									<td align="center"><a href="javascript:void(0)" onClick="verTr('{$subject.categoriapreguntaId}')">[+]</a></td>
									<td align="center">{$subject.nombre}</td>
									<!--<td align="center">{$subject.sumR}</td>-->
									<td align="center">{$subject.promedio}</td>

								</tr>
								<tr style="display:none" id="tr_{$subject.categoriapreguntaId}">
									<td colspan="3">
										<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
											<tr>
												<td><b>Pregunta</b></td>
												<td><b>Promedio</b></td>
											</tr>
											{foreach from=$subject.lstPreguntas item=item}
											<tr>
												<td>{$item.pregunta}</td>
												<td>{$item.totalPp}</td>
											</tr>
											{/foreach}
										</table>
									</td>
								</tr>
								{/foreach}
							</tbody>
						</table>
					</div>
					<div class="tab-pane " id="portlet_tabp_2" >

						<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
							<thead>
								<tr>

									<th style="text-align:center">Comentario </th>

								</tr>
							</thead>
							<tbody>
								{foreach from=$lstPreguntas.lstComentarios item=subject}
								<tr>

									<td align="center">{$subject.comentario}</td>


								</tr>
								{/foreach}
							</tbody>
						</table>
					</div>
				</div>
			</div>


        </div>
    </div>
</div>
