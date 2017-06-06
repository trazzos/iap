<?php /* Smarty version Smarty3-b7, created on 2017-05-30 15:40:01
         compiled from ".\templates\new/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10076592dd8a1c6a789-05888268%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef1addfba2b3daeec412b2e068d6e0cafd9112d9' => 
    array (
      0 => '.\\templates\\new/header.tpl',
      1 => 1496156724,
    ),
  ),
  'nocache_hash' => '10076592dd8a1c6a789-05888268',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
">
                <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/logos/Logo_3.png" style="position:relative; top:-15px" alt="logo" class="logo-default" height="45" /> </a>
            <div class="menu-toggler sidebar-toggler">
                <span></span>
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            <span></span>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" class="img-circle" src="<?php echo $_smarty_tpl->getVariable('infoStudent')->value['imagen'];?>
">
                        <span class="username username-hide-on-mobile"> <?php if ($_smarty_tpl->getVariable('User')->value['username']){?>Bienvenido <?php echo $_smarty_tpl->getVariable('User')->value['username'];?>
 :: <?php }?><?php echo $_smarty_tpl->getVariable('fechaHoy')->value;?>
 </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/logout">
                                <i class="icon-key"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->