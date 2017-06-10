$( document ).ready(function() {

    $('#btnAddRecording').click(function() {
        AddRecordingDiv();
    });

    $(document).on("click",".spanDelete",function() {
        var $id = $(this).attr('id');
        DeleteRecordingPopup($id);
    });

    $(document).on("click",".spanEdit",function() {
        var $id = $(this).attr('id');
        EditRecordingPopup($id);
    });
});

function AddRecordingDiv()
{
    $.ajax({
        url : WEB_ROOT+'/ajax/new/recording.php',
        type: "POST",
        data : {type: "addRecording"},
        success: function(data)
        {
            showModal("Agregar Videoconferencia", data);
            $('.submitForm').click(function() {
                AddRecording();
            });
        },
        error: function ()
        {
            alert('Algo salio mal, compruebe su conexion a internet');
        }
    });
}

function AddRecording()
{
    $.ajax({
        url : WEB_ROOT+'/ajax/new/recording.php',
        type: "POST",
        data :  $('#addRecordingForm').serialize(),
        success: function(data)
        {
            var splitResponse = data.split("[#]");

            if(splitResponse[0] == "fail")
            {
                ShowStatusPopUp($(splitResponse[1]));
            }
            else
            {
                ShowStatus($(splitResponse[1]));
                $('#tblContent').html(splitResponse[2]);
                CloseFview();
            }
        },
        error: function ()
        {
            alert('Algo salio mal, compruebe su conexion a internet');
        }
    });
}

function DeleteRecordingPopup(id)
{
    var $message = "¿Esta seguro de eliminar esta Videoconferencia?";
    bootbox.confirm($message, function(result) {
        if(result == false)
        {
            return;
        }

        $.ajax({
            url : WEB_ROOT+'/ajax/new/recording.php',
            type: "POST",
            data : {type: "deleteRecording", recordingId: id},
            success: function(data, textStatus, jqXHR)
            {
                var splitResponse = data.split("[#]");
                ShowStatus(splitResponse[1]);
                $('#tblContent').html(splitResponse[2]);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Algo salio mal, compruebe su conexion a internet');
            }
        });

    });
}

function EditRecordingPopup(id)
{
    $.ajax({
        url : WEB_ROOT+'/ajax/new/recording.php',
        type: "POST",
        data : {type: "editRecording", recordingId:id},
        success: function(data)
        {
            showModal("Editar Videoconferencia", data);
            $('.submitForm').click(function() {
                EditRecording();
            });
        },
        error: function ()
        {
            alert('Algo salio mal, compruebe su conexion a internet');
        }
    });
}

function EditRecording()
{
    $.ajax({
        url : WEB_ROOT+'/ajax/new/recording.php',
        type: "POST",
        data :  $('#editRecordingForm').serialize(),
        success: function(data)
        {
            var splitResponse = data.split("[#]");

            if(splitResponse[0] == "fail")
            {
                ShowStatusPopUp($(splitResponse[1]));
            }
            else
            {
                ShowStatus($(splitResponse[1]));
                $('#tblContent').html(splitResponse[2]);
                CloseFview();
            }
        },
        error: function ()
        {
            alert('Algo salio mal, compruebe su conexion a internet');
        }
    });
}
