<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i><b>Tramite de Baja</b> {$myModule.name|truncate:65:"..."} &raquo;
        </div>
        <div class="actions">

        </div>
    </div>
    <div class="portlet-body">
		<button class="btn blue" onclick="window.location.href=''" style="width:150px">Iniciar Proceso</button>
        {include file="boxes/status_no_ajax.tpl"}
        {**include file="{$DOC_ROOT}/templates/lists/new/bank-reference.tpl"**}
    </div>
</div>