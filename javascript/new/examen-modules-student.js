function DoTest(id)
{
    var con = confirm("Esta seguro de que desea presentar este examen? El tiempo empezara a correr despues de aceptar");

    if(!con)
    {
        return;
    }

//    $('#presentarExamen').click();

    window.location = WEB_ROOT+"/make-test/id/"+id;
}