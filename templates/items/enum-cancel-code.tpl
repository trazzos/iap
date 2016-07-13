{foreach from=$codes item=item key=key}
	<option value="{$item.codeId}" {if $info.codeId == $item.codeId}selected{/if}>{$item.clave} {$item.name}</option>        			
{/foreach}
