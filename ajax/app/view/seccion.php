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

.contenido{
	background: rgba(255, 255, 255, 0.54);
	padding: 5px 11px;
	text-align : justify
}

#izquierda {	
	float:left;
    border: 1px solid;
    border-radius: 3px 0 0 3px;
	padding: 3px 22px;
	font-size:12px;
	background: #276e36;
	border-color: #165e26 ;
}
#derecha {	
	float:left;
    border: 1px solid;
    border-radius: 0 3px 3px 0;
	padding: 3px 22px;
	font-size:12px;
	background: #276e36;
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





	<div  id='contenidoAjax'>
	
		<?php 
		if($_POST['Id'] == 7 or $var == 1){
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
		}else if ($_POST['Id'] == 36){
		?>
		<div id="izquierda" class='enlace'>
		Directorio
		</div>
		<div id="derecha" class='enlace'>
		Consejo Directivo
		</div>
		<div style='clear:both'>
		</div>
		<?php 
		}
		?>
		
		<div class='contenido' style="width: 95%; height:400px; overflow:scroll" class="showScroll lion">
		<?php 
		if ($_POST['Id'] == 5){
		?>
		<br>
			<br>
		<center>
		<table width=50% border=0 width=100% >
		<tr>
			<td><?php echo $urlFace?> </td>
			<td >Facebook</td>
		</tr>
		<tr>
			<td><?php echo $urlTwi?></td>
			<td style>Twitter</td>
		</tr>
		<tr>
			<td><?php echo $urlIns?></td>
			<td>Instagram</td>
		</tr>
		<tr>
			<td><?php echo $urlLink?></td>
			<td>LinkedIn</td>
		</tr>
		</table>
		</center>
		<?php
		}
		else if($var == 6){
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
		else{
			if($_POST['Id'] == 7){
				echo '<center>'.$imgFachada.'</center>';
			}
			
			echo $infoSeccion['contenido'];
		}
		?>	
		</div>
	</div>
	
	


</body>
</html>


