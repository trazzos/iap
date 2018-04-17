
function verCalendario(){
	url=WEB_ROOT+"/ajax/pagos.php?"+$('#frmfiltro').serialize(true);
	open(url,"voucher","toolbal=0,width=800,resizable=1");
}