<ul id="sort-box" class="sorts">
 <li>
    <div class="content-header">
        <div class="content-header-left">
          <img src="images/new/catalogos.png" alt="" />
            <h2>Constancia de Estudios</h2>
        </div>                  
    </div>
    <div class="content-in" id="tab">
        {include file="forms/search-study-constancy.tpl"}
        
        <p>&nbsp;</p>
                                                     
        <div id="tblContent" align="center">
        	{if $searchStudentCount > 1}
                {*include file="lists/study-constancy.tpl"*}
            {/if}
        </div>
        
        <div id="student-constancy">
            {include file="study-constancy-data.tpl"}
        </div>
                         
       <br />              
           
    </div> 
   </li>                                                              
 </ul>