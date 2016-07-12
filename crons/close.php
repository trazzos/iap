<?php

define("DOC_ROOT", "/home/iapchiap/public_html");

include_once(DOC_ROOT.'/init.php');
include_once(DOC_ROOT.'/config.php');
include_once(DOC_ROOT.'/libraries.php');

if (!isset($_SESSION)) 
{
  session_start();
}

	$result = $course->AllActiveCourseModules();	

	$days7 = time() - 3600 * 24 * 7;
	foreach($result as $key => $val)
	{
		if($val["daysToFinish"] > 0)
		{
			$val["finalDateStamp"] = $val["initialDateStamp"] + (3600 * 24 * $val["daysToFinish"]);
		}

		if($days7 > $val["finalDateStamp"])
		{
			$db->setQuery("UPDATE course_module SET active = 'no' WHERE courseModuleId ='".$val["courseModuleId"]."'");
			$db->UpdateData();
		}
	}
	
	$courses = $course->EnumerateActive();
	
	foreach($courses as $key => $val)
	{
		if($val["daysToFinish"] > 0)
		{
			$val["finalDateStamp"] = $val["initialDateStamp"] + (3600 * 24 * $val["daysToFinish"]);
		}
		//must be > 
		$marks = array();
		if($days7 < $val["finalDateStamp"])
		{
			//modulos conformando el curso
			$course->setCourseId($val["courseId"]);
			$addedModules = $course->AddedCourseModules();
			
			foreach($addedModules as $keyModule => $module)
			{
				$group->setCourseId($val["courseId"]);
				$group->setCourseModuleId($module["courseModuleId"]);			
				$theGroup = $group->DefaultGroup();
				
				foreach($theGroup as $keyGroup => $member)
				{
					$mark = $student->GetAcumuladoCourseModule($module["courseModuleId"], $member["userId"]);
					$marks[$member["userId"]][$module["courseModuleId"]] = $mark;
				}
				//print_r($theGroup);
				
			}
			foreach($marks as $keyMark => $mark)
			{
				$realMark = array_sum($mark) / count($mark);
				$db->setQuery("UPDATE user_subject SET mark = '".$realMark."', status = 'finalizado' WHERE alumnoId ='".$keyMark."' AND courseId = '".$val["courseId"]."'");
				$db->UpdateData();
			}
			
			$db->setQuery("UPDATE course SET active = 'no' WHERE courseId ='".$val["courseId"]."'");
			$db->UpdateData();
		}
	}
	
?>