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

<!--


    <ul data-role="listview" data-inset="true" class="ui-listview ui-listview-inset ui-corner-all ui-shadow">
        <li data-role="list-divider" data-theme="a" data-swatch="a" data-form="ui-bar-a" role="heading" class="ui-li-divider ui-bar-a ui-first-child green">
        <?php /*echo $infoActividad["resumen"]*/?></li>
		 <li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            <center>Descripción</center> <br><span class="h3" style="text-align:justify"><?php /*echo $infoActividad["description"]*/?></span>
        </li>
        <li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Fecha Inicial: <span class="h3"><?php /*echo $infoActividad["initialDate"]*/?></span>
        </li>
        <li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Fecha Final: <span class="h3"><?php /*echo $infoActividad["finalDate"]*/?></span>
        </li>
		<li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Modalidad: <span class="h3"><?php /*echo $infoActividad["modality"]*/?></span>
        </li>
		<?php /*if ($infoActividad["homework"]){ */?>
		<li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Tarea Entregada: 
			<span class="h3">
				<a onclick="downloadFile('<?php /*echo WEB_ROOT.'/homework/'.$infoActividad["homework"]["path"]*/?>')"  href="#" >
				Descargar
				</a>
			</span>
        </li>
		<?php /*}*/?>
		 <?php /*if($infoActividad["ponderation"]) {*/?>
		<li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Calificación: <span class="h3"><?php /*echo $infoActividad["ponderation"]*/?></span>
        </li>
		
		<li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Porcentaje Obtenido: <span class="h3"><?php /*echo $infoActividad["realScore"]*/?>%</span>
        </li>
		 <?php /*}*/?>
		 <?php /*if($infoActividad["retro"]) {*/?>
		<li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Retroalimentación:<br> <span class="h3"><?php /*echo nl2br($infoActividad["retro"])*/?></span>
        </li>
		 <?php /*}*/?>
		 <?php /*if($infoActividad["retroFile"] <> ""){*/?>
		<li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Archivo adjunto disponible: <span class="h3">

			<a onclick="downloadFile('<?php /*echo WEB_ROOT.'/file_retro/'.$infoActividad["retroFile"]*/?>')"  href="#" >
				Descargar
			</a>
        </li>
		 <?php /*}*/?>
		 
    </ul>
	<?php /*if($_POST["tipo"]=="actividad"){*/?>
		<?php /*$timestamp = time(); */?>
		<?php /*if ($timestamp > $infoActividad["initialDateTimestamp"] && $timestamp < $infoActividad["finalDateTimestamp"]){ */?>
			<a onClick="verFormUp('<?php /*echo $infoActividad["activityId"]*/?>','<?php /*echo $infoActividad["modality"]*/?>','<?php /*echo $_POST["tipo"]*/?>')" id="btnComentario" class="ui-btn login white">
				Subir Actividad
			</a>
		<?php /*}*/?>
		<?php /*if ($timestamp > $infoActividad["finalDateTimestamp"]){ */?>
			<span style="color:#C00">Tiempo Terminado</span><br>
		<?php /*}*/?>
		<?php /* if ($timestamp < $infoActividad["initialDateTimestamp"] ){*/?>
			<span style="color:#C00">No Iniciada</span>
		<?php /*}*/?>


	<?php /*}else{*/?>
	<font color='#276e36'>
	Los examenes solo se pueden realizar a través de www.iapchiapasenlinea.mx
	</font>
	--><?php /*}*/?>
	
</div>






<!--
<script type="text/javascript" src="<?php echo WEB_ROOT; ?>/assets/jqm/jquery.js"></script>
<script type="text/javascript" src="<?php echo WEB_ROOT; ?>/assets/jqm/jquery.mobile-1.4.5.min.js"></script>-->
</body>
</html>


