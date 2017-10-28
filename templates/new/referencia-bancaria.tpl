<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i><b>Referencia Bancaria</b> {$myModule.name|truncate:65:"..."} &raquo;
        </div>
        <div class="actions">

        </div>
    </div>
    <div class="portlet-body">
	
	
	{if $countSol >= 1}
		<br>
		<br>
		<br>
		<div style='text-align:justify'>
		A efectos de poder identificar los pagos que realice a este Instituto durante su permanencia como alumno de posgrado,envío a Usted; la siguiente información:
		</div>
		<center>
		PORCENTAJE DE BECA AUTORIZADO:<b>97.60 % (este dato cambia por alumno)</b><br>
		BANCO: <b>BBVABANCOMER</b><br>
		N° DE REFERENCIA PERSONAL:<b> {$infoStudent.referenciaBancaria} </b>
		</center>
		<b>Referencia Bancaria:</b>
		
		<br>
		<br>
		
		<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
			<thead>
			<tr>
				<th width="">Metodo de Pago</th>
				<th width="">Datos Bancarios Requeridos</th>		 

			</tr>
			</thead>
			<tbody>
			<tr>
				<td align="center">En ventanilla</td>
				<td align="center">Con número de Convenio: 1234005</td>
			</tr>
			<tr>
				<td align="center">Por transferencia de un banco distinto a BBVA Bancomer</td>
				<td align="center">Con número de clabe interbancaria:012100001895258585</td>
			</tr>
			<tr>
				<td align="center">Por transferencia con cuenta BBVA Bancomer</td>
				<td align="center">Con número de Cuenta: 0189525858</td>
			</tr>
			</tbody>
		</table>
		
		<b>Nota Aclaratoria:</b>
		<br>
		<br>
		<li>En todos los casos deberá anotar el número de referencia personal y en el concepto, de preferencia el nombre del alumno; a menos de que el pago sea distinto a la colegiatura, deberá anotar como concepto el servicio que como alumno requiera (ejemplo: constancias, examen extraordinario, etc.).
		<br>
		<br>
		<li>En caso de dudas o aclaraciones al respecto, deberá comunicarse a los teléfonos (961) 125 15 08 al 10, ext. 116.

	{else}
		<br>
		<br>
		<br>
		<br>
		<br>
		<center> 
		<b>Tus datos de referencia bancaria no existen. Favor de solicitarlos dando click al siguiente botón</b>
		<br>
		<br>
		<button onClick="solicitarReferencia()" class="btn green submitForm">Solicitar datos de referencia bancaria</button>
		<div id="load"></div>
		<div id="msj5"></div>
		</center>	
		<br>
		<br>
		<br>
		<br>
		<br>
	{/if}
	
	
    </div>
</div>