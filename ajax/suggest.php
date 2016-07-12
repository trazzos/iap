<?php

	include_once('../init.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');
	
	
	
	$type = $_POST['type'];
	
	switch($type){
			
		case 'sugStudent':
				
				$student->setName($_POST['value']);
				$resStd = $student->SearchByName();
				
				$result = array();
				foreach($resStd as $key => $res){
					
					$card['id'] = $res['userId'];
					$card['name'] = $res['names'].' '.$res['lastNamePaterno'].' '.$res['lastNameMaterno'];
					
					$result[$key] = $card;
				}
				
			break;
	
	}
	
	if(!$result)
	{
	?>
		<div style="border:solid; border-width:1px; border-color:#000; background-color:#FF6; color:#666; padding:3px; width:360px">
        <div align="right"><a href="javascript:HideSuggestions()">Cerrar</a></div>
        No hay resultados.
	  </div>
	<?php 		
	}else{
	?>
	<div style="border:solid; border-width:1px; border-color:#000; background-color:#FF6; color:#666; padding:3px; width:360px">
        <div align="right"><a href="#" onclick="HideSuggestions()">Cerrar</a></div>       
	  </div>
	<?php
	}//else
	
	foreach($result as $val)
	{
?>
	<div style="border:solid; border-width:1px; border-color:#000; background-color:#FF6; color:#666; padding:3px; width:360px;" id="resultSuggestUser<?php echo $val["id"] ?>" align="left">
		<span style="width:360px; font-weight:bold; cursor:pointer" class="resultSuggestUser">
		<?php echo $val["id"].' '.utf8_encode($val["name"]); ?></span>
  </div>
<?php
	}
?>
