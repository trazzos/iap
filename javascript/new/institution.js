$( document ).ready(function() {

    $(document).on("click",".spanEdit",function() {
        var $id = $(this).attr('id');
        EditInstitutionPopup($id);
    });
});

function EditInstitutionPopup(id)
{
    $.ajax({
        url : WEB_ROOT+'/ajax/new/institution.php',
        type: "POST",
        data : {type: "editInstitution", institutionId:id},
        success: function(data)
        {
            showModal("Editar Institución", data);
            $('.submitForm').click(function() {
                EditInstitution();
            });
        },
        error: function ()
        {
            alert('Algo salio mal, compruebe su conexion a internet');
        }
    });
}

function EditInstitution()
{
    $.ajax({
        url : WEB_ROOT+'/ajax/new/institution.php',
        type: "POST",
        data :  $('#editInstitutionForm').serialize(),
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
