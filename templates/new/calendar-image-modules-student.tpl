<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i><b>Calendario de actividades</b> {$myModule.name|truncate:65:"..."} &raquo;
        </div>
        <div class="actions">

        </div>
    </div>
    <div class="portlet-body">
        {include file="boxes/status_no_ajax.tpl"}
        <div style="text-align:center">
            <img src="{$WEB_ROOT}/calendario/calendario_{$id}.jpg" width="900" height="600" />
        </div>
    </div>
</div>