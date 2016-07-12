	
	function load_personal(){
		
		var personalId = document.getElementById("personalId").value;
		
		if(personalId == 0){
			alert('Seleccione a un personal');
		}else
			location.href = WEB_ROOT+'schedule-personal/idper/'+personalId;
	
	}//load_personal
	
	function imprimir_horario(){
		
		var personalId = document.getElementById("personalId").value;
		
		if(personalId == 0){
			alert('Seleccione a un personal');
		}else
			location.href = WEB_ROOT+'schedule-personal/imp/'+personalId;
				
	}//imprimir_horario