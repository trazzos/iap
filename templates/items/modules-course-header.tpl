<tr>
	<!--<th width="30" height="28">ID</th>-->
    <!--<th width="100">Clave</th>-->
    <th width="40">Cuat.</th>
    <th width="200">Nombre</th>
    <th width="80">Fecha Inicio</th>
    <th width="80">Fecha Fin</th>
   <!-- <th width="100">Dias para Terminar</th>
    <th width="80">Activo</th>-->
    {if $User.type == "student"}
	    <th width="80">Calificación Parcial</th>
	    <th width="80">Calificación Final</th>
	    <th width="80">Evaluación Docente</th>
    {/if}
  	<th width="60">Ingresar</th>
</tr>