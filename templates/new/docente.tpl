<!-- BEGIN PAGE BAR -->
<div class="page-bar">
{*    <ul class="page-breadcrumb">
        <li>
            <a href="{$WEB_ROOT}">Inicio</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Perfil</span>
        </li>
    </ul>
    <div class="page-toolbar">

    </div>*}
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h1 class="page-title"> Información del Asesor
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
                    <img src="{$WEB_ROOT}/{{$docente.foto}}" class="img-responsive" alt=""> </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name"> {$docente.name} {$docente.lastname_paterno} {$docente.lastname_materno} </div>
                    <div class="profile-usertitle-job"> Asesor </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                {*
                                <div class="profile-userbuttons">
                                    <button type="button" class="btn btn-circle green btn-sm">Follow</button>
                                    <button type="button" class="btn btn-circle red btn-sm">Message</button>
                                </div>
                *}
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="">
                            <a href="{$WEB_ROOT}/reply-inbox/id/{$id}/cId/0" >
                                <i class="fa fa-envelope-o"></i> 
								Enviar Inbox
                            </a>
                        </li>
                       <!--  <li>
                            <a href="#">
                                <i class="fa fa-phone"></i> {$docente.celular}
                            </a>
                        </li>-->
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
            <!-- END PORTLET MAIN -->
            <!-- PORTLET MAIN -->
            <div class="portlet light ">
                {include file="{$DOC_ROOT}/templates/new/about.tpl"}
            </div>
            <!-- END PORTLET MAIN -->
        </div>
        <!-- END BEGIN PROFILE SIDEBAR -->
        <!-- BEGIN PROFILE CONTENT -->
        <div class="profile-content">
            <div class="row">
                <div class="col-md-12 profile-info">
                    <h1 class="font-green sbold uppercase">Semblanza</h1>
                    <p> {$docente.description|html_entity_decode}</p>
{*
                    <ul class="list-inline">
                        <li>
                            <i class="fa fa-map-marker"></i> Spain </li>
                        <li>
                            <i class="fa fa-calendar"></i> 18 Jan 1982 </li>
                        <li>
                            <i class="fa fa-briefcase"></i> Design </li>
                        <li>
                            <i class="fa fa-star"></i> Top Seller </li>
                        <li>
                            <i class="fa fa-heart"></i> BASE Jumping </li>
                    </ul>
*}
                </div>
            </div>
        </div>
        <!-- END PROFILE CONTENT -->
    </div>
</div>