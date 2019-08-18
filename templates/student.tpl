<script type="text/javascript" charset="utf-8">
		$(document).observe('dom:loaded', function() {ldelim}
		{foreach from=$students item=item key=key}
		new FancyZoom('foto-{$item.userId}', {ldelim}width:400, height:300{rdelim});
		{/foreach}
		{rdelim});
	</script>
</head> 
<body> 
		 <ul id="sort-box" class="sorts">
 <li><div id="carga_filtro"> </div>
    <div class="content-header">
        <div class="content-header-left">
          <img src="{$WEB_ROOT}/images/new/catalogos.png" alt="" />
            <h2>Alumnos</h2>
	   </div>
    </div>
	

    <div class="content-in" id="tab">
	
	    
        {include file="boxes/status_no_ajax.tpl"}                                     
         
         {include file="forms/search-student.tpl"}
         <table><tr>                                      
        <td><div class="btnAdd" id="btnAddStudent">  </div></td><td> <form method="post" name="frmReport" id="frmReport" action=""> <input type="hidden" name="accion" value="export" /><input type="image" src="images/excel.gif"  title="Exportar alumnos a Excel" alt="Exportar alumnos a Excel"></form></td>
		</tr></table>

        
		
        <div id="tblContent">{include file="lists/student.tpl"}</div>
                         
       <br />              
       
       {if $studentsCount}
      	<div id="pagination" class="lnkPages">
        {include file="footer-pages-links.tpl"}
        </div>
        {/if}   
        
    </div>
<div id="loader2" > </div>	
   </li>                                                              
 </ul>  