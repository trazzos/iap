<?php /* Smarty version Smarty3-b7, created on 2017-06-05 07:50:34
         compiled from ".\templates\new/sidebar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9895935539a111124-79505547%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8606426893b10703e7e3d17103e81a66aaf7e802' => 
    array (
      0 => '.\\templates\\new/sidebar.tpl',
      1 => 1496667021,
    ),
  ),
  'nocache_hash' => '9895935539a111124-79505547',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!-- BEGIN SIDEBAR -->
<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
<div class="page-sidebar navbar-collapse collapse ">
    <!-- BEGIN SIDEBAR MENU -->
    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <ul class="page-sidebar-menu  page-header-fixed <?php if ($_smarty_tpl->getVariable('User')->value['type']=="student"){?> page-sidebar-menu-closed <?php }?>" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <li class="sidebar-toggler-wrapper hide">
            <div class="sidebar-toggler">
                <span></span>
            </div>
        </li>
        <!-- END SIDEBAR TOGGLER BUTTON -->
        <li class="nav-item start ">
            <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
" class="nav-link">
                <i class="icon-home"></i>
                <span class="title">Inicio</span>
            </a>

        </li>

        <?php if ($_smarty_tpl->getVariable('AccessMod')->value[32]==1||$_smarty_tpl->getVariable('AccessMod')->value[33]==1){?>

        <?php }?>


        <?php if ($_smarty_tpl->getVariable('User')->value['positionId']==1||$_smarty_tpl->getVariable('AccessMod')->value[1]==1||$_smarty_tpl->getVariable('AccessMod')->value[2]==1||$_smarty_tpl->getVariable('AccessMod')->value[3]==1||$_smarty_tpl->getVariable('AccessMod')->value[4]==1||$_smarty_tpl->getVariable('AccessMod')->value[5]==1||$_smarty_tpl->getVariable('AccessMod')->value[6]==1||$_smarty_tpl->getVariable('AccessMod')->value[7]==1||$_smarty_tpl->getVariable('AccessMod')->value[9]==1||$_smarty_tpl->getVariable('AccessMod')->value[10]==1){?>
        <?php if (!$_smarty_tpl->getVariable('docente')->value){?>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-diamond"></i>
                <span class="title">Catálogos</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/major" class="nav-link ">
                        <span class="title">Programas Académicos</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/personal" class="nav-link ">
                        <span class="title">Personal</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/student" class="nav-link ">
                        <span class="title">Alumnos</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/position" class="nav-link ">
                        <span class="title">Puestos</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/role" class="nav-link ">
                        <span class="title">Roles</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/profesion" class="nav-link ">
                        <span class="title">Profesiones</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/recording" class="nav-link ">
                        <span class="title">Videoconferencias</span>
                    </a>
                </li>
            </ul>
        </li>
        <?php }?>
        <?php }?>

        <?php if ($_smarty_tpl->getVariable('AccessMod')->value[34]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>

        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-puzzle"></i>
                <span class="title">Cobranza</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/invoices" class="nav-link ">
                        <span class="title">Recibos</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/consultar-facturas" class="nav-link ">
                        <span class="title">Consultar Facturas</span>
                    </a>
                </li>
            </ul>
        </li>
        <?php }?>

        <?php if ($_smarty_tpl->getVariable('AccessMod')->value[11]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1||$_smarty_tpl->getVariable('AccessMod')->value[31]==1||$_smarty_tpl->getVariable('AccessMod')->value[8]==1){?>
            <?php if (!$_smarty_tpl->getVariable('docente')->value){?>
                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-settings"></i>
                        <span class="title">Currícula</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/subject" class="nav-link ">
                                <span class="title">Currícula</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/history-subject" class="nav-link ">
                                <span class="title">Historial</span>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php }else{ ?>
                <li class="nav-item  ">
                    <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/history-subject" class="nav-link nav-toggle">
                        <i class="icon-settings"></i>
                        <span class="title">Currícula</span>
                    </a>
                </li>
            <?php }?>

        <?php }?>


        <?php if ($_smarty_tpl->getVariable('User')->value['positionId']==1||$_smarty_tpl->getVariable('AccessMod')->value[1]==1||$_smarty_tpl->getVariable('AccessMod')->value[2]==1||$_smarty_tpl->getVariable('AccessMod')->value[3]==1||$_smarty_tpl->getVariable('AccessMod')->value[4]==1||$_smarty_tpl->getVariable('AccessMod')->value[5]==1||$_smarty_tpl->getVariable('AccessMod')->value[6]==1||$_smarty_tpl->getVariable('AccessMod')->value[7]==1||$_smarty_tpl->getVariable('AccessMod')->value[9]==1||$_smarty_tpl->getVariable('AccessMod')->value[10]==1){?>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-video-camera"></i>
                <span class="title">Videoconferencias</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/tv" class="nav-link ">
                        <span class="title">Videoconferencias en vivo</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/recorded" class="nav-link ">
                        <span class="title">Grabaciones</span>
                    </a>
                </li>
            </ul>
        </li>
        <?php }?>

        <?php if ($_smarty_tpl->getVariable('User')->value['positionId']==1||$_smarty_tpl->getVariable('AccessMod')->value[13]==1||$_smarty_tpl->getVariable('AccessMod')->value[14]==1||$_smarty_tpl->getVariable('AccessMod')->value[15]==1||$_smarty_tpl->getVariable('AccessMod')->value[16]==1){?>

        <li class="nav-item  ">
            <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/reporte-general" class="nav-link">
                <i class="icon-briefcase"></i>
                <span class="title">Reportes</span>
                <span class="arrow"></span>
            </a>
        </li>
        <li class="nav-item  ">
            <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/institution" class="nav-link ">
                <i class="icon-wallet"></i>
                <span class="title">Configuración</span>
                <span class="arrow"></span>
            </a>
        </li>
        <?php }?>

        <?php if ($_smarty_tpl->getVariable('mnuMain')->value=="modulo1"||$_smarty_tpl->getVariable('mnuMain')->value=="modulo"){?>
            <li class="nav-item <?php if ($_smarty_tpl->getVariable('page')->value=="view-modules-student"){?> active <?php }?> ">
                <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/view-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
" class="nav-link nav-toggle">
                    <i class="fa fa-bullhorn"></i>
                    <span class="title">Anuncios</span>
                </a>
            </li>
            <li class="nav-item <?php if ($_smarty_tpl->getVariable('page')->value=="information-modules-student"){?> active <?php }?> ">
                <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/information-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
" class="nav-link nav-toggle">
                    <i class="fa fa-info"></i>
                    <span class="title">Información</span>
                </a>
            </li>

        <li class="nav-item <?php if ($_smarty_tpl->getVariable('page')->value=="docente"){?> active <?php }?>">
            <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/docente/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
" class="nav-link nav-toggle">
                <i class="fa fa-user"></i>
                <span class="title">Docente</span>
            </a>
        </li>



        <?php if ($_smarty_tpl->getVariable('mnuMain')->value=="modulo"){?>
            <li class="nav-item <?php if ($_smarty_tpl->getVariable('page')->value=="calendar-image-modules-student"){?> active <?php }?> ">
                <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/calendar-image-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
" class="nav-link nav-toggle">
                    <i class="fa fa-calendar"></i>
                    <span class="title">Calendario</span>
                </a>
            </li>
            <?php }?>

            <li class="nav-item <?php if ($_smarty_tpl->getVariable('page')->value=="calendar-modules-student"){?> active <?php }?> ">
                <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/calendar-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
" class="nav-link nav-toggle">
                    <i class="fa fa-list"></i>
                    <span class="title">Actividades</span>
                </a>
            </li>

            <?php if ($_smarty_tpl->getVariable('mnuMain')->value=="modulo"){?>
            <li class="nav-item <?php if ($_smarty_tpl->getVariable('page')->value=="presentation-modules-student"){?> active <?php }?> ">
                <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/presentation-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
" class="nav-link nav-toggle">
                    <i class="fa fa-slideshare"></i>
                    <span class="title">Clase</span>
                </a>
            </li>
            <?php }?>

            <li class="nav-item <?php if ($_smarty_tpl->getVariable('page')->value=="examen-modules-student"){?> active <?php }?> ">
                <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/examen-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
" class="nav-link nav-toggle">
                    <i class="fa fa-check-square-o"></i>
                    <span class="title">Examenes</span>
                </a>
            </li>

            <li class="nav-item <?php if ($_smarty_tpl->getVariable('page')->value=="resources-modules-student"){?> active <?php }?> ">
                <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/resources-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
" class="nav-link nav-toggle">
                    <i class="fa fa-files-o"></i>
                    <span class="title">Recursos de Apoyo</span>
                </a>
            </li>

            <li class="nav-item <?php if ($_smarty_tpl->getVariable('page')->value=="forum-modules-student"){?> active <?php }?> ">
                <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/forum-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
" class="nav-link nav-toggle">
                    <i class="fa fa-comments"></i>
                    <span class="title">Foro</span>
                </a>
            </li>

            <li class="nav-item <?php if ($_smarty_tpl->getVariable('page')->value=="team-modules-student"){?> active <?php }?> ">
                <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/team-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
" class="nav-link nav-toggle">
                    <i class="fa fa-users"></i>
                    <span class="title">Mi Equipo</span>
                </a>
            </li>

            <li class="nav-item ">
                <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/wiki/index.php/Página_principal" class="nav-link nav-toggle">
                    <i class="fa fa-wikipedia-w"></i>
                    <span class="title">Wiki</span>
                </a>
            </li>


        <?php }?>

    </ul>
    <!-- END SIDEBAR MENU -->
    <!-- END SIDEBAR MENU -->
</div>
<!-- END SIDEBAR -->