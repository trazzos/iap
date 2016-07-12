			
	function chkReportReg(form){
		
		var semesterId = form.semesterId.value;
		
		if(semesterId == 0){
			alert('Elija un semestre');
			return;			
		}
		
		form.submit();
		
	}//chkReportReg