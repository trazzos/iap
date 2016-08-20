{foreach from=$subjects item=subject}
    <tr>
        <td align="center" class="id">{$subject.subjectId}</td>
        <td align="center">{$subject.majorName}</td>
        <td align="center">{$subject.clave}</td>
        <td align="left">{$subject.name}</td>
        <td align="left">{$subject.modules}
            <img src="{$WEB_ROOT}/images/icons/16/document--plus.png" class="spanViewModule" id="{$subject.subjectId}" name="{$subject.name}" title="Ver Módulos" /></a>
        </td>
        <td align="left">{$subject.payments}</td>
        <td align="left">{$subject.cost}</td>
        <td align="center">
            <img src="{$WEB_ROOT}/images/icons/16/delete.png" class="spanDelete" id="{$subject.subjectId}" name="{$subject.name}" title="Eliminar" />&nbsp;
            <a href="{$WEB_ROOT}/graybox.php?page=edit-subject&id={$subject.subjectId}" title="Editar Currícula" data-target="#ajax" data-toggle="modal" style="color:#000" >
                <img src="{$WEB_ROOT}/images/icons/16/pencil.png" class="spanEdit" id="{$subject.subjectId}" name="{$subject.name}" title="Editar" />
            </a>
        </td>
    </tr>
    {foreachelse}
    <tr>
        <td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
    </tr>
{/foreach}
