{foreach from=$positions item=item key=key}
	<option value="{$item.positionId}" {if $info.positionId == $item.positionId}selected{/if}>{$item.name}</option>        			
{/foreach}
