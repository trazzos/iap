{foreach from=$courses item=subject}
     <form method="post" name="edit_beca" id="edit_beca" > 
	 <input type="hidden" id="alumnoId" name="alumnoId"  value="{$subject.alumnoId}"/>
	 <input type="hidden" id="edit" name="edit"  value="1"/>
	 <input type="hidden" id="id_course" name="id_course"  value="{$subject.courseId}"/>
	<tr>
        <td align="center">{$subject.clave}</td>
        <td align="center">{$subject.majorName}</td>
        <td align="center">{$subject.name}</td>
        <td align="center">{$subject.modality}</td>
        <td align="center">{$subject.initialDate|date_format:"%d-%m-%Y"}</td>
        <td align="center">{$subject.finalDate|date_format:"%d-%m-%Y"}</td>
        <td align="center">{$subject.daysToFinish}</td>
        <td align="center">{$subject.status}
		<td align="center">    <select name="tipo_beca" id="tipo_beca" >    
		                         <option  {if $subject.tipo_beca == "Ninguno"}selected{/if}  value="Ninguno">Ninguno</option> 
								 <option  {if $subject.tipo_beca == "Particular"}selected{/if} value="Particular">Particular</option> 
								 <option  {if $subject.tipo_beca == "Escolar"}selected{/if} value="Escolar">Escolar</option> 
								 <option  {if $subject.tipo_beca == "Prodim"}selected{/if} value="Prodim">PRODIM</option> 
								 
		
		                       </select>       {*}{$subject.tipo_beca}{*}
		<td align="center"> <input type="text" id="epor_beca" size="3" name="epor_beca" value="{$subject.por_beca}"/>%</td>
        <td>                <input type="submit" class="btn-70-l" id=""  value="." /></td>	
			
    </tr>
	</form>
{foreachelse}
	<tr>
    	<td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
{/foreach}
