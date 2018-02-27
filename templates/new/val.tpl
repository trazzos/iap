<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i>Valoración
        </div>
        <div class="actions">
			<a class="btn red" href="#" title="IMPRIMIR" onClick="onImprimirVal('{$mId}','admin')">
			Imprimir
			</a>
        </div>
    </div>
	
    <div class="portlet-body" style='text-align:justify'>
	
		<center><h1>Avance {$lstPreguntas.totalAlumnos} / {$lstPreguntas.totalGrupo}  </h1></center>
		<br>
		<br>
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
									
									<th style="text-align:center"><b>Rubro</b></th>
									<!--<th align="center">Total de Puntos </th>-->	 
									<th style="text-align:center"><b>Promedio </b></th>	 
								</tr>
							</thead>
							<tbody>
								{foreach from=$lstPreguntas.result item=subject}
								<tr>
									
									<td align="center">{$subject.nombre}</td>
									<!--<td align="center">{$subject.sumR}</td>-->
									<td align="center">{$subject.promedio}</td>
									
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
