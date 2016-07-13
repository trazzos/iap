<ul id="sort-box" class="sorts">
 <li>
    <div class="content-header">
        <div class="content-header-left">
          <img src="images/new/catalogos.png" alt="" />
            <h2>Actas de Calificaciones</h2>
        </div>                  
    </div>
    <div class="content-in" id="tab">
    
    	{include file="forms/search-gradereport.tpl"}
        
        <div align="center" id="divLoading" style="display:none">
            <img src="{$WEB_ROOT}/images/loading.gif" border="0" /><br />Cargando...
        </div>
                                                     
        <div class="btnAdd" id="btnAddGradereport" {if $info.personalId != 1} style="display:none"{/if}></div>
                
        <div id="tblContent">{include file="lists/gradereport.tpl"}</div>
                         
       <br />              
           
    </div> 
   </li>                                                              
 </ul>
