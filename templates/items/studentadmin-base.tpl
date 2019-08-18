{foreach from=$students item=item key=key}
    <tr>
        <td align="center">{$item.lastNamePaterno|upper}</td>
        <td align="center">{$item.lastNameMaterno|upper}</td>
        <td align="center">{$item.names|upper}</td>
        <td align="center">{$item.controlNumber}</td>
        <td align="center"><a href="mailto:{$item.email}">{$item.email}</a></td>
        <td align="center">{$item.password}</td>
        <td align="center">
            {if $tip == 'Activo'}
            <a href="#" onclick="InactivateStudentCurricula({$item.userId},{$courseId});" title="Desactivar Alumno de esta Curricula"> <img src="{$WEB_ROOT}/images/icons/16/delete.png"></a>
            {else}
            <a href="#" onclick="DeleteStudentCurricula({$item.userId},{$courseId});" title="Eliminar Alumno de esta Curricula"> <img src="{$WEB_ROOT}/images/icons/16/delete.png"></a>
            {/if}
        </td>
    </tr>
    {foreachelse}
    <tr>
        <td colspan="11" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
    </tr>
{/foreach}
