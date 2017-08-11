<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i><b>Tramite de Baja</b> {$myModule.name|truncate:65:"..."} &raquo;
        </div>
        <div class="actions">

        </div>
    </div>
    <div class="portlet-body">
		<div style='float:right !important'><button class="btn blue" onclick="window.location.href=''" style="width:150px">Iniciar Proceso</button></div>
		<div style='clear: both'></div>
		<div>
		<br>
		<br>
		<br>
			<h4>Para iniciar el Tramite de Baja debes presionar el botón Iniciar Proceso y complementar el formulario, al presionar el botón aceptar se genera un archivo en pdf
			que deberas descargar y firmar, para despues adjuntarlo escaneado en esta sección.</h4>
			
		</div>
        {include file="boxes/status_no_ajax.tpl"}
        {**include file="{$DOC_ROOT}/templates/lists/new/bank-reference.tpl"**}
    </div>
</div>