<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
	<thead>
    	<tr>
			
			<th width="">Materia </th>
			<th width="">Estatus </th>
			<th width="">Programa académico </th>
			<th width="">Grupo</th>
			<th width="">Modalidad </th>
			<th width="">Fecha Materia </th>
			<th width="">Fecha Contrato </th>
			<th width="">No. de Contrato </th>
			<th width=""></th>	 
		</tr>
    </thead>
    <tbody>
		{foreach from=$registros item=subject}
    	<tr>
			
			<td align="center">{$subject.name}</td>
			<td align="center">{$subject.estatusFin}</td>
			<td align="center">{$subject.nameCar}</td>
			<td align="center">{$subject.group9}</td>
			<td align="center">{$subject.modality}</td>
			<td align="center">{if $subject.modality eq 'Online'} {$subject.initialDate} - {$subject.finalDate} {else} {$subject.fechaMateria} {/if}</td>
			<td align="center">{$subject.fechaContrato}</td>
			<td align="center">
			{if $subject.totalPagar ne '0.00'}
			<table>
				<tr>
					<td><b>Importe:</b></td>
					<td>$ {$subject.importe}</td>
				</tr>
				<tr>
					<td><b>IVA:</b></td>
					<td>$ {$subject.iva}</td>
				</tr>
				<tr>
					<td><b>Subtotal:</b></td>
					<td><b>$  {$subject.subtotal|number_format:2:'.':','}</b></td>
				</tr>
				<tr>
					<td><b>ISR:</b></td>
					<td>$ {$subject.isr}</td>
				</tr>
				<tr>
					<td><b>RET. IVA:</b></td>
					<td>$ {$subject.retIva}</td>
				</tr>
				<tr>
					<td><b>Total a Pagar: </b></td>
					<td><b>${$subject.totalPagar}</b></td>
				</tr>
			</table>
			{/if}
			
			</td>
			<td align="center">{$subject.noContrato}</td>
			<td align="center">
				<a href="{$WEB_ROOT}/graybox.php?page=val&id={$subject.courseModuleId}" data-target="#ajax" data-toggle="modal" data-width="1000px" title='VALORACION'>
					<i class="material-icons md-16">insert_chart</i>
				</a>	
				<a href="{$WEB_ROOT}/graybox.php?page=eval&id={$subject.courseModuleId}" data-target="#ajax" data-toggle="modal" data-width="1000px" title='EVALUACIONES'>
					<i class="material-icons md-16">star</i>
				</a>
				<a href="{$WEB_ROOT}/graybox.php?page=editar-contra&id={$subject.courseModuleId}&personalId={$pId}" data-target="#ajax" data-toggle="modal" data-width="1000px" title='EDITAR INFORMACION'>
						<i class="material-icons md-16">create</i>
				</a>
				{*<a href="{$WEB_ROOT}/graybox.php?page=cedula-contra&id={$subject.courseModuleId}&personalId={$pId}" data-target="#ajax" data-toggle="modal" data-width="1000px" title='CEDULA CONTRATO'>
						<i class="material-icons md-16">featured_play_list</i>*}
				</a>
				<a href="{$WEB_ROOT}/graybox.php?page=down-contrato&id={$subject.courseModuleId}&personalId={$pId}" data-target="#ajax" data-toggle="modal" data-width="1000px" title='CONTRATOS'>
						<i class="material-icons md-16">featured_video</i>
				</a>
			</td>
		</tr>
		{/foreach}
	</tbody>
</table>