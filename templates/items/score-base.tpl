{foreach from=$theGroup item=item key=key}
        <tr id="1">
        <td align="center">{$item.controlNumber}</td>
        <td align="left">{$item.lastNamePaterno} {$item.lastNameMaterno} {$item.names}</td>
        <td align="center">
        {if $item.homework}
		{assign var="entrega" value="1"}
        	<a href="{$WEB_ROOT}/download.php?file=homework/{$item.homework.path}">
          {if $item.homework.nombre}{$item.homework.nombre}{else}Tarea{/if}</a>
        
		{else}
		      {assign var="entrega" value="0"}
        	Sin Entregar
        {/if}
        </td>
        <td align="center">
            <input type="text" maxlength="5" size="5"   {*if $entrega==0} disabled {/if*}  name="ponderation[{$item.alumnoId}]" name="ponderation[{$item.alumnoId}]" value="{$item.ponderation}" />
        </td>
        <td align="center">
            <input type="text" name="retro[{$item.alumnoId}]" {*if $entrega==0} disabled {/if*} name="retro[{$item.alumnoId}]" value="{$item.retro}" />
        </td>
		<td>
			<div id="divRetro_">
				{if $item.fileRetro ne ""}
				<a href="{$WEB_ROOT}/file_retro/{$item.fileRetro}" target="_blank">
					<img src="{$WEB_ROOT}/images/file.png" style="width:40px">
				</a>
				{/if}
				<input type="file" name="fileRetro_{$item.alumnoId}" id="fileRetro_{$item.alumnoId}" onChange="upFile({$item.alumnoId})">
			</div>
			
		</td>
    </tr>
{foreachelse}
	<tr><td colspan="4" align="center">No se encontr&oacute; ning&uacute;n registro.</td></tr>
{/foreach}

        <tr>
        <td colspan="4" align="center">
            <input type="submit" name="Enviar" name="Enviar" value="Actualizar Calificaciones" />
        </td>
    </tr>
