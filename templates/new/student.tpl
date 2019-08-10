<div class="portlet box {$PORTLET_COLOR}">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i>Alumnos
        </div>


        
            {include file="boxes/status_no_ajax.tpl"}
           <div class="accions">
            <table>
                <tr>
                    <td><!--
                        <a href="javascript:;" class="btn {$BUTTON_COLOR}" id="btnAddPersonal">-->
						<a class="btn {$BUTTON_COLOR}" href="{$WEB_ROOT}/graybox.php?page=add-alumno-admin&id={$item.userId}" data-target="#ajax" data-toggle="modal" data-width="1000px">
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
		{include file="forms/search-student.tpl"}
        <div id="tblContent">{include file="lists/student.tpl"}</div>
    </div>
            <br />
            {if $studentsCount}
                <div id="pagination" class="lnkPages">
                    {include file="footer-pages-links.tpl"}
                </div>
            {/if}


        <div id="loader2" > </div>
</div>
<script type="text/javascript" charset="utf-8">
  $( document ).ready(function() {ldelim}
    $("a.student-image").fancybox();
  {rdelim});
</script>
