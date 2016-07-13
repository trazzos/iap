{foreach from=$scheduleGroups item=item key=key}
        <tr id="1">
        <td align="center" class="id">{$item.scheduleGroupId}</td>
        <td>{$item.major}</td>
        <td align="center">{$item.semester}</td>
        <td align="center">{$item.group}</td>
        <td align="center">
        <a href="{$WEB_ROOT}/schedule-group/schGpoId/{$item.scheduleGroupId}">
        <img src="{$WEB_ROOT}/images/icons/add.png" border="0" /></a>
        </td>
        <td class="act">            
            <img src="{$WEB_ROOT}/images/b_dele.png" class="spanDelete" id="{$item.scheduleGroupId}"/>
            <img src="{$WEB_ROOT}/images/b_edit.png" class="spanEdit" id="{$item.scheduleGroupId}"/>
        </td>
    </tr>
{foreachelse}
<tr><td colspan="6" align="center">No se encontr&oacute; ning&uacute;n registro.</td></tr>				
{/foreach}
