<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
	<thead>
    	<tr>
			
			<th style="text-align:center">Nombre </th>
			<th style="text-align:center">Licenciatura </th>
			<th style="text-align:center">Maestria </th>
			<th style="text-align:center">Doctorado </th>
 
		</tr>
    </thead>
    <tbody>
		{foreach from=$personals item=subject}
    	<tr>
			
			<td align="left">{$subject.lastname_paterno} {$subject.lastname_materno} {$subject.name} </td>
			<td align="left">{$subject.basica.estudios.0}</td>
			<td align="left">{$subject.basica.estudios.1}</td>
			<td align="left">{$subject.basica.estudios.2}</td>

		</tr>
		{/foreach}
	</tbody>
</table>