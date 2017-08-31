<?php
	header('Access-Control-Allow-Origin: *'); 
?>
<html>
<head>
<style type="text/css">

.titulocontenedor {
	background:#f6f6f6;
	border: #ddd;
	border-top-width: 0;
    border-bottom-width: 1px;
    border-style: solid;
	height:20px;
	padding: 14px 10px 10px 10px;
	color: #276e36;
	font-weight: bold;
}

.contenedor {
	background:white;
	border: #ddd;
	border-top-width: 0;
    border-bottom-width: 1px;
    border-style: solid;
	padding: 14px 10px 10px 10px;
	color: #93a3b5;

}



.col-md-3{
	color: #93a2a9;
	font-weight: bold;
}



#izquierda {	
	float:left;
    border: 1px solid;
    border-radius: 3px 0 0 3px;
	padding: 3px 22px;
	font-size:12px;
	border-color: #165e26 ;
}
#derecha {	
	float:left;
    border: 1px solid;
    border-radius: 0 3px 3px 0;
	padding: 3px 22px;
	font-size:12px;
	border-color: #165e26 ;
}
.enlace{
	text-decoration:none; 
	color:white !important;
	font-size:14px;
	
    font-weight: 100;	
}
</style>
</head>

<body>





	<?php 
		if($_POST['Id'] == 7 or $var == 1 or $_POST['Id'] == 40){
		?>
		<div id="izquierda">
		<a onClick='clickMenu(<?php echo 7?>)' class='enlace'>Nosotros</a>
		</div>
		<div id="derecha">
		<a onClick='clickMenu(<?php echo 40?>)' class='enlace'>Instalaciones</a>
		</div>
		<div style='clear:both'>
		</div>
		<?php 
		}else if ($_POST['Id'] == 36 or $_POST['Id'] == 41){
		?>
		<div id="izquierda">
		<a onClick='clickMenu(<?php echo 36?>)' class='enlace'>Directorio</a>
		</div>
		<div id="derecha">
		<a onClick='clickMenu(<?php echo 41?>)' class='enlace'>Consejo Di..</a>
		</div>
		<div style='clear:both'>
		</div>
		<?php 
		}
		if($_POST['Id'] >= 42 and $_POST['Id'] <= 51){
		?> 
		<div id="izquierda">
		<a href='<?php echo WEB_ROOT?>/estandares/<?php echo $_POST['Id']?>.pdf' target='_blank' class='enlace'>Descargar</a>
		</div>
		<div style='clear:both'>
		</div>
		<?php 
		}
		?>
		<?php 
		if($_POST['Id'] >= 52 and $_POST['Id'] <= 55){
		?> 
		<div id="izquierda">
		<a href='<?php echo WEB_ROOT?>/tripticos/<?php echo $_POST['Id']?>.jpg' target='_blank' class='enlace'>Descargar</a>
		</div>
		<div style='clear:both'>
		</div>
		<?php 
		}
		?>
	
	<div class='contenido' id='contenidoAjax' style="height:400px; overflow:scroll" class="showScroll lion">
	<?php 
	if ($_POST['Id'] == 40){
	?>
	<center>
	<table>
	<tr>
		<td><?php echo $uno?></td>
		<td><?php echo $dos?></td>
	</tr>
	<tr>
		<td><?php echo $tres?></td>
		<td><?php echo $cuatro?></td>
	</tr>
	<tr>
		<td><?php echo $cinco?></td>
		<td><?php echo $seis?></td>
	</tr>
	<tr>
		<td><?php echo $siete?></td>
		<td><?php echo $ocho?></td>
	</tr>
	<tr>
		<td><?php echo $nueve?></td>
		<td><?php echo $diez?></td>
	</tr>
	</table>
	</center>
	<?php	
	}
	else if($_POST['Id'] == 13){
		foreach($lstSubmenu as $key => $fila){
		echo '<a onclick="clickMenu('.$fila['menuAppId'].')" class="ui-btn login white">
					'.$fila['nombre'].'
				</a>';
		}
	}
	else if($_POST['Id'] == 25 or $_POST['Id'] == 26){
		foreach($lstSubmenu as $key => $fila){
		echo '<a onclick="clickMenu('.$fila['menuAppId'].')" class="ui-btn login white">
					'.$fila['nombre'].'
				</a>';
		}
	}
	else if($_POST['Id'] == 32){
		echo '
		<br><b>Contacto</b>
		<br><br>
		<b>Ubicación</b><br>
		Libramiento Norte Poniente No. 2718. Fraccionamiento Ladera de la Loma. C.P. 29026. 
		<br>
		<br>
		<b>Telefonos y Correo</b><br>
		(961) 125 1508<br>
		(961) 125 1509<br>
		(961) 125 1510<br>
		contacto@iapchiapas.org.mx<br>

		';
	}
	else if($_POST['Id'] == 34){
		echo '
		<br><b>Formulario de Contacto</b>
		<br><br>
		<form >
		<table >
			<tr>
				<td>Nombre</td>
				<td><input type="text" name="nombre" style="width:180px"></td>
			</tr>
			<tr>
				<td>Correo electrónico</td>
				<td><input type="text" name="correo" style="width:180px"></td>
			</tr>
			<tr>
				<td>Teléfono de contacto</td>
				<td><input type="text" name="telefono" style="width:180px"></td>
			</tr>
			<tr>
				<td>Solicitud / Petición</td>
				<td>
				<textarea name="">
				</textarea>
				</td>
			</tr>
		</table>
		</form>
		<a onclick="" class="ui-btn login white">
			Enviar					
				</a>

		';
	}
	else{
		
		if($_POST['Id'] == 8){
			echo '<br><center>'.$urlPres.'</center><br>';
		}
		
		if($_POST['Id'] == 10){
			echo '<br><center>'.$urlSede.'</center><br>';
		}
		
		echo $infoSeccion['contenido'];
	}
	
	?>	
	</div>


</body>
</html>


