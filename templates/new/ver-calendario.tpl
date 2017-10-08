<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i>Calendario de Pagos
        </div>
        <div class="actions">
        </div>
    </div>
    <div class="portlet-body" style='width:100% !important'>
   
            {foreach from=$lstPagos key=key item=aux}
				<div style='float:left'>{$aux.periodo}
					<table width='90%'>
					<tr>
					<td>Fecha de Pago</td>
					<td>Descripcion</td>
					<td>Beca</td>
					<td>Importe</td>
					</tr>
					{foreach from=$aux.pagos item=aux4}
						<tr>
						<td>{$aux4.inicioPago}</td> 
						<td>{$aux4.descripcion}</td> 
						<td>{$aux4.beca} %</td>
						<td>$ {$aux4.total}</td>
						</tr>
					{/foreach}
					</table>
				</div>
				{if ($key+1)==2 or ($key+1) == 4 or ($key+1) == 8}
					<div style='clear: both'></div>
					<br>
					<br>

				{/if}
			 {/foreach}
			
     
    </div>
</div>

