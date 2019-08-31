<?php

//language
if(!$_SESSION['lang'])
{
	include_once(DOC_ROOT."/properties/language.es.php");
	include_once(DOC_ROOT."/properties/errors.es.php");
}
elseif($_SESSION['lang'] == "es")
{
	include_once(DOC_ROOT."/properties/language.es.php");
	include_once(DOC_ROOT."/properties/errors.es.php");
}
else
{
	include_once(DOC_ROOT."/properties/language.en.php");
	include_once(DOC_ROOT."/properties/errors.es.php");
}

include_once(DOC_ROOT."/properties/config.php");
require(DOC_ROOT.'/libs/Smarty.class.php');

require_once(DOC_ROOT.'/phpmailer/class.phpmailer.php');

include_once(DOC_ROOT."/classes/db.class.php");

include_once(DOC_ROOT."/classes/error.class.php");
include_once(DOC_ROOT."/classes/util.class.php");
include_once(DOC_ROOT."/classes/main.class.php");
require_once(DOC_ROOT."/classes/sendmail.class.php");
require_once(DOC_ROOT."/classes/files.class.php");
include_once(DOC_ROOT."/classes/curp.class.php");
include_once(DOC_ROOT."/classes/user.class.php");
include_once(DOC_ROOT."/classes/major.class.php");
include_once(DOC_ROOT."/classes/speciality.class.php");
include_once(DOC_ROOT."/classes/student.class.php");
include_once(DOC_ROOT."/classes/position.class.php");
include_once(DOC_ROOT."/classes/personal.class.php");
include_once(DOC_ROOT."/classes/schedule.class.php");
//include_once(DOC_ROOT."/classes/group.class.php");
include_once(DOC_ROOT."/classes/semester.class.php");
include_once(DOC_ROOT."/classes/subject.class.php");
include_once(DOC_ROOT."/classes/course.class.php");
include_once(DOC_ROOT."/classes/module.class.php");
include_once(DOC_ROOT."/classes/institution.class.php");
include_once(DOC_ROOT."/classes/periodo.class.php");
include_once(DOC_ROOT."/classes/typetest.class.php");
include_once(DOC_ROOT."/classes/gradereport.class.php");
include_once(DOC_ROOT."/classes/scheduleTime.class.php");
include_once(DOC_ROOT."/classes/classroom.class.php");
include_once(DOC_ROOT."/classes/basket.class.php");
include_once(DOC_ROOT."/classes/code.class.php");
include_once(DOC_ROOT."/pdf/fpdf.php");
include_once(DOC_ROOT."/pdf/mc_table.php");
include_once(DOC_ROOT."/pdf/cbta_pdf.php");
include_once(DOC_ROOT."/classes/report.class.php");
include_once(DOC_ROOT."/classes/role.class.php");
include_once(DOC_ROOT."/classes/schedule_test.class.php");
include_once(DOC_ROOT."/classes/schoolType.class.php");
include_once(DOC_ROOT."/classes/ficha.class.php");
include_once(DOC_ROOT."/classes/typeCalif.class.php");
include_once(DOC_ROOT."/classes/scheduleGroup.class.php");
include_once(DOC_ROOT."/classes/payments.class.php");
include_once(DOC_ROOT."/classes/activity.class.php");
include_once(DOC_ROOT."/classes/resource.class.php");
include_once(DOC_ROOT."/classes/test.class.php");
include_once(DOC_ROOT."/classes/announcement.class.php");
include_once(DOC_ROOT."/classes/group.class.php");
include_once(DOC_ROOT."/classes/homework.class.php");
include_once(DOC_ROOT."/classes/recording.class.php");
include_once(DOC_ROOT."/classes/profesion.class.php");
include_once(DOC_ROOT."/classes/forum.class.php");

include_once(DOC_ROOT."/classes/empresa.class.php");
include_once(DOC_ROOT."/classes/rfc.class.php");
include_once(DOC_ROOT."/classes/folios.class.php");
include_once(DOC_ROOT."/classes/encuesta.class.php");

include_once(DOC_ROOT."/classes/sucursal.class.php");
include_once(DOC_ROOT."/classes/producto.class.php");
include_once(DOC_ROOT."/classes/comprobante.class.php");
include_once(DOC_ROOT."/classes/invoice.class.php");
include_once(DOC_ROOT."/classes/notificacion.class.php");
include_once(DOC_ROOT."/classes/bank.class.php");
include_once(DOC_ROOT."/classes/solicitud.class.php");
include_once(DOC_ROOT.'/libs/pdf/dompdf_config.inc.php');
include_once(DOC_ROOT.'/classes/docente.class.php');
$docente = new Docente();

