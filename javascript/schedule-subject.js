	
	function load_subject(){
		
		var subjectId = document.getElementById("subjectId").value;
		
		if(subjectId == 0){
			alert('Seleccione una materia');
		}else
			location.href = WEB_ROOT+'schedule-subject/idsub/'+subjectId;
	
	}//load_subject
	
	function imprimir_horario(){
		
		var subjectId = document.getElementById("subjectId").value;
		
		if(subjectId == 0){
			alert('Seleccione una materia');
		}else
			location.href = WEB_ROOT+'schedule-subject/imp/'+subjectId;
				
	}//imprimir_horario