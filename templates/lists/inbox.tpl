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
			
			<a href='{$WEB_ROOT}/view-inbox/id/{$subject.courseModuleId}/cId/{$subject.chatId}' style =' text-decoration:none'>
			<font style='text-transform:lowercase; color:#777'>{$subject.nombre} {$subject.paterno} {$subject.materno}</font>
			</a>
		</td>
        <td align="left">
			<a href='{$WEB_ROOT}/view-inbox/id/{$subject.courseModuleId}/cId/{$subject.chatId}' style =' text-decoration:none'>
				<font style='text-transform:lowercase; color:#777'>{$subject.asunto}</font><br>
				<i><font style='text-transform:lowercase; color:#777'>{$subject.nombreMateria}</font></i>
			</a>
			
			{if $subject.rutaAdjunto ne ''}
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="{$WEB_ROOT}/images/clip.png" style="width:19px">
			{/if}
		</td>
        <td align="left">{$subject.fechaEnvio}</td>
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