{foreach from=$groups item=item key=key}
	<option value="{$item.subgpoId}" {if $info.subgpoId == $item.subgpoId}selected{/if}>{$item.clave}</option>        			
{/foreach}
