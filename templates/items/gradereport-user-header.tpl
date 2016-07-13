{if $gradeReportInfo.regularization == 'N'}
<tr  align="center">	
		<th style="border:none; background-color:#FFF" height="28">&nbsp;</th>
		<th style="border:none; background-color:#FFF"></th>
		<th style="border:none; background-color:#FFF"></th>        
		<th style="text-align:center;" colspan="3">INASISTENCIAS</th>
        <th style="text-align:center;" colspan="3">PARCIALES</th>
		<th style="text-align:center;" colspan="3">GLOBALES</th>		
		<th></th>        
		<th></th>
		<th></th>
</tr>
{/if}
<tr  align="center">
	{if $gradeReportInfo.regularization == 'N'}
		<th style="width: 50px; text-align:center;" height="28">&nbsp;</th>
		<th>PATERNO MATERNO NOMBRE</th>
		<th style="width: 110px; text-align:center;">NO. CONTROL</th>
        {if $viewMode == 1}
        <th style="width: 50px; text-align:center;">I</th>
		<th style="width: 50px; text-align:center;">II</th>
		<th style="width: 50px; text-align:center;">III</th>
        <th style="width: 50px; text-align:center;">PI</th>
		<th style="width: 50px; text-align:center;">PII</th>
		<th style="width: 50px; text-align:center;">PIII</th>
		<th style="width: 50px; text-align:center;">GI</th>
		<th style="width: 50px; text-align:center;">GII</th>
		<th style="width: 50px; text-align:center;">GIII</th>
		<th style="width: 50px; text-align:center;">R1</th>
        {else}
		<th style="width: 50px; text-align:center;">I</th>
		<th style="width: 50px; text-align:center;">II</th>
		<th style="width: 50px; text-align:center;">III</th>
        <th style="width: 50px; text-align:center;"><a href="#" id="gradeParcial1" datetest="{$parcialTests[0]}" title="Capturar calificaci&oacute;n del Parcial I de todos los alumnos">PI</a></th>
		<th style="width: 50px; text-align:center;"><a href="#" id="gradeParcial2" datetest="{$parcialTests[1]}" title="Capturar calificaci&oacute;n del Parcial II de todos los alumnos">PII</a></th>
		<th style="width: 50px; text-align:center;"><a href="#" id="gradeParcial3" datetest="{$parcialTests[2]}" title="Capturar calificaci&oacute;n del Parcial III de todos los alumnos">PIII</a></th>
		<th style="width: 50px; text-align:center;"><a href="#" id="gradeGlobal1" datetest="{$globalTests[0]}" title="Capturar calificaci&oacute;n del Global I de todos los alumnos">GI</a></th>
		<th style="width: 50px; text-align:center;"><a href="#" id="gradeGlobal2" datetest="{$globalTests[1]}" title="Capturar calificaci&oacute;n del Global II de todos los alumnos">GII</a></th>
		<th style="width: 50px; text-align:center;"><a href="#" id="gradeGlobal3" datetest="{$globalTests[2]}" title="Capturar calificaci&oacute;n del Global III de todos los alumnos">GIII</a></th>
		<th style="width: 50px; text-align:center;"><a href="#" id="gradeR1" datetest="{$r1Test}" title="Capturar calificaci&oacute;n de Recuperaci&oacute;n de todos los alumnos">R1</a></th>       
        {/if}
		<th style="width: 60px; text-align:center;">FINAL</th>
		<th style="width: 50px; text-align:center;">&nbsp;</th>
	{else}
		<th style="width: 25px; text-align:center;" height="28">&nbsp;</th>
		<th style="width:350px; text-align:center;">PATERNO MATERNO NOMBRE</th>
		<th style="width: 30px; text-align:center;">GPO</th>
		<th style="width:250px; text-align:center;">EXAMEN</th>
         {if $viewMode == 1}
		<th style="width:100px; text-align:center;">CALIFICACION</th>
        {else}
        <th style="width:100px; text-align:center;"><a href="#" id="gradeInter" datetest="{$interTest}" title="Capturar calificacion Intersemestral de todos los alumnos" >CALIFICACION</a></th>
        {/if}
		<th style="width: 60px; text-align:center;">FINAL</th>
		<th style="width: 50px; text-align:center;">&nbsp;</th>
	{/if}
</tr>