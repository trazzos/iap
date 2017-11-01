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

	
	{**if $id eq 2}
	{else if $id eq 1}
		Tu solicitud está en progreso, en breve se estará adjunto la información que nos solicitaste
	{/if**}
		Para completar este proceso, será necesario que realices el depósito por la cantidad de <b>$ {$infoSol.precio|number_format:2:'.':','} M.N.</b>  al banco <b>Bancomer</b>, Es muy importante que el depósito lo realices con tu referencia bancaria
	
		
    </div>
</div>
