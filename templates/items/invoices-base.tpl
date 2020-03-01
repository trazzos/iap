{foreach from=$invoices item=subject}
    <tr>
        <td align="center" class="id">{$subject.invoiceId}</td>
        <td align="center">{$subject.name}</td>
        <td align="center">{$subject.lastNamePaterno} {$subject.lastNameMaterno} {$subject.names}</td>
        <td align="center">{$subject.dueDate}</td>
        <td align="center">${$subject.amount}</td>
        <td align="center">${$subject.payment} {if $subject.payment>0} <a href="{$WEB_ROOT}/view-payments/id/{$subject.invoiceId}" title="Ver Pagos" onclick="return parent.GB_show('Ver Pagos', this.href,250,700) " style="color:#000" >(Ver)</a></td>{/if}
        <td align="center">{if $subject.debt > 0}${$subject.debt}{else}N/A{/if}</td>
        <td align="center">{$subject.status}</td>
        <td align="center">
        {if $User.type != "student"}
            <img src="{$WEB_ROOT}/images/icons/16/delete.png" class="spanDelete" id="d-{$subject.invoiceId}" name="d-{$subject.name}" title="Eliminar" />&nbsp;


   {if $subject.debt > 0}
     <a href="{$WEB_ROOT}/new-payment/id/{$subject.invoiceId}" title="Agregar Nuevo Pago" onclick="return parent.GB_show('Agregar Pago', this.href,540,700) " > <img src="{$WEB_ROOT}/images/icons/16/money.png" class="spanPay" id="d-{$subject.invoiceId}" name="d-{$subject.name}" title="Nuevo Pago" /></a>
  {/if}


  {*}?invoiceId={$subject.invoiceId}{*}

                        {if $subject.payment>0} <a href="{$WEB_ROOT}/invoicesrep.php?invoiceId={$subject.invoiceId}" target="_blank" title="Imprimir pagos" > <img src="{$WEB_ROOT}/images/icons/16/pdf.gif" class="spanPay" id="d-{$subject.invoiceId}" name="d-{$subject.name}"  /></a>        {/if}
        {else}
	        {if $subject.debt > 0}
            <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=dlopez@trazzos.com&item_name=Colegiatura&item_number={$subject.invoiceId}&amount={$subject.amount}&no_shipping=1&no_note=1&lc=AU&bn=PP-BuyNowBF&currency_code=USD&quantity=1&option_name1={$User.userId}&on1={$User.userId}&option_name2={$User.numControl}&return={$return}&notify_url={$notify_url}" title="Agregar Nuevo Pago"> <img src="{$WEB_ROOT}/images/icons/16/money.png" class="spanPay" id="d-{$subject.invoiceId}" name="d-{$subject.name}" title="Nuevo Pago" /></a>
           {/if}
        {/if}

        </td>
    </tr>
{foreachelse}
	<tr>
    	<td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
{/foreach}
