<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
	<thead>
    	<tr>
			
			<th style="text-align:center">Titulo </th>
			<th style="text-align:center">Mensaje </th>	 
			<th style="text-align:center">Fecha </th>	 
			<th style="text-align:center">Acciones </th>	 
		</tr>
    </thead>
    <tbody>
		{foreach from=$personals item=subject}
    	<tr>
			
			<td align="left">{$subject.titulo}</td>
			<td align="left">{$subject.mensaje}</td>
			<td align="left">{$subject.fecha}</td>
			<td align="left">
				<a  href="{$WEB_ROOT}/graybox.php?page=add-msj&id={$subject.mensajeId}" data-target="#ajax" data-toggle="modal" data-width="1000px" title='SUBIR DOCUMENTO'>				
				<i class="material-icons md-16">search</i>
				</a>
			</td>
		</tr>
		{/foreach}
	</tbody>
</table>