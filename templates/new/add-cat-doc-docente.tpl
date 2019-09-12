<div class="portlet box {$PORTLET_COLOR}">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i><b>Documentos del Docente</b> {$myModule.name|truncate:65:"..."} &raquo;
        </div>
		
         <div class="actions">
		 
	
            <a  class="btn {$BUTTON_COLOR}" id="" href="{$WEB_ROOT}/graybox.php?page=add-cat-doc-docente-add" data-target="#ajax" data-toggle="modal" data-width="1000px" title='ADJUNTAR DOCUMENTO'>
                <i class="fa fa-plus"></i> Agregar
            </a>
        </div>
		<div class="actions">
            <!--<a href="javascript:;" class="btn {$BUTTON_COLOR}" id="btnAddMajor">
                <i class="fa fa-plus"></i> Sincronizar School Manager
            </a>-->
        </div>
    </div>
    <div class="portlet-body">
	{if $msj eq 'si'}
	<div class="alert alert-info alert-dismissable">
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
	  <strong></strong>La Solicitud ha sido enviada correctamente
	</div>
	{/if}
	<div id="msj">
	</div>
        {include file="boxes/status_no_ajax.tpl"}
		<div id='loader'>
		</div>
		<div id='contenido'>
        {include file="{$DOC_ROOT}/templates/lists/new/add-cat-doc-docente.tpl"}
		</div>
    </div>
</div>