$db = new DB;
$error = new ErrorLms;
$util = new Util;
$sendmail = new SendMail;
$invoice = new Invoice;
$main = new Main;
$Curp = new B_CURP;
$major = new Major;
$speciality = new Speciality;
$position = new Position;
$personal = new Personal;
$schedule = new Schedule;
//$group = new Group;
$semester = new Semester;
$subject = new Subject;
$course = new Course;
$module = new Module;
$institution = new Institution;
$role = new Role;
$periodo = new Periodo;
$typetest = new Typetest;
$gradereport = new Gradereport;
$scheduleTime = new ScheduleTime;
$schedule_test = new Schedule_test;
$report = new Report;
$code = new Code;
$schoolType = new SchoolType;
$ficha = new Ficha;
$typeCalif = new TypeCalif;
$scheduleGroup = new ScheduleGroup;
$user = new User;
$student = new Student;
$classroom = new Classroom;
$payments = new Payments;
$activity = new Activity;
$resource = new Resource;
$group = new Group;
$homework = new Homework;
$test = new Test;
$announcement = new Announcement;
$recording = new Recording;
$profesion = new Profesion;
$forum = new Forum;

$empresa = new Empresa;
$rfc = new Rfc;
$folios = new Folios;
$comprobante = new Comprobante;
$sucursal = new Sucursal;
$producto = new Producto;
$notificacion= new Notificacion;
$bank= new Bank;
$solicitud= new Solicitud;
$encuesta= new Encuesta;
$files = new Files;

$smarty = new Smarty;

//$util->wwwRedirect();

$smarty->assign('DOC_ROOT',DOC_ROOT);
$smarty->assign('WEB_ROOT',WEB_ROOT);
$smarty->assign('LOGIN_PAGE',LOGIN_PAGE);
$smarty->assign('COPYRIGHT',COPYRIGHT);
$smarty->assign('LOGO',LOGO);
$smarty->assign('LOGO_SMALL',LOGO_SMALL);
$smarty->assign('THEME',THEME);
$smarty->assign('PORTLET_COLOR',PORTLET_COLOR);
$smarty->assign('INTRODUCTION',INTRODUCTION);
$smarty->assign('BUTTON_COLOR',BUTTON_COLOR);

#MENU
$smarty->assign('VIDEO_CONFERENCES_CATALOG',VIDEO_CONFERENCES_CATALOG);
$smarty->assign('FINANCES',FINANCES);
$smarty->assign('VIDEO_CONFERENCES',VIDEO_CONFERENCES);
$smarty->assign('REQUESTS',REQUESTS);
$smarty->assign('MESSAGES_INSTRUCTOR',MESSAGES_INSTRUCTOR);
$smarty->assign('COST_TABLE_INSTRUCTOR',COST_TABLE_INSTRUCTOR);
$smarty->assign('VEHICLES_REPORT',VEHICLES_REPORT);
$smarty->assign('SUBJECTS_REPORT',SUBJECTS_REPORT);
$smarty->assign('INSTRUCTORS_REPORT',INSTRUCTORS_REPORT);

$smarty->assign('property', $property);

$lang = $util->ReturnLang();

//Obtenemos la fecha
$arrM = array('','Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
$fechaHoy = date('d').' '.$arrM[date('n')].' '.date('Y');
$smarty->assign('fechaHoy',$fechaHoy);

//Config. No del Cbta
$noCbta = $util->getNoCbta();
define('NO_CBTA',$noCbta);
$smarty->assign('noCbta',$noCbta);

//Conf. Directora de Enlace Operativo
$subDirEnlaceOp = $util->getSubDirEnlaceOp();
define('SUBDIR_ENLACE_OP',$subDirEnlaceOp);

//Conf. Director Tecnico
$dirTecnico = $util->getDirTecnico();
define('DIR_TECNICO',$dirTecnico);

//Conf. si es H o M.
define('TIT_DIR','DIRECTORA');

//Obtenemos la version del horario
$schV1 = $util->versionHorario();
$smarty->assign('schV1', $schV1);

$institution->setInstitutionId(1);
$myInstitution = $institution->Info();
$smarty->assign('institution', $myInstitution);
