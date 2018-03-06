<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i>Editar
        </div>
        <div class="actions">
        </div>
    </div>
    <div class="portlet-body">
       
      
			<form class="form-horizontal" id="frmGral" name="frmGral" method="post" onsubmit="return false;">
				<input type="hidden" id="auxTpl" name="auxTpl" value="{$auxTpl}"/>
				<input type="hidden" id="personalId" name="personalId" value="{$personalId}"/>
				<input type="hidden" id="id" name="id" value="{$id}"/>
				<input type="hidden" id="type" name="type" value="saveAddMajor"/>
				<div class="form-body">
					<div class="form-group">
						<label class="col-md-3 control-label">Fecha de Materia:</label>
						<div class="col-md-8">
							Inicio:<input type="text" name="fechaInicioMateria" onClick="loadFecha(3)" id="fecha_3" class="form-control" value="{$myModule.initialDate}">
							Fin:<input type="text" onClick="loadFecha(4)" id="fecha_4" name="fechaFinMateria" class="form-control" value="{$myModule.finalDate}">

						</div>
					</div>


					<div class="form-group">
						<label class="col-md-3 control-label">Fecha de Contrato:</label>
						<div class="col-md-8">
							Inicio:<input type="text" name="fechaInicioContrato" onClick="loadFecha(1)" id="fecha_1" class="form-control" value="{$myModule.inicioContrato}">
							Fin:<input type="text" onClick="loadFecha(2)" id="fecha_2" name="fechaFinContrato" class="form-control" value="{$myModule.finContrato}">

						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">No. de Contrato:</label>
						<div class="col-md-8">
							<input type="text" name="noContrato" class="form-control" value="{$myModule.noContrato}">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">Habilitar:</label>
						<div class="col-md-8">

							<input type="checkbox"  name="habilitar" class="form-control" {if $myModule.habilitarDescargaContrato eq 'si'} checked {/if}>
						</div>
					</div>
</form>
					



				</div>
			
    
    </div>
	
</div>
<div id='msjErr'>
</div>
<div class="form-actions">
<div class="row">
<div class="col-md-offset-3 col-md-9">
	

	<button  class="btn green submitForm" onClick="saveEditContrato()">Guardar</button>

	<button type="button" class="btn default closeModal">Cancelar</button>
</div>
</div>
</div>

