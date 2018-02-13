<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
	<thead>
    	<tr>
			<th width="">Documento</th>	 
			<th width=""></th>		 
		</tr>
    </thead>
    <tbody>
    	{foreach from=$registros item=subject}
		<tr>
		   
			<td align="center">{$subject.nombre}</td>
		  
			<td align="center">
				<a  href="{$WEB_ROOT}/docentes/repositorio/{$subject.ruta}"  target='_blank' title='DESCARGAR REPOSITORIO'>
				<i class="material-icons md-16">cloud_download</i>
				</a>
				 {if !$docente}
				<a href="#" onClick="deleteRepositorio({$subject.repositorioId})"  title='ELIMINAR REPOSITORIO'>
					<i class="material-icons md-16">delete_forever</i>
				</a>
				{/if}
			</td>
		 </tr>
		 {/foreach}
	</tbody>
</table>