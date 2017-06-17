function MoveRole(From, To){
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

function SendRolesData(listFrom, fieldTo){
	var ResultLine = "";
	OptionsHandlerSrc = listFrom.options;
	for(i=0;i<OptionsHandlerSrc.length;i++){
		ResultLine+= OptionsHandlerSrc[i].value + ",";
	}//for
	fieldTo.value = ResultLine;		
}//SendRolesData

function SubmitForm()
{
	SendRolesData(document.addPersonalForm.role_to,document.addPersonalForm.list_roles);
	document.addPersonalForm.submit();
//	alert($('list_roles').value);
}