<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
	<thead>
    	<tr>
			<th width="">Docente</th>	 
			<th width="">Posgrado</th>	 
			<th width="">Modalidad</th>	 
			<th width="">Grupo</th>	 
			<th width="">Materia</th>	 
			<th width="">Vigencia</th>	 
			<th width="">Estatus</th>	 
	 
		</tr>
    </thead>
    <tbody>
    	{foreach from=$lsReporte item=subject}
		<tr>
		   
			<td align="center">{$subject.name} {$subject.lastname_paterno} {$subject.lastname_materno}</td>
			<td align="center">{$subject.nameS}</td>
			<td align="center">{$subject.modality}</td>
			<td align="center">{$subject.group}</td>
			<td align="center">{$subject.nameM}</td>
			<td align="center">{$subject.initialDate} - {$subject.finalDate}</td>
			<td align="center">{$subject.estatusAc} </td>
		  
			
		 </tr>
		 {/foreach}
	</tbody>
</table>