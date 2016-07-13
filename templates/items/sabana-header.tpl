<tr>
      <th width="100" height="28">ID</th>
      <th width="80">No. Control</th>
      <th width="100">Nombre</th>
			{foreach from=$addedModules item=modules} 
		    <th width="60">{$modules.clave}</th> 
			{/foreach}
      <th width="80">Cal. Final</th>
      <th width="100">Acciones</th>
</tr>