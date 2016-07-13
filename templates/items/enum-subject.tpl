{foreach from=$subjects item=item key=key}
	<option value="{$item.subjectId}" {if $info.subjectId == $item.subjectId}selected{/if}>{$item.name|truncate:50:"..."}</option>        			
{/foreach}
