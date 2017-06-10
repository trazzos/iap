<?php /* Smarty version Smarty3-b7, created on 2016-08-26 19:55:33
         compiled from "templates/new/student_profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:44869923457c0e50517bd95-05607234%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1af195e1073969426326b23b085ce8a0416fbaa5' => 
    array (
      0 => 'templates/new/student_profile.tpl',
      1 => 1472259327,
    ),
  ),
  'nocache_hash' => '44869923457c0e50517bd95-05607234',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/home/iapchiap/public_html/libs/plugins/modifier.date_format.php';
?><!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
">Inicio</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Perfil</span>
        </li>
    </ul>
    <div class="page-toolbar">

    </div>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h1 class="page-title"> Bienvenido
    <small></small>
</h1>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PROFILE SIDEBAR -->
        <div class="profile-sidebar">
            <!-- PORTLET MAIN -->
            <div class="portlet light profile-sidebar-portlet ">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('infoStudent')->value['imagen'];?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
" class="img-responsive" alt=""> </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name"> <?php echo $_smarty_tpl->getVariable('User')->value['username'];?>
 </div>
                    <div class="profile-usertitle-job"> Alumno </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->

                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="">
                            <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/alumn-services ">
                                <i class="icon-settings"></i> Configuración </a>
                        </li>
                        <li>
                            <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/tv ">
                                <i class="fa fa-video-camera"></i> VideoConferencias </a>
                        </li>
                        <li>
                            <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/recorded ">
                                <i class="fa fa-camera"></i> Grabaciones </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
            <!-- END PORTLET MAIN -->
            <!-- PORTLET MAIN -->
            <div class="portlet light ">

                <div>
                    <h4 class="profile-desc-title">Acerca del IAP Chiapas</h4>
                    <span class="profile-desc-text"> El <b>Instituto de Administración Pública del Estado de Chiapas, A. C.</b><br />te da la mas cordial bienvenida a nuestro Sistema de Educación en Línea.</span>
                    <div class="margin-top-20 profile-desc-link">
                        <i class="fa fa-globe"></i>
                        <a href="http://www.iapchiapas.org.mx">www.iapchiapas.org.mx</a>
                    </div>
                    <div class="margin-top-20 profile-desc-link">
                        <i class="fa fa-facebook"></i>
                        <a href="https://www.facebook.com/IAPChiapas">iapchiapas</a>
                    </div>
                </div>
            </div>
            <!-- END PORTLET MAIN -->
        </div>
        <!-- END BEGIN PROFILE SIDEBAR -->
        <!-- BEGIN PROFILE CONTENT -->
        <div class="profile-content">
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PORTLET -->
                    <div class="portlet light ">
                        <div class="portlet-title tabbable-line">
                            <div class="caption caption-md">
                                <i class="icon-globe theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase">Bitácora</span>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1_1" data-toggle="tab"> Notificaciones </a>
                                </li>
                                <li >
                                    <a href="#tab_1_2" data-toggle="tab"> Avisos </a>
                                </li>
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <!--BEGIN TABS-->
                            <div class="tab-content">
                                <div class="tab-pane " id="tab_1_2">
                                    <div class="scroller" style="height: 320px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                        <ul class="feeds">

                                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('announcements')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-success">
                                                                <i class="fa fa-bell-o"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc">
                                                                <b><?php echo $_smarty_tpl->getVariable('item')->value['title'];?>
</b>: <?php echo $_smarty_tpl->getVariable('item')->value['description'];?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('item')->value['date'],"%d %b '%y");?>
 </div>
                                                </div>
                                            </li>
                                            <?php }} ?>

                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-pane active" id="tab_1_1">
                                    <div class="scroller" style="height: 337px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                        <ul class="feeds">
                                            <?php  $_smarty_tpl->tpl_vars['reply'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('notificaciones')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['reply']->key => $_smarty_tpl->tpl_vars['reply']->value){
?>
                                                <?php if ($_smarty_tpl->getVariable('reply')->value['vistaPermiso']==1){?>

                                                <li>
                                                <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
<?php echo $_smarty_tpl->getVariable('reply')->value['enlace'];?>
">
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-success">
                                                                    <i class="fa fa-bell-o"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc">
                                                                    <?php echo $_smarty_tpl->getVariable('reply')->value['actividad'];?>
 por <?php echo $_smarty_tpl->getVariable('reply')->value['nombre'];?>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('reply')->value['fecha_aplicacion'],"%d %b '%y");?>
 </div>
                                                    </div>
                                                </a>
                                            </li>
                                                <?php }?>
                                            <?php }} ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--END TABS-->
                        </div>
                    </div>
                    <!-- END PORTLET -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PORTLET -->
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption caption-md">
                                <i class="icon-bar-chart theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase">Curricula Activa</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-scrollable table-scrollable-borderless">
                                <table class="table table-hover table-light">
                                    <thead>
                                    <tr class="uppercase">
                                        <th> Clave </th>
                                        <th> Tipo </th>
                                        <th> Nombre </th>
                                        <th> Modalidad </th>
                                        <th> Fecha Inicial </th>
                                        <th> Fecha Final </th>

                                        <th> Dias Activo </th>
                                        <th> Modulos </th>
                                        <th> Acciones </th>
                                    </tr>
                                    </thead>
                                    <?php  $_smarty_tpl->tpl_vars['subject'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('activeCourses')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['subject']->key => $_smarty_tpl->tpl_vars['subject']->value){
?>
                                    <tr>
                                        <td ><?php echo $_smarty_tpl->getVariable('subject')->value['clave'];?>
</td>
                                        <td ><?php echo $_smarty_tpl->getVariable('subject')->value['majorName'];?>
</td>
                                        <td ><?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
</td>
                                        <td ><?php echo $_smarty_tpl->getVariable('subject')->value['modality'];?>
</td>
                                        <td ><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('subject')->value['initialDate'],"%d-%m-%Y");?>
</td>
                                        <td ><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('subject')->value['finalDate'],"%d-%m-%Y");?>
</td>
                                        <td ><?php echo $_smarty_tpl->getVariable('subject')->value['daysToFinish'];?>
</td>

                                        <td ><?php echo $_smarty_tpl->getVariable('subject')->value['courseModule'];?>

                                        <td >
                                            <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/graybox.php?page=view-modules-course-student&id=<?php echo $_smarty_tpl->getVariable('subject')->value['courseId'];?>
" data-target="#ajax" data-toggle="modal" data-width="1000px">
                                            <i class="fa fa-sign-in fa-lg"></i>
                                            </a>
                                        </td>
                                     </tr>
                                        <?php }} else { ?>
                                        <tr>
                                            <td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
                                        </tr>

                                    <?php } ?>

                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END PORTLET -->
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PORTLET -->
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption caption-md">
                                <i class="icon-bar-chart theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase">Curricula Inactiva</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-scrollable table-scrollable-borderless">
                                <table class="table table-hover table-light">
                                    <thead>
                                    <tr class="uppercase">
                                        <th> Clave </th>
                                        <th> Tipo </th>
                                        <th> Nombre </th>
                                        <th> Modalidad </th>
                                        <th> Fecha Inicial </th>
                                        <th> Fecha Final </th>
                                        
                                        <th> Dias Activo </th>
                                        <th> Modulos </th>

                                    </tr>
                                    </thead>
                                    <?php  $_smarty_tpl->tpl_vars['subject'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('inactiveCourses')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['subject']->key => $_smarty_tpl->tpl_vars['subject']->value){
?>

                                    <tr>
                                        <td ><?php echo $_smarty_tpl->getVariable('subject')->value['clave'];?>
</td>
                                        <td ><?php echo $_smarty_tpl->getVariable('subject')->value['majorName'];?>
</td>
                                        <td ><?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
</td>
                                        <td ><?php echo $_smarty_tpl->getVariable('subject')->value['modality'];?>
</td>
                                        <td ><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('subject')->value['initialDate'],"%d-%m-%Y");?>
</td>
                                        <td ><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('subject')->value['finalDate'],"%d-%m-%Y");?>
</td>
                                        <td ><?php echo $_smarty_tpl->getVariable('subject')->value['daysToFinish'];?>
</td>
                                        
                                        <td ><?php echo $_smarty_tpl->getVariable('subject')->value['courseModule'];?>


                                        </tr>
                                        <?php }} else { ?>
                                        <tr>
                                            <td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
                                        </tr>
                                        <?php } ?>

                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END PORTLET -->
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PORTLET -->
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption caption-md">
                                <i class="icon-bar-chart theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase">Curricula Finalizada</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-scrollable table-scrollable-borderless">
                                <table class="table table-hover table-light">
                                    <thead>
                                    <tr class="uppercase">
                                        <th> Clave </th>
                                        <th> Tipo </th>
                                        <th> Nombre </th>
                                        <th> Modalidad </th>
                                        <th> Fecha Inicial </th>
                                        <th> Fecha Final </th>
                                        
                                        <th> Dias Activo </th>
                                        <th> Modulos </th>
                                        <th> Calificación </th>
                                    </tr>
                                    </thead>
                                    <?php  $_smarty_tpl->tpl_vars['subject'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('finishedCourses')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['subject']->key => $_smarty_tpl->tpl_vars['subject']->value){
?>

                                    <tr>
                                        <td ><?php echo $_smarty_tpl->getVariable('subject')->value['clave'];?>
</td>
                                        <td ><?php echo $_smarty_tpl->getVariable('subject')->value['majorName'];?>
</td>
                                        <td ><?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
</td>
                                        <td ><?php echo $_smarty_tpl->getVariable('subject')->value['modality'];?>
</td>
                                        <td ><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('subject')->value['initialDate'],"%d-%m-%Y");?>
</td>
                                        <td ><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('subject')->value['finalDate'],"%d-%m-%Y");?>
</td>
                                        <td ><?php echo $_smarty_tpl->getVariable('subject')->value['daysToFinish'];?>
</td>
                                        
                                        <td ><?php echo $_smarty_tpl->getVariable('subject')->value['courseModule'];?>

                                        <td ><?php echo $_smarty_tpl->getVariable('subject')->value['mark'];?>
</td>
                                     </tr>
                                        <?php }} else { ?>
                                        <tr>
                                            <td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
                                        </tr>
                                    <?php } ?>

                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END PORTLET -->
                </div>
            </div>
        </div>
        <!-- END PROFILE CONTENT -->
    </div>
</div>