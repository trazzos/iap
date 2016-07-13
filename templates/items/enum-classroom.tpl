{foreach from=$classrooms item=item key=key}
	<option value="{$item.classroomId}" {if $info.classroomId == $item.classroomId}selected{/if}>{$item.name}</option>        			
{/foreach}
