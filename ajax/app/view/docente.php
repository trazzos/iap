<?php
	header('Access-Control-Allow-Origin: *'); 
?>
<center>
	<?php echo $urlFotoDoc;  ?>
</center>
<center>
	<p class='tituloperfil'>
	<b> <?php echo $docente["name"]." ".$docente["lastname_paterno"]." ".$docente["lastname_materno"] ?> <b><br>
		Docente
</center>
	<div class="material-icon h3 margin">
		<i class="material-icons green">person</i>
		<span class="text"><?php echo $docente["correo"]; ?></span>
	</div>
	<div class="material-icon h3 margin">
		<i class="material-icons green">email</i>
		<span class="text"><?php echo $info["celular"]; ?></span>
	</div>

	<ul data-role="listview" data-inset="true" class="ui-listview ui-listview-inset ui-corner-all ui-shadow">
        <li data-role="list-divider" data-theme="a" data-swatch="a" data-form="ui-bar-a" role="heading" class="ui-li-divider ui-bar-a ui-first-child green">
            Semblanza</li>
        <li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
           <span class="h3"><?php echo $docente["semblanza"]?></span>
        </li>
    </ul>