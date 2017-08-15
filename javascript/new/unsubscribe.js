function descargarSolicitud(q){
	url=WEB_ROOT+"/ajax/unsubscribe-pdf.php?"+$('#frmfiltro').serialize(true)+'&q='+q;
	open(url,"Constancia de Estudios","toolbal=0,width=800,resizable=1");
}


function adjuntarSolicitud(){
	$('#frmGral').submit();
}	
