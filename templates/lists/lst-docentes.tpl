<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
	<thead>
    	<tr>
			
			<th style="text-align:center">Nombre </th>
			<th style="text-align:center">Correo </th>
			<th style="text-align:center">Celular </th>
			<th style="text-align:center">Acciones</th>		 
		</tr>
    </thead>
    <tbody>
		{foreach from=$personals item=subject}
    	<tr>
			
			<td align="left">{$subject.lastname_paterno|upper} {$subject.lastname_materno|upper} {$subject.name|upper} </td>
			<td align="left"><a href="mailto:{$subject.correo}">{$subject.correo}</a></td>
			<td align="left">{$subject.celular}</td>
			
			
			<td align="center" style='width:253px'>
					
					<a href="{$WEB_ROOT}/graybox.php?page=info-docente&id={$subject.personalId}&cId=si" data-target="#ajax" data-toggle="modal" data-width="1000px" title='INFORMACION'>
						<i class="material-icons md-16">info</i>
					</a>
					<!--
					<a href="{$WEB_ROOT}/graybox.php?page=info-docente&id={$subject.personalId}&cId=no" data-target="#ajax" data-toggle="modal" data-width="1000px" title='EDITAR INFORMACION'>
						<i class="material-icons md-16">create</i>
					</a>-->

					<a href="{$WEB_ROOT}/graybox.php?page=doc-docente&id={$subject.personalId}&cId=admin" data-target="#ajax" data-toggle="modal" data-width="1000px" title='DOCUMENTOS'>
						<i class="material-icons md-16">folder</i>
					</a>
					<a href="{$WEB_ROOT}/materias&id={$subject.personalId}"  title='MATERIAS'>
						<i class="material-icons md-16">business_center</i>
					</a>
					<a  href="javascript:void(0)" onClick='descargarAutoPdf("{$subject.personalId}")' target='_blank' title='AUTOMOVIL'>
						<i class="material-icons md-16">local_taxi</i>
					</a>
					<a href="{$WEB_ROOT}/graybox.php?page=val&personalId={$subject.personalId}" data-target="#ajax" data-toggle="modal" data-width="1000px" title='VALORACION'>
						<i class="material-icons md-16">insert_chart</i>
					</a>	
					<a  href="javascript:void(0)" onClick='onDelete("{$subject.personalId}")'  title='ELIMINAR'>
					<i class="material-icons md-16">delete_forever</i>
					</a>
					
			</td>
		</tr>
		{/foreach}
	</tbody>
</table>