<?php

$message[1]["subject"] = "Estas oficialmente pre-inscrito al programa.";
$message[1]["body"] = "
	Bienvenido al programa. Estamos muy agradecidos que nos hayas elegido.
	
	El(la) |major| de tu elección es:
	<b>|course|</b>
	
	Tu datos para ingresar al sistema son los siguientes
	<b>Usuario:</b> |email|
	<b>Contrase&ntilde;a del Sistema:</b>	|password|
	
	Tu solicitud de pre-inscripción está siendo revisada por nuestro personal, por lo que en breve recibirás un correo con la confirmación de tu inscripción, esto te dará acceso total al programa elegido.

	Nota:
	Si eres alumno presencial, se te adjuntó a este correo una cédula de inscripción, misma que tendrás que presentar en las oficinas de nuestra institución, ubicadas en ".COMPANY_ADDRESS.".
	
	Para mejor la experiencia de navegación en nuestro Sistema de Educación en Línea, te recomendamos utilizar el navegador Chrome 
	así como también consultar el manual del alumno que se encuentra disponible en el siguiente enlace:
	<a href='".STUDENT_MANUAL."'>Manual de Alumno</a>

	";

$message[2]["subject"] = "Pago autorizado";
$message[2]["body"] = "
	Agradecemos tu pago y te informa que este ha sido autorizado. El acceso a:
	
	El(la) |major| <b>|course|</b>
    
    Se encuentra activo por lo que ya puedes acceder al programa que hayas elegido.
	";
	
	
?>