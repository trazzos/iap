$(document).ready(function() {



});


function VerGrupo(id){

    $.ajax({
        url : WEB_ROOT+'/ajax/new/studentCurricula.php',
        type: "POST",
        data : {type: "Student", id:id, tip:"Activo"},
        success: function(data)
        {
            showModal("&nbsp;", data);
        },
        error: function ()
        {
            alert('Algo salio mal, compruebe su conexion a internet');
        }
    });

/*
    new Ajax.Request(WEB_ROOT+'/ajax/studentCurricula.php',
        {
            method:'post',
            parameters: {type: "Student", id:id},
            onSuccess: function(transport){
                var response = transport.responseText || "no response text";
                FViewOffSet(response);
                Event.observe($('closePopUpDiv'), "click", function(){ CancelFview(); });
                Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
                Event.observe($('editRole'), "click", EditRole);

            },
            onFailure: function(){ alert('Something went wrong...') }
        });
*/

}



function verAcciones(id){

$("#divAccion_"+id).toggle();

}


function VerGrupoAdmin(id){

    $.ajax({
        url : WEB_ROOT+'/ajax/new/studentCurricula.php',
        type: "POST",
        data : {type: "StudentAdmin", id:id, tip:"Activo"},
        success: function(data)
        {
            showModal("&nbsp;", data);
        },
        error: function ()
        {
            alert('Algo salio mal, compruebe su conexion a internet');
        }
    });
}

function VerGrupoInactivo(id){
    $.ajax({
        url : WEB_ROOT+'/ajax/new/studentCurricula.php',
        type: "POST",
        data : {type: "StudentInactivo", id:id, tip:"Inactivo"},
        success: function(data)
        {
            showModal("&nbsp;", data);
        },
        error: function ()
        {
            alert('Algo salio mal, compruebe su conexion a internet');
        }
    });
}

function VerGrupoInactivoAdmin(id){
    $.ajax({
        url : WEB_ROOT+'/ajax/new/studentCurricula.php',
        type: "POST",
        data : {type: "StudentInactivoAdmin", id:id, tip:"Inactivo"},
        success: function(data)
        {
            showModal("&nbsp;", data);
        },
        error: function ()
        {
            alert('Algo salio mal, compruebe su conexion a internet');
        }
    });
}

function generar(courseId,tipo){

    if(tipo=="ESPECIALIDAD"){
        tipo=1;
        type="genera_especialidad";
    }
    if(tipo=="MAESTRIA"){
        type="genera_maestrias";
        tipo=2;
    }

    $.ajax({
        url : WEB_ROOT+'/ajax/new/matricula.php',
        type: "POST",
        data : {type: type, courseId: courseId, tipo : tipo},
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

/*    new Ajax.Request(WEB_ROOT+'/ajax/matricula.php',
        {
            method:'post',
            parameters: {type: type, courseId: courseId, tipo : tipo},
            onSuccess: function(transport){
                var response = transport.responseText || "no response text";
                //alert(response)
                var splitResponse = response.split("[#]");
                if(splitResponse[0] == "fail")
                {
                    ShowStatus(splitResponse[1])
                }
                else
                {
                    ShowStatus(splitResponse[1])
                    //$('tblContent').innerHTML = splitResponse[2];
                    CloseFview();
                }

            },
            onFailure: function(){ alert('Something went wrong...') }
        });*/


}





function saveNumReferencia(id,activo){
	
	$("#type").val("saveNumReferencia")

	$.ajax({
	  	type: "POST",
	  	url : WEB_ROOT+'/ajax/new/studentCurricula.php',
	  	data: $("#frmGral").serialize(true)+'&id='+id+'&activo='+activo+'&type=saveNumReferencia',
		beforeSend: function(){			
			// $('#tblContent').html(LOADER3);
		},
	  	success: function(response) {	
		
			console.log(response)
			var splitResp = response.split("[#]");
			
			// DoSearch()
			if(splitResp[0] == "ok"){
					$("#msj").html($.trim(splitResp[1]));
					// DoSearch()
				}
			else if(splitResp[0] == "fail"){
				$("#res_").html(splitResp[1]);
				$("#centeredDivOnPopup").show();
			}
		},
		error:function(){
			alert(msgError);
		}
    });
	
}//saveNumReferencia
