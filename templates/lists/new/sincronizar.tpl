
<br>
<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
	<thead>
    	<tr>
			<th width="">Nombre de la tabla</th>	 
			<th width="">Ultimo Registro Sincronizado</th>	 		 
			<th width="">Fecha de Actualizacion</th>	 		 
	 
	 
		 
		</tr>
    </thead>
    <tbody>
    	{foreach from=$registros item=item}
    	<tr>
			<td align="center">{$item.nombre}</td>
			<td align="center">{$item.ultimoRegistro}</td>
			<td align="center">{$item.fechaSincronizacion}</td>

		</tr>
	{/foreach}
		
	</tbody>
</table>