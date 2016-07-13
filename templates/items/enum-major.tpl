{foreach from=$majors item=item key=key}
	<option value="{$item.majorId}" {if $info.majorId == $item.majorId}selected{/if}>{$item.name}</option>        			
{/foreach}
