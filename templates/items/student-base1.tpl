{foreach from=$students item=item key=key}
        <tr>
		<td align="center">{$item.lastNamePaterno|upper}</td>
        <td align="center">{$item.lastNameMaterno|upper}</td>
         <td align="center">{$item.names|upper}</td>
        <td align="center">{$item.controlNumber}</td>
        <td align="center">
		{if $tipo eq 'matricula'}
				<input type="text" name="num_{$item.userId}" id="num_{$item.userId}" value="{$item.controlNumber}" class="form-control"></td>

		{else}
				<input type="text" name="num_{$item.userId}" id="num_{$item.userId}" value="{$item.referenciaBancaria}" class="form-control"></td>

		{/if}
    </tr>
{foreachelse}
	<tr>
    	<td colspan="11" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
    </tr>				
{/foreach}
