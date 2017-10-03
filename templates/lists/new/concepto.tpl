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
				 <a   id="" href="{$WEB_ROOT}/graybox.php?page=add-concepto&id={$item.tiposolicitudId}" data-target="#ajax" data-toggle="modal" data-width="1000px" title='EDITAR'>
					<i class="fa fa-plus"></i>
				</a>
			</td>
		</tr>
	{/foreach}
		
	</tbody>
</table>