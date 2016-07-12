function DoTest(id)
{
	var con = confirm("Esta seguro de que desea presentar este examen? El tiempo empezara a correr despues de aceptar");
	
	if(!con)
	{
		return;
	}
	
	GB_show('Presentar Examen', WEB_ROOT+"/make-test/id/"+id,600,700);
}