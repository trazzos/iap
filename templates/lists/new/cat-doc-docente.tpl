<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
	<thead>
    	<tr> 
			<th width="">Documento</th>	 
			<th width="">Descripcion</th>	 
		 
			<th width=""></th>		 
		</tr>
    </thead>
    <tbody>
    	{foreach from=$registros item=subject}
		<tr>
		   

			<td align="center">{$subject.nombre}</td>
			<td align="center">{$subject.descripcion}</td>

			<td align="center">
			
			
						<a  href="{$WEB_ROOT}/graybox.php?page=add-docdocente&id={$subject.catalogodocumentoId}" data-target="#ajax" data-toggle="modal" data-width="1000px" title='ENVIAR COMPROBANTE DE PAGO'>
							<i class="material-icons md-16">create</i>
						</a>
		
						<a  href="#"  onClick="loadTR('{$subject.catalogodocumentoId}')" title='SUBIR DOCUMENTO'>
							<i class="material-icons md-16">delete_forever</i>
						</a>
				
			</td>
		 </tr>
		 {/foreach}
	</tbody>
</table>