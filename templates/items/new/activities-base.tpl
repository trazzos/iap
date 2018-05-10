{foreach from=$actividades item=subject}
    <tr>
        <td align="center" class="id">{$subject.activityId}</td>
        <td align="center">{$subject.activityType}</td>
        <td align="center">{$subject.initialDate} {$subject.horaInicial}</td>
        <td align="center">{$subject.finalDate|date_format:"%d-%m-%Y %H:%M:%S"}</td>
        <td align="center">{$subject.modality}</td>
        <td align="center">
            {if $subject.requiredActivity != 0}
                Id: {$subject.requiredActivity} Resumen: {$subject.requerida.resumen}
            {else}
                N/A
            {/if}  </td>
        <td align="center">{$subject.score}%</td>
        <td align="center">{$subject.resumen}</td>
        <td align="center">
            {if $subject.activityType == "Examen"}
			 
                {if $majorModality == "Online"}
                    <a href="{$WEB_ROOT}/configuracion-examen/id/{$subject.activityId}" style="background:#32c5d2; color:white">Configurar</a>
                {else}
                     <a href="{$WEB_ROOT}/configuracion-examen/id/{$subject.activityId}" style="background:#32c5d2; color:white">Configurar</a>
                {/if}
            {else}
                N/A
            {/if}</td>
        <td align="center">
            <img src="{$WEB_ROOT}/images/icons/16/delete.png" class="spanDelete" data-id="{$subject.activityId}" id="d-{$subject.activityId}" name="d-{$subject.name}" title="Eliminar" />&nbsp;

            <a href="{$WEB_ROOT}/graybox.php?page=edit-activity&id={$subject.activityId}&auxTpl=admin&cId={$myModule.courseModuleId}" data-target="#ajax" data-toggle="modal">
                <img src="{$WEB_ROOT}/images/icons/16/pencil.png" class="spanEdit" id="d-{$subject.subjectId}" name="d-{$subject.name}" title="Editar" />
            </a>

            {if $subject.score > 0}
                <!--<a href="{$WEB_ROOT}/graybox.php?page=score-activity&id={$subject.activityId}&auxTpl=admin&cId={$myModule.courseModuleId}" data-target="#ajax" data-toggle="modal">
                    <img src="{$WEB_ROOT}/images/icons/16/score.gif" class="spanEdit" id="d-{$subject.subjectId}" name="d-{$subject.name}" title="Calificar" />
                </a>-->
				<a href="{$WEB_ROOT}/score-activity-new&id={$subject.activityId}&auxTpl=admin&cId={$myModule.courseModuleId}" >
                    <img src="{$WEB_ROOT}/images/icons/16/score.gif" class="spanEdit" id="d-{$subject.subjectId}" name="d-{$subject.name}" title="Calificar" />
                </a>
            {/if}
        </td>
    </tr>
    {foreachelse}
    <tr>
        <td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
    </tr>
{/foreach}
