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
				<i class="fa fa-cloud-download" aria-hidden="true"></i>
				</a>
			</td>
		 </tr>
		 {/foreach}
	</tbody>
</table>