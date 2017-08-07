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



<div class="ui-content ui-content-no-overflow ui-content-no-padding" role="main">

    <ul data-role="listview" data-inset="true" class="ui-listview ui-listview-inset ui-corner-all ui-shadow">
        <li data-role="list-divider" data-theme="a" data-swatch="a" data-form="ui-bar-a" role="heading" class="ui-li-divider ui-bar-a ui-first-child green">
            Información personal</li>
        <li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Nombre: <span class="h3"><?php echo $info["names"]?></span>
        </li>
        <li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Apellido paterno: <span class="h3"><?php echo $info["lastNamePaterno"]?></span>
        </li>
		<li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Apellido Materno: <span class="h3"><?php echo $info["lastNameMaterno"]?></span>
        </li>
		<li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Sexo: <span class="h3"><?php if($info["sexo"]=="f"){ echo "Femenino"; }else{ echo "Masculino"; } ?></span>
        </li>
		<li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Fecha de Nacimiento: <span class="h3"><?php echo $info["birthdate"]?></span>
        </li>
		<li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Estado Civil: <span class="h3"><?php echo $info["maritalStatus"]?></span>
        </li>
    </ul>
	
	 <ul data-role="listview" data-inset="true" class="ui-listview ui-listview-inset ui-corner-all ui-shadow">
        <li data-role="list-divider" data-theme="a" data-swatch="a" data-form="ui-bar-a" role="heading" class="ui-li-divider ui-bar-a ui-first-child green">
            Domicilio</li>
        <li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Calle: <span class="h3"><?php echo $info["street"]?></span>
        </li>
        <li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Número: <span class="h3"><?php echo $info["number"]?></span>
        </li>
		<li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Colonia: <span class="h3"><?php echo $info["colony"]?></span>
        </li>
		<li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Pais: <span class="h3"><?php echo $iPais["nombre"]?></span>
        </li>
		<li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Estado: <span class="h3"><?php echo $iEdo["nombre"]?></span>
        </li>
		<li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Municipio: <span class="h3"><?php echo $iMpo["nombre"]?></span>
        </li>
		<li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Código postal: <span class="h3"><?php echo $info["postalCode"]?></span>
        </li>
    </ul>
	
	
	 <ul data-role="listview" data-inset="true" class="ui-listview ui-listview-inset ui-corner-all ui-shadow">
        <li data-role="list-divider" data-theme="a" data-swatch="a" data-form="ui-bar-a" role="heading" class="ui-li-divider ui-bar-a ui-first-child green">
            Datos de Contacto</li>
        <li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Email: <span class="h3"><?php echo $info["email"]?></span>
        </li>
        <li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Celular: <span class="h3"><?php echo $info["mobile"]?></span>
        </li>
		<li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Telefono Local: <span class="h3"><?php echo $info["phone"]?></span>
        </li>
    </ul>
	
	 <ul data-role="listview" data-inset="true" class="ui-listview ui-listview-inset ui-corner-all ui-shadow">
        <li data-role="list-divider" data-theme="a" data-swatch="a" data-form="ui-bar-a" role="heading" class="ui-li-divider ui-bar-a ui-first-child green">
            Datos Laborales</li>
        <li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
           Ocupación: <span class="h3"><?php echo $info["workplaceOcupation"]?></span>
        </li>
        <li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Lugar de Trabajo: <span class="h3"><?php echo $info["workplace"]?></span>
        </li>
		<li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Domicilio: <span class="h3"><?php echo $info["workplaceAddress"]?></span>
        </li>
		<li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Pais: <span class="h3"><?php echo $iPaist["nombre"]?></span>
        </li>
		<li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Estado: <span class="h3"><?php echo $iEdot["nombre"]?></span>
        </li>
		<li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Municipio: <span class="h3"><?php echo $iMpot["nombre"]?></span>
        </li>
		<li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Area: <span class="h3"><?php echo $info["workplaceArea"]?></span>
        </li>
		<li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Telefono de Oficina: <span class="h3"><?php echo $info["workplacePhone"]?></span>
        </li>
		<li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Correo Oficial: <span class="h3"><?php echo $info["workplaceEmail"]?></span>
        </li>
    </ul>
	
	 <ul data-role="listview" data-inset="true" class="ui-listview ui-listview-inset ui-corner-all ui-shadow">
        <li data-role="list-divider" data-theme="a" data-swatch="a" data-form="ui-bar-a" role="heading" class="ui-li-divider ui-bar-a ui-first-child green">
            Estudios</li>
        <li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Grado  Académico: <span class="h3"><?php echo $info["academicDegree"]?></span>
        </li>
        <li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Profesión: <span class="h3"><?php echo $infoPro["profesionName"]?></span>
        </li>
		<li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Escuela o Institución universitaria: <span class="h3"><?php echo $info["school"]?></span>
        </li>
		<li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Maestria En: <span class="h3"><?php echo $info["masters"]?></span>
        </li>
		<li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Escuela o institucion Maestria: <span class="h3"><?php echo $info["mastersSchool"]?></span>
        </li>
		<li data-form="ui-body-a" data-swatch="a" data-theme="a" class="ui-li-static ui-body-a">
            Escuela o institucion bachillerato: <span class="h3"><?php echo $info["highSchool"]?></span>
        </li>
    </ul>
</div>






<!--
<script type="text/javascript" src="<?php echo WEB_ROOT; ?>/assets/jqm/jquery.js"></script>
<script type="text/javascript" src="<?php echo WEB_ROOT; ?>/assets/jqm/jquery.mobile-1.4.5.min.js"></script>-->
</body>
</html>


