<?php /* Smarty version Smarty3-b7, created on 2017-05-30 15:40:03
         compiled from ".\templates\new/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1524592dd8a35b7f99-56535082%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c2a2dc2377b34375cdad9c483963246d2e85952' => 
    array (
      0 => '.\\templates\\new/footer.tpl',
      1 => 1496156724,
    ),
  ),
  'nocache_hash' => '1524592dd8a35b7f99-56535082',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner"> 2016 &copy; Instituto de Administraci&oacute;n P&uacute;blica del Estado de Chiapas, A.C.
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<!-- END FOOTER -->

<div class="modal fade" id="ajax" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <img src="../assets/global/img/loading-spinner-grey.gif" alt="" class="loading">
                <span> &nbsp;&nbsp;Loading... </span>
            </div>
        </div>
    </div>in
</div>

<div id="fview" style="display:none;">
    <input type="hidden" id="inputs_changed" value="0" />
    <div id="fviewload" style="display:block" align="center">
        <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/new/loading.gif" border="0" />
        <br />
        Cargando...
    </div>
    <div id="fviewcontent" style="display:none"></div>
    <div id="modal">
        <div id="submodal">

        </div>
    </div>
</div>
<div style="position:relative" id="divStatus"></div>