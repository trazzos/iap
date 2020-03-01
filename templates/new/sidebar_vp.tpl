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
    <ul class="page-sidebar-menu  page-header-fixed {if $User.type == "student" || $vistaPrevia eq 1} page-sidebar-menu-closed {/if}" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <li class="sidebar-toggler-wrapper hide">
            <div class="sidebar-toggler">
                <span></span>
            </div>
        </li>
        <!-- END SIDEBAR TOGGLER BUTTON -->
        <li class="nav-item start ">
            <a href="{$WEB_ROOT}" class="nav-link">
                <i class="icon-home"></i>
                <span class="title">Inicio</span>
            </a>

        </li>




        {if $mnuMain == "modulo1" || $mnuMain == "modulo"}

		<li class="nav-item {if $page == "view-modules-student"} active {/if} ">
                <a href="{$WEB_ROOT}/view-modules-student/id/{$id}/vp/1" class="nav-link nav-toggle">
                    <i class="fa fa-bullhorn"></i>
                    <span class="title">Anuncios</span>
                </a>
            </li>




            <li class="nav-item {if $page == "information-modules-student"} active {/if} ">
                <a href="{$WEB_ROOT}/information-modules-student/id/{$id}/vp/1" class="nav-link nav-toggle">
                    <i class="fa fa-info"></i>
                    <span class="title">Información</span>
                </a>
            </li>

        <li class="nav-item {if $page == "docente"} active {/if}">
            <a href="{$WEB_ROOT}/docente/id/{$id}/vp/1" class="nav-link nav-toggle">
                <i class="fa fa-user"></i>
                <span class="title">Asesor</span>
            </a>
        </li>



        {if $mnuMain == "modulo"}
            <li class="nav-item {if $page == "calendar-image-modules-student"} active {/if} ">
                <a href="{$WEB_ROOT}/calendar-image-modules-student/id/{$id}/vp/1" class="nav-link nav-toggle">
                    <i class="fa fa-calendar"></i>
                    <span class="title">Calendario</span>
                </a>
            </li>
            {/if}

            <li class="nav-item {if $page == "calendar-modules-student"} active {/if} ">
                <a href="{$WEB_ROOT}/calendar-modules-student/id/{$id}/vp/1" class="nav-link nav-toggle">
                    <i class="fa fa-list"></i>
                    <span class="title">Actividades</span>
                </a>
            </li>

            {if $mnuMain == "modulo"}
            <li class="nav-item {if $page == "presentation-modules-student"} active {/if} ">
                <a href="{$WEB_ROOT}/presentation-modules-student/id/{$id}/vp/1" class="nav-link nav-toggle">
                    <i class="fa fa-slideshare"></i>
                    <span class="title">Clase</span>
                </a>
            </li>
            {/if}

            <li class="nav-item {if $page == "examen-modules-student"} active {/if} ">
                <a href="{$WEB_ROOT}/examen-modules-student/id/{$id}/vp/1" class="nav-link nav-toggle">
                    <i class="fa fa-check-square-o"></i>
                    <span class="title">Examenes</span>
                </a>
            </li>

            <li class="nav-item {if $page == "resources-modules-student"} active {/if} ">
                <a href="{$WEB_ROOT}/resources-modules-student/id/{$id}/vp/1" class="nav-link nav-toggle">
                    <i class="fa fa-files-o"></i>
                    <span class="title">Recursos de Apoyo</span>
                </a>
            </li>

			<li class="nav-item {if $page == "forum-modules-student"} active {/if} ">
                <a href="{$WEB_ROOT}/reply-inbox/id/{$id}/cId/0&vp=1" class="nav-link nav-toggle">
                    <i class="fa fa-envelope-o"></i>
                    <span class="title">Inbox</span>
                </a>
            </li>

            <li class="nav-item {if $page == "forum-modules-student"} active {/if} ">
                <a href="{$WEB_ROOT}/forum-modules-student/id/{$id}/vp/1" class="nav-link nav-toggle">
                    <i class="fa fa-comments"></i>
                    <span class="title">Foro</span>
                </a>
            </li>

            <li class="nav-item {if $page == "team-modules-student"} active {/if} ">
                <a href="{$WEB_ROOT}/team-modules-student/id/{$id}/vp/1" class="nav-link nav-toggle">
                    <i class="fa fa-users"></i>
                    <span class="title">Mi Equipo</span>
                </a>
            </li>

            <li class="nav-item ">
                <a href="{$WEB_ROOT}/wiki/index.php/Página_principal" class="nav-link nav-toggle">
                    <i class="fa fa-wikipedia-w"></i>
                    <span class="title">Wiki</span>
                </a>
            </li>
			<!--
			 <li class="nav-item {if $page == "inbox"} active {/if} ">
                <a href="{$WEB_ROOT}/inbox/id/{$id}" class="nav-link nav-toggle">
                    <i class="fa fa-comments"></i>
                    <span class="title">Inbox</span>
                </a>
            </li>-->



        {/if}

    </ul>
    <!-- END SIDEBAR MENU -->
    <!-- END SIDEBAR MENU -->
</div>
<!-- END SIDEBAR -->
