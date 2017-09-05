<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
	<thead>
    	<tr>
			<th width=""></th>
			<th width="">Nombre</th>		 
			<th width="">Calificacion</th>		 
		 
			<th width=""></th>		 
		</tr>
    </thead>
    <tbody>
    	{foreach from=$finishedCourses item=subject}
		<tr>
		   
			<td align="center">{$subject.majorName}</td>
			<td align="center">{$subject.name}</td>
			 <td align="center">{$subject.group}
			<td align="center">
				<a href='javascript:void(0)' onClick='printBoleta({$subject.courseId})' >
				<i class="fa fa-download" aria-hidden="true"></i>
				</a>
			</td>
		 </tr>
		 {/foreach}
	</tbody>
</table>