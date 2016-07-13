{foreach from=$time item=item key=key}
        <tr>
        <td align="center">{$item.hrStart} - {$item.hrEnd}</td>       
        <td height="30" align="center">
        	{$info[$item.schtimeId][1]['subject']}
            <br />{$info[$item.schtimeId][1]['group']}
            {if $info[$item.schtimeId][1]['classRoom']}
             	- {$info[$item.schtimeId][1]['classRoom']}
            {/if}
        </td>
        <td align="center">
        	{$info[$item.schtimeId][2]['subject']}
            <br />{$info[$item.schtimeId][2]['group']}
            {if $info[$item.schtimeId][2]['classRoom']}
             	- {$info[$item.schtimeId][2]['classRoom']}
            {/if}
         </td>        
        <td align="center">
        	{$info[$item.schtimeId][3]['subject']}
            <br />{$info[$item.schtimeId][3]['group']}
            {if $info[$item.schtimeId][3]['classRoom']}
             	- {$info[$item.schtimeId][3]['classRoom']}
            {/if}
         </td>
        <td align="center">
        	{$info[$item.schtimeId][4]['subject']}
            <br />{$info[$item.schtimeId][4]['group']}
            {if $info[$item.schtimeId][4]['classRoom']}
             	- {$info[$item.schtimeId][4]['classRoom']}
            {/if}
         </td>
        <td align="center">
        	{$info[$item.schtimeId][5]['subject']}
            <br />{$info[$item.schtimeId][5]['group']}
            {if $info[$item.schtimeId][5]['classRoom']}
             	- {$info[$item.schtimeId][5]['classRoom']}
            {/if}
         </td>
    </tr>
{foreachelse}
<tr><td colspan="6" align="center">No se encontr&oacute; ning&uacute;n registro.</td></tr>				
{/foreach}
