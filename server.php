<?php
include_once('./init.php');
include_once('./config.php');
include_once(DOC_ROOT.'/libraries.php');

header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

$respuestas=$forum->RepliesEnumerate();
$arr = array(1,2,3,4,5,6,7,8,9,0);

$regreso = "";

/////////////////////////////////////**********************//////////////////////////////////////////
//ARMA TODO LO QUE VAYAS A PONER EN ESA PARTE EN UNA VARIABLE EN FORMA DE HTML Y YA LUEGO LA MANDAS//
///////////////////////////////ASI COMO MANDÉ LOS INPUT//////////////////////////////////////////////
////////////////////////////////USA TU IMAGINACION xD////////////////////////////////////////////////
/////////////////////////////////////**********************//////////////////////////////////////////
$x=0;
foreach($respuestas as $key=>$ress)
{
     
       
  	   if($x<10){
	          if($ress['names']===NULL && $ress['lastNamePaterno']==NULL && $ress['lastNameMaterno']==NULL)
	          $regreso.="<tr><td>".$ress['replyDate']."</td>   <td> </td>   <td> ".$ress['name']." ".$ress['lastNamePaterno']." ".$ress['lastNameMaterno']." </td></tr>";
	           else
			  $regreso.="<tr><td>".$ress['replyDate']."</td>   <td> </td>   <td> ".$ress['names']." ".$ress['lastNamePaterno']." ".$ress['lastNameMaterno']." </td></tr>";
       }$x++;

  
  
}
$regreso = trim($regreso,"[#]");
$regresando="<table><tr><td>Fecha de publicacion</td><td>Curso->foro->topico</td><td>Publicado por</td> </tr>  ".$regreso."</table>";

// foreach($arr as $key => $res)
// {
	// $regreso .= "<input type='text' value='".$res."' /><br />";
// }



//echo "data: ".$regreso;

echo "data: ".$regresando." \n\n";
flush();
?>