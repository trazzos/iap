{foreach from=$semesters item=item key=key}
	<option value="{$item.semesterId}" {if $info.semesterId == $item.semesterId}selected{/if}>{$item.clave}</option>        			
{/foreach}
