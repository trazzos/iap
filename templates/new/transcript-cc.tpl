<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i><b>Constancia de Estudios Con Calificaciones</b> {$myModule.name|truncate:65:"..."} &raquo;
        </div>
        <div class="actions">

        </div>
    </div>
    <div class="portlet-body">
		<div style='float:right !important'><button class="btn blue" onclick="window.location.href=''" style="width:150px">Solicitar</button></div>
        {include file="boxes/status_no_ajax.tpl"}
		<h3>Bancos Autorizados</h3>
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
		
		<h3>Solicitudes</h3>
        {include file="{$DOC_ROOT}/templates/lists/new/transcript-cc.tpl"}
    </div>
</div>