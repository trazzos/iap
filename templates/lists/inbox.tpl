<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
<thead>
<tr>
    <th width="300"></th>
    <th width="500"></th>
    <th width="50"></th>
    <th width="60"></th>
</tr>
</thead>
<tbody>
{foreach from=$lstMsj item=subject}
    <tr>
        <td align="center"><a href='{$WEB_ROOT}/reply-inbox/id/{$courseMId}/cId/{$subject.chatId}'>{$subject.nombre} {$subject.paterno} {$subject.materno}</a></td>
        <td align="center">{$subject.nombreMateria}</td>
        <td align="center">{$subject.fechaEnvio}</td>
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