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
  color: #276e36;
  padding:10px;
  font-weight: 500;
  background: rgba(255, 255, 255, 0.5);
  font-size:12px;
}
.enlace {
  color: white; /* el color del texto */
  font-family: Arial, Sans-serif;
  font-size: 12px;
}
</style>
</head>

<body>

<div class="ui-content ui-content-no-overflow ui-content-no-padding ui-page-theme-a" data-form="ui-page-theme-a" data-theme="a" role="main" style="background-color: rgba(255, 255, 255, 0.13);">

<div class ="parrafos" style="height:600px; overflow:scroll" class="showScroll lion">
<?php 
if ($_POST['Id'] == 37){
	echo '<table align=center>';
	echo '<tr><td>'.$uno.'</td><td>'.$dos.'</td></tr>';
	echo '<tr><td>'.$tres.'</td><td>'.$cuatro.'</td></tr>';
	echo '<tr><td>'.$cinco.'</td><td>'.$seis.'</td></tr>';
	echo '<tr><td>'.$siete.'</td><td>'.$ocho.'</td></tr>';
	echo '<tr><td>'.$nueve.'</td><td>'.$diez.'</td></tr>';
	echo '</table>';

}else{
	echo $infoSeccion['contenido'];
}
?>
</div>

</body>
</html>
