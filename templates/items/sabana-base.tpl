{foreach from=$marks item=item key=key}
        <tr id="1">
        <td align="center">{$item.info.userId}</td>
        <td align="center">{$item.info.controlNumber}</td>
        <td align="center">{$item.info.lastNamePaterno} {$item.info.lastNameMaterno} {$item.info.names}</td>
        {foreach from=$addedModules item=modules} 
          <td width="60">{$item.marks.{$modules.courseModuleId}}</td> 
        {/foreach}
          <td width="60">{$item.marks.finalMark}</td> 
        <td align="center">
           <a style="color:#000000" target="_blank" href="{$WEB_ROOT}/certificado.php?id={$item.info.userId}&courseId={$id}">&raquo; Generar Certificado</a>
        </td>
    </tr>
{foreachelse}
	<tr><td colspan="4" align="center">No se encontr&oacute; ning&uacute;n registro.</td></tr>
{/foreach}