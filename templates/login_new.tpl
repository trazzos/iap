<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 4.6
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>Sistema de Educaci&oacute;n en Linea | IAP Chiapas</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{$WEB_ROOT}/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="{$WEB_ROOT}/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{$WEB_ROOT}/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{$WEB_ROOT}/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{$WEB_ROOT}/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{$WEB_ROOT}/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{$WEB_ROOT}/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{$WEB_ROOT}/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{$WEB_ROOT}/assets/pages/css/{$LOGIN_PAGE}.min.css" rel="stylesheet" type="text/css" />
    <link href="{$WEB_ROOT}/GreyBox/greybox/gb_styles.css" rel="stylesheet" type="text/css" />

    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" /> </head>

    <script type="text/javascript">
      var GB_ROOT_DIR = "{$WEB_ROOT}/GreyBox/greybox/";
    </script>
    <script type="text/javascript" src="{$WEB_ROOT}/GreyBox/greybox/AJS.js"></script>
    <script type="text/javascript" src="{$WEB_ROOT}/GreyBox/greybox/AJS_fx.js"></script>
    <script type="text/javascript" src="{$WEB_ROOT}/GreyBox/greybox/gb_scripts.js"></script>

<!-- END HEAD -->


<body class=" login">
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="{$WEB_ROOT}">
        <img src="{$WEB_ROOT}/images/logos/{$LOGO}" width="250px" alt="" />
    </a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form2" method="post" id="frmLogin">
        <input type="hidden" name="type" value="doLogin" />

        <h3 class="form-title">Ingresa a tu cuenta</h3>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span> Tu usuario o contraseña son incorrectas. Favor de verificarlas. </span>
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Usuario</label>
            <div class="input-icon">
                <i class="fa fa-user"></i>
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Usuario" name="username" id="username" /> </div>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="passwd" id="passwd" /> </div>
        </div>
        <div class="form-actions">
            <button type="button" onclick="DoLogin()" class="btn {$BUTTON_COLOR} pull-right"> Ingresar </button>
        </div>


        <div class="forget-password">
            <h4><a href="recuperacion"  style="color:#fff; position:relative; top:-11px; text-decoration: underline">¿Olvidaste tu contraseña?</a></h4>
        </div>
        <div class="create-account">
            <p style="color: white"> ¿Estás interesado en nuestros programas académicos?
                <a href="{$WEB_ROOT}/register" style="color:#fff; text-decoration: underline"> Registra tu información aquí</a>
            </p>
        </div>

    </form>
    <!-- END LOGIN FORM -->
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form class="forget-form" method="post" name="emailrecuperacion" id="emailrecuperacion">
        <input type="hidden" name="type" id="type" value="recupera">
        <input type="hidden" name="redireccion" id="redireccion" value="0">
        <input type="hidden" name="Error" id="Error" value="">

        <h3>¿Olvidaste tu contraseña?</h3>
        <p> Ingresa tu correo electronico para recuperarla. </p>
        <div class="form-group">
            <div class="input-icon">
                <i class="fa fa-envelope"></i>
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" id="email" /> </div>
        </div>
        <div class="form-actions">
            <button type="button" id="back-btn" class="btn red btn-outline">Regresar</button>
            <button type="button" class="btn {$BUTTON_COLOR} pull-right" onclick="Recuperacion();" > recuperar </button>
        </div>
    </form>
    <!-- END FORGOT PASSWORD FORM -->
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->

<div class="copyright"> {$smarty.now|date_format:"%Y"} &copy; {$COPYRIGHT} | <a target="_black" href="{$COMPANY_PRIVACY}">Aviso de privacidad</a></div>

<div class="modal fade" id="ajax" role="basic" aria-hidden="true" {*onClick="limipiarAjax()"*}>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <img src="{$WEB_ROOT}/assets/global/img/loading-spinner-grey.gif" alt="" class="loading">
                <span> &nbsp;&nbsp;Loading... </span>
            </div>
        </div>
    </div>
</div>
<!-- END COPYRIGHT -->
<!--[if lt IE 9]>
<script src="{$WEB_ROOT}/assets/global/plugins/respond.min.js"></script>
<script src="{$WEB_ROOT}/assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{$WEB_ROOT}/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{$WEB_ROOT}/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{$WEB_ROOT}/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="{$WEB_ROOT}/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{$WEB_ROOT}/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{$WEB_ROOT}/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{$WEB_ROOT}/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="{$WEB_ROOT}/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
<script src="{$WEB_ROOT}/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="{$WEB_ROOT}/assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{$WEB_ROOT}/assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{$WEB_ROOT}/assets/global/plugins/bootstrap-growl/jquery.bootstrap-growl.min.js" type="text/javascript"></script>
<script src="{$WEB_ROOT}/assets/pages/scripts/login-4.min.js" type="text/javascript"></script>
{include file="{$DOC_ROOT}/templates/config.tpl"}
<script src="{$WEB_ROOT}/javascript/functions.js?{$timestamp}" type="text/javascript"></script>
<script src="{$WEB_ROOT}/javascript/new/{$page}.js?{$timestamp}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<!-- END THEME LAYOUT SCRIPTS -->
</body>


</html>