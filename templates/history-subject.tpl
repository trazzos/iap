<ul id="sort-box" class="sorts">
 <li>
    <div class="content-header">
        <div class="content-header-left">
          <img src="{$WEB_ROOT}/images/new/catalogos.png" alt="" /></a>
            <h2>Instancias de Curricula</h2>
        </div>                  
    </div>
    <div class="content-in" id="tab">
        {include file="boxes/status_no_ajax.tpl"}                                     
         
        {if $docente != 1}                                     <!--Esta es la seccion donde agrega el boton de nueva instancia-->
        <a href="{$WEB_ROOT}/open-subject"  onclick="return parent.GB_show('Agregar Instancia', this.href,450,700) "><div class="btnAdd" id="btnAddSubject"></div></a>
        {/if}
        
        <div id="tblContent">{include file="lists/courses.tpl"}</div>
                         
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