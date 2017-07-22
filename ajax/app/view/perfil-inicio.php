<?php
	header('Access-Control-Allow-Origin: *'); 
?>
<center><?php echo $urlFoto;  ?></center>
<center><p class='tituloperfil'><b> <?php echo $info["name"]." ".$info["lastNamePaterno"]." ".$info["lastNameMaterno"]."</b><br>Alumno</p></center>"; ?>
<div class='h3' style='border-bottom: 1px solid #f0f4f7;  padding: 10px 15px'><img src='<?php echo WEB_ROOT."/images/app/user-white.png" ?>' >&nbsp;&nbsp;<?php echo $info["controlNumber"]; ?> </div>
<div class='h3' style='border-bottom: 1px solid #f0f4f7;  padding: 10px 15px'><img src='<?php echo WEB_ROOT."/images/app/mail-white.png" ?>' >&nbsp;&nbsp;<?php echo $info["email"]; ?></div><br>

