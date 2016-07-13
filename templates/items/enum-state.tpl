{foreach from=$states item=item key=key}
	<option value="{$item.stateId}" {if $info.stateId == $item.stateId}selected{/if}>{$item.name}</option>        			
{/foreach}
