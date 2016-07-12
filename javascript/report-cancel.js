		
	function chkReportBaja(form){
		
		var objSem = form.semesterId;
		var optSelected = false;
		
		for(i=0;i<objSem.options.length;i++){
			if(objSem.options[i].selected == true){
				optSelected = true;
				break;
			}
		}
		
		if(optSelected == false){
			alert('Elija un semestre');
			return;
		}
		
		SendModulesData(objSem, form.semesters);
		
		form.submit();
		
	}//chkReportBaja
	
	function chkReportRep(form){
		
		var semesterId = form.semesterId.value;
		
		if(semesterId == 0){
			alert('Elija un semestre');
			return;			
		}
		
		form.submit();
		
	}//chkReportRep
	
	function SendModulesData(listFrom, fieldTo){
		var ResultLine = "";
		OptionsHandlerSrc = listFrom.options;
		for(i=0;i<OptionsHandlerSrc.length;i++){
			if(listFrom.options[i].selected == true)
				ResultLine+= OptionsHandlerSrc[i].value + ",";
		}//for
		fieldTo.value = ResultLine;		
	}//SendModulesData
	