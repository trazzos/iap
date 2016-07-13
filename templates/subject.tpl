<ul id="sort-box" class="sorts">
 <li>
    <div class="content-header">
        <div class="content-header-left">
          <img src="{$WEB_ROOT}/images/new/catalogos.png" alt="" /></a>
            <h2>Curricula</h2>
        </div>                  
    </div>
    <div class="content-in" id="tab">
        {include file="boxes/status_no_ajax.tpl"}                                     
                                             
        <a href="{$WEB_ROOT}/new-subject"  onclick="return parent.GB_show('Agregar Curricula', this.href,650,700) "><div class="btnAdd" id="btnAddSubject"></div></a>
        
        <div id="tblContent">{include file="lists/subject.tpl"}</div>
                         
       <br />              
           
    </div> 
   </li>                                                              
 </ul>

<input type="hidden" id="viewPage" name="viewPage" value="{$arrPage.currentPage}" />