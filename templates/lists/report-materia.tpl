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
			<td align="left">
				{$subject.basica.estudios.0.carrera}|{$subject.basica.estudios.0.escuela}<br>
					
					{if $subject.basica.estudios.0.titulo eq 'si'} <li> Titulo{/if}
					{if $subject.basica.estudios.0.actaExamen eq 'si'} <li>Acta de Examen{/if}
					{if $subject.basica.estudios.0.cedula eq 'si'}  <li>Cedula{/if}
			</td>
			<td align="left">
					{$subject.basica.estudios.1.carrera}|{$subject.basica.estudios.1.escuela}<br>
					{if $subject.basica.estudios.1.titulo eq 'si'} <li> Titulo{/if}
					{if $subject.basica.estudios.1.actaExamen eq 'si'}  <li>Acta de Examen{/if}
					{if $subject.basica.estudios.1.cedula eq 'si'}  <li>Cedula{/if}
			</td>
			<td align="left">
					{$subject.basica.estudios.2.carrera}|{$subject.basica.estudios.1.escuela}<br>
					{if $subject.basica.estudios.2.titulo eq 'si'} <li> Titulo{/if}
					{if $subject.basica.estudios.2.actaExamen eq 'si'}<li>  Acta de Examen{/if}
					{if $subject.basica.estudios.2.cedula eq 'si'}<li>  Cedula{/if}
			</td>

		</tr>
		{/foreach}
	</tbody>
</table>