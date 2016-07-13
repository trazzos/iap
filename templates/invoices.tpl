<ul id="sort-box" class="sorts">
 <li>
    <div class="content-header">
        <div class="content-header-left">
          <img src="{$WEB_ROOT}/images/new/catalogos.png" alt="" />
            <h2>Recibos Generados de Pago</h2>
        </div>                  
    </div>
    <div class="content-in" id="tab">
         
        {include file="forms/search-invoice.tpl"}
         <br />
       {*} <div class="btnAdd" id="btnAddStudent"></div>{*}
        
        <div id="tblContent">{include file="lists/invoices.tpl"}</div>
                         
       <br />              
       
       {*if $studentsCount}
      	<div id="pagination" class="lnkPages">
        {include file="footer-pages-links.tpl"}
        </div>
        {/if*}   
        
    </div> 
   </li>                                                              
 </ul>  