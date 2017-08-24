<?php
	header('Access-Control-Allow-Origin: *'); 
?>
<html>
<head>
<style type="text/css">
.speech-bubble {
  background: #276e36; /* el color de fondo */
  color: #FFF; /* el color del texto */
  font-family: Arial, Sans-serif;
  font-size: 12px;
  padding: 20px 10px 10px 10px;
  text-align: center;
  width: 270px;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
  border-radius: 10px;
}
.parrafos{
  text-align:justify;
  color: white;
}
.enlace {
  color: white; /* el color del texto */
  font-family: Arial, Sans-serif;
  font-size: 12px;
}
</style>
</head>

<body>
<br>
<br>
<br>
<div class="ui-content ui-content-no-overflow ui-content-no-padding ui-page-theme-a" data-form="ui-page-theme-a" data-theme="a" role="main" style="background-color: rgba(255, 255, 255, 0.13);">
<br>

<a onclick="backHome()" class="tblwelcome">
<i class="material-icons white">keyboard_arrow_left</i>
</a>
<p class="parrafos">

<br>
<br>

<table align="center"  class="tblwelcome">
	<tr>
		<td>Nombre</td>
		<td><input type></td>
	</tr>
	<tr>
		<td>Correo Electrónico</td>
		<td><input type></td>
	</tr>
	<tr>
		<td>Telefono de Contacto</td>
		<td><input type></td>
	</tr>
	<tr>
		<td>Solicitud o Petición</td>
		<td><input type></td>
	</tr>
</table>

<center>
<a onClick="DoLogin()" class="ui-btn login white">
					Enviar
				</a>
</center>

</p>
</div>


</body>
</html>
