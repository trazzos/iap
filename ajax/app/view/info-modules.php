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

    <ul data-role="listview" data-inset="true" class="ui-listview ui-listview-inset ui-corner-all ui-shadow">
        <li data-role="list-divider" data-theme="a" data-swatch="a" data-form="ui-bar-a" role="heading" class="ui-li-divider ui-bar-a ui-first-child green">
            <?php echo $infoMol["name"]?></li>
        <li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Nombre: <span class="h3"><?php echo $infoMol["name"]?></span>
        </li>
        <li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Tipo: <span class="h3"><?php echo $infoMol["majorName"]?></span>
        </li>
		 <li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Tipo: <span class="h3"><?php echo $infoMol["modality"]?></span>
        </li>
		 <li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Fecha Inicial: <span class="h3"><?php echo $infoMol["initialDate"]?></span>
        </li>
		 <li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Fecha Final: <span class="h3"><?php echo $infoMol["finalDate"]?></span>
        </li>
		<li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Dias Activo: <span class="h3"><?php echo $infoMol["daysToFinish"]?></span>
        </li>
		<li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Modulos: <span class="h3"><?php echo $infoMol["courseModule"]?></span>
        </li>
		<?php 
		if($_POST["estatus"]=="finalizada"){
		?>
		<li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Calificación: <span class="h3"><?php echo $infoMol["mark"]?></span>
        </li>
		<?php 
		}
		?>
    </ul>
	
</div>






<!--
<script type="text/javascript" src="<?php echo WEB_ROOT; ?>/assets/jqm/jquery.js"></script>
<script type="text/javascript" src="<?php echo WEB_ROOT; ?>/assets/jqm/jquery.mobile-1.4.5.min.js"></script>-->
</body>
</html>


