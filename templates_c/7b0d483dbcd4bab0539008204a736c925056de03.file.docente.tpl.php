<?php /* Smarty version Smarty3-b7, created on 2017-06-01 20:39:07
         compiled from "C:/wamp/www/iap/templates/new/docente.tpl" */ ?>
<?php /*%%SmartyHeaderCode:191165930c1bbdbaac2-58740875%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b0d483dbcd4bab0539008204a736c925056de03' => 
    array (
      0 => 'C:/wamp/www/iap/templates/new/docente.tpl',
      1 => 1496156724,
    ),
  ),
  'nocache_hash' => '191165930c1bbdbaac2-58740875',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">

</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h1 class="page-title"> Información del Docente
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
                    <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/<?php ob_start();?><?php echo $_smarty_tpl->getVariable('docente')->value['foto'];?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
" class="img-responsive" alt=""> </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name"> <?php echo $_smarty_tpl->getVariable('docente')->value['name'];?>
 <?php echo $_smarty_tpl->getVariable('docente')->value['lastname_paterno'];?>
 <?php echo $_smarty_tpl->getVariable('docente')->value['lastname_materno'];?>
 </div>
                    <div class="profile-usertitle-job"> Docente </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="">
                            <a href="#">
                                <i class="fa fa-envelope-o"></i> <?php echo $_smarty_tpl->getVariable('docente')->value['correo'];?>

                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-phone"></i> <?php echo $_smarty_tpl->getVariable('docente')->value['celular'];?>

                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
            <!-- END PORTLET MAIN -->
            <!-- PORTLET MAIN -->
            <div class="portlet light ">
                <div>
                    <h4 class="profile-desc-title">IAP-Chiapas</h4>
                    <span class="profile-desc-text">Compromiso, innovación y resultados</span>
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
                <div class="col-md-12 profile-info">
                    <h1 class="font-green sbold uppercase">Semblanza</h1>
                    <p> <?php echo html_entity_decode($_smarty_tpl->getVariable('docente')->value['description']);?>
</p>

                </div>
            </div>
        </div>
        <!-- END PROFILE CONTENT -->
    </div>
</div>