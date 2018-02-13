<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i>Valoración
        </div>
        <div class="actions">
		
        </div>
    </div>
	
    <div class="portlet-body" style='text-align:justify'>
	
		<center><h1>Avance {$lstPreguntas.totalAlumnos} /   </h1></center>
		<br>
		<br>
        <div id="tblContentActa">
           
		   <table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
				<thead>
					<tr>
						
						<th width="">Rubro </th>
						<th width="">Total </th>	 
						<th width="">Promedio </th>	 
					</tr>
				</thead>
				<tbody>
					{foreach from=$lstPreguntas.result item=subject}
					<tr>
						
						<td align="center">{$subject.nombre}</td>
						<td align="center">{$subject.sumR}</td>
						<td align="center">{$subject.promedio}</td>
						
					</tr>
					{/foreach}
				</tbody>
			</table>
        </div>
    </div>
</div>
