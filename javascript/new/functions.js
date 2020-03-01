var DOC_ROOT = "../";
var DOC_ROOT_TRUE = "../";
var DOC_ROOT_SECTION = "../../";


var LOADER3 = "<div align='center'><img src='"+WEB_ROOT+"/images/cargando.gif'><br>Cargando...</div>";

$( document ).ready(function() {

    $(document).on("click",".closeModal",function() {
        bootbox.hideAll();
        $("#ajax").hide();
        $("#ajax").modal("hide");
    });

    $(document).on("focus", ".date-picker", function () {
        $( ".date-picker" ).datepicker( {
            format: 'dd-mm-yyyy',
            autoclose: true
        } );
    });

});
function showModal(title, data)
{
    bootbox.dialog({
        message: data,
        title: title,
        buttons: {}
    });
}

function growl(message, type)
{
    console.log(type);
    $.bootstrapGrowl(message,
        {
            type: type,
            delay: 5000,
            allow_dismiss: true,
        }
    );
}

function ShowStatusPopUp(html)
{
    var $error = html;
    growl($error, "danger");
}

function ShowStatus(html)
{
    var $error = html;
    console.log($error);
    growl($error, "success");
}

function CloseFview()
{
    bootbox.hideAll();
}
