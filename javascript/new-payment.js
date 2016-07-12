function roundNumber(rnum, rlength) 
{ 
  var newnumber = Math.round(rnum*Math.pow(10,rlength))/Math.pow(10,rlength);
  document.roundform.numberfield.value = parseFloat(newnumber);
}

function formato_numero(nStr)
{
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	
/*	while (rgx.test(x1)) {
//		alert(x1);
alert(rgx);
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
		//x1 = x1;
	}*/
	return x1 + x2;
}

function revisa_anticipo()
{
	anticipo2= Number($('amount').value.replace(/[^0-9\.]+/g,""))+Number($('credit').value.replace(/[^0-9\.]+/g,""))- Number($('debt').value.replace(/[^0-9\.]+/g,""));
	anticipo3= Number($('amount').value.replace(/[^0-9\.]+/g,""))+Number($('credit').value.replace(/[^0-9\.]+/g,""));
	if(anticipo2<=0)
		anticipo2=0;
	if(anticipo3<=0)
		anticipo3=0;

	var anticipo4 = newnumber = Math.round(anticipo2*Math.pow(10,2))/Math.pow(10,2);
	var anticipo5 = newnumber = Math.round(anticipo3*Math.pow(10,2))/Math.pow(10,2);

	$('anticipo').value = formato_numero(anticipo4);    
	$('amountApplied').value = formato_numero(anticipo5);
}

