{foreach from=$specialities item=item key=key}
	<option value="{$item.specialityId}" {if $info.specialityId == $item.specialityId}selected{/if}>{$item.clave}</option>        			
{/foreach}
