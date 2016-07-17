var DOC_ROOT = "../";
var DOC_ROOT_TRUE = "../";
var DOC_ROOT_SECTION = "../../";
var WEB_ROOT = "http://www.iapchiapasenlinea.mx";

$( document ).ready(function() {

    $(document).on("click",".closeModal",function() {
        bootbox.hideAll();
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
    var $div = $(html);
    var $error = $div.find(".errorStatusBox").html();
    growl($error, "danger");
}

function ShowStatus(html)
{
    var $div = $(html);
    var $error = $div.find(".successStatusBox").html();
    growl($error, "success");
}

function CloseFview()
{
    bootbox.hideAll();
}