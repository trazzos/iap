{foreach from=$payments item=subject}
    <tr>
        <td align="center" class="id">{$subject.paymentId}</td>
        <td align="center">{$subject.date}</td>
        <td align="center">{$subject.invoiceId}</td>
        <td align="left">{$subject.amount}</td>
        <td align="left">{$subject.amountApplied}</td>
        <td align="left">{$subject.credit}</td>
        <td align="left">{$subject.anticipo}</td>
        <td align="left">{$subject.paymentMethod}</td>
        <td align="left">{$subject.comments}</td>
        <td align="center">
        {if $User.type != "student"}
            <img src="{$WEB_ROOT}/images/icons/16/delete.png" class="spanDelete" id="d-{$subject.paymentId}" name="d-{$subject.name}" title="Eliminar" />&nbsp;
            {if $subject.status == "activo"}
          	<img src="{$WEB_ROOT}/images/icons/16/cancel.png" class="spanCancel" id="d-{$subject.paymentId}" name="d-{$subject.name}" title="Cancelar" />
            {else}
          	<img src="{$WEB_ROOT}/images/icons/16/activate.png" class="spanCancel" id="d-{$subject.paymentId}" name="d-{$subject.name}" title="Cancelar" />
            {/if}
        {/if}    
        </td>
    </tr>
{foreachelse}
	<tr>
    	<td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
{/foreach}
