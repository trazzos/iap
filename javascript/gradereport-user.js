// JavaScript Document
Event.observe(window, 'load', function(){
	// cuando se de clic en el elemento con el ID 'tblContent' --- en este caso es un enlace -- ejecutar la funcion
	$('addStudentIrregularR1').observe('click', fncAddIrregularsIntersem);

	// asignamos a naa variable una funcion a ejecutarse, la funcion recibe como parametro el objeto desde el que fue invocado
	AddEditIntersemScoreListeners = function(e) {
		// asignamos a una variable el elemento que se encuentra en el objeto pasado como parametro
		var elem = e.element();
		
		// verificamos la clase del elemento
		if( elem.hasClassName('spanEditIntersem') )
		{
			// si el elemento clikeado contiene un nombre de clase spanEdit
			EditIntersemScorePopup( elem.identify() );
		}
	}

	// cuando se de clic en el elemento con el ID 'tblContent' --- en este caso es un div -- ejecutar la funcion almacenada en la variable
	$('tblContent').observe("click", AddEditIntersemScoreListeners);
	
	if($F('regularization') == 'N')
	{
		// es un acta de calificaciones normal
		$('gradeParcial1').observe('click', function(){ captAllGradescore( $('gradeParcial1').readAttribute('datetest'), 'P1' ) } );
		$('gradeParcial2').observe('click', function(){ captAllGradescore( $('gradeParcial2').readAttribute('datetest'), 'P2' ) } );
		$('gradeParcial3').observe('click', function(){ captAllGradescore( $('gradeParcial3').readAttribute('datetest'), 'P3' ) } );
		$('gradeGlobal1').observe('click', function(){ captAllGradescore( $('gradeGlobal1').readAttribute('datetest'), 'G1' ) } );
		$('gradeGlobal2').observe('click', function(){ captAllGradescore( $('gradeGlobal2').readAttribute('datetest'), 'G2' ) } );
		$('gradeGlobal3').observe('click', function(){ captAllGradescore( $('gradeGlobal3').readAttribute('datetest'), 'G3' ) } );
		$('gradeR1').observe('click', function(){ captAllGradescore( $('gradeR1').readAttribute('datetest'), 'R1' ) } );
	}
	else
	{
		// es un acta de calificaciones Intersemestral
		$('gradeInter').observe('click', function(){ captAllGradescore( $('gradeInter').readAttribute('datetest'), 'Inter' ) } );
	}

	});

function fncAddIrregularsIntersem()
{
	if( !confirm('Estas Seguro de Agregar listado de alumnos al Acta de calificaciones'))
	{
		return;
	}
	//alert('generando alumnos irregulares (R1) al acta : ' + $F('gradereportId') + ' de:\nMateria : ' + $F('subjectId') + ', periodoId : ' + $F('periodoId') + ', semesterId : ' + $F('semesterId'));
	new Ajax.Request(WEB_ROOT + '/ajax/gradereport-user.php',
					 {
						method : 'post',
						parameters : { type : 'addIregularsIntersem', gradereportId : $F('gradereportId'), subjectId : $F('subjectId'), periodoId : $F('periodoId'), semesterId : $F('semesterId') },
						onSuccess : function(transport)
									{
										var response = transport.responseText || 'no response text';
										var splitResponse = response.split('[#]');
										alert(splitResponse[0]);
										alert(splitResponse[1]);
										alert(splitResponse[2]);
										ShowStatus(splitResponse[1]);
										if(splitResponse[0] == 'ok')
											$('tblContent').innerHTML = splitResponse[2];
									},
						onFailure : function() { alert('Something went wrong'); }
					 });
}

