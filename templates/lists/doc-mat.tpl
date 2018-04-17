<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
	<thead>
    	<tr>
			
			<th style="text-align:center">Nombre </th>
			<th style="text-align:center">Correo </th>
			<th style="text-align:center">Celular </th>
			<th style="text-align:center">Acciones</th>		 
		</tr>
    </thead>
    <tbody>
		{foreach from=$personals item=subject}
    	<tr>
			
			<td align="left">{$subject.lastname_paterno} {$subject.lastname_materno} {$subject.name} </td>
			<td align="left">{$subject.correo}</td>
			<td align="left">{$subject.celular}</td>
			
			
			<td align="center" style='width:253px'>
					
					
					<a href="#" onClick="onPrintMaterias('{$subject.personalId}')" title='MATERIAS'>
						<i class="material-icons md-16">business_center</i>
					</a>
					
					
			</td>
		</tr>
		{/foreach}
	</tbody>
</table>