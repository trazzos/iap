<?php
	header('Access-Control-Allow-Origin: *'); 
?>
<center><?php echo $urlFoto;  ?></center>
<center><p class='tituloperfil'><b> <?php echo $info["name"]." ".$info["lastNamePaterno"]." ".$info["lastNameMaterno"]"</b><br>Alumno</p></center>"; ?>
<div class='h3' style='border-bottom: 1px solid #f0f4f7;  padding: 10px 15px'><img src='{$WEB_ROOT}/images/app/user-white.png' >{$info.controlNumber}</div>
<div class='h3' style='border-bottom: 1px solid #f0f4f7;  padding: 10px 15px'><img src='{$WEB_ROOT}/images/app/mail-white.png' >{$info.email}</div><br>

