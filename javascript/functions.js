


function ToogleStatusDiv()
{
//alert($('redireccion').value);

if($('redireccion')!= undefined){
	if($('redireccion').value == 1)
window.location=WEB_ROOT;}

	$('centeredDiv').toggle();
	grayOut(false);
}

function ToogleStatusDivOnPopup()
{
	$('centeredDivOnPopup').toggle();
}

function CancelFview(){
	grayOut(false);
	$('fview').hide();
}

function CloseFview(){
	$('fview').hide();
}

function notificando(){

	new Ajax.Request(WEB_ROOT+'/ajax/notificar.php',
	{
		method:'post',
		parameters: {type: "notificar2"},
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");
		//alert(response);
			if(splitResponse[0] == "ok")
			{
				ShowStatus(splitResponse[1])
			}


		},
	onFailure: function(){ alert('Something went wrong...') }
  });



}



function initTinyMCE() {

	setTimeout(function(){
		tinyMCE.remove();
		tinyMCE.init({
			max_chars: 1000, // max. allowed chars
			plugins: "paste image media",
			mode : "textareas",
			theme : "silver",
			skin : "oxide",
/*
			menu: {
				insert: { title: 'Insert', items: 'image link media' },
			},
*/
			menubar: false,
			toolbar: "undo redo | image media | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
			paste_data_images: true,
		});
	}, 1000);
}



//setInterval('notificando()',10000);
