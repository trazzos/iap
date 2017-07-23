<?php
	header('Access-Control-Allow-Origin: *'); 
?>
<center>
	<?php echo $urlFoto;  ?>
</center>
<center>
	<p class='tituloperfil'>
	<b> <?php echo $info["name"]." ".$info["lastNamePaterno"]." ".$info["lastNameMaterno"] ?>
</center>
	<div class="material-icon h3 margin">
		<i class="material-icons green">person</i>
		<span class="text"><?php echo $info["controlNumber"]; ?></span>
	</div>
	<div class="material-icon h3 margin">
		<i class="material-icons green">email</i>
		<span class="text"><?php echo $info["email"]; ?></span>
	</div>
