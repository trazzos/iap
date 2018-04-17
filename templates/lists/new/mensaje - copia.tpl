<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
	<thead>
    	<tr>
			<th width="">Alumno</th>	 
			<th width="">Fecha</th>	 		 
			<th width="">Acciones</th>		 
	 
		 
		</tr>
    </thead>
    <tbody>
    	{foreach from=$lstchat item=item}
    	<tr>
			<td align="center">{$item.nombre}</td>
			<td align="center">{$item.fechaEnvio}</td>
			<td align="center">
			
					<a href="{$WEB_ROOT}/add-mensaje/m/{$item.chatId}"  title='ENVIAR MENSAJE'>
						<i class="material-icons md-16">description</i>
					</a>
					

			
			</td>
		</tr>
	{/foreach}
		
	</tbody>
</table>