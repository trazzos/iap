<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i>Contratos
        </div>
        <div class="actions">
        </div>
    </div>
    <div class="portlet-body">
       
      
		
			
			<center>
				<a type="button" class="btn default green" style="width:211px" target='_blank' href='{$WEB_ROOT}/ajax/doc.php?id={$id}&pId={$personalId}'>Descargar Word</a>
				<br>
				<br>
				<a type="button" class="btn default red" target='_blank' href='{$WEB_ROOT}/ajax/contrato.php?Id={$id}&pId={$personalId}' style="width:211px" >Descargar PDF</a>
				<br>
				<br>
				<a type="button" class="btn default yellow"  style="width:211px"  onClick="onOpenLoad()">Subir Contrato</a>
				<div id="divForm" style="display:none">
					<br>
					<br>
					<form class="form-horizontal" id="frmGral" name="frmGral" method="post" onsubmit="return false;">
					<input type="hidden" name='type' value="onSendContrato">
					<input type="hidden" id="personalId" name="personalId" value="{$personalId}"/>
					<input type="hidden" id="id" name="id" value="{$id}"/>
					<input type="file" name='cedula' id='cedula'>
					</form>
					<button type="button" class="btn default " style="width:211px" onClick="onSendContrato()">Enviar</button>
				</div>
				<br>
				<br>
				<a type="button" target='_blank' href='{$WEB_ROOT}/docentes/contrato/{$myModule.rutaContrato}' class="btn default blue" style="width:211px">Visualizar</a><br>
			</center>
			
		
	</div>    
</div>
</div>
<div id='msjErr'>
</div>
<center>

	<button type="button" class="btn default closeModal">Cancelar</button>

</center>

