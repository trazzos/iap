	
	Event.observe(window, 'load', function() {
		
		Event.observe($('addScheduleDiv'), "click", AddScheduleDiv);
			
	});
	
	function SaveSchedule(){
		
		new Ajax.Request(WEB_ROOT+'/ajax/schedule-group.php', 
		{
			method:'post',
			parameters: $('addScheduleGroupForm').serialize(true),
		onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				var splitResponse = response.split("[#]");
				if(splitResponse[0] == "fail")
				{
					ShowStatusPopUp(splitResponse[1])
				}
				else
				{
					ShowStatusPopUp(splitResponse[1])
					$('content').innerHTML = splitResponse[2];				
					
					$('fview').hide();
					grayOut(false);					
				}
	
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
		
	}

	function AddScheduleDiv(id)
	{
		
		grayOut(true);
		if(id == 0)
		{
			$('fview').hide();
			grayOut(false);
			return;
		}
		$('fview').show();
		
		new Ajax.Request(WEB_ROOT+'/ajax/schedule-group.php', 
		{
			method:'post',
			parameters: {type: "addScheduleGroup"},
		onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				FViewOffSet(response);
				Event.observe($('saveSchedule'), "click", SaveSchedule);
				Event.observe($('addSubject'), "click", AddSubject);
				Event.observe($('delSubject'), "click", DelSubject);
				Event.observe($('fviewclose'), "click", function(){ AddScheduleDiv(0); });
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
		
	}
	
	function DeleteSchedule(schGpoId){
		
		if(!confirm('Esta seguro de eliminar este horario?')){
			alert('cancelado');
			return false;
		}
		
		new Ajax.Request(WEB_ROOT+'/ajax/schedule-group.php', 
		{
			method:'post',
			parameters: {type: "deleteSchedule", idSchGpo:schGpoId},
		onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				var splitResponse = response.split("[#]");
				if(splitResponse[0] == "fail")
				{
					ShowStatusPopUp(splitResponse[1])
				}
				else
				{
					ShowStatusPopUp(splitResponse[1])
					$('content').innerHTML = splitResponse[2];				
					
					$('fview').hide();
					grayOut(false);					
				}				
				
				
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });		
		
	}
	
	function AddSubject(){
		
		if($('semesterId').value == 0){
			alert('Elija el semestre');
			return;
		}
		if($('subjectId').value == 0){
			alert('Elija la materia');
			return;
		}
		if($('subgpoId').value == 0){
			alert('Elija el grupo');
			return;
		}
		
		var idSubgpo = document.getElementById("subgpoId").value;
		
		new Ajax.Request(WEB_ROOT+'/ajax/schedule-group.php', 
		{
			method:'post',
			parameters: {type: "addSubject",subgpoId:idSubgpo},
		onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				var splitResponse = response.split("[#]");
				
				if(splitResponse[0] == 'ok'){
					var subjectName = splitResponse[1];
					
					var subSelect = document.forms["addScheduleGroupForm"].elements['selSubjects'];
					var total = subSelect.options.length;
					
					var subject = new Option(subjectName,idSubgpo);
					
					subSelect.options[total] = subject;
					
					alert('La materia fue agregada correctamente.');
					
				}else if(splitResponse[0] == 'fail'){
					alert('La materia ya ha sido agregada. Por favor, seleccione otra.');
				}else if(splitResponse[0] == 'limit'){
					alert('Se ha superado el limite de alumnos para esta materia.');
				}else if(splitResponse[0] == 'duplicated'){
					alert('Existen horarios duplicados para esta materia.');
				}
				
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
		
	}
	
	function DelSubject(){
		
		var idSubgpo = 0;
		var subSelect = document.forms["addScheduleGroupForm"].elements['selSubjects'];
		var total = subSelect.options.length;
			
		OptFrom = subSelect;
			
		for(i=0;i<OptFrom.length;i++){
			if(OptFrom[i].selected == true){
				idSubgpo = OptFrom[i].value;
				OptFrom[i] = null;		
			}//if
		}//for
				
		new Ajax.Request(WEB_ROOT+'/ajax/schedule-group.php', 
		{
			method:'post',
			parameters: {type: "delSubject",subgpoId:idSubgpo},
		onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				alert('La materia fue eliminada correctamente');
				
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
		
	}
	
	function load_subjects(){
		
		var idSemester = document.getElementById("semesterId").value;
		
		if(idSemester == 6){			
			$('subjects').innerHTML = '&nbsp;';
			$('groups').innerHTML = '&nbsp;';
			$('personal').innerHTML = '&nbsp;';
			$('group').innerHTML = '&nbsp;';
			
			load_specialities();
			
			return;
		}else{
			$("speciality").hide();	
		}
		
		new Ajax.Request(WEB_ROOT+'/ajax/schedule-group.php', 
		{
			method:'post',
			parameters: {type: "loadSubjects",semesterId:idSemester},
		onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				$('subjects').innerHTML = response;
				$('groups').innerHTML = '&nbsp;';
				$('personal').innerHTML = '&nbsp;';
				$('group').innerHTML = '&nbsp;';
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
		
	}
	
	function load_subjects2(){
		
		var idSemester = document.getElementById("semesterId").value;
		var idSpeciality = document.getElementById("specialityId").value;
				
		new Ajax.Request(WEB_ROOT+'/ajax/schedule-group.php', 
		{
			method:'post',
			parameters: {type: "loadSubjects", specialityId:idSpeciality, semesterId:idSemester},
		onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				$('subjects').innerHTML = response;
				$('groups').innerHTML = '&nbsp;';
				$('personal').innerHTML = '&nbsp;';
				$('group').innerHTML = '&nbsp;';
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
		
	}
	
	function load_specialities(){
		
		$("speciality").show();
		
		new Ajax.Request(WEB_ROOT+'/ajax/schedule-group.php', 
		{
			method:'post',
			parameters: {type: "loadSpecialities"},
		onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				$('specialities').innerHTML = response;				
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
		
	}
	
	function load_groups(){
		
		var idSubject = document.getElementById("subjectId").value;
		
		new Ajax.Request(WEB_ROOT+'/ajax/schedule-group.php', 
		{
			method:'post',
			parameters: {type: "loadGroups",subjectId:idSubject},
		onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				$('groups').innerHTML = response;
				$('personal').innerHTML = '&nbsp;';
				$('group').innerHTML = '&nbsp;';
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
		
		
	}
	
	function load_details(){
		
		var idSubgpo = document.getElementById("subgpoId").value;
		
		new Ajax.Request(WEB_ROOT+'/ajax/schedule-group.php', 
		{
			method:'post',
			parameters: {type: "loadDetails",subgpoId:idSubgpo},
		onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				var splitResponse = response.split("[#]");
				
				if(splitResponse[0] != 0)
					$('personal').innerHTML = splitResponse[0];
				else
					$('personal').innerHTML = '&nbsp;';
					
				if(splitResponse[1] != 0)
					$('group').innerHTML = splitResponse[1];
				else
					$('group').innerHTML = '&nbsp;';
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
		
		
	}
		
	function PrintSchedule(schGpoId){
		
		location.href = WEB_ROOT+'schedule-group/imp/'+schGpoId;
				
	}//PrintSchedule