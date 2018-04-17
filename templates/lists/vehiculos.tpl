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
					
					<input type="checkbox" name="docente_{$subject.personalId}">
					
			</td>
		</tr>
		{/foreach}
	</tbody>
</table>