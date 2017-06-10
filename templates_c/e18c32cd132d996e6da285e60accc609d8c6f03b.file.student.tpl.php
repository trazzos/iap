<?php /* Smarty version Smarty3-b7, created on 2017-05-30 15:40:57
         compiled from "C:/wamp/www/iap/templates/new/student.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3153592dd8d9045f63-91344463%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e18c32cd132d996e6da285e60accc609d8c6f03b' => 
    array (
      0 => 'C:/wamp/www/iap/templates/new/student.tpl',
      1 => 1496156724,
    ),
  ),
  'nocache_hash' => '3153592dd8d9045f63-91344463',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript" charset="utf-8">
    $(document).observe('dom:loaded', function() {
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('students')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
        new FancyZoom('foto-<?php echo $_smarty_tpl->getVariable('item')->value['userId'];?>
', {width:400, height:300});
        <?php }} ?>
        });
</script>
</head>
<body>

<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i>Alumnos
        </div>


        <div class="actions">
            <?php $_template = new Smarty_Internal_Template("boxes/status_no_ajax.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

            <?php $_template = new Smarty_Internal_Template("forms/search-student.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

            <table>
                <tr>
                    <td>
                        <a href="javascript:;" class="btn green" id="btnAddPersonal">
                            <i class="fa fa-plus"></i> Agregar
                        </a>
                    </td>
                    <td>
                        <form method="post" name="frmReport" id="frmReport" action="">
                            <input type="hidden" name="accion" value="export" />
                            <input type="image" src="images/excel.gif"  title="Exportar alumnos a Excel" alt="Exportar alumnos a Excel">
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="portlet-body">
        <div id="tblContent"><?php $_template = new Smarty_Internal_Template("lists/student.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</div>
    </div>
            <br />
            <?php if ($_smarty_tpl->getVariable('studentsCount')->value){?>
                <div id="pagination" class="lnkPages">
                    <?php $_template = new Smarty_Internal_Template("footer-pages-links.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

                </div>
            <?php }?>


        <div id="loader2" > </div>
</div>
