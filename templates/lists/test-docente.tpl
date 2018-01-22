<table width="80% !important" class="tblGral table table-bordered table-striped table-condensed flip-content">
	<thead>
    	<tr>	 
		</tr>
    </thead>
    <tbody>
		{foreach from=$lstPreguntas item=item}
    	<tr>
			
			<td align="center"><b>{$item.nombre}</b></td>
			</td>
		</tr>
		<tr>
			
			<td align="center">
				<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
				{foreach from=$item.preguntas item=itemPregunta}
				<tr>
					<td >{$key+1}</td>
					<td width="70%">{$itemPregunta.pregunta}</td>
					<td>
						{foreach from=$itemPregunta.opciones item=item2 key=key}  
							<input type='radio' name='check_{$itemPregunta.preguntaId}' id='check_{$itemPregunta.preguntaId}' value='{$item2}' class="option-input checkbox" /><font style='font-size:18px'>{$item2}</font>
						 {/foreach}
					</td>
				</tr>
				{/foreach}
				</table>
			</td>
		</tr>
		{/foreach}
	</tbody>
</table>
<b>Comentario:</b><br>
<center>

<textarea name='comentario' style='width:900px; height:100px' class='form-control'></textarea>
<br>
<br>


</center>