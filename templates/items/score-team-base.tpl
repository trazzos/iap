{foreach from=$theGroup item=item key=key}
        <tr id="1">
        <td align="center">{$item.teamId}</td>
        <td align="center">{$item.teamNumber}</td>
        <td align="center">
        {if $item.homework.path ne ''} 
        	<a href="{$item.homework}" target='_blank'>{$item.nombre}</a>
        {else}
        	Sin Entregar
        {/if}
        </td>
        <td align="center">
            <input  type="text" class = 'form-control' maxlength="5" size="5"  type="text" maxlength="5" size="5" name="ponderation[{$item.teamNumber}]" name="ponderation[{$item.teamNumber}]" value="{$item.ponderation}" />
        </td>
        <td align="center">
            <textarea class = 'form-control' style='width:300px; height:250px;' type="text" name="retro[{$item.teamNumber}]" name="ponderation[{$retro.teamNumber}]"  >{$item.retro}</textarea>
        </td>
		<td>
			<div id="divRetro_">
				{if $item.fileRetro ne ""}
				<a href="{$WEB_ROOT}/file_retro/{$item.fileRetro}" target="_blank">
					<img src="{$WEB_ROOT}/images/file.png" style="width:40px">
				</a>
				{/if}
				<input type="file" name="fileRetro_{$item.teamNumber}" id="fileRetro_{$item.teamNumber}" onChange="upFile({$item.teamNumber})">
			</div>
			
		</td>
    </tr>
{foreachelse}
	<tr><td colspan="4" align="center">No se encontr&oacute; ning&uacute;n registro.</td></tr>
{/foreach}

        