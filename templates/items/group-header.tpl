<tr>
      <th width="80">Usuario</th>
     	 {if $cursos=="ESPECIALIDAD" || $cursos=="MAESTRIA"} <th width="80">Matricula</th>{/if}
      <th width="200">Nombre</th>
      <th width="50">Equipo</th>
			{section name=foo loop=$totalActividades} 
		    <th width="60">Cal. {$smarty.section.foo.iteration}</th> 
			{/section}
      <th width="200">Acumulado</th>
</tr>