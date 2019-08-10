<?php
	/* For Session Control - Don't remove this */
$x=0;	
// echo '<pre>'; print_r($_SESSION);
// exit;
	
	if ($_GET['id']!=NULL)
		{
		$announcement->setAnnouncementId($_GET['id']);
   		$announcement->Delete();
		}

	 //if($_POST['courseId']){
	 
	  // $student->AddUserToCurriculaFromCatalog($_POST["userId"], $_POST["courseId"],"Ninguno",0);
	 
     // $smarty->display(DOC_ROOT.'/templates/boxes/status.tpl');
	 // print_r($_POST);exit;
	// $x=1;
	
	//}	
//  	print_r($_SESSION);exit;
	
		$smarty->assign("x",$x);	
	$user->allow_access();	
	/* End Session Control */
	$student->setUserId($_SESSION["User"]["userId"]);
	//userId
	$smarty->assign("id",$_SESSION["User"]["userId"]);	
	//tipo de usuario
	$smarty->assign("positionId", $_SESSION['positionId']);	
	
	$curricula = $course->EnumerateActive();
	$smarty->assign("curricula", $curricula);	
	
	//$student->setUserId($_GET["id"]);
	$activeCourses = $student->StudentCourses();
	$smarty->assign("courses", $activeCourses);	
	
	$activeCourses = $student->StudentCourses("activo", "si");
//	print_r($activeCourses);
	$smarty->assign("activeCourses", $activeCourses);	

	$inactiveCourses = $student->StudentCourses("inactivo", "si");
	$smarty->assign("inactiveCourses", $inactiveCourses);	

	$finishedCourses = $student->StudentCourses("finalizado");
	$smarty->assign("finishedCourses", $finishedCourses);
	
	$announcements = $announcement->Enumerate(0, 0);
	if(!empty($activeCourses)) {
        foreach($activeCourses as $activeCourse) {
            $announcementsStudent = $announcement->Enumerate($activeCourse['courseId'], $activeCourse['courseModule']);
            $announcements = array_merge($announcements, $announcementsStudent);
        }
    }
	$smarty->assign('announcements', $announcements);
	
	
	
	// echo '_'.$_SESSION['msjC'];
// exit;
	$notificaciones=$notificacion->Enumerate();
	$smarty->assign('notificaciones', $notificaciones);
	$smarty->assign('msjC', $_SESSION['msjC']);
	$smarty->assign('msjCc', $_SESSION['msjCc']);
		unset($_SESSION['msjC']);
		unset($_SESSION['msjCc']);
	// echo '<pre>'; print_r($notificaciones);
	// exit;
	/*
	$subforos=$forum->Enumeratesubf();
    $smarty->assign('subforos', $subforos);
	
	$foros=$forum->Enumerateforos();
    $smarty->assign('foros', $foros);
	
	
	$respuestasforos=$forum->RepliesEnumerate();
	$smarty->assign('replyforum', $respuestasforos);
	
 */
?>