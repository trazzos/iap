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
								<input type="text" name="nacimiento" class='form-control' value='{$info.fecha_nacimiento}'></td>
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
				Licenciatura
				<br>
				<br>
				Escuela Licenciatura
				<input type="text" name="ciudad" class='form-control'><br>
				<input type="checkbox" name="" id="">Titulo<br>
				<input type="checkbox" name="" id="">Acta de Examen<br>
				<input type="checkbox" name="" id="">Cedula<br>
				<br>
				Maestria
				<br>
				<br>
				Escuela Maestria
				<input type="text" name="ciudad" class='form-control'><br>
				<input type="checkbox" name="" id="">Titulo<br>
				<input type="checkbox" name="" id="">Acta de Examen<br>
				<input type="checkbox" name="" id="">Cedula<br>
				<br>
				Doctorado
				<br>
				<br>
				Escuela Doctorado
				<input type="text" name="ciudad" class='form-control'><br>
				<input type="checkbox" name="" id="">Titulo<br>
				<input type="checkbox" name="" id="">Acta de Examen<br>
				<input type="checkbox" name="" id="">Cedula<br>
			</div>
			<div class="tab-pane " id="portlet_tabp_3" >
				Favor de completar todos los campos, sino cuenta con información en alguno de ellos colocar las siglas N/D, una vez completado todos los
				campos se le habilitará el botón 'Descargar' para que pueda imprimir la 'Carta de Autorización de pago' y lo pueda firmar, este archivo 
				deberá escanearlo y subirlo en la sección de 'DOCUMENOS DEL DOCENTE'.
				<br>
				<br>
				Institución Bancaria
				<input type="text" name="banco" class='form-control'><br>
				No. Cuenta
				<input type="text" name="ncuenta" class='form-control'><br>
				CLABE Interbancaria
				<input type="text" name="clabeInter" class='form-control'><br>
				Sucursal
				<input type="text" name="sucursal" class='form-control'><br>
				Numero de Plaza
				<input type="text" name="nplaza" class='form-control'><br>
				Lugar
				<input type="text" name="lugar" class='form-control'><br>
				Correo Electrónico para notificación de pago
				<input type="text" name="correoNoti" class='form-control'><br>
			</div>
			<div class="tab-pane " id="portlet_tabp_4" >
				Si usted impartirá clases presenciales y llevará su automóvil al IAP-Chiapas los dias de clase, le pedimos de favor
				llenar la siguiente información para poder apartarle un cajón el dia de sus clases
				<br>
				<br>
				Modelo automóvil
				<input type="text" name="modeloAuto" class='form-control'><br>
				Color automóvil
				<input type="text" name="colorAuto" class='form-control'><br>
				Placas automóvil
				<input type="text" name="placasAuto" class='form-control'><br>
			</div>
		</div>
	</div>
		</div>
    </div>
</div>