$( document ).ready(function() {

    $('#btnAddRole').click(function() {
        AddRoleDiv();
    });

    $(document).on("click",".spanDelete",function() {
        var $id = $(this).attr('id');
        DeleteRolePopup($id);
    });

    $(document).on("click",".spanEdit",function() {
        var $id = $(this).attr('id');
        EditRolePopup($id);
    });
});


function AddRoleDiv()
{
    $.ajax({
        url : WEB_ROOT+'/ajax/new/role.php',
        type: "POST",
        data : {type: "addRole"},
        success: function(data)
        {
            showModal("Agregar Rol", data);
            $('.submitForm').click(function() {
                AddRole();
            });
        },
        error: function ()
        {
            alert('Algo salio mal, compruebe su conexion a internet');
        }
    });
}

function AddRole()
{
    $.ajax({
        url : WEB_ROOT+'/ajax/new/role.php',
        type: "POST",
        data :  $('#addRoleForm').serialize(),
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

function DeleteRolePopup(id)
{
    var $message = "¿Esta seguro de eliminar este rol? Toma en cuenta que podrían perdese muchas asociaciones (Horarios, maestros, etc)";
    bootbox.confirm($message, function(result) {
        if(result == false)
        {
            return;
        }

        $.ajax({
            url : WEB_ROOT+'/ajax/new/role.php',
            type: "POST",
            data : {type: "deleteRole", id: id},
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

function EditRolePopup(id)
{
    $.ajax({
        url : WEB_ROOT+'/ajax/new/role.php',
        type: "POST",
        data : {type: "editRole", id:id},
        success: function(data)
        {
            showModal("Editar Rol", data);
            $('.submitForm').click(function() {
                EditRole();
            });
        },
        error: function ()
        {
            alert('Algo salio mal, compruebe su conexion a internet');
        }
    });
}

function EditRole()
{
    $.ajax({
        url : WEB_ROOT+'/ajax/new/role.php',
        type: "POST",
        data :  $('#editRoleForm').serialize(),
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


function MoveModule(From, To){
    var LOptions = new Array();
    var j=0;
    var k=0;
    OptFrom = From.options;
    OptTo = To.options;
    for(i=0;i<OptFrom.length;i++){
        if(OptFrom[i].selected == true){
            OptTo[OptTo.length] =
                new Option(OptFrom[i].text,OptFrom[i].value);
            OptFrom[i] = null;
            LOptions[j] = i;
            j++;
            i--;
        }//if
    }//for
}//MoveOptions

/*

function EditRolePopup(id)
{
    grayOut(true);
    $('fview').show();

    new Ajax.Request(WEB_ROOT+'/ajax/role.php',
        {
            method:'post',
            parameters: {type: "editRole", id:id},
            onSuccess: function(transport){
                var response = transport.responseText || "no response text";
                FViewOffSet(response);
                Event.observe($('closePopUpDiv'), "click", function(){ CancelFview(); });
                Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
                Event.observe($('editRole'), "click", EditRole);

            },
            onFailure: function(){ alert('Something went wrong...') }
        });
}

function EditRole()
{

    SendModulesData(document.editRoleForm.module_to,document.editRoleForm.list_modules);

    new Ajax.Request(WEB_ROOT+'/ajax/role.php',
        {
            method:'post',
            parameters: $('editRoleForm').serialize(true),
            onSuccess: function(transport){
                var response = transport.responseText || "no response text";

                var splitResponse = response.split("[#]");
                if(splitResponse[0] == "fail")
                {
                    ShowStatusPopUp(splitResponse[1])
                }
                else
                {
                    ShowStatus(splitResponse[1])
                    $('tblContent').innerHTML = splitResponse[2];
                    CloseFview();
                }

            },
            onFailure: function(){ alert('Something went wrong...') }
        });
}

function DeleteRolePopup(id)
{

    var message = "Esta seguro de eliminar este rol?";
    if(!confirm(message))
    {
        return;
    }

    new Ajax.Request(WEB_ROOT+'/ajax/role.php',{
        method:'post',
        parameters: {type: "deleteRole", id: id},
        onSuccess: function(transport){
            var response = transport.responseText || "no response text";
            var splitResponse = response.split("[#]");
            ShowStatus(splitResponse[1])
            $('tblContent').innerHTML = splitResponse[2];
        },
        onFailure: function(){ alert('Something went wrong...') }
    });

}

function AddRoleDiv(id)
{
    grayOut(true);
    $('fview').show();

    new Ajax.Request(WEB_ROOT+'/ajax/role.php',
        {
            method:'post',
            parameters: {type: "addRole"},
            onSuccess: function(transport){
                var response = transport.responseText || "no response text";
                FViewOffSet(response);
                Event.observe($('addRole'), "click", AddRole);
                Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
                Event.observe($('closePopUpDiv'), "click", function(){ CancelFview(); });

            },
            onFailure: function(){ alert('Something went wrong...') }
        });
}

function AddRole()
{

    SendModulesData(document.addRoleForm.module_to,document.addRoleForm.list_modules);

    new Ajax.Request(WEB_ROOT+'/ajax/role.php',
        {
            method:'post',
            parameters: $('addRoleForm').serialize(true),
            onSuccess: function(transport){
                var response = transport.responseText || "no response text";

                var splitResponse = response.split("[#]");
                if(splitResponse[0] == "fail")
                {
                    ShowStatusPopUp(splitResponse[1])
                }
                else
                {
                    ShowStatus(splitResponse[1])
                    $('tblContent').innerHTML = splitResponse[2];
                    CloseFview();
                }

            },
            onFailure: function(){ alert('Something went wrong...') }
        });
}



function SendModulesData(listFrom, fieldTo){
    var ResultLine = "";
    OptionsHandlerSrc = listFrom.options;
    for(i=0;i<OptionsHandlerSrc.length;i++){
        ResultLine+= OptionsHandlerSrc[i].value + ",";
    }//for
    fieldTo.value = ResultLine;
}//SendModulesData
*/
