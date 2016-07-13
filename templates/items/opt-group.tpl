{foreach from=$groups item=item key=key}
	<input type="checkbox" value="{$item.groupId}" />{$item.clave}       			
{/foreach}
