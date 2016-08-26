<!-- BEGIN SIDEBAR -->
<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
<div class="page-sidebar navbar-collapse collapse">
    <!-- BEGIN SIDEBAR MENU -->
    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
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

        {if $AccessMod[32] == 1 || $AccessMod[33] == 1}
        <li class="nav-item start ">
            <a href="{$WEB_ROOT}/alumn-services" class="nav-link">
                <i class="icon-home"></i>
                <span class="title">Mis Datos</span>
            </a>
        </li>
        {/if}


        {if $User.positionId == 1 || $AccessMod[1] == 1 || $AccessMod[2] == 1  || $AccessMod[3] == 1 || $AccessMod[4] == 1 || $AccessMod[5] == 1 || $AccessMod[6] == 1 || $AccessMod[7] == 1 || $AccessMod[9] == 1 || $AccessMod[10] == 1}

        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-diamond"></i>
                <span class="title">Catálogos</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{$WEB_ROOT}/major" class="nav-link ">
                        <span class="title">Programas Académicos</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{$WEB_ROOT}/personal" class="nav-link ">
                        <span class="title">Personal</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{$WEB_ROOT}/student" class="nav-link ">
                        <span class="title">Alumnos</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{$WEB_ROOT}/position" class="nav-link ">
                        <span class="title">Puestos</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{$WEB_ROOT}/role" class="nav-link ">
                        <span class="title">Roles</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{$WEB_ROOT}/profesion" class="nav-link ">
                        <span class="title">Profesiones</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{$WEB_ROOT}/recording" class="nav-link ">
                        <span class="title">Videoconferencias</span>
                    </a>
                </li>
            </ul>
        </li>
        {/if}

        {if $AccessMod[34] == 1 || $User.positionId == 1}

        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-puzzle"></i>
                <span class="title">Cobranza</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{$WEB_ROOT}/invoices" class="nav-link ">
                        <span class="title">Recibos</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{$WEB_ROOT}/consultar-facturas" class="nav-link ">
                        <span class="title">Consultar Facturas</span>
                    </a>
                </li>
            </ul>
        </li>
        {/if}

        {if $AccessMod[11] == 1 || $User.positionId == 1 || $AccessMod[31] == 1 || $AccessMod[8] == 1}
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-settings"></i>
                <span class="title">Currícula</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{$WEB_ROOT}/subject" class="nav-link ">
                        <span class="title">Currícula</span>
                    </a>
                </li>
                {if !$docente}
                <li class="nav-item  ">
                    <a href="{$WEB_ROOT}/history-subject" class="nav-link ">
                        <span class="title">Historial</span>
                    </a>
                </li>
                {/if}
            </ul>
        </li>
        {/if}


        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-bulb"></i>
                <span class="title">Videoconferencias</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{$WEB_ROOT}/tv" class="nav-link ">
                        <span class="title">Videoconferencias en vivo</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{$WEB_ROOT}/recorded" class="nav-link ">
                        <span class="title">Grabaciones</span>
                    </a>
                </li>
            </ul>
        </li>

        {if $User.positionId == 1 || $AccessMod[13] == 1 || $AccessMod[14] == 1  || $AccessMod[15] == 1 || $AccessMod[16] == 1}

        <li class="nav-item  ">
            <a href="{$WEB_ROOT}/reporte-general" class="nav-link">
                <i class="icon-briefcase"></i>
                <span class="title">Reportes</span>
                <span class="arrow"></span>
            </a>
        </li>
        <li class="nav-item  ">
            <a href="{$WEB_ROOT}/institution" class="nav-link ">
                <i class="icon-wallet"></i>
                <span class="title">Configuración</span>
                <span class="arrow"></span>
            </a>
        </li>
        {/if}

    </ul>
    <!-- END SIDEBAR MENU -->
    <!-- END SIDEBAR MENU -->
</div>
<!-- END SIDEBAR -->