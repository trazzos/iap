<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i><b>Información</b> {$myModule.name|truncate:45:"..."} &raquo;
            {if $vistaPrevia==0}<a href="{$WEB_ROOT}/curricula" style="color:#000">Regresar</a>{/if}
        </div>
        <div class="actions">

        </div>
    </div>
    <div class="portlet-body">
        {include file="boxes/status_no_ajax.tpl"}
        {include file="{$DOC_ROOT}/templates/boxes/new/module-information.tpl"}
    </div>
</div>