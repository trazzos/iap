<div>
	{if !empty($errors)}
	{foreach from=$errors.value item="error" key="key"}
		{$error}.
		{if $errors.field.$key}
			Campo: <u>{$errors.field.$key}</u>
		{/if}
	{/foreach}
{/if}
</div>