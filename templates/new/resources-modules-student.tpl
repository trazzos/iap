<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i>Recursos de apoyo {$myModule.name|truncate:40:"..."} {if $vistaPrevia==0}&raquo; <a href="{$WEB_ROOT}/curricula" style="color:#000">Regresar</a>{/if}
        </div>

    </div>
    <div class="portlet-body">
        <div id="tblContent">
            {include file="boxes/status_no_ajax.tpl"}
            {include file="lists/new/resources.tpl"}
        </div>
    </div>
</div>