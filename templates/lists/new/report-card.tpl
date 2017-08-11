<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
	<thead>
    	<tr>
			<th width="">Tipo</th>
			<th width="">Nombre</th>		 
			<th width="">Grupo</th>		 
			<th width="">Modalidad</th>		 
			<th width="">Fecha Inicial</th>		 
			<th width="">Fecha Final</th>		 
			<th width="">Modulos</th>		 
			<th width=""></th>		 
		</tr>
    </thead>
    <tbody>
    	{foreach from=$finishedCourses item=subject}
		<tr>
		   
			<td align="center">{$subject.majorName}</td>
			<td align="center">{$subject.name}</td>
			  <td align="center">{$subject.group}
			<td align="center">{$subject.modality}</td>
			<td align="center">{$subject.initialDate|date_format:"%d-%m-%Y"}</td>
			<td align="center">{$subject.finalDate|date_format:"%d-%m-%Y"}</td>
			<td align="center">{$subject.courseModule}
		  
			<td align="center">
				<a href='javascript:void(0)' onClick='printBoleta({$subject.courseId})' >
				<i class="fa fa-download" aria-hidden="true"></i>
				</a>
			</td>
		 </tr>
		 {/foreach}
	</tbody>
</table>