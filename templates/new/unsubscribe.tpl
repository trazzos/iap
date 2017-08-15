<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i><b>Tramite de Baja</b> {$myModule.name|truncate:65:"..."} &raquo;
        </div>
        <div class="actions">

        </div>
    </div>
    <div class="portlet-body">
		{if $infoBaja.solicitudId eq ''}
		<div style='float:right !important'>
		<a class="btn blue"  href="{$WEB_ROOT}/graybox.php?page=add-baja" data-target="#ajax" data-toggle="modal" data-width="1000px">
		Iniciar Proceso
		</a>
		</div>
		{/if}
		<div style='clear: both'></div>
		<div>
		<br>
		<br>
		<br>
		
		{if $infoBaja.solicitudId ne ''}
			1. Descarga y Firma La Solicitud de baja <br>
			2. Adjunta La Solicitud de baja Firmada<br>
			<div style='clear: both'></div>
			<br>
			<br>
			<br>
			<a class="btn red"  href="#" onClick="descargarSolicitud()">
			Descargar Solicitud
			</a>
			<a class="btn blue"  href="{$WEB_ROOT}/graybox.php?page=solicitud-constancia&id=baja" data-target="#ajax" data-toggle="modal" data-width="1000px">
			Adjuntar Solicitud
			</a>
		{/if}
		
		{if $infoBaja.solicitudId eq ''}
			<h4>Para iniciar el Tramite de Baja debes presionar el botón Iniciar Proceso y complementar el formulario, al presionar el botón aceptar se genera un archivo en pdf
			que deberas descargar y firmar, para despues adjuntarlo escaneado en esta sección.</h4>
		{/if}	
		</div>
        {include file="boxes/status_no_ajax.tpl"}
        {**include file="{$DOC_ROOT}/templates/lists/new/bank-reference.tpl"**}
    </div>
</div>