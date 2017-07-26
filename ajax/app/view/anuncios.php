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
			

<?php	
	// echo "<pre>"; print_r($announcements);
	// exit;
	foreach($announcements as $key=>$aux){
?>
	<div class="speech-bubble">
		<?php if($aux["title"]==""){ echo "Sin Titulo"; } else{ echo $aux["title"]; }?>
		<br>
		<?php  echo $aux["date"]?>
		<div  class="enlace" onClick="openAnuncio(<?php echo $aux["announcementId"]?>)" >Abrir</div>
		<div id="divanun_<?php echo $aux["announcementId"]?>" style="display:none">
		<?php echo $aux["description"]?>
		</div>
	</div>
	<br>
	<br>
<?php 
}
?>


</body>
</html>
