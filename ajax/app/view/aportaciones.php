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

.divForo {
  display:none;
  border-radius: 5px; 
  border: 1px solid #276e36;
  padding:10px;10px;
   font-size: 10px;
}

.line {

  background:  #93a3b5;

}

</style>
</head>

<body>

<div class="ui-content ui-content-no-overflow ui-content-no-padding ui-page-theme-a" data-form="ui-page-theme-a" data-theme="a" role="main">

    
	<?php 
	// echo "<pre>"; print_r($forums);
	foreach($replies as $key=>$aux){
	?>
	<ul data-role="listview" data-inset="true" class="ui-listview ui-listview-inset ui-corner-all ui-shadow">
		<li data-role="list-divider" data-theme="a" data-swatch="a" data-form="ui-bar-a" role="heading" class="ui-li-divider ui-bar-a ui-first-child green">
			
			
			<?php echo $aux["names"]." ".$aux["lastNamePaterno"]." ".$aux["lastNameMaterno"]?>
		</li>
		<div class="content">
				<span class="h3">
				<?php echo $aux["content"]?>
				</span>
				<br>
				<br>
				<span class="h3"><?php echo $aux["replyDate"]?></span>
				<br>
				<?php 
				echo '
					<a href="javascript:void(0)" onClick="addComentario('.$aux["replyId"].','.$_POST["topicId"].','.$_POST["courseId"].')">
					<img src="'.WEB_ROOT.'/images/add.png" style="width:17px; border-radius: 50%;" >
					</a>';
				echo "&nbsp;";
				if($aux["numComentarios"] <= 0){
					echo '<img src="'.WEB_ROOT.'/images/comentarioGris.png" style="max-width: 15px;height: auto;" title="VER COMENTARIOS"> ';
				}else{
					echo '<a href="javascript:void(0)" onClick="verComentario('.$aux["replyId"].')">
							<img src="'.WEB_ROOT.'/images/comentario.png" style="max-width: 16px;height: auto;" title="VER COMENTARIOS"> 
						</a>';
				}
				?>
			<br>
			<br>
			<br>
			<div id="div_<?php echo $aux["replyId"]?>" class="divForo" >
				<table>
				<?php 
				foreach($aux["replies"] as $key2=>$auxcom){
				?>
					<tr>
					<td>
						<span class="h2"><?php echo $auxcom["names"]." ".$auxcom["lastNamePaterno"]." ".$auxcom["lastNameMaterno"] ?><br>
						<?php echo $auxcom["replyDate"] ?><span class="h2">
						<br>
						<br>
						<?php echo $auxcom["content"] ?><br>
						<hr class="line">
					</td>
					</tr>
				<?php 
				}
				?>
				</table>	
			</div>
		</div>
	</ul>
	<?php 
	}
	?>

	
</div>


</body>
</html>
