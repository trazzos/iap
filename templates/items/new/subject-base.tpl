{foreach from=$subjects item=subject}
    <tr>
        <td align="center" class="id">{$subject.subjectId}</td>
        <td align="center">{$subject.majorName}</td>
        <td align="center">{$subject.clave}</td>
        <td align="left">{$subject.name}</td>
        <td align="left">{$subject.modules}
			<a  class="spanViewModule" id="{$subject.subjectId}" name="{$subject.name}">
    			<i class="fa fa-plus-circle" aria-hidden="true" ></i>
			</a>
        </td>
        <td align="center">
		
			<a class="spanDelete"  id="{$subject.subjectId}" name="{$subject.name}" title="Eliminar">
				<i class="fa fa-trash" aria-hidden="true"></i>
			</a>

           <a href="{$WEB_ROOT}/graybox.php?page=edit-subject&id={$subject.subjectId}" title="Editar Currícula" data-target="#ajax" data-toggle="modal" style="color:#000; " >
				<i class="fa fa-pencil" aria-hidden="true"></i>
            </a>
        </td>
    </tr>
    {foreachelse}
    <tr>
        <td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
    </tr>
{/foreach}
