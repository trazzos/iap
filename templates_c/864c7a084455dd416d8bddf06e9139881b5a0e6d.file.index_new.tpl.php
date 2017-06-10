<?php /* Smarty version Smarty3-b7, created on 2017-06-05 19:10:47
         compiled from "C:/wamp/www/iap/templates/index_new.tpl" */ ?>
<?php /*%%SmartyHeaderCode:164955935f307326213-65384821%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '864c7a084455dd416d8bddf06e9139881b5a0e6d' => 
    array (
      0 => 'C:/wamp/www/iap/templates/index_new.tpl',
      1 => 1496707826,
    ),
  ),
  'nocache_hash' => '164955935f307326213-65384821',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
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
	<link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN THEME GLOBAL STYLES -->
	<link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/css/components-md.css" rel="stylesheet" id="style_components" type="text/css" />
	<link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
	<!-- END THEME GLOBAL STYLES -->

	<?php if (($_smarty_tpl->getVariable('page')->value=='homepage'&&$_smarty_tpl->getVariable('User')->value['type']=='student')||$_smarty_tpl->getVariable('page')->value=='docente'){?>
		<link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
	<?php }?>

	<!-- BEGIN THEME LAYOUT STYLES -->
	<link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/layouts/layout/css/themes/light2.css" rel="stylesheet" type="text/css" id="style_color" />
	<link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/jquery-multi-select/css/multi-select.css" rel="stylesheet" type="text/css" />
	<!-- END THEME LAYOUT STYLES -->
	<link rel="shortcut icon" href="favicon.ico" />

	<link href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/GreyBox/greybox/gb_styles.css" rel="stylesheet" type="text/css" />


	<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/tinymce/tiny_mce.js"></script>
	<script type="text/javascript">
		var GB_ROOT_DIR = "<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/GreyBox/greybox/";
	</script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/GreyBox/greybox/AJS.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/GreyBox/greybox/AJS_fx.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/GreyBox/greybox/gb_scripts.js"></script>

	<style>
		.modal-dialog{
			width: 70%;
		}
	</style>




</head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo <?php if ($_smarty_tpl->getVariable('User')->value['type']=="student"){?> page-sidebar-closed <?php }?> page-content-white page-md <?php if ($_smarty_tpl->getVariable('page')->value=='homepage'&&$_smarty_tpl->getVariable('User')->value['type']=='student'){?> page-container-bg-solid <?php }?>">
<div class="page-wrapper">
	<?php $_template = new Smarty_Internal_Template("new/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar-wrapper">
			<?php $_template = new Smarty_Internal_Template("new/sidebar.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

		</div>
		<!-- END SIDEBAR -->
		<!-- BEGIN CONTENT -->
		
		<div class="page-content-wrapper">
			<?php $_template = new Smarty_Internal_Template("new/container.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

		</div>
		<div id="frmModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
						</div>
		<!-- END CONTENT -->
	</div>
	<!-- END CONTAINER -->
	<?php $_template = new Smarty_Internal_Template("new/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</div>
<!--[if lt IE 9]>
<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/respond.min.js"></script>
<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->

<script>
	//$j = jQuery.noConflict();
	//$.noConflict(true);
</script>

<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/scripts/app.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/layouts/layout/scripts/layout.js" type="text/javascript"></script>

<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/javascript/new/functions.js?<?php echo $_smarty_tpl->getVariable('timestamp')->value;?>
" type="text/javascript"></script>

<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/bootstrap-growl/jquery.bootstrap-growl.min.js" type="text/javascript"></script>

<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>

<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/javascript/new/<?php echo $_smarty_tpl->getVariable('page')->value;?>
.js?<?php echo $_smarty_tpl->getVariable('timestamp')->value;?>
" type="text/javascript"></script>

<script src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/assets/pages/scripts/profile.min.js" type="text/javascript"></script>

<!-- END THEME LAYOUT SCRIPTS -->


</body>

</html>

