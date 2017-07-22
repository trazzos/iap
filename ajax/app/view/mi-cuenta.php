<?php
	header('Access-Control-Allow-Origin: *'); 
?>
<html>
<head>
		<!--<link rel="stylesheet" href="<?php echo WEB_ROOT; ?>/assets/jqm/themes/iap.css" />
		<link rel="stylesheet" href="<?php echo WEB_ROOT; ?>/assets/jqm/themes/jquery.mobile.icons.min.css" />
		<link rel="stylesheet" href="<?php echo WEB_ROOT; ?>/assets/jqm/jquery.mobile.structure-1.4.5.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>/assets/jqm/jquery.mobile-1.4.5.css" />-->
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
			
		<br>	
		<br>	
		<div class="titulocontenedor">Información Personal</div>
			<div class="contenedor">
				 <div class="portlet-body">
					<div class="form-group">
						<div class="col-md-3">Nombre:</div>
						<div class="col-md-8">
							<?php echo $info["names"]?>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-3">Apellido Paterno:</div>
						<div class="col-md-8">
						  <?php echo $info["lastNamePaterno"]?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-3 control-div">Apellido Materno:</div>
						<div class="col-md-8">
						   <?php echo $info["lastNameMaterno"]?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-3 control-div">Sexo:</div>
						<div class="col-md-8">
							<?php echo $info["sexo"]?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-3 control-div">Fecha de Nacimiento:</div>
						<div class="col-md-8">
							<?php echo $info["sexo"]?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-3 control-div">Estado Civil:</div>
						<div class="col-md-8">
							<?php echo $info["maritalStatus"]?>
						</div>
					</div>
				</div>
			</div>
		<div class="titulocontenedor">Domicilio</div>
		<div class="contenedor">
			 <div class="form-group">
                <div class="col-md-3 control-div">Calle</div>
                <div class="col-md-8">
					<?php echo $info["street"]?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3 control-div">Número</div>
                <div class="col-md-8">
					<?php echo $info["number"]?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3 control-div">Colonia:</div>
                <div class="col-md-8">
                 <?php echo $info["colony"]?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3 control-div">País</div>
                <div class="col-md-8">
                  <?php echo $info["pais"]?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3 control-div">Estado:</div>
                <div class="col-md-8">
                    <?php echo $info["estadoId"]?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3 control-div">Municipio</div>
                <div class="col-md-8">
                    <?php echo $info["municipioId"]?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3 control-div">Código Postal:</div>
                <div class="col-md-8">
                     <?php echo $info["postalCode"]?>
                </div>
            </div>
		</div>
		<div class="titulocontenedor">Datos de Contacto</div>
		<div class="contenedor">
			<div class="form-group">
                <div class="col-md-3 control-div">Email:</div>
                <div class="col-md-8">
                     <?php echo $info["email"]?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3 control-div">Celular:</div>
                <div class="col-md-8">
					  <?php echo $info["mobile"]?>
                </div> 
            </div>

            <div class="form-group">
                <div class="col-md-3 control-div">Teléfono local</div>
                <div class="col-md-8">
					 <?php echo $info["phone"]?>
                </div>
            </div>
			
		</div>
		<div class="titulocontenedor">Datos Laborales</div>
		<div class="contenedor">
			<div class="form-group">
                <div class="col-md-3 control-div">Ocupación</div>
                <div class="col-md-8">
                        <?php echo $info["workplaceOcupation"]?>     
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3 control-div">Lugar de trabajo:</div>
                <div class="col-md-8">
                        <?php echo $info["workplace"]?>     
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3 control-div">Domicilio:</div>
                <div class="col-md-8">
                     <?php echo $info["workplaceAddress"]?>     
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3 control-div">País</div>
                <div class="col-md-8">
                     <?php echo $info["paist"]?>   
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3 control-div" >Estado:</div>
                <div class="col-md-8">
                        <?php echo $info["estadot"]?>  
                </div> 
            </div>

            <div class="form-group">
                <div class="col-md-3 control-div">Municipio</div>
                <div class="col-md-8">
                      <?php echo $info["ciudadt"]?> 
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3 control-div">Area</div>
                <div class="col-md-8">
                       <?php echo $info["workplaceArea"]?> 
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3 control-div">Teléfono de Oficina</div>
                <div class="col-md-8">
                      <?php echo $info["workplacePhone"]?> 
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3 control-div">Correo Oficial</div>
                <div class="col-md-8">
                        <?php echo $info["workplaceEmail"]?> 
                </div>
            </div>

		
		</div>
		<div class="titulocontenedor">Estudios</div>
		<div class="contenedor">
			 <div class="form-group">
                <div class="col-md-3 control-div">Grado Académico</div>
                <div class="col-md-8">
                        <?php echo $info["academicDegree"]?> 
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3 control-div">Profesión</div>
                <div class="col-md-8">
                      <?php echo $info["profesion"]?> 
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3 control-div">Escuela o Institución  Universitaria:</div>
                <div class="col-md-8">
                    <?php echo $info["school"]?> 
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3 control-div">Maestría en:</div>
                <div class="col-md-8">
                    <?php echo $info["masters"]?> 
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3 control-div">Escuela o Institución Maestría</div>
                <div class="col-md-8">
                     <?php echo $info["mastersSchool"]?> 
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3 control-div">Escuela o Institución Bachillerato</div>
                <div class="col-md-8">
                     <?php echo $info["highSchool"]?> 
                </div>
            </div>

		</div>





<!--
<script type="text/javascript" src="<?php echo WEB_ROOT; ?>/assets/jqm/jquery.js"></script>
<script type="text/javascript" src="<?php echo WEB_ROOT; ?>/assets/jqm/jquery.mobile-1.4.5.min.js"></script>-->
</body>
</html>


