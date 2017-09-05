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
		<b>Referencia Bancaria:</b>
		{$infoStudent.referenciaBancaria}
		<br>
		<br>
		<b>Bancos Autorizados:</b><br>
		<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
			<thead>
			<tr>
				<th width="">Banco</th>
				<th width="">Numero de Cuenta</th>		 

			</tr>
			</thead>
			<tbody>
			{foreach from=$lstCuentas item=item}
			<tr>
				<td align="center">{$item.nombre}</td>
				<td align="center">{$item.numCuenta}</td>
			</tr>
			{/foreach}
			</tbody>
		</table>
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
		<div id="msj">
		</div>
		</center>	
		<br>
		<br>
		<br>
		<br>
		<br>
	{/if}
	
	
    </div>
</div>