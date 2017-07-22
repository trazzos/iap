<?php
	header('Access-Control-Allow-Origin: *'); 
?>
<table>
<tr><td>Bienvenida</td></tr>
<tr><td><?php echo $infoMod["welcomeTextDecoded"];  ?></td></tr>
<tr><td>Intenciones del Curso</td></tr>
<tr><td><?php echo $infoMod["intentionsDecoded"];  ?></td></tr>
<tr><td>Temas</td></tr>";
<tr><td><?php echo $infoMod["themesDecoded"];  ?></td></tr>
<tr><td>Metodología</td></tr>";
<tr><td><?php echo $infoMod["methodologyDecoded"];  ?></td></tr>
<tr><td>Evaluacion</td></tr>";
<tr><td><?php echo $infoMod["evaluationDecoded"];  ?></td></tr>
<tr><td>Bibliografía</td></tr>";
<tr><td><?php echo $infoMod["bibliographyDecoded"];  ?></td></tr>
</table>