<ul id="sort-box" class="sorts">
 <li>
    <div class="content-header">
        <div class="content-header-left">
          <img src="images/new/configuracion.png" alt="" />
            <h2>Fichas</h2>
        </div>                  
    </div>
    <div class="content-in" id="tab">
        
        {include file="forms/search-ficha.tpl"}
        <br />
        <div align="center">
            <a href="{$WEB_ROOT}/reports/excel/fichas_autorizadas.php">
            <img src="{$WEB_ROOT}/images/icons/excel.jpg" border="0" /> 
            Exportar a Excel Alumnos Autorizados Para Presentar Examen</a>
            <br />&nbsp;
        </div>
        
        <div id="tblContent">{include file="lists/ficha.tpl"}</div>
                         
       <br />              
       
       {if $fichas}
        <input type="hidden" id="viewPage" name="viewPage" value="{$arrPage.currentPage}" />
        <div id="pagination">
        {include file="footer-pages-links.tpl"}
        </div>
        {/if}
          
    </div> 
   </li>                                                              
 </ul> 