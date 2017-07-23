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
.speech-bubble:after {
  border: solid 10px transparent;
  border-top-color: #276e36;  /* igual al color de fondo */
  border-bottom: 0;
  bottom: -20px;  /* igual al borde + el padding-bottom de la definición anterior */
  content: "";
  display: block;
  height: 0;
  margin: auto;
  overflow: hidden;
  position: relative;
  width: 0;
}
.enlace {
  color: white; /* el color del texto */
  font-family: Arial, Sans-serif;
  font-size: 12px;
}
</style>
</head>

<body>
			
<table>
<tr><td>Bienvenida</td></tr>
<tr><td><?php echo $infoMod["welcomeTextDecoded"];  ?></td></tr>
<tr><td>Intenciones del Curso</td></tr>
<tr><td><?php echo $infoMod["intentionsDecoded"];  ?></td></tr>
<tr><td>Temas</td></tr>
<tr><td><?php echo $infoMod["themesDecoded"];  ?></td></tr>
<tr><td>Metodología</td></tr>
<tr><td><?php echo $infoMod["methodologyDecoded"];  ?></td></tr>
<tr><td>Evaluacion</td></tr>
<tr><td><?php echo $infoMod["evaluationDecoded"];  ?></td></tr>
<tr><td>Bibliografía</td></tr>
<tr><td><?php echo $infoMod["bibliographyDecoded"];  ?></td></tr>
</table>



</body>
</html>
