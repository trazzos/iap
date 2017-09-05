function printBoleta(q){
	url=WEB_ROOT+"/ajax/report-card-pdf.php?"+$('#frmfiltro').serialize(true)+'&q='+q;
	open(url,"Constancia de Estudios","toolbal=0,width=800,resizable=1");
}

