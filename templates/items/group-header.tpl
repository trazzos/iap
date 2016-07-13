<tr>
      <th width="100" height="28">ID</th>
      <th width="80">No. Control</th>
     	 {if $cursos=="ESPECIALIDAD" || $cursos=="MAESTRIA"} <th width="80">Matricula</th>{/if}
      <th width="200">Nombre</th>
      <th width="200">Equipo</th>
			{section name=foo loop=$totalActividades} 
		    <th width="60">Cal. {$smarty.section.foo.iteration}</th> 
			{/section}
      <th width="200">Acumulado</th>
</tr>