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
	background: rgba(255, 255, 255, 0.58)
}

.menu{
	float:left;
	text-align:center;
	height: 40px;
	width: 100px;
	border-right: 1px solid ;
	border-color: #165e26 ;
	text-decoration:none;  
	background: #276e36 ;
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

if($_POST['Id'] <>5){

foreach($lstMenu as $key=>$aux){
if($aux['menuAppId'] <>9){
?>
<div class='menu'>
<a class='enlace' onClick='clickMenu(<?php echo $aux['menuAppId']?>)'><?php echo $aux['nombre']?></a>
</div>
<?php 
}}
}
?>


</body>
</html>



