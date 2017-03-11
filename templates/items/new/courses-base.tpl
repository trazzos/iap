<input type="hidden" value="0" id="recarga" name="recarga">
{foreach from=$subjects item=subject}
    <tr>
        <td align="center" class="id">{$subject.courseId}</td>
        <td align="center">{$subject.clave}</td>
        <td align="center">{$subject.majorName}</td>
        <td align="center">{$subject.name}-{$subject.group}</td>
        <td align="center">{$subject.modality}</td>
        <td align="center">{if $subject.initialDate != "0000-00-00"} {$subject.initialDate|date_format:"%d-%m-%Y"}{else} S/F {/if}</td>
        <td align="center">{if $subject.finalDate != "0000-00-00"}  {$subject.finalDate|date_format:"%d-%m-%Y"}  {else} S/F  {/if}   </td>
        <td align="center">{$subject.daysToFinish}</td>
        <td align="center">
            {if $docente == 1}
                {$subject.courseModuleActive}
            {else}
                {$subject.courseModule}
            {/if}
            /{$subject.modules}

            {*} Flecha verde {*}
            {if ($docente == 1 AND $subject.courseModuleActive > 0) || !$docente}
                <a href="{$WEB_ROOT}/graybox.php?page=view-modules-course&id={$subject.courseId}" title="Ver Modulos de Curso" data-target="#ajax" data-toggle="modal" style="color:#000" ><img src="{$WEB_ROOT}/images/arrow.png" title="Ver Modulos del Curso" /></a>
            {/if}

            {if !$docente}
                <a href="{$WEB_ROOT}/graybox.php?page=add-modules-course&id={$subject.courseId}" title="Agregar Modulo a Curso" data-target="#ajax" data-toggle="modal" style="color:#000" ><img src="{$WEB_ROOT}/images/icons/add.png" title="Agregar Modulo a Curso" /></a>
            {/if}
        </td>
        <td align="center">
            <span style="cursor:pointer" class="spanActive" onclick="VerGrupo({$subject.courseId});" title="Alumnos" id="{$subject.courseId}">{$subject.alumnActive}</span>             /
            <span style="cursor:pointer" class="spanInactive" onclick="VerGrupoInactivo({$subject.courseId});"  id="{$subject.courseId}">{$subject.alumnInactive}</span>
        </td>
        <td align="center">{$subject.active}</td>
        {if !$docente}
            <td align="center">

                {*TODO este boton no funciona de cualquier manera asi que lo quite por lo pronto
                <img src="{$WEB_ROOT}/images/icons/16/delete.png" class="spanDelete" data-id="{$subject.courseId}" id="d-{$subject.courseId}" name="d-{$subject.name}" title="Eliminar" />&nbsp;
                *}

                {if $subject.majorName=="ESPECIALIDAD" || $subject.majorName=="MAESTRIA"}
                    <img src="{$WEB_ROOT}/images/icons/16/matricula.gif" onclick="generar({$subject.courseId},'{$subject.majorName}');" title="Generar Matriculas" width="16px" height="16px" />&nbsp;
                {/if}

                <a href="{$WEB_ROOT}/graybox.php?page=edit-course&id={$subject.courseId}" data-target="#ajax" data-toggle="modal">
                    <img src="{$WEB_ROOT}/images/icons/16/pencil.png" class="spanEdit" id="d-{$subject.subjectId}" name="d-{$subject.name}" title="Editar" />
                </a>

                {*TODO creo que seria mejor abrir un modal ancho*}
                {*TODO falta la parte de generar certificado*}
                <a href="{$WEB_ROOT}/graybox.php?page=ver-sabana-course&id={$subject.courseId}" data-target="#ajax" data-toggle="modal">
                    <img src="{$WEB_ROOT}/images/icons/16/score.gif" class="spanEdit" id="d-{$subject.subjectId}" name="d-{$subject.name}" title="Sabana de Calificaciones" />
                </a>

                <a href="{$WEB_ROOT}/diplomas.php?id={$subject.courseId}" target="_blank" >
                    <img src="{$WEB_ROOT}/images/icons/16/diploma.jpg" class="spanEdit" id="d-{$subject.subjectId}" name="d-{$subject.name}" title="Impresion de Diplomas" />
                </a>

                <a href="{$WEB_ROOT}/reporte.php?id={$subject.courseId}" target="_blank" >
                    <img src="{$WEB_ROOT}/images/chart.png" class="spanEdit" id="d-{$subject.subjectId}" name="d-{$subject.name}" title="Reporte General" />
                </a>
            </td>
        {/if}
    </tr>
    {foreachelse}
    <tr>
        <td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
    </tr>
{/foreach}