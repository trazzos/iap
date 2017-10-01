<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i><b>Información</b> {$myModule.name|truncate:65:"..."} &raquo;
        </div>
        <div class="actions">

        </div>
    </div>
    <div class="portlet-body">
	<div id ="modal1" >
	</div>
	<br>
	<!--Es necesario descargar e imprimir el formato de reinscripción y llevarlo al área de control escolar para recabar las firmas correspondientes-->

	
	{if $id eq 2}
		Para completar este proceso, será necesario que realices el depósito por la cantidad de $XXXX al banco XXXX Es muy importante que el depósito lo realices con tu referencia bancaria
	{else if $id eq 1}
		Tu solicitud está en progreso, en breve se estará adjunto la información que nos solicitaste
	{/if}
		
    </div>
</div>
