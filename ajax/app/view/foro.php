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

<div class="ui-content ui-content-no-overflow ui-content-no-padding ui-page-theme-a" data-form="ui-page-theme-a" data-theme="a" role="main">

    <ul data-role="listview" data-autodividers="true" data-inset="true" class="ui-listview ui-listview-inset ui-corner-all ui-shadow">

	<?php 
	// echo "<pre>"; print_r($forums);
	// exit;
	foreach($forums as $key=>$aux){
	?>
    <li><a href="#" class="ui-btn ui-btn-icon-right ui-icon-carat-r" onClick="verSubforo(<?php echo $aux["topicId"]?>,<?php echo $myModule["courseId"]?>)"><?php echo $aux["subject"]?></a></li>
	<?php 
	}
	?>
  </ul>
	
</div>


</body>
</html>
