{foreach from=$time item=item key=key}
        <tr>
        <td align="center" class="id">{$item.hrStart} - {$item.hrEnd}</td>       
        <td height="30" align="center">
        	{$info[$item.schtimeId][1]['subject']}
            <br />{$info[$item.schtimeId][1]['group']}
        </td>
        <td align="center">
        	{$info[$item.schtimeId][2]['subject']}
            <br />{$info[$item.schtimeId][2]['group']}
         </td>        
        <td align="center">
        	{$info[$item.schtimeId][3]['subject']}
            <br />{$info[$item.schtimeId][3]['group']}
         </td>
        <td align="center">
        	{$info[$item.schtimeId][4]['subject']}
            <br />{$info[$item.schtimeId][4]['group']}
         </td>
        <td align="center">
        	{$info[$item.schtimeId][5]['subject']}
            <br />{$info[$item.schtimeId][5]['group']}
         </td>
    </tr>
{foreachelse}
<tr><td colspan="6" align="center">No se encontr&oacute; ning&uacute;n registro.</td></tr>				
{/foreach}