function EditIntersemScorePopup(id)
{
	//alert('Editar calificacion intersemestral : ' + id);
	//return;
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		$('fview').innerHTML = resetFviewWindow();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/gradereport-user.php', 
	{
		method:'post',
		parameters: {type : "editIntersemScore", gradReportUserId : id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			if(response.substr(0, 4) == 'fail')
			{
				var splitResponse = response.split('[#]');
				ShowStatus(splitResponse[1]);
				$('fview').hide();
				$('fview').innerHTML = resetFviewWindow();
				grayOut(false);
			}
			else
			{
				FViewOffSet(response);
				Event.observe($('closePopUpDiv'), "click", function(){ EditIntersemScorePopup(0); });
				Event.observe($('editGradescore'), "click", EditIntersemScore);
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditIntersemScore()
{
	//alert('Guardar calificacion intersemestral');
	//return;
	new Ajax.Request(WEB_ROOT+'/ajax/gradereport-user.php', 
	{
		method:'post',
		parameters: $('editGradescoreForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");
			ShowStatusPopUp(splitResponse[1]);
			if(splitResponse[0] == "ok")
			{
				$('tblContent').innerHTML = splitResponse[2];
				EditIntersemScorePopup(0);
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function captAllGradescore(pDatetest, pKeytest)
{
	grayOut(true);
	$('fview').show();
	if(pDatetest == '')
	{
		$('fview').hide();
		$('fview').innerHTML = resetFviewWindow();
		grayOut(false);
		return;
	}
	new Ajax.Request(WEB_ROOT + '/ajax/gradereport-user.php',
					 {
						 method : 'post',
						 parameters : { type : 'captAllScores', datetest : pDatetest, keytest : pKeytest, gradereportId : $F('gradereportId') },
						 onSuccess : function(transport) {
							 			var response = transport.responseText || 'no response text';
										
										if(response.substr(0, 4) == 'fail')
										{
											var splitResponse = response.split('[#]');
											ShowStatus(splitResponse[1]);
											$('fview').hide();
											$('fview').innerHTML = resetFviewWindow();
											grayOut(false);
										}
										else
										{
											FViewOffSet(response);
											Event.observe($('closePopUpDiv'), "click", function(){ captAllGradescore(''); });
											Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
											Event.observe($('editAllGradescore'), "click", editAllGradescore);
										}
						 			},
						 onFailure : function() { alert('somthing went wrong...'); }
					 })
}

function editAllGradescore()
{	
	new Ajax.Request(WEB_ROOT + '/ajax/gradereport-user.php',
					 {
						 method : 'post',
						 parameters : $('editAllUsersScoreForm').serialize(true),
						 onSuccess : function(transport) {
							 			var response = transport.responseText || 'no response text';

										var splitResponse = response.split('[#]');
										ShowStatusPopUp(splitResponse[1]);
										if(splitResponse[0] == 'ok')
										{
											$('tblContent').innerHTML = splitResponse[2];
											captAllGradescore('', '');
											if($F('regularization') == 'N')
											{
												// es un acta de calificaciones normal
												$('gradeParcial1').observe('click', function(){ captAllGradescore( $('gradeParcial1').readAttribute('datetest'), 'P1' ) } );
												$('gradeParcial2').observe('click', function(){ captAllGradescore( $('gradeParcial2').readAttribute('datetest'), 'P2' ) } );
												$('gradeParcial3').observe('click', function(){ captAllGradescore( $('gradeParcial3').readAttribute('datetest'), 'P3' ) } );
												$('gradeGlobal1').observe('click', function(){ captAllGradescore( $('gradeGlobal1').readAttribute('datetest'), 'G1' ) } );
												$('gradeGlobal2').observe('click', function(){ captAllGradescore( $('gradeGlobal2').readAttribute('datetest'), 'G2' ) } );
												$('gradeGlobal3').observe('click', function(){ captAllGradescore( $('gradeGlobal3').readAttribute('datetest'), 'G3' ) } );
												$('gradeR1').observe('click', function(){ captAllGradescore( $('gradeR1').readAttribute('datetest'), 'R1' ) } );
											}
											else
											{
												// es un acta de calificaciones Intersemestral
												$('gradeInter').observe('click', function(){ captAllGradescore( $('gradeInter').readAttribute('datetest'), 'Inter' ) } );
											}
										}
						 			},
						 onFailure : function() { alert('somthing went wrong...'); }
					 })

}