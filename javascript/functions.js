var DOC_ROOT = "../";
var DOC_ROOT_TRUE = "../";
var DOC_ROOT_SECTION = "../../";
//var WEB_ROOT = "http://desarrollot.no-ip.biz/iapenlinea";
//var WEB_ROOT = "http://187.143.245.7/iapenlinea";
//var WEB_ROOT = "http://192.168.1.200/iapenlinea";

var WEB_ROOT ="http://"+location.hostname+"/iap";

 // var WEB_ROOT = "http://www.iapchiapasenlinea.mx";



//alert(WEB_ROOT)


function ToogleStatusDiv()
{
//alert($('redireccion').value);

//alert("hola");
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



//setInterval('notificando()',10000);