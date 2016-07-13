{foreach from=$hours item=item key=key}
	<option value="{$item.hr}" {if $info.hr_start == $item.hr}selected{/if}>{$item.hr}</option>        			
{/foreach}
