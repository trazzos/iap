	Event.observe(window, 'load', function() {
		
		//Event.observe($('majorId'), "change", LoadGroups);
		//Event.observe($('semesterId'), "change", LoadGroups);
			
	});
	
	function LoadGroups(){
		
		var idMajor = document.getElementById("majorId").value;
		var idSemester = document.getElementById("semesterId").value;
				
		new Ajax.Request(WEB_ROOT+'/ajax/report-redi.php', 
		{
			method:'post',
			parameters: {type: "loadGroups",semesterId:idSemester, majorId:idMajor},
			onSuccess: function(transport){
					var response = transport.responseText || "no response text";
				
					$('groups').innerHTML = response;
					
				},
			onFailure: function(){ alert('Something went wrong...') }
		});
		
	}//LoadGroups
	
	function imprimir_reporte(){
		
		var majorId = document.getElementById("majorId").value;
		var semesterId = document.getElementById("semesterId").value;
		var groupId = document.getElementById("groupId").value;
		
		if(majorId == 0){
			alert('Seleccione la carrera');
		}else if(semesterId == 0){
			alert('Seleccione el semester');
		}else if(groupId == 0){
			alert('Seleccione el grupo');			
		}else
			document.frmReport.submit();			
				
	}//imprimir_reporte
	
	function exportar_excel(){

		var majorId = document.getElementById("majorId").value;
		var semesterId = document.getElementById("semesterId").value;
		var groupId = document.getElementById("groupId").value;
		
		if(majorId == 0){
			alert('Seleccione la carrera');
		}else if(semesterId == 0){
			alert('Seleccione un semester');
		}else if(groupId == 0){
			alert('Seleccione un grupo');			
		}else
			window.location.href = WEB_ROOT+'/modules/excel.php?majorId='+majorId+'&semesterId='+semesterId+'&groupId='+groupId;			
				
	}//exportar_excel