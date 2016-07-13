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
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-home"></i>
                <span class="title">Inicio</span>
            </a>

        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-diamond"></i>
                <span class="title">Catalogos</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{$WEB_ROOT}/major" class="nav-link ">
                        <span class="title">Programas Academicos</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="ui_general.html" class="nav-link ">
                        <span class="title">Personal</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="ui_buttons.html" class="nav-link ">
                        <span class="title">Alumnos</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="ui_buttons_spinner.html" class="nav-link ">
                        <span class="title">Puestos</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="ui_confirmations.html" class="nav-link ">
                        <span class="title">Roles</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="ui_icons.html" class="nav-link ">
                        <span class="title">Profesiones</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="ui_socicons.html" class="nav-link ">
                        <span class="title">Videoconferencias</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="ui_typography.html" class="nav-link ">
                        <span class="title">Salones</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-puzzle"></i>
                <span class="title">Cobranza</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="components_date_time_pickers.html" class="nav-link ">
                        <span class="title">Recibos</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="components_color_pickers.html" class="nav-link ">
                        <span class="title">Consultar Facturas</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="components_select2.html" class="nav-link ">
                        <span class="title">Lista de Folios</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="components_bootstrap_select.html" class="nav-link ">
                        <span class="title">Actualizar Certificado</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-settings"></i>
                <span class="title">Curricula</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="form_controls.html" class="nav-link ">
                                            <span class="title">Curricula</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="form_controls_md.html" class="nav-link ">
                                            <span class="title">Historial</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-bulb"></i>
                <span class="title">TV</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="elements_steps.html" class="nav-link ">
                        <span class="title">Videoconferencias</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="elements_lists.html" class="nav-link ">
                        <span class="title">Grabacioes</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-briefcase"></i>
                <span class="title">Reporte</span>
            </a>
        </li>
        <li class="nav-item  ">
            <a href="?p=" class="nav-link nav-toggle">
                <i class="icon-wallet"></i>
                <span class="title">Configuracion</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="portlet_boxed.html" class="nav-link ">
                        <span class="title">Datos de la escuela</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- END SIDEBAR MENU -->
    <!-- END SIDEBAR MENU -->
</div>
<!-- END SIDEBAR -->