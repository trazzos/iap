<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i><b>Información Personal</b> 
        </div>
		
         <div class="actions">
		 
	

        </div>
		<div class="actions">
            <!--<a href="javascript:;" class="btn green" id="btnAddMajor">
                <i class="fa fa-plus"></i> Sincronizar School Manager
            </a>-->
        </div>
    </div>
    <div class="portlet-body">

	<div id="msj">
	</div>

        {include file="boxes/status_no_ajax.tpl"}
		
		

		<div id='loader'>
		</div>
		<div id='contenido'>
			<div class="tabbable portlet-tabs">
		<ul class="nav nav-tabs">
			
			<li class="active">
				
				<a href="#portlet_tabp_1" data-toggle="tab">Información General</a>
			</li>
			<li >
				<a href="#portlet_tabp_2" data-toggle="tab">
					Información Escolar
				</a>
			</li>
			<li >
				<a href="#portlet_tabp_3" data-toggle="tab">
					Información Bancaria
				</a>
			</li>
			<li >
				<a href="#portlet_tabp_4" data-toggle="tab">
					Información Automovil
				</a>
			</li>
		</ul>
		<div class="tab-content">
		
			<div class="tab-pane active" id="portlet_tabp_1">
				<form  id='frmGral_1'>
					<input type="hidden" name="personalId" class='form-control' value='{$User.userId}'>
					<table  >
						<tr>
							<td>Nombre
								<input type="text" name="nombre" class='form-control' value='{$info.name}'></td>
							<td>Apellido Paterno
								<input type="text" name="paterno" class='form-control' value='{$info.lastname_paterno}'></td>
							<td>Apellido Materno
								<input type="text" name="materno" class='form-control' value='{$info.lastname_materno}'></td>
						</tr>
						<tr>
							<td>Correo Electronico
								<input type="text" name="correo" class='form-control' value='{$info.correo}'></td>
							<td>RFC
								<input type="text" name="rfc" class='form-control' value='{$info.rfc}'></td>
							<td>Fecha Nacimiento
								<input type="text" name="nacimiento" id='fecha1' onClick='loadFecha(1)' class='form-control' value='{$info.fecha_nacimiento}'></td>
						</tr>
						<tr>
							<td>Numero INE
								<input type="text" name="ine" class='form-control' value='{$info.INE}'></td>
							<td>Curp
								<input type="text" name="curp" class='form-control' value='{$info.curp}'></td>
							<td></td>
						</tr>
						<tr>
							<td colspan='3'>Domicilio</td>
						<tr>
						<tr>
							<td >Calle:<input type="text" name="calle" class='form-control' value='{$info.calle}'></td>
							<td >Numero Interior<input type="text" name="interior" class='form-control'  value='{$info.nInterior}'></td>
							<td >Numero Exterior<input type="text" name="exterior" class='form-control' value='{$info.nExterior}'></td>
						<tr>
						<tr>
							<td >Colonia:<input type="text" name="colonia" class='form-control' value='{$info.colonia}'></td>
							<td >Estado<input type="text" name="estado" class='form-control' value='{$info.estado}'></td>
							<td >Ciudad<input type="text" name="ciudad" class='form-control' value='{$info.ciudad}'></td>
						<tr>
					</table>
				</form>
				<br>
				<br>
				<div id="msj_1">
				</div>
				<center>
				<button onClick='guardarInformacion(1)' class="btn green" >
				Guardar
				</button>
				</center>
			</div>
			<div class="tab-pane " id="portlet_tabp_2" >
				{include file="{$DOC_ROOT}/templates/forms/informacion-escolar.tpl"}
				
			</div>
			<div class="tab-pane " id="portlet_tabp_3" >
				{include file="{$DOC_ROOT}/templates/forms/informacion-bancaria.tpl"}
				
			</div>
			<div class="tab-pane " id="portlet_tabp_4" >
				{include file="{$DOC_ROOT}/templates/forms/informacion-automovil.tpl"}
				
			</div>
		</div>
	</div>
		</div>
    </div>
</div>