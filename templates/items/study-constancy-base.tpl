{foreach from=$searchStudentResult item=student}
    <tr id="1">
        <td>{$student.controlNumber}</td>
        <td>{$student.names}</td>
        <td>{$student.lastNamePaterno}</td>
        <td>{$student.lastNameMaterno}</td>
        <td>{$student.groupName}</td>
        <td>{$subject.mayorName}</td>
        <td>{$subject.specialityName}</td>
        <td class="act">
			Elegir
			{*<img src="{$WEB_ROOT}/images/b_dele.png" class="spanDelete" id="d-{$subject.subjectId}" name="d-{$subject.name}" title="Elminar: {$subject.name}"/>
			<img src="{$WEB_ROOT}/images/b_edit.png" class="spanEdit" id="e-{$subject.subjectId}" name="e-{$subject.name}" title="Editar: {$subject.name}"/>*}
        </td>
    </tr>
{/foreach}