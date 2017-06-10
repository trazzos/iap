<?php
		
	/* For Session Control - Don't remove this */
	$user->allow_access(8);	
	/* End Session Control */
	if($_GET["delete"])
	{
		$module->setSubjectModuleId($_GET["delete"]);
		$module->Delete();
	}

	$smarty->assign('specialities', $speciality->Enumerate());
	$smarty->assign('semesters', $semester->Enumerate());

	// poner esta parte en el lugar donde se este dando de alta y se requiera la visualizacion inmediata de los datos
	// ( por ejemplo en el codigo de los modulos de ajax despues de guardar y de eliminar )
	// -------------------------------------------------------------------------------------------------
	$arrPage = array();		// ---- arreglo donde guarda los resultados de la paginacion...para usarse en footer-pages-links.tpl
	$viewPage = 1;			// ---- por default se toma la primera pagina, por si aun no esta definidala en la variable GET
	$rowsPerPage = 15;		//<<--- se podria tomar este valor de una variable o constante global, o especificarla para un caso particular
	$pageVar = 'viewPage';	// ---- el nombre de la variable en GET que trae la pagina a mostrar, en este caso se usa viewPage para pasar la pagina a visualizar
	if(isset($_GET["$pageVar"]))
		$viewPage = $_GET["$pageVar"];	//si ya esta definida la variable GET['viewPage'] tomar el valor de esta
	//$smarty->assign('subjects', $subject->EnumerateByPage($viewPage, $rowsPerPage, $pageVar, WEB_ROOT.'/subject', $arrPage));
	$smarty->assign('subjects', $subject->Enumerate());
	$smarty->assign('arrPage', $arrPage);
	// -------------------------------------------------------------------------------------------------

	$smarty->assign('mnuMain','cursos');
	$smarty->assign('mnuSubmain','curricula');
?>