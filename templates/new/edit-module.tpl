<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i>Editar Modulo para {$subject.name}
            {if $docente}
                | <a href="{$WEB_ROOT}/edit-modules-course/id/{$courseId}" style="color:#000000">Regresar</a>
            {else}
                | <a href="{$WEB_ROOT}/subject" style="color:#000000">Regresar</a>
            {/if}
        </div>
        <div class="actions">
        </div>
    </div>
    <div class="portlet-body">
        <div id="tblContent">{include file="forms/new/edit-module.tpl"}</div>
    </div>
</div>