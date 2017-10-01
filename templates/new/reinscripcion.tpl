<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i>
			{if $descargaAchivo eq 'si'}
				Descargar Formato de Reinscripción
			{else}
				Tramite de Reinscripción
			{/if}
        </div>
		
    </div>
    <div class="portlet-body">
	{if $descargaAchivo eq 'si'}
		<center>
			<a href="javascript:void(0)" onClick='descargaFormato({$courseId},{$sId})' >
			<img src="{$WEB_ROOT}/images/pdficon.png" style="width:70px; height:70px"> 
			</a>
		</center>
	{else}
		Favor de corroborar que sus datos sean correctos
        <div id="tblContent">{include file="boxes/edit-student-popup-alumn.tpl"}</div>
	{/if}
		
    </div>
</div>