<div class="portlet-body">
    <b>Fecha Inicial:</b> {$item.initialDate|date_format:"%d-%m-%Y"}
    <br />
    <b>Fecha Final:  </b> {$item.finalDate|date_format:"%d-%m-%Y %H:%M:%S"}
    <br />
    {if $timestamp > $item.initialDateTimestamp && $timestamp < $item.finalDateTimestamp}
        <span style="color:#0C0">Esta actividad se encuentra disponible</span>
    {/if}
    {if $timestamp > $item.finalDateTimestamp}
        <span style="color:#C00">El tiempo de esta actividad ha terminado</span>
    {/if}
    {if $timestamp < $item.initialDateTimestamp}
        <span style="color:#C00">Esta actividad aun no ha iniciado</span>
    {/if}
    <br />
    <a href="{$WEB_ROOT}/view-description-activity/id/{$item.activityId}" onclick="return parent.GB_show('Ver Actividad', this.href,700,800)">Ver Descripci&oacute;n</a>
    <br />
    <b>Modalidad: </b>{$item.modality}

    <br />
    {if $item.requerida.activityId}
        {if $item.activityType == "Tarea"}
            <b> Tarea Requerida:</b> Para realizar esta Actividad necesitas terminar la Actividad {$item.numreq}
        {/if}
        {if $item.activityType == "Examen"}
            <b>Tarea Requerida:</b> Para realizar este Examen necesitas terminar la Actividad {$item.numreq}
        {/if}

        <br />
    {/if}

    {if $timestamp > $item.initialDateTimestamp && $timestamp < $item.finalDateTimestamp && $item.available}
        <b>Entregable: </b>
        {if $item.activityType == "Lectura"}
            Ninguno.
        {/if}
        {if $item.activityType == "Tarea"}
            {if $vistaPrevia==0}<a href="{$WEB_ROOT}/upload-homework/id/{$item.activityId}" onclick="return parent.GB_show('Subir Tarea', this.href,350,700) " style="color:#000000">Subir Tarea al Sistema de Tareas.</a>{else} Subir Tarea al Sistema de Tareas.{/if}
        {/if}
        {if $item.activityType == "Examen"}

            {if $majorModality == "Local"}
                El Docente lo presentara localmente
            {else}
                {if $vistaPrevia==0}	<a style="cursor:pointer; color:#000" onclick="DoTest({$item.activityId})">Presentar Ex&aacute;men.</a>{else}  Presentar Ex&aacute;men.  {/if}

            {/if}
        {/if}
        {if $item.activityType == "Foro"}
            Participación en foro.
        {/if}
        {if $item.activityType == "Otro"}
            Ninguno.
        {/if}

    {/if}
    {if $item.homework}
        <br />
        <b>Tarea entregada</b> <a href="{$WEB_ROOT}/download.php?file=homework/{$item.homework.path}&mime={$item.homework.mime}" style="color:#000">Ver Tarea</a>
    {/if}
    {if $item.ponderation}
        <br />
        <b>Calificación:</b> {$item.ponderation}
        <b>Porcentaje obtenido: </b>{$item.realScore}%
    {/if}

    {if $item.retro}
        <br />
        <b>Retroalimentación:</b> {$item.retro}
    {/if}
    {*}{$majorModality[$item.activityId]}{*}
</div>
