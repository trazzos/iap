Event.observe(window, 'load', function() {
	Event.observe($('Recuperacion'), "click", Recuperacion);
	
	AddEditStudentListeners = function(e) {
		var el = e.element();
		var del = el.hasClassName('spanDelete');
		var id = el.identify();
		if(del == true)
		{
			DeleteStudentPopup(id);
			return;
		}

		del = el.hasClassName('spanEdit');
		if(del == true)
		{
			EditStudentPopup(id);
		}
	}
	$('tblContent').observe("click", AddEditStudentListeners);																	 
});


function Recuperacion()
{

    $.ajax({
        url : WEB_ROOT+'/ajax/new/recuperacion.php',
        type: "POST",
        data : $('#emailrecuperacion').serialize(),
        success: function(data)
        {
            console.log(data);

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
				setTimeout("recargarPage()",4000);
            }

        },
        error: function ()
        {
            alert('Algo salio mal, compruebe su conexion a internet');
        }
    });
}


function recargarPage()
{
	WEB_ROOTDoc = WEB_ROOT+'/login';
	$(location).attr('href',WEB_ROOTDoc);
}



