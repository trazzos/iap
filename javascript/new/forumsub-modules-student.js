

function closeModal(){
	
	$("#ajax").hide();
	$("#ajax").modal("hide");
	
}

function deleteTopicSub(id)
{

	// alert(id)
	var $message = "¿Está seguro de eliminar este topico?";
	bootbox.confirm($message, function(result) {
		if(result == false)
		{
			return;
		}

		$.ajax({
			url : WEB_ROOT+'/ajax/new/topic.php',
			type: "POST",
			data : {type: "deleteSubtopic", subtopicId: id},
			success: function(data, textStatus, jqXHR)
			{
				var splitResponse = data.split("[#]");
				ShowStatus(splitResponse[1]);
				$('#tblContent').html(splitResponse[2]);
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Algo salio mal, compruebe su conexión a internet');
			}
		});

	});
}