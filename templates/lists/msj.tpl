<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
	<thead>
    	<tr>
			
			<th style="text-align:center">Titulo </th>
			<th style="text-align:center">Mensaje </th>	 
		</tr>
    </thead>
    <tbody>
		{foreach from=$personals item=subject}
    	<tr>
			
			<td align="left">{$subject.titulo}</td>
			<td align="left">{$subject.mensaje}</td>
		</tr>
		{/foreach}
	</tbody>
</table>