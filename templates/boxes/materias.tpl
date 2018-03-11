<select type='text' name='materia' class='form-control' style='width:230px'  >
<option></option>
{foreach from=$lstMats item=subject}
<option value="{$subject.subjectModuleId}">{$subject.name}</option>
{/foreach}
</select>