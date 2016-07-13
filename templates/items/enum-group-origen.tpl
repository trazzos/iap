{foreach from=$groups item=item key=key}
	<option value="{$item.groupId}" {if $info.groupId == $item.groupId}selected{/if}>{$item.clave}</option>        			
{/foreach}
