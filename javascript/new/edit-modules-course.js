$( document ).ready(function() {

    $(document).on("click",".spanDelete",function() {
        var $id = $(this).data('id');
        DeleteActivity($id);
    });

});


function DeleteActivity(id)
{
    var $message = "¿Está seguro de eliminar esta actividad?";
    bootbox.confirm($message, function(result) {
        if(result == false)
        {
            return;
        }

        $.ajax({
            url : WEB_ROOT+'/ajax/new/activity.php',
            type: "POST",
            data : {type: "deleteActivity", activityId: id},
            success: function(data, textStatus, jqXHR)
            {
                var splitResponse = data.split("[#]");
                ShowStatus(splitResponse[1]);
                $('#tblContent-activities').html(splitResponse[2]);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Algo salio mal, compruebe su conexión a internet');
            }
        });

    });
}

/*
function DeleteActivity(id)
{
    var cSubject = '';
    cSubject = $(id).readAttribute('name').substring(2, $(id).readAttribute('name').length);
    id = id.substring(2, id.length);
    if(!confirm('Esta seguro de eliminar esta actividad?'))
    {
        return;
    }

    new Ajax.Request(WEB_ROOT + '/ajax/activity.php',
        {
            method : 'post',
            parameters : 'type=deleteActivity&activityId=' + id,
            onSuccess : function(transporta)
            {
                var respuesta = transporta.responseText;
                var divRespuesta = respuesta.split('[#]');
                if(divRespuesta[0] == 'ok'){
                    ShowStatus(divRespuesta[1]);
                    $('tblContent-activities').innerHTML = divRespuesta[2];
                    CloseFview();
                }else{
                    ShowStatus(divRespuesta[1]);
                }
            },
            onFailure : function()
            {
                alert('Se detecto un problema con el servidor');
            }
        });
}*/
