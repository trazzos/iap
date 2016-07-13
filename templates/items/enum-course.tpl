{foreach from=$courses item=item key=key}
	<option value="{$item.courseId}" {if $info.courseId == $item.courseId}selected{/if}>{$item.majorName} {$item.name}-{$item.group}</option>        			
{/foreach}
