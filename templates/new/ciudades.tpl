<select name="ciudad"  class='form-control'  {if $cId eq 'si'} disabled {/if} >
<option></option>
{foreach from=$registrosc item=item}
<option value="{$item.municipioId}" {if $info.ciudad eq $item.municipioId} selected {/if}>{$item.nombre}</option>
{/foreach}
</select>