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

.col-md-8{
	height:30px
}
</style>
</head>

<body>

<div class="ui-content ui-content-no-overflow ui-content-no-padding ui-page-theme-a" data-form="ui-page-theme-a" data-theme="a" role="main">

    <ul data-role="listview" data-autodividers="true" data-inset="true" class="ui-listview ui-listview-inset ui-corner-all ui-shadow">
    <li>
		<?php foreach($lstMenu as $key=>$aux) {?>
			<a href="#" onClick="verSubSeccion('<?php echo $aux["menuAppId"]?>')" class="ui-btn ui-btn-icon-right ui-icon-carat-r"><?php echo $aux["nombre"]?></a>
		<?php }?>
	</li>
  </ul>
	
</div>
</body>
</html>


