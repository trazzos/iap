<div class="portlet box {$PORTLET_COLOR}">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i>Alumnos
        </div>

            {include file="boxes/status_no_ajax.tpl"}
           <div class="actions">
            <table>
                <tr>
                    <td>
						<a class="btn {$BUTTON_COLOR}" href="{$WEB_ROOT}/graybox.php?page=add-alumno-admin&id={$item.userId}" data-target="#ajax" data-toggle="modal" data-width="1000px">
                            <i class="fa fa-plus"></i> Agregar
                        </a>
                    </td>
                    <td style="padding: 0 10px">
                        <form method="post" name="frmReport" id="frmReport" action="">
                            <input type="hidden" name="accion" value="export" />
                            <button type="submit" class="btn btn-info">
                                <i class="fa fa-lg fa-file-excel" title="Exportar alumnos a Excel" alt="Exportar alumnos a Excel"></i>
                            </button>
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
