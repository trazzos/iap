<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
	<thead>
    	<tr>
			<th width="">Nombre</th>	 
			<th width="">Precio</th>	 		 
			<th width="">Acciones</th>		 
	 
		 
		</tr>
    </thead>
    <tbody>
    	{foreach from=$registros item=item}
    	<tr>
			<td align="center">{$item.nombre}</td>
			<td align="center">{$item.precio}</td>
			<td align="center">
				<i class="fa fa-pencil" aria-hidden="true"></i>
			</td>
		</tr>
	{/foreach}
		
	</tbody>
</table>