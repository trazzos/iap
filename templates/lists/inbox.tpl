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
        <td align="center">{$subject.name} {$subject.lastname_paterno} {$subject.lastname_materno}</td>
        <td align="center">{$subject.nombreMateria}</td>
        <td align="center">{$subject.fechaEnvio}</td>
        <td align="center"></td>
    </tr>
    {foreachelse}
    <tr>
        <td colspan="4" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
    </tr>
{/foreach}
   </tbody>
</table>