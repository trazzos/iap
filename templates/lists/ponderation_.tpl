<b>Actividades</b><br>
<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
<thead>      
      <tr>
		{if $tipo==1}<th width="">Actividad</th>{else}
		<th width="">Ex&aacute;men</th>
		{/if}
		<th width="">Calificaci&oacute;n </th>
		<th width="">Puntos</th>
		<th width="">Retroalimentaci&oacute;n</th>
	</tr>
</thead>
<tbody>
   {foreach from=$tareas item=home key=key}
		<tr>
			<td>{$home.resumen} </td>
			<td>{$home.ponderation}</td>
			<td>{$home.ponderation*($home.score/100)}</td>
			<td>{$home.retro}</td>
			  
		</tr>
	{foreachelse}
		<tr>
			<td colspan="11" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
		</tr>				
	{/foreach}
</tbody>
</table>

<b>Examen</b><br>
<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
<thead>      
      <tr>
		{if $tipo==1}<th width="">Actividad</th>{else}
		<th width="">Ex&aacute;men</th>
		{/if}
		<th width="">Calificaci&oacute;n </th>
		<th width="">Puntos</th>
		<th width="">Retroalimentaci&oacute;n</th>
	</tr>
</thead>
<tbody>
   {foreach from=$examen item=home key=key}
		<tr>
			<td>{$home.resumen} </td>
			<td>{$home.ponderation}</td>
			<td>{$home.ponderation*($home.score/100)}</td>
			<td>{$home.retro}</td>
			  
		</tr>
	{foreachelse}
		<tr>
			<td colspan="11" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
		</tr>				
	{/foreach}
</tbody>
</table>