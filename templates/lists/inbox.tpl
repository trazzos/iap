<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
<thead>
<tr>
    <th colspan="4">
		<div class="btn-toolbar">
			<div class="btn-group">
				<a class="btn btn-primary" href="javascript:;" data-toggle="dropdown" aria-expanded="false">
				<i class="fa fa-list-alt"></i>
				 Acciones
				<i class="fa fa-angle-down"></i>
			</a>
			<ul class="dropdown-menu">
				
				<li>
					<a href="javascript:;" onclick="accionesEliminar()">
						<i class="fa fa-share"></i>
							Eliminar Mensajes
					</a>
				</li>
				<li>
					<a href="javascript:;" onclick="accionesFavoritos()">
						<i class="fa fa-share-square"></i>
							Agregar a Favoritos
					</a>
				</li>
			</ul>
			</div> 	
		</div>
	</th>
</tr>
</thead>
<tbody>

{foreach from=$lstMsj item=subject}
    <tr>
        <td align="left">
			<input type="checkbox" name="check_{$subject.chatId}" id="check_{$subject.chatId}" value="{$subject.chatId}">
			&nbsp;&nbsp;
			{if $subject.favorito eq 'si'}
				<i class="fa fa-star" aria-hidden="true"></i>
			{else}
				&nbsp;
			{/if}
			<a href='{$WEB_ROOT}/view-inbox/id/{$subject.courseModuleId}/cId/{$subject.chatId}&or={$or}' style =' text-decoration:none'>
			{if $subject.leido eq 'no'}
			<b>
			{/if}
			<font style='text-transform:lowercase; color:#777'>{$subject.nombre} {$subject.paterno} {$subject.materno}</font>
			{if $subject.leido eq 'no'}
			</b>
			{/if}
			</a>
		</td>
        <td align="left">
			<a href='{$WEB_ROOT}/view-inbox/id/{$subject.courseModuleId}/cId/{$subject.chatId}' style =' text-decoration:none'>
				<i>
				{if $subject.leido eq 'no'}
				<font style='text-transform:lowercase; color:#0078D7'>
				{else}
				<font style='text-transform:lowercase; color:#777'>
				{/if}
				{$subject.asunto}</font><br>
				{if $subject.leido eq 'no'}
				<font style='text-transform:lowercase; color:#0078D7'>
				{else}
				<font style='text-transform:lowercase; color:#777'>
				{/if}
				{$subject.nombreMateria}</font></i>
			</a>
			
			{if $subject.rutaAdjunto ne ''}
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="{$WEB_ROOT}/images/clip.png" style="width:19px">
			{/if}
		</td>
        <td align="left">
				{if $subject.leido eq 'no'}
					<font style='text-transform:lowercase; color:#0078D7'>
				{else}
					<font>
				{/if}
					{$subject.fechaEnvio}
				</font>
		</td>
        <td align="center">
			<a href="javascript:void(0)" onClick='deleteInbox("{$subject.chatId}","{$courseMId}")'  title="ELIMINAR INBOX">			
				<i class="material-icons md-16">delete_forever</i>
			</a> 
		</td>
    </tr>
    {foreachelse}
    <tr>
        <td colspan="4" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
    </tr>
{/foreach}
 
   </tbody>
</table>