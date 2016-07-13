<ul id="sort-box" class="sorts">
 <li>
    <div class="content-header">
        <div class="content-header-left">
          <img src="{$WEB_ROOT}/images/new/catalogos.png" alt="" /></a>
            <h2>Foro</h2>
        </div>                  
    </div>
    <div class="content-in" id="tab">
        {include file="boxes/status_no_ajax.tpl"}                                     
         
      <!-- <a href="{$WEB_ROOT}/add-topic/id/{$myModule.courseId}"  onclick="return parent.GB_show('Agregar Topico', this.href,450,700) "><div class="btnAdd" id="btnAddSubject"></div></a>-->
        
        <div id="tblContent">{include file="lists/topics.tpl"}</div>
                         
       <br />              
      	{if $coursesCount}
      	<div id="pagination" class="lnkPages">
        {include file="footer-pages-links.tpl"}
        </div>
        {/if}              
    </div> 
   </li>                                                              
 </ul>

<input type="hidden" id="viewPage" name="viewPage" value="{$arrPage.currentPage}" />