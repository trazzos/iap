{foreach from=$roles item=item key=key}
	<option value="{$item.roleId}" {if $info.roleId == $item.roleId}selected{/if}>{$item.name}</option>        			
{/foreach}
