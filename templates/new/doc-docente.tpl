<div class="portlet box {$PORTLET_COLOR}">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i><b>Documentos del Docente</b>
        </div>

         <div class="actions">



        </div>
		<div class="actions">
            <!--<a href="javascript:;" class="btn {$BUTTON_COLOR}" id="btnAddMajor">
                <i class="fa fa-plus"></i> Sincronizar School Manager
            </a>-->
        </div>
    </div>
    <div class="portlet-body">

	<div id="msj">
	</div>

        {include file="boxes/status_no_ajax.tpl"}



		<div id='loader'></div>
		<div id='msj'></div>
		<div id='contenido'>
            <h4 style="text-align: center"><a target="_blank" href="https://ihjaimesabines.edu.mx/politicas-privacidad">Aviso de privacidad</a> </h4>
			{include file="{$DOC_ROOT}/templates/lists/new/doc-docente.tpl"}
		</div>
    </div>
</div>
